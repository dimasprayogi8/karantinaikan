<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
 
<div align="center">
    <font size="+2"><strong>Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya </strong></font> 
    Update Data: Hari <?=hari_ini();?> , Tanggal <?=tgl_indoo(date('Y-m-d'))?> , Jam <?=date('H:i:s');?> WIB
    <hr>
    
  <table width="100%"border="1" style="border-collapse: collapse;">
    <tr>
      <th align="center" bgcolor="#00CC00">Nama No</th>
    <th align="center" bgcolor="#00CC00">Nama Ikan</th>
                      <th align="center" bgcolor="#00CC00">Media Pembawa</th>
                      <th align="center" bgcolor="#00CC00">Class</th>
                      <th align="center" bgcolor="#00CC00">Kelompok</th>
                      <th align="center" bgcolor="#00CC00">Bentuk</th>
                      <th align="center" bgcolor="#00CC00">Perolehan Media Pmebawa</th>
                      <th align="center" bgcolor="#00CC00">Tujan Penggunaan</th>
                      <th align="center" bgcolor="#00CC00">Status Registrasi</th>
                      <th align="center" bgcolor="#00CC00">Susceptible Species</th>
                      <th align="center" bgcolor="#00CC00">Terjangkit</th>
                      <th align="center" bgcolor="#00CC00">Tingkat Kategori Resiko</th>
                      <th align="center" bgcolor="#00CC00">Diurus/diketahui pemilik</th>
                      <th align="center" bgcolor="#00CC00">Melalui tempat pemasukan yang ditetapkan</th>
                      <th align="center" bgcolor="#00CC00">Mengajukan Permohonan Pemasukan</th>
                      <th align="center" bgcolor="#00CC00">Status Dokumen</th>
                      <th align="center" bgcolor="#00CC00">Kesesuaian Isi</th>
                      <th align="center" bgcolor="#00CC00">Pengasingan di instalasi karantina ikan</th>
                      <th align="center" bgcolor="#00CC00">Status HPIK</th>
                      <th align="center" bgcolor="#00CC00">Penahanan</th>
                      <th align="center" bgcolor="#00CC00">Pemenuhan Kekurangan Persyaratan</th>
                      <th align="center" bgcolor="#00CC00">Penolakan</th>
                      <th align="center" bgcolor="#00CC00">Tindakan Akhir</th>
  </tr>
  <?php
  $no = 0;  
  foreach ($record->result_array() as $row){
    $dt = $this->db->query("select * from karantinaikan");
    $no++;
    $d = $dt->row_array();

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
                        $ki = $row15[namaKI];
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

  ?>
  <tr>
    <?php
    ?>
    <td align="center" bgcolor="#D5FFBF"><?=$no?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$row['nama_ikan']?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$jenisMP?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$class?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$kelompok?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$bentuk?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$perolehanmedia?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$tujuanPenggunaan?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$statusRegistrasi?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$suspectibleSpecies?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$tingkatResiko?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$diketahuiPemilik?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$tempatPemasukan?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$permohonanPemasukan?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$statusDokumen?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$kesesuaianIsi?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$pengasingan?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$statusHPIK?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$penahanan?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$pemenuhanSyarat?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$penolakan?></td>
    <td align="left" bgcolor="#D5FFBF"><?=$tindakanAkhir?></td>

  </tr> <?php } ?>
</table>
  
</div>
</body>
</html>
<?php

$filename="Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 include "asset/html2pdf/html2pdf.class.php" ;
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(3, 0, 2, 0));
  $html2pdf->setTestTdInOnePage(false);
  $html2pdf->setDefaultFont('Times');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>      