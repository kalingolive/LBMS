<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LBMS - <?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> 
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/Assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/Assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/plugins/messenger/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo base_url();?>assets/plugins/messenger/css/messenger-theme-future.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo base_url();?>assets/plugins/messenger/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/> 

<style>
 .accordion .panel-heading {
  background-color: #26B99A !important;
 }
 .accordion .panel-heading strong {
  color: #fff !important;
 }
</style>



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo  base_url(); ?>index.php/lands" class="site_title"><i class="fa fa-paw"></i> <span>LBMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url().$this->session->userdata('img_src'); ?>" alt="profile image" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span><?php echo $this->lang->line('header_welcome'); ?>,</span>
                <h2><?php echo ucfirst($this->session->userdata('name')); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <h3>General</h3>
                <ul class="nav side-menu">
                  <li <?php if($title == "dashboard") echo "class='active'"; ?>><a href="<?php echo  base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('header_nav_dashboard'); ?> </a>
                  <li <?php if($title == "land_preparation") echo "class='active'"; ?>><a href="<?php echo  base_url(); ?>index.php/land_preparation"><i class="fa fa-pie-chart"></i> <?php echo $this->lang->line('header_nav_land_prep'); ?> </a>
                  <li <?php if($title == "lands") echo "class='current-page'"; ?> ><a><i class="fa fa-home"></i> <?php echo $this->lang->line('header_nav_land'); ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php 
					 if(1)
                   // if($this->session->userdata('role') == 2 || $this->session->userdata('role') == 1 ||  $this->session->userdata('role') == 3)
                     {
                   ?>
                      <li <?php if($title == "lands") echo "class='current-page'"; ?>><a href="<?php echo  base_url(); ?>index.php/lands"><?php echo $this->lang->line('header_nav_land_bank'); ?></a></li>

                    <?php
                      }
                    ?>
                      <!-- <li><a href="land_types.php">Land Types</a></li> -->

                      <?php 
					   if(1)
                    //if($this->session->userdata('role') == 4 || $this->session->userdata('role') == 1 ||  $this->session->userdata('role') == 3)
                     {
                      ?>
                      <li><a href="#level1_1"><?php echo $this->lang->line('header_nav_land_transfer'); ?> <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li <?php if($title == "bid") echo "class='active'"; ?>><a href="<?php echo  base_url(); ?>index.php/bid_transfer"><?php echo $this->lang->line('header_nav_bid'); ?></a>
                                  </li>
                                  <li <?php if($title == "merit") echo "class='active'"; ?>><a href="<?php echo  base_url(); ?>index.php/alloc_transfer"><?php echo $this->lang->line('header_nav_alloc'); ?></a>
                                  </li>
                                </ul>
                      </li>
                      <?php 
                       }
					    if(1)
                     // if($this->session->userdata('role') == 3)
                     {
                      ?>
                      <li <?php if($title == "woreda") echo "class='current-page'"; ?>><a href="<?php echo  base_url(); ?>index.php/woreda"><?php echo $this->lang->line('header_nav_woreda'); ?></a></li>
						 <li <?php if($title == "block") echo "class='current-page'"; ?>><a href="<?php echo  base_url(); ?>index.php/block"><?php echo "Block".$this->lang->line('header_nav_block'); ?></a></li>

                      <?php
                      }
                      ?>
                     <!--  <li><a href="Block.php">Block</a></li> -->
                      <!-- <li><a href="Parcel.php">Parcel</a></li> -->
                     <!--  <li><a href="Coordinates.php">Coordinates</a></li> -->
                    </ul>
                  </li>
                  <?php 
				   if(1)
                  //  if($this->session->userdata('role') == 4 || $this->session->userdata('role') == 1 ||  $this->session->userdata('role') == 3)
                     {
                   ?>
                  <li <?php if($title == "reports") echo "class='current-page'"; ?>><a a href="<?php echo  base_url(); ?>index.php/reports"><i class="fa fa-file-o"></i> <?php echo $this->lang->line('header_nav_report'); ?></a>
                  </li>
                  <?php
                     }
                  ?>
                  <?php 
				  if(1)
                   // if($this->session->userdata('role') == 3)
                     {
                   ?>
                  <li <?php if($title == "users") echo "class='current-page'"; ?>><a a href="<?php echo  base_url(); ?>index.php/user"><i class="fa fa-users"></i> <?php echo $this->lang->line('header_nav_user'); ?></a>
                  </li>
                  <?php
                     }
                  ?>

                  <?php 
				   if(1)
                    //if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 1)
                     {
                   ?>
                  <li <?php if($title == "logs") echo "class='current-page'"; ?>><a a href="<?php echo  base_url(); ?>index.php/log_sheet"><i class="fa fa-list"></i> <?php echo $this->lang->line('header_nav_log'); ?></a>
                  </li>
                  <?php
                     }
                  ?>
                
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a> -->
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <img src="<?php echo base_url().$this->session->userdata('img_src'); ?>" alt="profile image" class="profile_img"><?php echo strtoupper($this->session->userdata('name')); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo base_url(); ?>index.php/user/view_profile/<?php echo $this->session->userdata('id'); ?>"><i class="fa fa-user pull-right"></i> <?php echo $this->lang->line('header_menu_profile'); ?></a></li>
                  <li><a href="#" onclick="open_changePass(<?php echo $this->session->userdata('id'); ?>)"><i class="fa fa-key pull-right"></i> <?php echo $this->lang->line('header_menu_change_password'); ?></a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/user/logout"><i class="fa fa-sign-out pull-right"></i> <?php echo $this->lang->line('header_menu_logout'); ?></a></li>      
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                      <a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                  <?php echo $this->lang->line('header_lang_language'); ?>
                                  <span class="caret"></span>
                              </a>
                      <ul id="menu2" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop5">
                        <li <?php if($this->session->userdata('lang') == "english") echo "class='active'"; ?> role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('index.php/language/index/english')?>"><?php echo $this->lang->line('header_lang_english'); ?> </a>
                        </li>
                        <li <?php if($this->session->userdata('lang') == "amharic") echo "class='active'"; ?>  role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('index.php/language/index/amharic')?>"><?php echo $this->lang->line('header_lang_amharic'); ?></a>
                        </li>
                        <li <?php if($this->session->userdata('lang') == "afaan_oromo") echo "class='active'"; ?> role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('index.php/language/index/afaan_oromo')?>"><?php echo $this->lang->line('header_lang_afaan_oromo'); ?></a>
                        </li>
                        <li <?php if($this->session->userdata('lang') == "afaan_somali") echo "class='active'"; ?> role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('index.php/language/index/afaan_somali')?>"><?php echo $this->lang->line('header_lang_soomali'); ?></a>
                        </li>
                        <li <?php if($this->session->userdata('lang') == "tigregna") echo "class='active'"; ?> role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('index.php/language/index/tigregna')?>"><?php echo $this->lang->line('header_lang_tigregna'); ?> </a>
                        </li>
                      </ul>
                    </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- Modal -->
        <div class="modal fade" id="changePass_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('header_change_password_title'); ?></h4>
              </div>
              <div class="modal-body">
               <form id="change_password"  method="post" action="#" >                   
                
                <div class="form-group">
                    <label for="old_password" class="form-label"><?php echo $this->lang->line('header_old_password'); ?> </label>
                    <input type="old_password" class="form-control" name="old_password_edit" id="old_password_edit">
                </div>

                <div class="form-group">
                    <label for="new_password" class="form-label"><?php echo $this->lang->line('header_new_password'); ?> </label>
                    <input type="new_password" class="form-control" name="new_password_edit" id="new_password_edit">
                </div>

            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('header_close'); ?></button>
                <button type="button" class="btn btn-success" id="save_button"><?php echo $this->lang->line('header_save'); ?></button>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          function open_changePass(id){
            $('#changePass_modal').modal('toggle');
            $('#save_button').attr("onclick","ChangeUserPass("+id+")");
             }
        </script>