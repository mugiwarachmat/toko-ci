<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Products Read</h2>
        <table class="table">
	    <tr><td>name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>price</td><td><?php echo $price; ?></td></tr>
	    <tr><td>stock</td><td><?php echo $stock; ?></td></tr>
	    <tr><td>image</td><td><?php echo $image; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('products') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>