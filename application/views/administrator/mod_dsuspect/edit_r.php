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
              echo form_open_multipart('administrator/edit_dsuspect',$attributes); 
          echo "<div class='col-md-12'> ";
      ?>
    <table class="table" width="100%" border="0">
                    <tr>
                      <td width="27%">Nama Data</td>
                      <td><input type="text" name="b" id="namaDS" value="<?=$rows['namaDS']?>" class="form-control" required />
                      <input type="hidden" name="a" id="kodeDS" value="<?=$rows['kodeDS']?>" class="form-control" required /></td>
                    </tr>
                    <tr>
    <td>Jenis Media Pembawa</td>
    <td><select name="c" id="media_pembawa" class="form-control" required>
     
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
                        <td>Suspectible Species</td>
                        <td><select name="d" id="Suspectible_species" class="form-control" required>
                            <?php
                                $dt = $this->db->query("select * from suspectiblespecies where kodeSS ='$rows[ss]'");
                            $d = $dt->row_array();
                                ?>
                                            <option value="<?=$d['kodeSS']?>"><?=$d['namaSS']?></option>
                                       <?php
                             $bedasal = $this->db->query("select * from suspectiblespecies where kodeSS != '$rows[ss]'");
                            foreach($bedasal->result_array() as $bds){
                              ?>
                               <option value="<?=$bds['kodeSS']?>"><?=$bds['namaSS']?></option>     
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
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/edit_dregistrasi'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
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
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
    }
  </script>