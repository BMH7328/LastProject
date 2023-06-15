<?php

// check if the current user is an admin or not
if ( !isAdminOrEditor() ) {
    //if current user is not an admin, redirect to dashboard
    header("Location: /");
    exit;
}

    // load the database
    $database = connectToDB();

    // get all the $_POST data
    $name = $_POST["name"];
    $image_url = $_POST["image_url"];
    $price = $_POST["price"];
    $processor = $_POST["processor"];
    $graphic_card = $_POST["graphic_card"];
    $windows = $_POST["windows"];
    $screen = $_POST["screen"];
    $ram = $_POST["ram"];
    $rom = $_POST["rom"];
    $wifi = $_POST["wifi"];
    $status = $_POST["status"];
    $id = $_POST["id"];

    /* 
        do error check
        - make sure all the fields are not empty
        - make sure the *new* email entered is not duplicated
    */
    if ( empty( $name ) || empty($image_url) || empty($price) || empty($processor) || empty($graphic_card) || empty($windows) || empty($screen) || empty($ram) || empty($rom) || empty($wifi) || empty($status) || empty($id) ) {
        $error = 'All fields are required';
    }

    // if error found, set error message & redirect back to the manage-users-edit page with id in the url
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header("Location: /manage-products-edit?id=$id");
        exit;
    }   
    // if no error found, update the user data based whatever in the $_POST data
    $sql = "UPDATE products SET name = :name, image_url = :image_url, price = :price, processor = :processor, graphic_card = :graphic_card, windows = :windows, screen = :screen, ram = :ram, rom = :rom, wifi = :wifi, status = :status WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'name' => $name,
        'image_url' => $image_url,
        'price' => $price,
        'processor' => $processor,
        'graphic_card' => $graphic_card,
        'windows' => $windows,
        'screen' => $screen,
        'ram' => $ram,
        'rom' => $rom,
        'wifi' => $wifi,
        'status' => $status,
        'id' => $id
    ]);

    // set success message
    $_SESSION["success"] = "Product has been edited.";

    // redirect
    header("Location: /manage-products");
    exit;