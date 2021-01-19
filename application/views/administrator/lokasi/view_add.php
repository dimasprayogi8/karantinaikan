<html>
<title>editor</title>

<head>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>

<body>
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Create Data</div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>lokasi/save" class="form-horizontal">
                        <div class="form-group">
                            <label class=" col-md-2 control-label">
                                <div align="left">Nama Lokasi</div>
                            </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="nama_lokasi" placeholder="nama lokasi" autofocus />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" col-md-2 control-label">
                                <div align="left">Keterangan</div>
                            </label>
                            <p>
                                <div class="col-md-12">
                                    <textarea name="keterangan" rows="10"></textarea>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type='button' class='btn btn-default pull-right'>Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>