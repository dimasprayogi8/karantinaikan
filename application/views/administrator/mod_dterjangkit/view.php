<?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 align="center">Data Terjangkit</h2>
                    <?php
          if($users)
          { ?>
            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_dterjangkit'>Tambahkan Data</a>
                     <?php
          }
        ?>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:40px'>No</th>
                        <th>Nama Data Terjangkit</th>
                        <th>Jenis MP</th>
                        <th>Status Terjangkit</th>
                        <th style='width:70px'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dataterjangkit->result_array() as $row) {

                      $jenis = $this->db->query("select * from jenis where kode_jenis = '$row[jenisMP]'");
                      foreach($jenis->result_array() as $row1)
                      {
                        $JP = $row1[nama_jenis];
                      }

                      $tj = $this->db->query("select * from terjangkit where kodeTerjangkit = '$row[st]'");
                      foreach($tj->result_array() as $row9)
                      {
                        $terjangkit = $row9[namaTerjangkit];
                      }

                        echo "<tr><td>$no</td>
                              <td>$row[namaDT]</td>
                              <td>$JP</td>
                              <td>$terjangkit</td>";
                        if($users)
                        { 
                          echo "
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_dterjangkit/$row[kodeDT]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_dterjangkit/$row[kodeDT]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                        }
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>