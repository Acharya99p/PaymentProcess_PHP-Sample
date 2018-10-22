<?php
session_start();
require_once '../autoload.php';
use libraries\PostData;

if (isset($_POST["submit"])) {

	// =================Parse input data=================================
	$PostData = new \libraries\PostData($_POST);

	// Get amount.
	$amount = $_SESSION['orderAmount'];

	// Get card input.
	$cardName = $PostData->get('cardName'); // card holder name
	$cardNo   = $PostData->get("cardNo");
	$cardCode = $PostData->get("cardCode");
	$exMo     = $PostData->get("exMo"); // expiration month
	$exYr     = $PostData->get("exYr"); // expiration year

	// Get name input.
	$fname   = $_SESSION['fname'] = $PostData->get("fname"); // first name
	$lname   = $_SESSION['lname'] = $PostData->get("lname"); // last name
	$company = $_SESSION['company'] = $PostData->get("company");

	// Get address input.
	$addy1 = $PostData->get("addy1"); // address, line 1
	$addy2 = $PostData->get("addy2"); // line 2
	$city  = $PostData->get("city");
	$state = $PostData->get("state");
	$zip   = $PostData->get("zip");

	// Create Data Objects
	$CreditCard = new \objects\CreditCard($cardName, $cardNo, $cardCode, $exMo, $exYr);
	$Address    = new \objects\Address($addy1, $addy2, $city, $state, $zip);

	// Validate data
	if (!validate($amount)) {
		$_SESSION['error_message'] = 'Please check below errors';
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	// Get order ID
	$orderID = $_SESSION['orderId'];

	// Set submitted_at in Order
	(new \models\Order($orderID))->setSubmittedAt(time());

	// Store Data. Create Transaction
	$paymentID = \models\Payment::createPayment($company, $orderID, $amount, $CreditCard, $Address);

	if (!empty($paymentID)) {
		$_SESSION['payment_id'] = $paymentID;

		// Redirect to Order Confirmation Page
		header('Location: ../views/order_complete.php');
	} else {
		// Redirect with error message..
		$errorMessage = 'The payment could not be completed because of some issue. If your account was debited, you will get the
		 refund with in 3 working days.';
	}
} else {
	$_SESSION['error_message'] = 'Invalid request';
	header('Location: /index.php');
}

// We need to validate all fields here, but right now I'm taking only one field for sample.
function validate($amount)
{
	// TODO: Write validations for every input field.

	// In case of error, return false otherwise true!

	if (empty($amount)) {
		$_SESSION['errors'][] = 'Amount cannot be empty';

		return false;
	}

	return true;
}

