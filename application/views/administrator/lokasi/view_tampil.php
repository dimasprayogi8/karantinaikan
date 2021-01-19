<?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
<html>
<title>editor</title>
<head>    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>        
</head>
<body>
<div class="container" style="margin-top:20px;">    
    <div class="row">    
    <div class="panel panel-primary">
        <div class="panel-heading">Data Lokasi Pemasukan</div>
        <div class="panel-body">
            <div class="input-group ">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                    <?php
                      if($users)
                      { ?>
                        <a href="<?php echo base_url(); ?>lokasi/add" class="btn btn-success" >
                        Create Form</a>
                     <?php
                          }
                        ?>
                    </div>                            
                    <div class="col-xs-6 col-sm-1">
                    </div>    
                </div>    
            </div>                        
            <br>
            <div class="table-responsive">
               <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th style='width:40px'>No</th>
                        <?php
                        if($users)
                        { ?>

                          <th style='width:70px'>Action</th>
                       <?php
                        }
                      ?>
                            <th style='width:200px'><div align="center">Nama Lokasi</div></th>
                            <th><div align="center">Keterangan</div></th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            if ($lokasi->result_array()  == null){
                                echo "<div class='alert alert-danger' align='center' role='alert'>Tidak ada data</div>";    
                            }
                            foreach ($lokasi->result_array()  as $row) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <?php 
                                if($users)
                                {
                                echo "<td><center>
                                  <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "lokasi/form_edit/$row[id]' ><span class='glyphicon glyphicon-edit'></span></a>
                                   <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "lokasi/delete/$row[id]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                                        </center></td>";
                                 }?>
                                <td><?php echo $row['nama_lokasi']; ?></td>
                                <td class="fontlogin"><?php echo $row['keterangan']; ?></td>
                        <?php
                            $no++;
                            } ?>
                            </tr>
                    </tbody>
               </table>
            </div>
        </div>    
    </div>.
</div>    
</body>
</html>   