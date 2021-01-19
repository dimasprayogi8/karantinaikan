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

    <ul class="sidebar-menubiasa">
        <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU PENGGUNA</li>
        <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Data Karantina Ikan</span></a></li>
        <li><a href="<?php echo base_url(); ?>administrator/jenis"><i class="fa fa-clipboard"></i> <span>Prediksi Karantina Ikan</span></a></li>
        <li><a href="<?php echo base_url(); ?>administrator/login"><i class="fa fa-industry"></i> <span>Login</span></a></li>


    </ul>
</section>