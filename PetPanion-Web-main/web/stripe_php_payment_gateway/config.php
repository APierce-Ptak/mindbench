<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51Hwj3vG0pFxGDK1qVMZa5j5JcpvK7WRUacSH4UcthahM4OpeV9GDHNQeTHiV6KRcJmRTwVZG13aUX8tZkQ7OuDyB00PoBrSpM0";

$secretKey="sk_test_51Hwj3vG0pFxGDK1qCGmB7N2MRPwUo24upiTlggciUBuJiznBDXtVARCFoC0Z18taMgV5xIhNeaKKAgu6GezlJFXH00DTxHfrFe";

\Stripe\Stripe::setApiKey($secretKey);
?>