          <div class="col-xs-23">
            <div class="box">
              <div class="box-header">
                <h2 align="center">Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya</h2>
                <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambahsdss'>Tambahkan Data</a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="tabel-data" class="table table-striped table-bordered" cellspacing="0" width="150%">
                  <thead>
                    <tr>
                      <th style='width:20px'>No</th>
                      <th style='width:40px'>Action</th>
                      <th>Nama Ikan</th>
                      <th>Media Pembawa</th>
                      <th>Class</th>
                      <th>Kelompok</th>
                      <th>Bentuk</th>
                      <th>Perolehan Media Pmebawa</th>
                      <th>Tujan Penggunaan</th>
                      <th>Status Registrasi</th>
                      <th>Susceptible Species</th>
                      <th>Terjangkit</th>
                      <th>Tingkat Kategori Resiko</th>
                      <th>Diurus/diketahui pemilik</th>
                      <th>Melalui tempat pemasukan yang ditetapkan</th>
                      <th>Mengajukan Permohonan Pemasukan</th>
                      <th>Status Dokumen</th>
                      <th>Kesesuaian Isi</th>
                      <th>Pengasingan di instalasi karantina ikan</th>
                      <th>Status HPIK</th>
                      <th>Penahanan</th>
                      <th>Pemenuhan Kekurangan Persyaratan</th>
                      <th>Penolakan</th>
                      <th>Tindakan Akhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $dt = $this->db->query("select * from karantinaikan");
                    foreach ($dt->result_array() as $row) {
                      //$dt = $this->db->query("select * from karantinaikan");
                      //get data from other table
                      $idKarantina = $row[idKarantina];

                      $jen = $this->db->query("select * from jenis where kode_jenis = '$row[jenisMP]'");
                      foreach($jen->result_array() as $row1)
                      {
                        $jenisMP = $row1[nama_jenis];
                      }

                      $clas = $this->db->query("select * from class where kode_class = '$row[class]'");
                      foreach($clas->result_array() as $row2)
                      {
                        $class = $row2[nama_class];
                      }

                      $kel = $this->db->query("select * from kelompok where kode_kel = '$row[kelompok]'");
                      foreach($kel->result_array() as $row3)
                      {
                        $kelompok = $row3[nama_kel];
                      }

                      $ben = $this->db->query("select * from bentuk where kode_bentuk = '$row[bentuk]'");
                      foreach($ben->result_array() as $row4)
                      {
                        $bentuk = $row4[nama_bentuk];
                      }

                      $pm = $this->db->query("select * from perolehanmedia where kode_media = '$row[perolehanmedia]'");
                      foreach($pm->result_array() as $row5)
                      {
                        $perolehanmedia = $row5[nama_media];
                      }

                      $tp = $this->db->query("select * from tujuanpenggunaan where kode_JP = '$row[tujuanPenggunaan]'");
                      foreach($tp->result_array() as $row6)
                      {
                        $tujuanPenggunaan = $row6[nama_JP];
                      }

                      $sr = $this->db->query("select * from statusregistrasi where kodeSR = '$row[statusRegistrasi]'");
                      foreach($sr->result_array() as $row7)
                      {
                        $statusRegistrasi = $row7[namaSR];
                      }

                      $ss = $this->db->query("select * from suspectiblespecies where kodeSS = '$row[suspctibleSpecies]'");
                      foreach($ss->result_array() as $row8)
                      {
                        $suspectibleSpecies = $row8[namaSS];
                      }

                      $tj = $this->db->query("select * from terjangkit where kodeTerjangkit = '$row[terjangkit]'");
                      foreach($tj->result_array() as $row9)
                      {
                        $terjangkit = $row9[namaTerjangkit];
                      }

                      $tr = $this->db->query("select * from tingkatresiko where kodeTR = '$row[tingkatResiko]'");
                      foreach($tr->result_array() as $row10)
                      {
                        $tingkatResiko = $row10[namaTR];
                      }

                      $dp = $this->db->query("select * from diketahuipemilik where kodeDP = '$row[diketahuiPemilik]'");
                      foreach($dp->result_array() as $row11)
                      {
                        $diketahuiPemilik = $row11[namaDP];
                      }

                      $tpm = $this->db->query("select * from tempatpemasukan where kodeTP = '$row[tempatPemasukan]'");
                      foreach($tpm->result_array() as $row12)
                      {
                        $tempatPemasukan = $row12[namaTP];
                      }

                      $pp = $this->db->query("select * from permohonanpemasukan where kodePP = '$row[permohonanPemasukan]'");
                      foreach($pp->result_array() as $row13)
                      {
                        $permohonanPemasukan = $row13[namaPP];
                      }

                      $sd = $this->db->query("select * from statusdokumen where kodeSD = '$row[statusDokumen]'");
                      foreach($sd->result_array() as $row14)
                      {
                        $statusDokumen = $row14[namaSD];
                      }

                      $ki = $this->db->query("select * from kesesuaianisi where kodeKI = '$row[kesesuaianIsi]'");
                      foreach($ki->result_array() as $row15)
                      {
                        $kesesuaianIsi = $row15[namaKI];
                      }

                      $pga = $this->db->query("select * from pengasingan where kodePengasingan = '$row[pengasingan]'");
                      foreach($pga->result_array() as $row16)
                      {
                        $pengasingan = $row16[namaPengasingan];
                      }

                      $hpik = $this->db->query("select * from statushpik where kodeHPIK = '$row[statusHPIK]'");
                      foreach($hpik->result_array() as $row17)
                      {
                        $statusHPIK = $row17[namaHPIK];
                      }

                      $pnh = $this->db->query("select * from penahanan where kodePenahanan = '$row[penahanan]'");
                      foreach($pnh->result_array() as $row18)
                      {
                        $penahanan = $row18[namaPenahanan];
                      }

                      $psy = $this->db->query("select * from pemenuhansyarat where kodePS = '$row[pemenuhanSyarat]'");
                      foreach($psy->result_array() as $row19)
                      {
                        $pemenuhanSyarat = $row19[namaPS];
                      }

                      $pnl = $this->db->query("select * from penolakan where kodePenolakan = '$row[penolakan]'");
                      foreach($pnl->result_array() as $row20)
                      {
                        $penolakan = $row20[namaPenolakan];
                      }

                      $ta = $this->db->query("select * from tindakanakhir where kodeTA = '$row[tindakanAkhir]'");
                      foreach($ta->result_array() as $row21)
                      {
                        $tindakanAkhir = $row21[namaTA];
                      }


                      $d = $dt->row_array();
                      echo "<tr>
                              <td>$no</td>
                              <td><center>
                                <a class='btn btn-info btn-xs' title='View Data' href='" . base_url() . "administrator/view_sdss/$row[idKarantina]'><span class='glyphicon glyphicon'>View</span></a>
                                <a class='btn btn-warning btn-xs' title='Excel' href='" . base_url() . "administrator/exportExcel/$row[idKarantina]'><span class='glyphicon glyphicon'>Download</span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_sdss/$row[idKarantina]'><span class='glyphicon glyphicon'>Edit</span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/deletesdss/$row[idKarantina]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon'>Hapus</span></a>
                              </center></td>
                              <td>$row[nama_ikan]</td>
                              <td>$jenisMP</td>
                              <td>$class</td>
              							  <td>$kelompok</td>
              							  <td>$bentuk</td>
              							  <td>$perolehanmedia</td>
              							  <td>$tujuanPenggunaan</td>
              							  <td>$statusRegistrasi</td>
              							  <td>$suspectibleSpecies</td>
                              <td>$terjangkit</td>
                              <td>$tingkatResiko</td>
                              <td>$diketahuiPemilik</td>
                              <td>$tempatPemasukan</td>
                              <td>$permohonanPemasukan</td>
                              <td>$statusDokumen</td>
                              <td>$kesesuaianIsi</td>
                              <td>$pengasingan</td>
                              <td>$statusHPIK</td>
                              <td>$penahanan</td>
                              <td>$pemenuhanSyarat</td>
                              <td>$penolakan</td>
                              <td>$tindakanAkhir</td>  
                          </tr>";
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>