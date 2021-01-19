<script type="text/javascript">
  function numberFormat(nr) {
    //remove the existing
    var regex = /,/g;
    nr = nr.replace(regex, '');

    //split it into 2 parts
    var x = nr.split(',');
    var p1 = x[0];
    var p2 = x.length > 1 ? ',' + x[1] : '';
    //match group of 3 numbers (0-9) and add ',' between them
    regex = /(\d+)(\d{3})/;
    while (regex.test(p1)) {
      p1 = p1.replace(regex, '$1' + ',' + '$2');
    }
    //join the 2 parts and return the formatted number
    return p1 + p2;
  }
</script>
<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h2 class='box-title'>Prediksi Keputusan Tindakan Karantina Ikan dan Produk Perikanan lainnya</h3> <br><br>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/tambahsdss', $attributes);
echo "<div class='col-md-12'> ";
?>
<table class="table" width="100%" border="0">
  <tr>
    <td width="27%">Nama Ikan</td>
    <td><input type="text" name="nama_ikan" id="nama_ikan" class="form-control" required /></td>
  </tr>
  <tr>
    <td>1. Jenis Media Pembawa</td>
    <td><select name="media_pembawa" id="media_pembawa" class="form-control" required>
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
    <td>2. Class</td>
    <td><select name="class" id="class" class="form-control" required>
        <option value="">Pilih Class</option>
        <?php
        $kelas = $this->db->query("SELECT * from class ORDER BY nama_class ASC");
        foreach ($kelas->result_array() as $ke) {
          echo " <option value=$ke[kode_class]>$ke[kode_class]</option>";
        }
        ?>
      </select></td>
  </tr>
  <tr>
    <td>3. Kelompok</td>
    <td><select name="kelompok" id="kelompok" class="form-control" required>
        <option value="">Pilih Kelompok</option>
        <?php
        $kelompok = $this->db->query("SELECT * from kelompok ORDER BY nama_kel ASC");
        foreach ($kelompok->result_array() as $k) {
          echo " <option value=$k[kode_kel]>$k[nama_kel]</option>";
        }
        ?>
      </select></td>
  </tr>
  <tr>
    <td>4. Bentuk/jenis/Pengolahan</td>
    <td><select name="bentuk_jenis" id="bentuk_jenis" class="form-control" required>
        <option value="">Pilih Bentuk/Jenis/Pengolahan</option>
        <?php
        $bentuk = $this->db->query("SELECT * from bentuk ORDER BY nama_bentuk ASC");
        foreach ($bentuk->result_array() as $be) {
          echo " <option value=$be[kode_bentuk]>$be[nama_bentuk]</option>";
        }
        ?>
      </select></td>
  </tr>
  <tr>
    <td>5. Perolehan Media Pembawa</td>
    <td><select name="perolehan_media" id="perolehan_media" class="form-control" required>
        <option value="">Pilih Perolehan Media Pembawa</option>
        <?php
        $perolehanMedia = $this->db->query("SELECT * from perolehanmedia ORDER BY nama_media ASC");
        foreach ($perolehanMedia->result_array() as $pm) {
          echo " <option value=$pm[kode_media]>$pm[nama_media]</option>";
        }
        ?>
      </select></td>
  </tr>
  <tr>
    <td>6. Tujuan penggunaan</td>
    <td><select name="tujuan_penggunaan" id="tujuan_penggunaan" class="form-control" required>
        <option value="">Pilih Tujuan Penggunaan</option>
        <?php
        $jp = $this->db->query("SELECT * from tujuanpenggunaan ORDER BY nama_JP ASC");
        foreach ($jp->result_array() as $jp) {
          echo " <option value=$jp[kode_JP]>$jp[nama_JP]</option>";
        }
        ?>
      </select></td>
  </tr>
  <tr>
    <td>7. Status Registrasi (klik <a href="<?php echo base_url(); ?>administrator/dregistrasi" target="_blank">DISINI </a>untuk mencari status registrasi ikan/ produk)</td>
    <td><select name="status_registrasi" id="status_registrasi" class="form-control" required>
      <option value="">Pilih Status Registrasi </option>
      <?php
         $bedasal = $this->db->query("select * from statusregistrasi");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSR']?>"><?=$bds['namaSR']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>8. Susceptible Species (klik <a href="<?php echo base_url(); ?>administrator/dsuspect" target="_blank">DISINI </a>untuk mencari status suspectible ikan/ produk) </td>
    <td><select name="susceptible_species" id="susceptible_species" class="form-control" required>
        <option value="">Pilih Suspectible Species</option>
        <?php
         $bedasal = $this->db->query("select * from suspectiblespecies");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSS']?>"><?=$bds['namaSS']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>9. Terjangkit (klik <a href="<?php echo base_url(); ?>administrator/dterjangkit" target="_blank">DISINI </a>untuk mencari status terjangkit ikan/ produk)</td>
    <td><select name="terjangkit" id="terjangkit" class="form-control" required>
        <option value="">Pilih Terjangkit</option>
        <?php
         $bedasal = $this->db->query("select * from terjangkit");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeTerjangkit']?>"><?=$bds['namaTerjangkit']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>10. Tingkat Kategori Resiko (klik <a href="<?php echo base_url(); ?>administrator/dresiko" target="_blank">DISINI </a>untuk mencari tingkat kategori resiko ikan/ produk)</td>
    <td><select name="kategori_resiko" id="kategori_resiko" class="form-control" required>
        <option value="">Pilih Tingkat Kategori Resiko</option>
        <?php
         $bedasal = $this->db->query("select * from tingkatresiko");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeTR']?>"><?=$bds['namaTR']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>11. Media Pembawa Diurus/Diketahui Pemilik</td>
    <td><select name="diketahui" id="diketahui" class="form-control" required>
        <option value="">Pilih Media Pembawa Diurus/Diketahui Pemilik</option> 
        <?php
         $bedasal = $this->db->query("select * from diketahuipemilik");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeDP']?>"><?=$bds['namaDP']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>12. Melalui Tempat Pemasukan Yang Ditetapkan (klik <a href="<?php echo base_url(); ?>lokasi" target="_blank">DISINI </a> untuk mengetahui lokasi pemasukan) </td>
    <td><select name="tempat_ditetapkan" id="tempat_ditetapkan" class="form-control" required>
        <option value="">Pilih Melalui Tempat Pemasukan Yang Ditetapkan</option>
        <?php
         $bedasal = $this->db->query("select * from tempatpemasukan");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeTP']?>"><?=$bds['namaTP']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>13. PPK Online (khusus untuk petugas, akses PPK Online untuk mengetahui status permohonan <a href="http://www.ppk.bkipm.kkp.go.id/" target="_blank">KLIK</a>)</td>
    <td><select name="ppk_online" id="ppk_online" class="form-control" required>
        <option value="">Pilih PPK Online</option>
        <?php
         $bedasal = $this->db->query("select * from permohonanpemasukan");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePP']?>"><?=$bds['namaPP']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>14. Status Dokumen (klik <a href="<?php echo base_url(); ?>gambar" target="_blank">DISINI</a> untuk mengakses contoh dokumen)</td>
    <td><select name="status_dokumen" id="status_dokumen" class="form-control" required>
        <option value="">Pilih Status Dokumen</option>
        <?php
         $bedasal = $this->db->query("select * from statusdokumen");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSD']?>"><?=$bds['namaSD']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>15. Kesesuaian Isi</td>
    <td><select name="kesesuaian_isi" id="kesesuaian_isi" class="form-control" required>
        <option value="">Pilih Kesesuaian Isi</option>
        <?php
         $bedasal = $this->db->query("select * from kesesuaianisi");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeKI']?>"><?=$bds['namaKI']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>16. Pengasingan</td>
    <td><select name="pengasingan" id="pengasingan" class="form-control" required>
        <option value="">Pilih Pengasingan</option>
        <?php
         $bedasal = $this->db->query("select * from pengasingan");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePengasingan']?>"><?=$bds['namaPengasingan']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>17. Status HPIK (klik <a href="<?=base_url('assets/upload/KEPMEN-KP-2018-91.pdf')?>" target="_blank">DISINI </a>untuk mencari tingkat kategori resiko ikan/ produk)</td>
    <td><select name="status_hpik" id="status_hpik" class="form-control" required>
        <option value="">Pilih Status HPIK</option>
        <?php
         $bedasal = $this->db->query("select * from statushpik");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeHPIK']?>"><?=$bds['namaHPIK']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>18. Penahanan</td>
    <td><select name="penahanan" id="penahanan" class="form-control" required>
        <option value="">Pilih Penahanan</option>
        <?php
         $bedasal = $this->db->query("select * from penahanan");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePenahanan']?>"><?=$bds['namaPenahanan']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>19. Pemenuhan Kekurangan Persyaratan</td>
    <td><select name="kekurangan" id="kekurangan" class="form-control" required>
        <option value="">Pilih Penahanan</option>
        <?php
         $bedasal = $this->db->query("select * from pemenuhansyarat");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePS']?>"><?=$bds['namaPS']?></option>     
        <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>20. Penolakan</td>
    <td><select name="penolakan" id="penolakan" class="form-control" required>
        <option value="">Pilih Penolakan</option>
        <?php
         $bedasal = $this->db->query("select * from penolakan");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePenolakan']?>"><?=$bds['namaPenolakan']?></option>     
        <?php } ?> 
      </select></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php echo "  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>SUBMIT/ PREDIKSI</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/sdss'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
