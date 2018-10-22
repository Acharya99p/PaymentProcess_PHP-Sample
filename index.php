<?php
session_start();
$_SESSION["orderId"] =1;
$_SESSION["orderAmount"] =100; // For testing

require 'views/payment_form.php';
