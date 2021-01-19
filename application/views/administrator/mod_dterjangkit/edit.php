<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Terjangkit</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/edit_dterjangkit', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kodeDT]'>
                    <tr><th width='120px' scope='row'>Kode Data Terjangkit</th>    <td><input disabled type='text' class='form-control' name='a' value='$rows[kodeDT]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[namaDT]'>
                    <tr><th width='120px' scope='row'>Nama Data terjangkit</th>    <td><input type='text' class='form-control' name='b' value='$rows[namaDT]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[jenisMP]'>
                    <tr><th width='120px' scope='row'>Jenis MP</th>    <td><input type='text' class='form-control' name='a' value='$rows[jenisMP]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[st]'>
                    <tr><th width='120px' scope>Terjangkit</th>    <td><input type='text' class='form-control' name='b' value='$rows[st]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/dterjangkit'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
