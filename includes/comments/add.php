<?php

    // make sure the user is logged in
    if ( !isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }

    $database = connectToDB();

    // get all the POST data
    $comment = $_POST['comment'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];

    // do error checking
    if ( empty( $comment ) || empty($product_id) || empty( $user_id ) ) {
        $error = " Please fill out the comment";
    }
    
    if( isset ($error)){
        $_SESSION['error'] = $error;
        header("Location: /post?id=$product_id" ); 
        exit;
    }

    // insert the comment into database
    $sql = "INSERT INTO comments (`comment`, `product_id`, `user_id`)
    VALUES(:comment, :product_id, :user_id)";
    $query = $database->prepare( $sql );
    $query->execute([
        'comment' => $comment,
        'product_id' => $product_id,
        'user_id' => $user_id
    ]);

    header("Location: /post?id=$product_id" );
    exit;