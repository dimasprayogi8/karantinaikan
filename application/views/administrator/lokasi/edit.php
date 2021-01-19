<html>
<title>editor</title>
<head>    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>        
    <script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>    
</head>
<body>
    <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
    echo form_open_multipart('lokasi/saveUpdate', $attributes);
    ?>
<div class="container" style="margin-top:20px;">    
    <div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">Create Data</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>lokasi/saveUpdate" class="form-horizontal">
                <div class="form-group">
                    <input type='hidden' name='id' value='<?=$rows['id']?>'>
                    <label class=" col-md-2 control-label"><div align="left">Nama Lokasi</div></label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="nama_lokasi" value="<?=$rows['nama_lokasi']?>"placeholder="nama lokasi" autofocus/>    
                    </div>                        
                </div>       

                <div class="form-group">
                    <label class=" col-md-2 control-label"><div align="left">Keterangan</div></label><p>
                    <div class="col-md-12">
                        <textarea name="keterangan" rows="10"><?=$rows['keterangan']?></textarea>
                    </div>        
                </div>    
                    <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        </div>  
    </div>
</div> 
<?php echo form_close(); ?>         
</body>
</html>