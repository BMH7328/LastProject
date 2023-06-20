<?php
    session_start();

    // require all the functions files
    require "includes/functions.php";

    // your website path
    // parse_url will remove all the query string starting from the ?
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    // remove / using trim()
    $path = trim( $path, '/');

    switch ($path) {
        case "auth/login":
            require "includes/auth/login.php";
            break;
        case "auth/signup":
            require "includes/auth/signup.php";
            break;
        case "cart/add":
            require "include/cart/add.php";
            break;
        case "cart/clear":
            require "include/cart/clear.php";
            break;
        case "cart/remove":
            require "include/cart/remove.php";
            break;
        case "cart/total":
            require "include/cart/total.php";
            break;
        case "comments/add":
            require "includes/comments/add.php";
            break;
        case "comments/delete":
            require "includes/comments/delete.php";
            break;
        case "contact/add":
            require "includes/contact/add.php";
            break;
        case "contact/delete":
            require "includes/contact/delete.php";
            break;
        case "product/add":
            require "includes/products/add.php";
            break;  
        case "product/delete":
            require "includes/products/delete.php";
            break;
        case "product/edit":
            require "includes/products/edit.php";
            break;
        case "users/add":
            require "includes/users/add.php";
            break;
        case "users/edit":
            require "includes/users/edit.php";
            break;
        case "users/changepwd":
            require "includes/users/changepwd.php";
            break;
        case "users/delete":
            require "includes/users/delete.php";
            break;
        case "manage-comments":
            require "pages/comments/manage-comments.php";
            break;
        case "manage-contact":
            require "pages/contact/manage-contact.php";
            break;
        case "manage-products":
            require "pages/products/manage-products.php";
            break;
        case "manage-products-add":
            require "pages/products/manage-products-add.php";
            break;
        case "manage-products-edit":
            require "pages/products/manage-products-edit.php";
            break;
        case "manage-users": //condition
            require "pages/users/manage-users.php";
            break;
        case "manage-users-add": //condition
            $_SESSION["title"] = "Add New User";
            require "pages/users/manage-users-add.php";
            break;
        case "manage-users-changepwd": //condition
            require "pages/users/manage-users-changepwd.php";
            break;
        case "manage-users-edit": //condition
            require "pages/users/manage-users-edit.php";
            break;
        case "login": //condition
            require "pages/login.php";
            break;
        case "logout": //condition
            require "pages/logout.php";
            break;
        case "signup":
            require "pages/signup.php";
            break;
        case "contact":
            require "pages/contact.php";
            break;
        case "cart":
            require "pages/cart.php";
            break;
        case "manage";
            require "pages/manage.php";
            break;
        case "product":
            require "pages/product.php";
            break;
        case "payment";
            require "pages/payment.php";
            break;
        case "post";
            require "pages/post.php";
            break;
        default:
            require "pages/home.php";
            break;
    }
?>