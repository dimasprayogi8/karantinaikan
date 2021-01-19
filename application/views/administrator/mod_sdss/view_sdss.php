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
  echo $row[idKarantina];
?>    
<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h2 class='box-title'>Data Karantina Ikan</h2> <br><br>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form' , 'autocomplete' =>'off');
              echo form_open_multipart('administrator/view_sdss',$attributes); 
      echo "<div class='col-md-12'> ";

      ?>

      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/exportExcel/<?php echo $rows[idKarantina]?>'>Download EXCEL</a>

      <?php
      $idKarantina = $rows[idKarantina];

                      $jen = $this->db->query("select * from jenis where kode_jenis = '$rows[jenisMP]'");
                      foreach($jen->result_array() as $row1)
                      {
                        $jenisMP = $row1[nama_jenis];
                      }

                      $clas = $this->db->query("select * from class where kode_class = '$rows[class]'");
                      foreach($clas->result_array() as $row2)
                      {
                        $class = $row2[nama_class];
                      }

                      $kel = $this->db->query("select * from kelompok where kode_kel = '$rows[kelompok]'");
                      foreach($kel->result_array() as $row3)
                      {
                        $kelompok = $row3[nama_kel];
                      }

                      $ben = $this->db->query("select * from bentuk where kode_bentuk = '$rows[bentuk]'");
                      foreach($ben->result_array() as $row4)
                      {
                        $bentuk = $row4[nama_bentuk];
                      }

                      $pm = $this->db->query("select * from perolehanmedia where kode_media = '$rows[perolehanmedia]'");
                      foreach($pm->result_array() as $row5)
                      {
                        $perolehanmedia = $row5[nama_media];
                      }

                      $tp = $this->db->query("select * from tujuanpenggunaan where kode_JP = '$rows[tujuanPenggunaan]'");
                      foreach($tp->result_array() as $row6)
                      {
                        $tujuanPenggunaan = $row6[nama_JP];
                      }

                      $sr = $this->db->query("select * from statusregistrasi where kodeSR = '$rows[statusRegistrasi]'");
                      foreach($sr->result_array() as $row7)
                      {
                        $statusRegistrasi = $row7[namaSR];
                      }

                      $ss = $this->db->query("select * from suspectiblespecies where kodeSS = '$rows[suspctibleSpecies]'");
                      foreach($ss->result_array() as $row8)
                      {
                        $suspectibleSpecies = $row8[namaSS];
                      }

                      $tj = $this->db->query("select * from terjangkit where kodeTerjangkit = '$rows[terjangkit]'");
                      foreach($tj->result_array() as $row9)
                      {
                        $terjangkit = $row9[namaTerjangkit];
                      }

                      $tr = $this->db->query("select * from tingkatresiko where kodeTR = '$rows[tingkatResiko]'");
                      foreach($tr->result_array() as $row10)
                      {
                        $tingkatResiko = $row10[namaTR];
                      }

                      $dp = $this->db->query("select * from diketahuipemilik where kodeDP = '$rows[diketahuiPemilik]'");
                      foreach($dp->result_array() as $row11)
                      {
                        $diketahuiPemilik = $row11[namaDP];
                      }

                      $tpm = $this->db->query("select * from tempatpemasukan where kodeTP = '$rows[tempatPemasukan]'");
                      foreach($tpm->result_array() as $row12)
                      {
                        $tempatPemasukan = $row12[namaTP];
                      }

                      $pp = $this->db->query("select * from permohonanpemasukan where kodePP = '$rows[permohonanPemasukan]'");
                      foreach($pp->result_array() as $row13)
                      {
                        $permohonanPemasukan = $row13[namaPP];
                      }

                      $sd = $this->db->query("select * from statusdokumen where kodeSD = '$rows[statusDokumen]'");
                      foreach($sd->result_array() as $row14)
                      {
                        $statusDokumen = $row14[namaSD];
                      }

                      $ki = $this->db->query("select * from kesesuaianisi where kodeKI = '$rows[kesesuaianIsi]'");
                      foreach($ki->result_array() as $row15)
                      {
                        $kesesuaianIsi = $row15[namaKI];
                      }

                      $pga = $this->db->query("select * from pengasingan where kodePengasingan = '$rows[pengasingan]'");
                      foreach($pga->result_array() as $row16)
                      {
                        $pengasingan = $row16[namaPengasingan];
                      }

                      $hpik = $this->db->query("select * from statushpik where kodeHPIK = '$rows[statusHPIK]'");
                      foreach($hpik->result_array() as $row17)
                      {
                        $statusHPIK = $row17[namaHPIK];
                      }

                      $pnh = $this->db->query("select * from penahanan where kodePenahanan = '$rows[penahanan]'");
                      foreach($pnh->result_array() as $row18)
                      {
                        $penahanan = $row18[namaPenahanan];
                      }

                      $psy = $this->db->query("select * from pemenuhansyarat where kodePS = '$rows[pemenuhanSyarat]'");
                      foreach($psy->result_array() as $row19)
                      {
                        $pemenuhanSyarat = $row19[namaPS];
                      }

                      $pnl = $this->db->query("select * from penolakan where kodePenolakan = '$rows[penolakan]'");
                      foreach($pnl->result_array() as $row20)
                      {
                        $penolakan = $row20[namaPenolakan];
                      }

                      $ta = $this->db->query("select * from tindakanakhir where kodeTA = '$rows[tindakanAkhir]'");
                      foreach($ta->result_array() as $row21)
                      {
                        $tindakanAkhir = $row21[namaTA];
                      }
      ?>
                    <table class="table" width="100%" border="0">
                    <tr>
                      <th>Nama Ikan</th>
                      <td><?=$rows['nama_ikan']?>
                      <input type="hidden" name="idKarantina" id="idKarantina" value="<?=$rows['idKarantina']?>" class="form-control" required /></td>
                    </tr>
                    <tr>
                      <th>Jenis Media Pembawa</th>
                      <td><?=$jenisMP?></td>
                    </tr>
                   <tr>
                      <th>Class</th>
                      <td><?=$class?></td>
                    </tr>
                    <tr>
                      <th>Kelompok</th>
                      <td><?=$kelompok?></td>
                    </tr>
                    <tr>
                      <th>Bentuk</th>
                      <td><?=$bentuk?></td>
                    </tr>
                    <tr>
                      <th>Perolehan Media Pmebawa</th>
                      <td><?=$perolehanmedia?></td>
                    </tr>
                    <tr>
                      <th>Tujan Penggunaan</th>
                      <td><?=$tujuanPenggunaan?></td>
                      </tr>>
                    <tr>
                      <th>Status Registrasi</th>
                      <td><?=$statusRegistrasi?></td>
                    </tr>
                    <tr>
                      <th>Susceptible Species</th>
                      <td><?=$suspectibleSpecies?></td>
                    </tr>
                    <tr>
                      <th>Terjangkit</th>
                      <td><?=$terjangkit?></td>
                    </tr>
                    <tr>
                      <th>Tingkat Kategori Resiko</th>
                      <td><?=$tingkatResiko?></td>
                    </tr>
                    <tr>
                      <th>Diurus/diketahui pemilik</th>
                      <td><?=$diketahuiPemilik?></td>
                    </tr>
                    <tr>
                      <th>Melalui tempat pemasukan yang ditetapkan</th>
                      <td><?=$tempatPemasukan?></td>
                    </tr>
                    <tr>
                      <th>Mengajukan Permohonan Pemasukan</th>
                      <td><?=$permohonanPemasukan?></td>
                    </tr>
                    <tr>
                      <th>Status Dokumen</th>
                      <td><?=$statusDokumen?></td>
                    </tr>
                    <tr>
                      <th>Kesesuaian Isi</th>
                      <td><?=$kesesuaianIsi?></td>
                    </tr>
                    <tr>
                      <th>Pengasingan di instalasi karantina ikan</th>
                      <td><?=$pengasingan?></td>
                    </tr>
                    <tr>
                      <th>Status HPIK</th>
                      <td><?=$statusHPIK?></td>
                    </tr>
                    <tr>
                      <th>Penahanan</th>
                      <td><?=$penahanan?></td>
                    </tr>
                    <tr>
                      <th>Pemenuhan Kekurangan Persyaratan</th>
                      <td><?=$pemenuhanSyarat?></td>
                    </tr>
                    <tr>
                      <th>Penolakan</th>
                      <td><?=$penolakan?></td>
                    </tr>
                    <tr>
                      <th>Tindakan Akhir</th>
                      <td><?=$tindakanAkhir?></td>
                    </tr>
                  </table>

                </div>
              </div>
            </div>
          </div>