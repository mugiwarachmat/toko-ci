<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>

        <?php $this->load->view('layout/top_menu') ?>

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php// echo anchor(site_url('products/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('products/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('products'); ?>" class="btn btn-default">Reset</a>
                        <?php
                    }
                    ?>
                    <input type="submit" value="Search" class="btn btn-primary" />
                </form>
            </div>
        </div>
        
        <!-- Tampilkan semua produk -->
        <div class="row">
        <!-- looping products -->

     <?php
            foreach ($products_data as $product)
            {
     ?>


          <?php //foreach($products as $product) : ?>

          <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
              <?=img([
                'src'       => 'uploads/' . $product->image,
                'style'     => 'max-width: 100%; max-height:100%; height:100px'
              ])?>
              <div class="caption">
                <h3 style="min-height:60px;"><?=$product->name?></h3>
                <p><?=$product->description?></p>
                <p>
                    <?=anchor('welcome/add_to_cart/' . $product->id, 'Buy' , [
                        'class' => 'btn btn-primary',
                        'role'  => 'button'
                    ])?>
                </p>
              </div>
            </div>
          </div>

          <?php //endforeach; ?>

          <?php } ?>

        <!-- end looping -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <ul class="pagination" style="margin-top: 0px">
                    <li class="active"><a href="#">Total Record : <?php echo $total_rows ?></a></li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>


        
<!------------

        <h2 style="margin-top:0px">Products List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('products/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('products/search'); ?>" class="form-inline" method="post">
                    <input name="keyword" class="form-control" value="<?php echo $keyword; ?>" />
                    <?php 
                    if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('products'); ?>" class="btn btn-default">Reset</a>
                        <?php
                    }
                    ?>
                    <input type="submit" value="Search" class="btn btn-primary" />
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            
            <tr>
                <th>No</th>
		<th>name</th>
		<th>description</th>
		<th>price</th>
		<th>stock</th>
		<th>image</th>
		<th>Action</th>
            </tr>
          </thead>
    

            <?php
            foreach ($products_data as $products)
            {
                ?>
            <tbody>
                
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $products->name ?></td>
            <td><?php echo $products->description ?></td>
            <td><?php echo $products->price ?></td>
            <td><?php echo $products->stock ?></td>
            <td><?php echo $products->image ?></td>
            <td>
                <?php 
                echo anchor(site_url('products/read/'.$products->id),'Read'); 
                echo ' | '; 
                echo anchor(site_url('products/update/'.$products->id),'Update'); 
                echo ' | '; 
                echo anchor(site_url('products/delete/'.$products->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
            </tbody>    
        </table>
        <div class="row">
            <div class="col-md-6">
                <ul class="pagination" style="margin-top: 0px">
                    <li class="active"><a href="#">Total Record : <?php echo $total_rows ?></a></li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
-------------->        
    </body>
</html>