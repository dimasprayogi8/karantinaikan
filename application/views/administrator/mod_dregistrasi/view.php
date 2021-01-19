<?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 align="center">Data Registrasi</h2>

        <?php
          if($users)
          { ?>

            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_dregistrasi'>Tambahkan Data</a>

         <?php
          }
        ?>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:40px'>No</th>
                        <th>Nama Data Registrasi</th>
                        <th>Jenis MP</th>
                        <th>Status Registrasi</th>
                        <?php
                        if($users)
                        { ?>

                          <th style='width:70px'>Action</th>
                       <?php
                        }
                      ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php                  

                    $no = 1;
                    foreach ($dataregistrasi->result_array() as $row) {

                      $jenis = $this->db->query("select * from jenis where kode_jenis = '$row[jenisMP]'");
                      foreach($jenis->result_array() as $row1)
                      {
                        $JP = $row1[nama_jenis];
                      }

                          $sr = $this->db->query("select * from statusregistrasi where kodeSR = '$row[sr]'");
                          foreach($sr->result_array() as $row7)
                          {
                            $statusRegistrasi = $row7[namaSR];
                          }

                        echo "<tr><td>$no</td>
                              <td>$row[namaDR]</td>
                              <td>$JP</td>
                              <td>$statusRegistrasi</td>";
                        if($users)
                        { 
                          echo "
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_dregistrasi/$row[kodeDR]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_dregistrasi/$row[kodeDR]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                        }
                            
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>