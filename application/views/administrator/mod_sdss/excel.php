<!DOCTYPE html>
<html>
<head>
	<title>Export Data Nelayan Jateng Ke Excel</title>
</head>
<body>
	<?php
	//header("Content-type: application/vnd-ms-excel");
	//header("Content-Disposition: attachment; filename=LaporanMudik.xlsx");
	 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=LaporanMudik.xlsx"); // Set nama file excel nya
    header('Cache-Control: max-age=0');
   //$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');

	
	$jum_otg = $otg->num_rows();
	$jum_odg = $odg->num_rows();
		$J1 = $jum_otg + $jum_odg;
	$jum_odp = $odp->num_rows();
	$jum_osp = $osp->num_rows();
		$j2 = $jum_odp + $jum_osp;
	?>
 
<center>
    <font size="+2">LAPORAN DATA PEMUDIK <br>
    DALAM ANTISIPASI PENULARAN COVID19 
  </font> <hr>
<table width="80%" border="1"  style="border-collapse:collapse; font-weight: bold;">
  <tr>
    <td height="30" colspan="5" align="center" bgcolor="#FF0000"><strong><font size="+1">Update Data: Hari <?=hari_ini();?> , Tanggal <?=tgl_indoo(date('Y-m-d'))?> , Jam <?=date('H:i:s');?> WIB</font></strong></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#FFFF00"><strong>KETERANGAN KELUHAN</strong></td>
    <td rowspan="4">&nbsp;</td>
    <td colspan="2" align="center" bgcolor="#FFFF00">KETERANGAN PANTAUAN</td>
  </tr>
  <tr>
    <td width="20%" align="center" bgcolor="#FFFF00">OTG</td>
    <td width="20%" bgcolor="#FFFF00">: <?=$jum_otg?> Orang</td>
    <td width="20%" align="center" bgcolor="#FFFF00">ODP</td>
    <td width="20%" bgcolor="#FFFF00">: <?php echo $jum_odp?> Orang</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFF00">ODG</td>
    <td bgcolor="#FFFF00">: <?=$jum_odg?> Orang</td>
    <td align="center" bgcolor="#FFFF00">OSP</td>
    <td bgcolor="#FFFF00">: <?=$jum_osp?> Orang</td>
  </tr>
  <tr>
    <td bgcolor="#FFFF00">Total jumlah</td>
    <td bgcolor="#FFFF00">: <?php echo $jum_otg+$jum_odg; ?> Orang</td>
    <td bgcolor="#FFFF00">Total Jumlah</td>
    <td bgcolor="#FFFF00">: <?php echo $jum_odp+$jum_osp; ?>Orang</td>
  </tr>
</table>
</center>
<br>

<table width="100%" border="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#00CC00"><strong>KETERANGAN</strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D5FFBF"><strong>OTG</strong></td>
    <td bgcolor="#D5FFBF"><strong>: Orang Tanpa Gejala</strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D5FFBF"><strong>ODG</strong></td>
    <td bgcolor="#D5FFBF"><strong>: Orang Dengan Gejala</strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D5FFBF"><strong>ODP</strong></td>
    <td bgcolor="#D5FFBF"><strong>: Orang Dalam Pantauan</strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D5FFBF"><strong>OSP</strong></td>
    <td bgcolor="#D5FFBF"><strong>: Orang Selesai Pantauan</strong></td>
  </tr>
</table>
</body>
</html>
<?php
header("	
application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=LaporanMudik.xlsx"); 
   ?>