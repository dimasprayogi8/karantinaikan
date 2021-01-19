<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Diketahui Pemilik</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/edit_diketahuipem', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kodeDP]'>
                    <tr><th width='120px' scope='row'>Kode Diketahui Pemilik</th>    <td><input type='text' class='form-control' name='a' value='$rows[kodeDP]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[namaDP]'>
                    <tr><th width='120px' scope='row'>Nama Diketahui Pemilik</th>    <td><input type='text' class='form-control' name='b' value='$rows[namaDP]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/diketahuipem'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
