<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Front-End Toko Online by Kursus-PHP.com</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		
        <?php if($history != false) : ?>
        <?= $this->session->flashdata('message')?>		
        <table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Invoice ID #</th>
					<th>Invoice Date</th>
					<th>Due Date</th>
					<th>Total Amout</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($history as $row) : 
				?>
				<tr>
					<td><?= $row->id ?></td>
					<td><?= $row->date ?></td>
					<td><?= $row->due_date ?></td>
                    <td><?= $row->total?></td>
					<td>
                        <?= $row->status ?>
                        <?php
                           if($row->status == 'unpaid'){
                            anchor('customer/payment_confirmation/'.$row->id,'Confirm Payment',
                                    array('class'=>'btn btn-primary btn-xs')
                                 );
                           }
                        ?>
                    </td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
        <?php else : ?>
            <p align="center">There are no shopping history for you.. <?=anchor('/','Shop now')?></p>
        <?php endif; ?>
	</body>
</html>
