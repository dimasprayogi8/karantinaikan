<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Suspectible Species</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/edit_dsuspect', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kodeDS]'>
                    <tr><th width='120px' scope='row'>Kode Data Suspectible Species</th>    <td><input disabled type='text' class='form-control' name='a' value='$rows[kodeDS]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[namaDS]'>
                    <tr><th width='120px' scope='row'>Nama Data Suspectible Species</th>    <td><input type='text' class='form-control' name='b' value='$rows[namaDS]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[jenisMP]'>
                    <tr><th width='120px' scope='row'>Jenis MP</th>    <td><input type='text' class='form-control' name='a' value='$rows[jenisMP]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[ss]'>
                    <tr><th width='120px' scope='Suspectible Species</th>    <td><input type='text' class='form-control' name='b' value='$rows[ss]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/dsuspect'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
