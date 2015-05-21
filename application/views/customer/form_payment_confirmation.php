<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Payment Confirmation - Toko Online by Kursus-PHP.com</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		
		<div><?=validation_errors()?></div>
		<div><?=$this->session->flashdata('error')?></div>
		
        <?=form_open('customer/payment_confirmation/', ['class'=>'form-horizontal'])?>

		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Invoice ID</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="invoice_id" value="<?=($invoice_id != 0?$invoice_id:'')?>">
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Amount Transfered</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="amount">
			</div>
		  </div>

		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">Confirm My Payment</button>
			</div>
		  </div>

		</form>
	</body>
</html>
