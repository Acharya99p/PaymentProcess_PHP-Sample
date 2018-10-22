<?php
session_start();
require_once 'header.php';
?>

<body>
<div class="container" style="margin-top: 5%">
	<div class="row">
		<div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">

			<div class="row">
				<div class="text-center">
					<h1>Receipt</h1>
				</div>
				<table class="table table-hover">
					<thead>
					<tr>
						<th>Product</th>
						<th>Qty</th>
						<th class="text-center">Price</th>
						<th class="text-center">Total</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="col-md-9"><em>Lorel ipsum</em></h4></td>
						<th>1</th>
						<td class="col-md-1 text-center"><?php echo '$' . $_SESSION['orderAmount']; ?></td>
						<td class="col-md-1 text-center"><?php echo '$' . $_SESSION['orderAmount']; ?></td>
					</tr>

					<tr>
						<td></td>
						<td> </td>
						<td class="text-right"><h4><strong>Total: </strong></h4></td>
						<td class="text-center text-danger"><h4><strong><?php echo '$' . $_SESSION['orderAmount']; ?></strong></h4></td>
					</tr>
					</tbody>
				</table>
				<button type="button" class="btn btn-success btn-lg btn-block">
					Thank you <span class="glyphicon glyphicon-chevron-right"></span>
				</button>
			</div>
		</div>
	</div>

<?php require_once 'footer.php';?>