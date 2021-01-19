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
                        <th>Nama gambar</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style='width:40px'>1</td>
                        <td>Contoh Dokumen Valid #1</td>
                        <td><img src="<?php echo base_url().'uploads/contoh_valid_1.jpg' ?>" class="img-responsive">
                            <br>Gambar</td>
                    </tr>
                </tbody>
            </table>
        </div>