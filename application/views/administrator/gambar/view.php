<?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h2 align="center">Contoh Dokumen Valid dan Invalid</h2>

        <?php
          if($users)
          { ?>

            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>gambar/tambah'>Tambahkan Data</a>

         <?php
          }
        ?>
        </div>
        <div class="box-body">
           <table id="example1" class="table table-bordered table-striped">
<tr>
  <th style='width:40px'>No</th>
  <?php
          if($users)
          { ?>
             <th style='width:70px'>Action</th>
         <?php
          }
        ?>
  <th>Nama File</th>
  <th>Deskripsi</th>
  <th style='width:480px'>Gambar</th>
</tr>
<tbody>
<?php
$no = 1;
if( ! empty($gambar)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($gambar as $data){ // Lakukan looping pada variabel gambar dari controller
    echo "<tr>";
    echo "<td>".$no."</td>";
    if($users)
    {
    echo "<td><center>
          <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "gambar/form_edit/$data->id'><span class='glyphicon glyphicon-edit'></span></a>
           <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "gambar/delete/$data->id' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>";
    }
    echo "<td>".$data->nama_file."</td>";
    echo "<td>".$data->deskripsi."</td>";
    echo "<td><img src='".base_url("uploads/".$data->nama_file)."' width='480' height='360'></td>";
    echo "</tr>";
    $no++;
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>
                </tbody>
            </table>
        </div>