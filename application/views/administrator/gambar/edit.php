<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Contoh Dokumen Valid/ Invalid</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('gambar/edit', $attributes);
echo "<div class='col-md-12'> ";
?>
<table class='table table-condensed table-bordered'>
  <tbody>
    <input type='hidden' name='id' value='<?=$rows['id']?>'>
    <tr>
      <th width='120px' scope='row'>Deskripsi</th>
      <td><input type="text" class='form-control' name="input_deskripsi" value="<?=$rows['deskripsi']?>"></td>
    </tr>
    <tr>
      <th width='120px' scope='row'>Gambar Lama</th>
      <input type='hidden' name='input_gambar_old' value='<?=$rows['nama_file']?>'>
    <?php
      echo "<td><img src='".base_url("uploads/".$rows['nama_file'])."' width='480' height='360'></td>";
    ?>
    <tr>
      <th width='120px' scope='row'>Upload Gambar</th>
      <td><input type="file" class='form-control' name="input_gambar" required></td>
  </tbody>
</table>

    
  <hr>
  <input type="submit" name="submit" class='btn btn-info'value="Update ">
  <?php echo "
  <a href='" . base_url() . $this->uri->segment(1) . "/'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>"?>

<?php echo form_close(); ?>