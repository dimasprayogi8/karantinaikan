<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Contoh Dokumen Valid/ Invalid</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('gambar/tambah', $attributes);
echo "<div class='col-md-12'> ";
?>
<table class='table table-condensed table-bordered'>
  <tbody>
    <tr>
      <th width='120px' scope='row'>Deskripsi</th>
      <td><input type="text" class='form-control' name="input_deskripsi" value="<?php echo set_value('input_deskripsi'); ?>"></td>
    </tr>
    <tr>
      <th width='120px' scope='row'>Upload Gambar</th>
      <td><input type="file" class='form-control' name="input_gambar" required></td>
  </tbody>
</table>

    
  <hr>
  <input type="submit" name="submit" class='btn btn-info'value="Tambahkan ">
  <?php echo "
  <a href='" . base_url() . $this->uri->segment(1) . "/'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>"?>

<?php echo form_close(); ?>