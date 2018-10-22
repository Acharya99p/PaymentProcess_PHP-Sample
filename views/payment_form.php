<?php 

require_once 'header.php';
?>

<body>
<div class="container main">
	<?php
	if (!empty($_SESSION['error_message'])) {
		echo '<div class="alert alert-danger">
                <strong>Error!</strong> ' . $_SESSION['error_message'] . '
			</div>';

		unset($_SESSION['error_message']);
	}
	?>

	<h1>Order payment</h1>
	<form class="form-horizontal" role="form" method="post" action="controllers/cc_payment.php">
		<input type="hidden" name="amount" value='<?php echo $_SESSION["orderAmount"]; ?>'/>

		<div class="resp-tabs-container">
			<h2>Card Details</h2>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="card-holder-name">Cardholder Name</label>

				<div class="col-sm-9">
					<input type="text" class="form-control" name="cardName" id="card-holder-name" placeholder="Card Holder's Name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="card-number">Card Number</label>

				<div class="col-sm-9">
					<input type="text" maxlength=19 class="form-control" name="cardNo" id="cardNo" required="required" placeholder="Debit/Credit Card Number">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="card-number">Card Code</label>

				<div class="col-sm-9">
					<input type="text" maxlength="4" class="form-control" name="cardCode" required="required" placeholder="Card code">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>

				<div class="col-sm-9">
					<div class="row">
						<div class="col-xs-3">
							<select class="form-control col-sm-2" name="exMo" id="expiry-month">
								<option>Month</option>
								<option value="01">Jan (01)</option>
								<option value="02">Feb (02)</option>
								<option value="03">Mar (03)</option>
								<option value="04">Apr (04)</option>
								<option value="05">May (05)</option>
								<option value="06">June (06)</option>
								<option value="07">July (07)</option>
								<option value="08">Aug (08)</option>
								<option value="09">Sep (09)</option>
								<option value="10">Oct (10)</option>
								<option value="11">Nov (11)</option>
								<option value="12">Dec (12)</option>
							</select>
						</div>
						<div class="col-xs-3">
							<select class="form-control" name="exYr">
								<option value="18">2018</option>
								<option value="19">2019</option>
								<option value="20">2020</option>
								<option value="21">2021</option>
								<option value="22">2022</option>
								<option value="23">2023</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="resp-tabs-container">
			<h2>Billing Information</h2>
			<div class="form-group">
				<label class="col-sm-3 control-label">First Name:</label>

				<div class="col-sm-3">
					<input type="text" class="form-control" name="fname" value='<?php print isset($_SESSION["fname"]) ? $_SESSION["fname"] : ''; ?>' required placeholder="First Name"/>
				</div>

				<label class="col-sm-2 control-label">Last Name:</label>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="lname" value='<?php print isset($_SESSION["lname"]) ? $_SESSION["lname"] : ''; ?>' required placeholder="Last Name"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="company-name">Company Name</label>

				<div class="col-sm-9">
					<input type="text" class="form-control" name="company" placeholder="Company Name">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Address:</label>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="addy1" value='<?php print isset($_SESSION["addy1"]) ? $_SESSION["addy1"] : ''; ?>' required placeholder="Address line 1"/>
				</div>

				<div class="col-sm-5">
					<input type="text" class="form-control" name="addy2" value='<?php print isset($_SESSION["addy2"]) ? $_SESSION["addy2"] : ''; ?>' required placeholder="Address line 2"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"></label>

				<div class="col-sm-3">
					<input type="text" class="form-control" name="city" value='<?php print isset($_SESSION["city"]) ? $_SESSION["city"] : ''; ?>' required placeholder="City"/>
				</div>

				<div class="col-sm-3">
					<input type="text" class="form-control" name="state" value='<?php print isset($_SESSION["state"]) ? $_SESSION["state"] : ''; ?>' required placeholder="State"/>
				</div>

				<div class="col-sm-3">
					<input type="text" class="form-control" name="zip" maxlength="6" value='<?php print isset($_SESSION["zip"]) ? $_SESSION["zip"] : ''; ?>' required placeholder="ZIP"/>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<input type="submit" name="submit" class="btn btn-success" value="Pay Now!" />
				</div>
			</div>
		</div>
	</form>
</div>
<link href="views/css/payment_form.css" rel="stylesheet" id="bootstrap-css">
<?php require_once 'footer.php';?>