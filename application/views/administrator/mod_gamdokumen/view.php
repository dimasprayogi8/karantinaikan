<?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 align="center">Data Gambar Status Dokumen</h2>

            <?php
            if ($users) { ?>

                <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_gamdokumen'>Tambahkan Data</a>

            <?php
            }
            ?>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:40px'>No</th>
                        <th style="width: 100px;">Gambar</th>
                        <th>Nama gambar</th>
                        <th>Keterangan</th>
                        <th style='width:70px'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($gamdokumen->result_array() as $row) {
                        echo "<tr><td>$no</td>
                              <td>$row[gambar]</td>
                              <td>$row[nama_gam]</td>
                              <td>$row[ket]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_gamdokumen/$row[kode_gam]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_gamdokumen/$row[kode_gam]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>