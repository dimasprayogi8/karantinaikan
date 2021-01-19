<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 align="center">Terjangkit</h2>
            <!-- <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_terjangkit'>Tambahkan Data</a> -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Terjangkit</th>
                        <th>Nama Terjangkit</th>
                        <th style='width:70px'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($terjangkit->result_array() as $row) {
                        echo "<tr><td>$no</td>
                              <td>$row[kodeTerjangkit]</td>
                              <td>$row[namaTerjangkit]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_terjangkit/$row[kodeTerjangkit]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_terjangkit/$row[kodeTerjangkit]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>