<?php

    if ( !isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }


    $database = connectToDB();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if ( empty( $name ) || empty($email) || empty($message) ) {
        $error = 'All fields are required';
    } else if ( strlen( $message ) < 10 ) {
        $error = "Your message must be at least 10 letters or more";
    }else {
        // recipe
        $sql = "INSERT INTO contact ( `name`, `email`, `message` )
            VALUES (:name, :email, :message)";
        // prepare
        $query = $database->prepare( $sql );
        // execute
        $query->execute([
            'name' => $name,
            'email' => $email,
            'message' => $message
        ]);
        $success = "Submit Successfully ";
    }

    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
  
        header("Location: /contact");
        exit;
    }

    if ( isset( $success ) ) {
        // store the error message in session
        $_SESSION['success'] = $success;
        // redirect the user back to login.php
        header("Location: /contact");
        exit;
    }

    ?>