<script type="text/javascript">
        function numberFormat(nr)
        {
            //remove the existing
            var regex = /,/g;
            nr        = nr.replace(regex,'');

            //split it into 2 parts
            var x   = nr.split(',');
            var p1  = x[0];
            var p2  = x.length > 1 ? ',' + x[1] : '';
            //match group of 3 numbers (0-9) and add ',' between them
            regex   = /(\d+)(\d{3})/;
            while(regex.test(p1))
            {
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
                  <h2 class='box-title'>Edit Data Karantina Ikan</h3> <br><br>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form' , 'autocomplete' =>'off');
              echo form_open_multipart('administrator/edit_sdss',$attributes); 
          echo "<div class='col-md-12'> ";
		  ?>
<table class="table" width="100%" border="0">
                    <tr>
                      <td width="27%">Nama Ikan</td>
                      <td><input type="text" name="nama_ikan" id="nama_ikan" value="<?=$rows['nama_ikan']?>" class="form-control" required />
                      <input type="hidden" name="idKarantina" id="idKarantina" value="<?=$rows['idKarantina']?>" class="form-control" required /></td>
                    </tr>
                    <tr>
    <td>1. Jenis Media Pembawa</td>
    <td><select name="media_pembawa" id="media_pembawa" class="form-control" required>
     
        <?php
            $dt = $this->db->query("select * from jenis where kode_jenis ='$rows[jenisMP]'");
            $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kode_jenis']?>"><?=$d['nama_jenis']?></option>
                   <?php
         $bedasal = $this->db->query("select * from jenis where kode_jenis != '$rows[jenisMP]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kode_jenis']?>"><?=$bds['nama_jenis']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>2. Class</td>
    <td><select name="class" id="class" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from class where nama_class ='$rows[class]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['nama_class']?>"><?=$d['kode_class']?></option>
                   <?php
         $bedasal = $this->db->query("select * from class where nama_class != '$rows[class]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['nama_class']?>"><?=$bds['kode_class']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>3. Kelompok</td>
    <td><select name="kelompok" id="kelompok" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from kelompok where kode_kel ='$rows[kelompok]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kode_kel']?>"><?=$d['nama_kel']?></option>
                   <?php
         $bedasal = $this->db->query("select * from kelompok where kode_kel != '$rows[kelompok]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kode_kel']?>"><?=$bds['nama_kel']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>4. Bentuk/jenis/Pengolahan</td>
    <td><select name="bentuk_jenis" id="bentuk_jenis" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from bentuk where kode_bentuk ='$rows[bentuk]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kode_bentuk']?>"><?=$d['nama_bentuk']?></option>
                   <?php
         $bedasal = $this->db->query("select * from bentuk where kode_bentuk != '$rows[bentuk]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kode_bentuk']?>"><?=$bds['nama_bentuk']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>5. Perolehan Media Pembawa</td>
    <td><select name="perolehan_media" id="perolehan_media" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from perolehanmedia where kode_media ='$rows[perolehanmedia]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kode_media']?>"><?=$d['nama_media']?></option>
                   <?php
         $bedasal = $this->db->query("select * from perolehanmedia where kode_media != '$rows[perolehanMedia]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kode_media']?>"><?=$bds['nama_media']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>6. Tujuan penggunaan</td>
    <td><select name="tujuan_penggunaan" id="tujuan_penggunaan" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from tujuanpenggunaan where kode_JP ='$rows[tujuanPenggunaan]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kode_JP']?>"><?=$d['nama_JP']?></option>
                   <?php
         $bedasal = $this->db->query("select * from tujuanpenggunaan where kode_JP != '$rows[tujuanPenggunaan]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kode_JP']?>"><?=$bds['nama_JP']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>7. Status registrasi</td>
    <td><select name="status_registrasi" id="status_registrasi" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from statusregistrasi where kodeSR ='$rows[statusRegistrasi]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeSR']?>"><?=$d['namaSR']?></option>
                   <?php
         $bedasal = $this->db->query("select * from statusregistrasi where kodeSR != '$rows[statusRegistrasi]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSR']?>"><?=$bds['namaSR']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>8. Susceptible Species</td>
    <td><select name="susceptible_species" id="susceptible_species" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from suspectiblespecies where kodeSS ='$rows[suspctibleSpecies]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeSS']?>"><?=$d['namaSS']?></option>
                   <?php
         $bedasal = $this->db->query("select * from suspectiblespecies where kodeSS != '$rows[suspctibleSpecies]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSS']?>"><?=$bds['namaSS']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>9. Terjangkit</td>
    <td><select name="terjangkit" id="terjangkit" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from terjangkit where kodeTerjangkit ='$rows[terjangkit]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeTerjangkit']?>"><?=$d['namaTerjangkit']?></option>
                   <?php
         $bedasal = $this->db->query("select * from terjangkit where kodeTerjangkit != '$rows[terjangkit]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeTerjangkit']?>"><?=$bds['namaTerjangkit']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>10. Tingkat Kategori Resiko</td>
    <td><select name="kategori_resiko" id="kategori_resiko" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from tingkatresiko where kodeTR ='$rows[tingkatResiko]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeTR']?>"><?=$d['namaTR']?></option>
                   <?php
         $bedasal = $this->db->query("select * from tingkatresiko where kodeTR != '$rows[tingkatResiko]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeTR']?>"><?=$bds['namaTR']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>11. Media Pembawa Diurus/Diketahui Pemilik</td>
    <td><select name="diketahui" id="diketahui" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from diketahuipemilik where kodeDP ='$rows[diketahuiPemilik]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeDP']?>"><?=$d['namaDP']?></option>
                   <?php
         $bedasal = $this->db->query("select * from diketahuipemilik where kodeDP != '$rows[diketahuiPemilik]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeDP']?>"><?=$bds['namaDP']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>12. Melalui Tempat Pemasukan Yang Ditetapkan</td>
    <td><select name="tempat_ditetapkan" id="tempat_ditetapkan" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from tempatpemasukan where kodeTP ='$rows[tempatPemasukan]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeTP']?>"><?=$d['namaTP']?></option>
                   <?php
         $bedasal = $this->db->query("select * from tempatpemasukan where kodeTP != '$rows[tempatPemasukan]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeTP']?>"><?=$bds['namaTP']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>13. PPK Online</td>
    <td><select name="ppk_online" id="ppk_online" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from permohonanpemasukan where kodePP ='$rows[permohonanPemasukan]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodePP']?>"><?=$d['namaPP']?></option>
                   <?php
         $bedasal = $this->db->query("select * from permohonanpemasukan where kodePP != '$rows[permohonanPemasukan]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePP']?>"><?=$bds['namaPP']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>14. Status Dokumen</td>
    <td><select name="status_dokumen" id="status_dokumen" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from statusdokumen where kodeSD ='$rows[statusDokumen]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeSD']?>"><?=$d['namaSD']?></option>
                   <?php
         $bedasal = $this->db->query("select * from statusdokumen where kodeSD != '$rows[statusDokumen]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeSD']?>"><?=$bds['namaSD']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>15. Kesesuaian Isi</td>
    <td><select name="kesesuaian_isi" id="kesesuaian_isi" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from kesesuaianisi where kodeKI ='$rows[kesesuaianIsi]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeKI']?>"><?=$d['namaKI']?></option>
                   <?php
         $bedasal = $this->db->query("select * from kesesuaianisi where kodeKI != '$rows[kesesuaianIsi]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeKI']?>"><?=$bds['namaKI']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>16. Pengasingan</td>
    <td><select name="pengasingan" id="pengasingan" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from pengasingan where kodePengasingan ='$rows[pengasingan]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodePengasingan']?>"><?=$d['namaPengasingan']?></option>
                   <?php
         $bedasal = $this->db->query("select * from pengasingan where kodePengasingan != '$rows[pengasingan]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePengasingan']?>"><?=$bds['namaPengasingan']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>17. Status HPIK</td>
    <td><select name="status_hpik" id="status_hpik" class="form-control" required>
        <<?php
            $dt = $this->db->query("select * from statushpik where kodeHPIK ='$rows[statusHPIK]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodeHPIK']?>"><?=$d['namaHPIK']?></option>
                   <?php
         $bedasal = $this->db->query("select * from statushpik where kodeHPIK != '$rows[statusHPIK]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodeHPIK']?>"><?=$bds['namaHPIK']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>18. Penahanan</td>
    <td><select name="penahanan" id="penahanan" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from penahanan where kodePenahanan ='$rows[penahanan]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodePenahanan']?>"><?=$d['namaPenahanan']?></option>
                   <?php
         $bedasal = $this->db->query("select * from penahanan where kodePenahanan != '$rows[penahanan]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePenahanan']?>"><?=$bds['namaPenahanan']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>19. Pemenuhan Kekurangan Persyaratan</td>
    <td><select name="kekurangan" id="kekurangan" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from pemenuhansyarat where kodePS ='$rows[pemenuhanSyarat]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodePS']?>"><?=$d['namaPS']?></option>
                   <?php
         $bedasal = $this->db->query("select * from pemenuhansyarat where kodePS != '$rows[pemenuhanSyarat]'");
        foreach($bedasal->result_array() as $bds){
          ?>
           <option value="<?=$bds['kodePS']?>"><?=$bds['namaPS']?></option>     
           <?php } ?> 
      </select></td>
  </tr>
  <tr>
    <td>20. Penolakan</td>
    <td><select name="penolakan" id="penolakan" class="form-control" required>
        <?php
            $dt = $this->db->query("select * from penolakan where kodePenolakan ='$rows[penolakan]'");
        $d = $dt->row_array();
            ?>
                        <option value="<?=$d['kodePenolakan']?>"><?=$d['namaPenolakan']?></option>
                   <?php
         $bedasal = $this->db->query("select * from penolakan where kodePenolakan != '$rows[penolakan]'");
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
<?php echo"  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url().$this->uri->segment(1)."/sdss'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
?>
<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
		}
	</script>