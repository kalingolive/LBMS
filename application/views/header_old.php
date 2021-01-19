<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Land Bank Management System | Dashboard</title>

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
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url().$this->session->userdata('img_src'); ?>" alt="profile image" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
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
                  <li><a><i class="fa fa-home"></i> Land Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo  base_url(); ?>index.php/lands">Land Bank</a></li>
                      <!-- <li><a href="land_types.php">Land Types</a></li> -->
                      <li><a href="#level1_1">Land Transfer <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a href="<?php echo  base_url(); ?>index.php/bid_transfer">Transfer by bid</a>
                                  </li>
                                  <li><a href="<?php echo  base_url(); ?>index.php/alloc_transfer">Transfer by allocation</a>
                                  </li>
                                </ul>
                      </li>
                      <li><a href="<?php echo  base_url(); ?>index.php/woreda">Woreda</a></li>
                     <!--  <li><a href="Block.php">Block</a></li> -->
                      <!-- <li><a href="Parcel.php">Parcel</a></li> -->
                     <!--  <li><a href="Coordinates.php">Coordinates</a></li> -->
                    </ul>
                  </li>
                  <?php 
                    if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 1)
                     {
                   ?>
                  <li><a a href="<?php echo  base_url(); ?>index.php/user"><i class="fa fa-users"></i> User Management</a>
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
              <a data-toggle="tooltip" data-placement="top" title="Settings">
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
              </a>
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
                    <img src="images/img.jpg" alt=""><?php echo strtoupper($this->session->userdata('name')); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo base_url(); ?>index.php/user/view_profile/<?php echo $this->session->userdata('id'); ?>"><i class="fa fa-user pull-right"></i> View Profile</a></li>
                  <li><a href="#" onclick="open_changePass(<?php echo $this->session->userdata('id'); ?>)"><i class="fa fa-key pull-right"></i> Change Password</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/user/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>      
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
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
                <h4 class="modal-title" id="myModalLabel">Change Login Password</h4>
              </div>
              <div class="modal-body">
               <form id="change_password"  method="post" action="#" >                   
                
                <div class="form-group">
                    <label for="old_password" class="form-label">Old Password </label>
                    <input type="old_password" class="form-control" name="old_password_edit" id="old_password_edit">
                </div>

                <div class="form-group">
                    <label for="new_password" class="form-label">New Password </label>
                    <input type="new_password" class="form-control" name="new_password_edit" id="new_password_edit">
                </div>

            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="save_button">Save</button>
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