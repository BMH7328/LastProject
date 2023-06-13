<?php

// check if the current user is an admin or not
if ( !isAdminOrEditor() ) {
    //if current user is not an admin, redirect to dashboard
    header("Location: /");
    exit;
}

// load database
$database = connectToDB();

// get all the POST data
$name = $_POST["name"];
$image_url = $_POST["image_url"];
$price = $_POST["price"];
$spec = $_POST["spec"];
    


// do error checking
/*
    - make sure all fields are not empty
    - make sure the password is match
    - make sure the password is at least 8 characters
    - make sure email entered wasn't already exists in the database
*/
if ( empty( $name ) || empty($image_url) || empty($price) || empty($spec)  ) {
    $error = 'All fields are required';
}

// if error found, set error message session
if( isset ($error)){
    $_SESSION['error'] = $error;
    header("Location: /manage-products-add");    
} else {
    // if no error found, process to account creation

    $sql = "INSERT INTO products (`name`, `image_url`, `price`,`spec` )
    VALUES(:name, :image_url, :price, :spec)";
    $query = $database->prepare( $sql );
    $query->execute([
        'name' => $name,
        'image_url' => $image_url,
        'price' => $price,
        'spec' => $spec
    ]);


    // redirect the user back to manage-users page
    $_SESSION["success"] = "New product has been created.";
    header("Location: /manage-products");
    exit;
    
}