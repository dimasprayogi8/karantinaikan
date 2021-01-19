<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Terjangkit</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/edit_Terjangkit', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kodeTerjangkit]'>
                    <tr><th width='120px' scope='row'>Kode Terjangkit</th>    <td><input type='text' class='form-control' name='a' value='$rows[kodeTerjangkit]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[namaTerjangkit]'>
                    <tr><th width='120px' scope='row'>Nama Terjangkit</th>    <td><input type='text' class='form-control' name='b' value='$rows[namaTerjangkit]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/terjangkit'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
