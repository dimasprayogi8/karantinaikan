<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Penahanan</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/edit_penahanan', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kodePenahanan]'>
                    <tr><th width='120px' scope='row'>Kode Penahanan</th>    <td><input disabled type='text' class='form-control' name='a' value='$rows[kodePenahanan]' required></td></tr>
                    <input type='hidden' name='id' value='$rows[namaPenahanan]'>
                    <tr><th width='120px' scope='row'>Nama Penahanan</th>    <td><input type='text' class='form-control' name='b' value='$rows[namaPenahanan]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/penahanan'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
