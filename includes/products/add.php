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
$processor = $_POST["processor"];
$graphic_card = $_POST["graphic_card"];
$windows = $_POST["windows"];
$screen = $_POST["screen"];
$ram = $_POST["ram"];
$rom = $_POST["rom"];
$wifi = $_POST["wifi"];
    
if ( empty( $name ) || empty($image_url) || empty($price) || empty($processor) || empty($graphic_card) || empty($windows) || empty($screen) || empty($ram) || empty($rom) || empty($wifi)  ) {
    $error = 'All fields are required';
}

if( isset ($error)){
    $_SESSION['error'] = $error;
    header("Location: /manage-products-add");    
    exit;
} 

    $sql = "INSERT INTO products (`name`, `image_url`, `price`, `processor`, `graphic_card`, `windows`, `screen`, `ram`, `rom`, `wifi` )
    VALUES(:name, :image_url, :price, :processor, :graphic_card, :windows, :screen, :ram, :rom, :wifi)";
    $query = $database->prepare( $sql );
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
        'wifi' => $wifi
    ]);

    $_SESSION["success"] = "New product has been added.";
    header("Location: /manage-products");
    exit;
    
