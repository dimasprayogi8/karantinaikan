<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Kota / Daerah Tujuan Mudik</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambahtujuan',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='20%' scope='row'>Nama Kota Tujuan Mudik</th>    <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th>Propinsi Tujuan Mudik</th>    <td><select name='b' required class='form-control'>
					<option value=''>Pilih Propinsi</option>";
					 foreach ($prop->result_array() as $prov){
						 echo "<option value='$prov[kode_prop]'>$prov[kode_prop]</option>";                    }
	echo"			
					</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='".base_url().$this->uri->segment(1)."/kategoriberita'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
