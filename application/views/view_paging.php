<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bootstrap Pagination di Codeigniter</title>

<!--CSS CORE Bootstrap-->

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<div class="row-fluid" style="margin-top:10px;">
<div class="col-md-4">
 <div class="panel panel-default">
        <div class="panel-heading">Data Siswa</div>
        <div class="panel-body">
        <div class="table-responsive">
<table width="200" border="0" class="table">
  <tr>
    <td>Nis</td>
    <td>Nama</td>
    <td>Kelas</td>
  </tr>
  <!--Script view yang dipakai -->
  <?php
   $no = $offset;
   foreach($data as $row ) { 
   
   ?>
  <tr>
    <td><?php echo ++$no;?></td>
    <td><?php echo $row->nama; ?></td>
    <td><?php echo $row->kelas; ?></td>
  </tr>
  <?php } ?>
</table>
  </div>
        </div>
        
        <div class="panel-footer" style="height:40px;">
        <?php echo $halaman ?> <!--Memanggil variable pagination-->
        </div>
        
        </div>
</div>
</div>
</body>

<!--BOOTSTRAP CORE JQUERY-->

  	<!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url()?>assets/js/jquery.min"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    
</html>