<?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 align="center">Data Suspectible Species</h2>
                    <?php
          if($users)
          { ?>
            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_dsuspect'>Tambahkan Data</a>
                     <?php
          }
        ?>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:40px'>No</th>
                        <th>Nama Data Suspectible Species</th>
                        <th>Jenis MP</th>
                        <th>Status Suspectible Species</th>
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
                    foreach ($datasuspect->result_array() as $row) {

                      $jenis = $this->db->query("select * from jenis where kode_jenis = '$row[jenisMP]'");
                      foreach($jenis->result_array() as $row1)
                      {
                        $JP = $row1[nama_jenis];
                      }

                      $ss = $this->db->query("select * from suspectiblespecies where kodeSS = '$row[ss]'");
                      foreach($ss->result_array() as $row8)
                      {
                        $suspectibleSpecies = $row8[namaSS];
                      }

                        echo "<tr><td>$no</td>  
                              <td>$row[namaDS]</td>
                              <td>$JP</td>
                              <td>$suspectibleSpecies</td>";
                        if($users)
                        { 
                          echo "
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_dsuspect/$row[kodeDS]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_dsuspect/$row[kodeDS]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                        }
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>