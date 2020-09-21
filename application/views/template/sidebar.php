<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">  
          <img src="<?php echo base_url('assets/foto/takmir/'.$this->session->userdata('foto_takmir')); ?>" class="img-circle" alt="User Image"> 
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_takmir'); ?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>HOME</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard "></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('takmir-masjid')?>"><i class="fa fa-user"></i> Profil Takmir </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-plus-o"></i>
            <span> Kajian </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('kajian/insert')?>"><i class="fa fa-book"></i> Tambah Kajian </a></li>
            <li><a href="<?php echo site_url('kajian')?>"><i class="fa fa-calendar"></i> Data Kajian </a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-video-camera"></i>
            <span> Video Kajian </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('video-kajian/insert')?>"><i class="fa fa-file-video-o"></i> Tambah Video Kajian </a></li>
            <li><a href="<?php echo site_url('video-kajian')?>"><i class="fa fa-video-camera"></i> Data Video Kajian </a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-play"></i>
            <span> Audio Kajian </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('audio-kajian/insert')?>"><i class="fa fa-file-audio-o"></i> Tambah Audio Kajian </a></li>
            <li><a href="<?php echo site_url('audio-kajian')?>"><i class="fa fa-play"></i> Data Audio Kajian </a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-youtube-play"></i>
            <span> Live Streaming </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('live-streaming/insert')?>"><i class="fa fa-file-video-o"></i> Tambah Data Live Streaming </a></li>
            <li><a href="<?php echo site_url('live-streaming')?>"><i class="fa fa-youtube-play"></i> Data Live Streaming </a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-university"></i>
            <span> Data Masjid </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('masjid')?>"><i class="fa fa-circle-o"></i> Profil Masjid </a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span> Tentang Aplikasi </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('auth/index')?>"><i class="fa fa-circle-o"></i> Aplikasi </a></li>
            
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>