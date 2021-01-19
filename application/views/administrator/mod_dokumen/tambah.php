<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Status Dokumen</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
echo form_open_multipart('administrator/tambah_dokumen', $attributes);
echo "<div class='col-md-12'> ";
?>
<table class='table table-condensed table-bordered'>
    <tbody>
        <input type='hidden' name='id' value=''>
        <tr>
            <th width='120px' scope='row'>Kode Status Dokumen</th>
            <td><input type='text' class='form-control' name='a' required></td>
        </tr>
        <tr>
            <th width='120px' scope='row'>Nama Status Dokumen</th>
            <td><input type='text' class='form-control' name='b' required></td>
        </tr>
    </tbody>
</table>

<?php echo "  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='" . base_url() . $this->uri->segment(1) . "/dokumen'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
