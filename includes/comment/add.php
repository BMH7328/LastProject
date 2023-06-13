<?php

    // make sure the user is logged in
    if ( !isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }


    $database = connectToDB();

    // get all the POST data
    $comment = $_POST['comment'];
    $user_id = $_POST['user_id'];

    // do error checking
    if ( empty( $comments ) || empty( $user_id ) ) {
        $error = "Please fill out the comment";
    }
    
    if( isset ($error)){
        $_SESSION['error'] = $error;
        header("Location: /comment" ); 
        exit;
    }

    // insert the comment into database
    $sql = "INSERT INTO comments (`comments`, `user_id`)
    VALUES(:post_id, :user_id)";
    $query = $database->prepare( $sql );
    $query->execute([
        'comments' => $comments,
        'user_id' => $user_id
    ]);

    header("Location: /comment" );