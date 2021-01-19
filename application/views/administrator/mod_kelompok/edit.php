<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Kelompok</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/edit_kelompok', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kode_kel]'>
                    <tr><th width='120px' scope='row'>Kode Kelompok</th>    <td><input disabled type='text' class='form-control' name='a' value='$rows[kode_kel]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[nama_kel]'>
                    <tr><th width='120px' scope='row'>Nama Kelompok</th>    <td><input type='text' class='form-control' name='b' value='$rows[nama_kel]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/kelompok'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
