<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Kategori Berita</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edittujuan',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[kode_tujuan]'>
                    <tr><th width='20%' scope='row'>Nama Kota Tujuan Mudik</th>    <td><input type='text' class='form-control' name='a' value='$rows[nama_tujuan]' required></td></tr>
                    <tr><th>Propinsi Asal Mudik</th>    <td><select name='b' class='form-control' required>
					<option value='$rows[kode_prop]'>$rows[kode_prop]</option>
					<option value=''>--Pilih Propinsi--</option>";
					$beda = $this->db->query("SELECT * from propinsi where kode_prop != '$rows[kode_prop]' ");
					 foreach ($beda->result_array() as $prov){
						 echo "<option value='$prov[kode_prop]'>$prov[kode_prop]</option>";                    }
	echo"			
					</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/kategoriberita'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";