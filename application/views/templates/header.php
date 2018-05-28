<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $judul; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <div class="col-lg">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <div class="col-sm-8"> -->
                        <a class="navbar-brand" href="<?php echo site_url('index'); ?>" >Sistem Pengajuan KTM</a>
                    <!-- <div class="col-sm-4"> -->
                    <!-- </div> -->
                </div> 
            </div>
            </ul>

            <!-- /.navbar-top-links -->

            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <div align="center" style="margin: 10px;">
                            <img src="<?php echo base_url().'fotoProfil/'.$this->session->userdata('photo') ?>" style="width: 80px;height: 80px;margin:10px" class="img-circle">
                            <h5><?php echo $this->session->userdata('nama'); ?></h5>
                            <h6><?php echo $this->session->userdata('level'); ?></h6>
                            
                        </div>
                        <?php if ($this->session->userdata('level')=='Mahasiswa'): ?>
                        <li>
                            <a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php endif ?>
                        <?php if ($this->session->userdata('level')!='Mahasiswa'): ?>
                        <li>
                            <a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('user'); ?>">List User</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/insertUser'); ?>">Create User</a>
                                </li>
                            </ul> 
                        </li>
                        <?php if ($this->session->userdata('level')=='Super User'): ?>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-briefcase"></i> Pegawai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('pegawai'); ?>">List Pegawai</a>
                                </li>
                            </ul> 
                        <li>
                        <?php endif ?>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-education"></i> Mahasiswa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('mahasiswa'); ?>">List Mahasiswa</a>
                                </li>
                                <!-- <li>
                                    <a href="<?php echo site_url('mahasiswa/insertMhs'); ?>">Insert Mahasiswa</a>
                                </li> -->
                            </ul> 
                        <li>
                        <?php endif ?>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-tasks"></i> Pengajuan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if($this->session->userdata('level')=='Mahasiswa'){ ?>
                                <li>
                                    <a href="<?php echo site_url('pengajuan/form_kehilangan'); ?>">Form Pengajuan KTM</a>
                                </li>
                                
                                <?php } else{ ?>
                                <li>
                                    <a href="<?php echo site_url('pengajuan/index') ?>">List Pengajuan</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pengajuan/form_kehilangan'); ?>">Form Pengajuan KTM</a>
                                </li>
                                <?php } ?>
                            </ul> 
                        </li>
                        
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Profil<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($this->session->userdata('level')=='Mahasiswa') { ?>
                                <li>
                                    <a href="<?php echo site_url('/profilMhs/updateForm/'.$this->session->userdata('username')) ?>">Merubah Data Diri</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('profilMhs/formUpload/'.$this->session->userdata('username')) ?>">Foto Profil</a>
                                </li>

                                <?php } else{ ?>


                                <li>
                                    <a href="<?php echo site_url('profil/updateForm/'.$this->session->userdata('username')) ?>">Merubah Data Diri</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('profil/formUpload/'.$this->session->userdata('username')) ?>">Foto Profil</a>
                                </li>
                                <?php } ?>
                            </ul> 
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout') ?>"><i class="fa fa-sign-out fa-fw"></i>Log out</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"><?php echo $judul; ?></h1>
    </div>