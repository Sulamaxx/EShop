<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51MPMNuK1Ge9YQeheI92lQN1FItJumnPhfj6Z9FUTdB4RWP11ZC38qHi1nxQ1F89aLMDiUw72I37fdvOu6Z0Zo0cb000IgbM3d8",
        "publishableKey" => "pk_test_51MPMNuK1Ge9YQehemebVqeAmFfP5y1AeN9THOzU8NgAyW9NcJqAVCDd9VbGhg56i1prXXWI3YrCu6eGuoRKPoUwj00knZ5Hgl9"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>