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
        <h2 style="margin-top:0px">Products <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">name <?php echo form_error('name') ?></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php echo $name; ?>" />
            </div>
	    <div class="form-group">
                <label for="description">description <?php echo form_error('description') ?></label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="description"><?php echo $description; ?></textarea>
            </div>
	    <div class="form-group">
                <label for="int">price <?php echo form_error('price') ?></label>
                <input type="text" class="form-control" name="price" id="price" placeholder="price" value="<?php echo $price; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">stock <?php echo form_error('stock') ?></label>
                <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" value="<?php echo $stock; ?>" />
            </div>
	    <div class="form-group">
                <label for="image">image <?php echo form_error('image') ?></label>
                <textarea class="form-control" rows="3" name="image" id="image" placeholder="image"><?php echo $image; ?></textarea>
            </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('products') ?>" class="btn btn-default">Cancel</button>
	</form>
    </body>
</html>