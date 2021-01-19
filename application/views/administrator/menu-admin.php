        <?php $users = $this->model_users->users_edit($this->session->username)->row_array(); ?>
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>/asset/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $users['nama']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?php
          if ($users) {
          ?>
            <ul class="sidebar-menu">
              <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU PENGGUNA</li>
              <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
              <li><a href="<?php echo base_url(); ?>administrator/jenis"><i class="fa fa-clipboard"></i> <span>Data Master</span></a></li>
              <ul>
                <li><a href="<?php echo base_url(); ?>administrator/jenis"><i class="fa fa-clipboard"></i> <span>--- Jenis MP</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/class"><i class="fa fa-clipboard"></i> <span>--- Class</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/kelompok"><i class="fa fa-clipboard"></i> <span>--- Kelompok</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/bentuk"><i class="fa fa-clipboard"></i> <span>--- Bentuk</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/perolehan"><i class="fa fa-clipboard"></i> <span>--- Perolehan MP</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/tujuan"><i class="fa fa-clipboard"></i> <span>--- Tujuan Penggunaan</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/registrasi"><i class="fa fa-clipboard"></i> <span>--- Status Registrasi</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/species"><i class="fa fa-clipboard"></i> <span>--- Suspectible Species</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/terjangkit"><i class="fa fa-clipboard"></i> <span>--- Terjangkit</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/resiko"><i class="fa fa-clipboard"></i> <span>--- Tingkat kategori Resiko</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/diketahuipem"><i class="fa fa-clipboard"></i> <span>--- MP Diketahui Pemilik</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/tempem"><i class="fa fa-clipboard"></i> <span>--- Tempat Pemasukan</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/perpem"><i class="fa fa-clipboard"></i> <span>--- PPK Online</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/dokumen"><i class="fa fa-clipboard"></i> <span>--- Status Dokumen</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/kesesuaian"><i class="fa fa-clipboard"></i> <span>--- Kesesuaian isi</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/pengasingan"><i class="fa fa-clipboard"></i> <span>--- Pengasingan</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/hpik"><i class="fa fa-clipboard"></i> <span>--- Status HPIK</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/penahanan"><i class="fa fa-clipboard"></i> <span>--- Penahanan</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/pemenuhansyarat"><i class="fa fa-clipboard"></i> <span>--- Pemenuhan Persyaratan</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/penolakan"><i class="fa fa-clipboard"></i> <span>--- Penolakan</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/dregistrasi"><i class="fa fa-clipboard"></i> <span>--- Data Registrasi</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/dsuspect"><i class="fa fa-clipboard"></i> <span>--- Data Suspect</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/dterjangkit"><i class="fa fa-clipboard"></i> <span>--- Data Terjangkit</span></a></li>
                <li><a href="<?php echo base_url(); ?>administrator/dresiko"><i class="fa fa-clipboard"></i> <span>--- Data Resiko</span></a></li>
                <li><a href="<?php echo base_url(); ?>gambar"><i class="fa fa-clipboard"></i> <span>--- Data Gambar Dokumen</span></a></li>
                <li><a href="<?php echo base_url(); ?>lokasi"><i class="fa fa-clipboard"></i> <span>--- Data Lokasi Pemasukan</span></a></li>
              </ul>

              <li><a href="<?php echo base_url(); ?>administrator/sdss"><i class="fa fa-industry"></i> <span>Data Karantina Ikan</span></a></li>
              <li><a href="<?php echo base_url(); ?>administrator/report"><i class="fa fa-book"></i> <span> Download Laporan</span></a></li>

              <li><a href="<?php echo base_url(); ?>administrator/edit_manajemenuser/<?php echo $this->session->username; ?>"><i class="fa fa-user"></i> <span>Edit Profile</span></a></li>
              <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
            </ul>
          <?php
          } else {
          ?>
            <ul class="sidebar-menubiasa">
              <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU PENGGUNA</li>
              <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Data Karantina Ikan</span></a></li>
              <li><a href="<?php echo base_url(); ?>administrator/tambahsdss"><i class="fa fa-clipboard"></i> <span>Prediksi Karantina Ikan</span></a></li>
              <li><a href="<?php echo base_url(); ?>administrator/login"><i class="fa fa-power-off"></i> <span>Login</span></a></li>
            </ul>
          <?php
          }
          ?>

        </section>