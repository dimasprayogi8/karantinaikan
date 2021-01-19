<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Registrasi</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/tambah_dregistrasi', $attributes);
echo "<div class='col-md-12'> ";
?>
<table class='table table-condensed table-bordered'>
    <tbody>
        <input type='hidden' name='id' value=''>
        <!-- <tr>
            <th width='120px' scope='row'>Kode Data Registrasi</th>
            <td><input type='text' class='form-control' name='a' required></td>
        </tr> -->
        <tr>
            <th width='120px' scope='row'>Nama Registrasi</th>
            <td><input type='text' class='form-control' name='b' required></td>
        </tr>
        <tr>
            <th width='120px' scope='row'>Jenis MP</th>
            <td><select name="c" id="media_pembawa" class="form-control" required>
        <option value="">Pilih Media</option>
        <?php
        $jeniss = $this->db->query("SELECT * from jenis ORDER BY nama_jenis ASC");
        foreach ($jeniss->result_array() as $j) {
          echo " <option value=$j[kode_jenis]>$j[nama_jenis]</option>";
        }
        ?>
      </select></td>
        </tr>
        <tr>
            <th width='120px' scope='row'>Status Registrasi</th>
            <td><select name="d" id="status_registrasi" class="form-control" required>
      <option value="">Pilih Status Registrasi </option>
      <?php
         $bedasal = $this->db->query("select * from statusregistrasi");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSR']?>"><?=$bds['namaSR']?></option>     
        <?php } ?> 
      </select></td>
        </tr>
    </tbody>
</table>

<?php echo "  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/registrasi'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
