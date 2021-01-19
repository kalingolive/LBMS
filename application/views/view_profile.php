<?php
 include_once 'header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $this->lang->line('title'); ?></h3>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $this->lang->line('sub_title_profile'); ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                    if(sizeof($user_data) != 0)
                    {
                      if($this->session->userdata('id') != $user_data[0]->id)
                        echo "<h4 style='text-align:center; color: red;'>Your are accessing another user's profile, proceed with caution !!</h4>";
                  ?>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo base_url('/').$user_data[0]->img_src ?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo strtoupper($user_data[0]->first_name) ." ". strtoupper($user_data[0]->last_name); ?> </h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-phone user-profile-icon"></i> <?php echo strtoupper($user_data[0]->phone) ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php if($user_data[0]->role == 1) echo "Administrator"; elseif($user_data[0]->role == 2) echo "Employee"; elseif($user_data[0]->role == 3) echo "Super Administrator";  ?>
                        </li>

                        <li>
                          <i class="fa fa-envelope-o user-profile-icon"></i> <?php echo $user_data[0]->email;  ?>
                        </li>

    
                      </ul>

                      <br />
                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">


                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('change_profile'); ?></a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?php echo $this->lang->line('recent_activities'); ?></a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                            <form id="edit_profile"  method="post" action="<?php echo base_url(); ?>index.php/user/edit_user" >                    
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user_data[0]->id; ?>" required>
                                <div class="form-group">
                                    <label for="fname" class="form-label"><?php echo $this->lang->line('modal_first_name'); ?></label>
                                    <input type="text" class="form-control" name="fname_edit" id="fname_edit" value="<?php echo $user_data[0]->first_name; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="lname" class="form-label"><?php echo $this->lang->line('modal_last_name'); ?></label>
                                    <input type="text" class="form-control" name="lname_edit" id="lname_edit" value="<?php echo $user_data[0]->last_name; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="uname" class="form-label"><?php echo $this->lang->line('modal_username'); ?></label>
                                    <input type="text" class="form-control" name="uname_edit" id="uname_edit" value="<?php echo $user_data[0]->user_name; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label"><?php echo $this->lang->line('modal_email'); ?></label>
                                    <input type="email" class="form-control" name="email_edit" id="email_edit" value="<?php echo $user_data[0]->email; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label"><?php echo $this->lang->line('modal_phone'); ?></label>
                                    <input type="phone" class="form-control" name="phone_edit" id="phone_edit" value="<?php echo $user_data[0]->phone; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="sex" class="form-label"><?php echo $this->lang->line('modal_sex'); ?></label>
                                    <select class="form-control" name="sex_edit" id="sex_edit" required>
                                    <option value="" <?php if($user_data[0]->sex == "") echo " selected" ?>><?php echo $this->lang->line('modal_select_sex'); ?></option>
                                    <option value="Male" <?php if($user_data[0]->sex == "Male") echo " selected" ?>><?php echo $this->lang->line('modal_male'); ?></option>
                                    <option value="Female" <?php if($user_data[0]->sex == "Female") echo " selected" ?>><?php echo $this->lang->line('modal_female'); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label"><?php echo $this->lang->line('modal_edit_password'); ?></label>
                                    <input type="password" class="form-control" name="password_edit" id="password_edit">
                                </div>

                                <div class="form-group">
                                    <label for="role" class="form-label"><?php echo $this->lang->line('modal_role'); ?></label>
                                    <select class="form-control" name="role_edit" id="role_edit" required>
                                    <option value="" <?php if($user_data[0]->role == "") echo " selected" ?>><?php echo $this->lang->line('modal_select_role'); ?></option>
                                    <option value="1" <?php if($user_data[0]->role == "1") echo " selected" ?>><?php echo $this->lang->line('modal_head_officer'); ?></option>
                                    <option value="2" <?php if($user_data[0]->role == "2") echo " selected" ?>><?php echo $this->lang->line('modal_bank_officer'); ?></option>
                                    <option value="2" <?php if($user_data[0]->role == "4") echo " selected" ?>><?php echo $this->lang->line('modal_transfer_officer'); ?></option>
                                    <?php 
                                    if($this->session->userdata('role') == 3)
                                     {
                                     ?>
                                    <option value="3" <?php if($user_data[0]->role == "3") echo " selected" ?>><?php echo $this->lang->line('modal_system_admin'); ?></option>
                                    <?php
                                     }
                                     ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="role" class="form-label"><?php echo $this->lang->line('modal_status'); ?></label>
                                    <select class="form-control" name="status_edit" id="status_edit" required>
                                    <option value="1" <?php if($user_data[0]->role == "1") echo " selected" ?>><?php echo $this->lang->line('modal_active'); ?></option>
                                    <option value="0" <?php if($user_data[0]->role == "0") echo " selected" ?>><?php echo $this->lang->line('modal_not_active'); ?></option>
                                    </select>
                                </div>

                                <!-- SELECT PROFILE IMAGE -->
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_profile_image'); ?></label>
                                    
                                    <div class="col-sm-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <img src="<?php echo base_url('/').$user_data[0]->img_src;?>" id="user_src" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new"><?php echo $this->lang->line('modal_select_image'); ?></span>
                                                    <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                    <input type="file" name="profile_image_edit" id="profile_image_edit" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <span class="clearfix"></span>
                              <input type="submit" class="btn btn-success" name="submit" value="<?php echo $this->lang->line('modal_save'); ?>">  
                              <input type="reset" class="btn btn-primary" name="clear" value="<?php echo $this->lang->line('modal_clear'); ?>">  
                            </form>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                 <th><?php echo $this->lang->line('id'); ?></th>
                                  <th><?php echo $this->lang->line('user_employee'); ?></th>
                                  <th><?php echo $this->lang->line('location'); ?></th>
                                  <th><?php echo $this->lang->line('action'); ?></th>
                                  <th><?php echo $this->lang->line('updated_data'); ?></th>
                                  <th><?php echo $this->lang->line('detail'); ?></th>
                                  <th><?php echo $this->lang->line('date'); ?></th>
                                  <th><?php echo $this->lang->line('time'); ?></th>
                                  
                                 <!--  <th>Actions</th> -->
                                </tr>
                              </thead>


                              <tbody>
                          <?php foreach($log_data as $row)
                              {
                                ?>
                                <tr>
                                  <td><?php echo $row->log_id; ?></td>
                                  <td><?php echo $row->user ." "; if($row->privilage == 1) echo "<span class='label label-success'>Head Officer</span>"; elseif($row->privilage == 3) echo "<span class='label label-danger'>System Admin</span>"; elseif($row->privilage == 2) echo "<span class='label label-warning'>Land Bank Officer</span>"; elseif($row->privilage == 4) echo "<span class='label label-warning'>Land Transfer Officer</span>"; else echo "<span class='label label-default'>Other</span>"; ?></td>
                                  <td><?php echo $row->ip_address; ?></td>
                                  <td><i style="color: <?php if($row->level == 1) echo "#5CB85C"; elseif($row->level == 2) echo "#F0AD4E"; elseif($row->level == 3) echo "#D9534F"; ?>;" class="fa fa-circle"></i>&nbsp;&nbsp;<?php echo $row->action; ?></td>
                                  <td><?php echo $row->updated_data; ?></td>
                                  <td><?php echo $row->detail; ?></td>
                                  <td><?php echo $row->date; ?></td>
                                  <td><?php echo $row->time; ?></td>
                                 <!--  <td>
                                  <button type="button" class="btn btn-warning" data-toggle="modal" href="#" onclick="view_woreda(<?php echo $row->id; ?>);">View / Edit</button>
                                    <button type="button" class="btn btn-danger"  onclick="open_confirm(<?php echo $row->id; ?>)" >Delete</button>
                                  </td> -->
                                </tr>
                                 <?php
                              }
                                ?>
                              </tbody>
                            </table>
                            <!-- end recent activity -->

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                    }
                    else
                    {
                      echo "<h4 style='text-align:center; color: red;'>User Not Found !!</h4>";
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->



        <!-- Modal -->
        <div class="modal fade" id="add_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New User</h4>
              </div>
              <div class="modal-body">
                

                <form id="add_user"  method="post" action="<?php echo base_url(); ?>index.php/user/add_user" >  
                  
                    <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname_add" required>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname_add" required>
                    </div>

                    <div class="form-group">
                        <label for="uname" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="uname" id="uname_add" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email_add" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" name="phone" id="phone_add" required>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-control" name="sex" id="sex_add" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password_add" required>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" name="role" id="role_add" required>
                        <option value="">Select Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Employee</option>
                        <?php 
                        if($this->session->userdata('role') == 3)
                         {
                         ?>
                        <option value="3">Super Administrator</option>
                        <?php
                         }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">Status</label>
                        <select class="form-control" name="status" id="status_add" required>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                        </select>
                    </div>

                    <!-- SELECT PROFILE IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label">Select Profile Image</label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="default.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="profile_image" id="profile_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <span class="clearfix"></span>
                  <input type="submit" class="btn btn-success" name="submit" value="Save">  
                  <input type="reset" class="btn btn-primary" name="clear" value="Clear">  
                </form>

                

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
              </div>
              <div class="modal-body">
                <form id="edit_user"  method="post" action="<?php echo base_url(); ?>index.php/user/edit_user" >  
                  
                    <input type="hidden" class="form-control" name="user_id" id="user_id" required>
                    <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname_edit" id="fname_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname_edit" id="lname_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="uname" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="uname_edit" id="uname_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email_edit" id="email_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" name="phone_edit" id="phone_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-control" name="sex_edit" id="sex_edit" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password (leave blank if not changing)</label>
                        <input type="password" class="form-control" name="password_edit" id="password_edit">
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" name="role_edit" id="role_edit" required>
                        <option value="">Select Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Employee</option>
                        <?php 
                        if($this->session->userdata('role') == 3)
                         {
                         ?>
                        <option value="3">Super Administrator</option>
                        <?php
                         }
                         ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">Status</label>
                        <select class="form-control" name="status_edit" id="status_edit" required>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                        </select>
                    </div>

                    <!-- SELECT PROFILE IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label">Select Profile Image</label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?php echo base_url();?>uploads/file.png" id="user_src" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="profile_image_edit" id="profile_image_edit" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <span class="clearfix"></span>
                  <input type="submit" class="btn btn-success" name="submit" value="Save">  
                  <input type="reset" class="btn btn-primary" name="clear" value="Clear">  
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete User</h4>
              </div>
              <div class="modal-body">
                Are you sure about deleting the user !!??
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delete_button">Yes Delete</button>
              </div>
            </div>
          </div>
        </div>


<script type="text/javascript">
  function open_confirm(id){
    $('#delete_modal').modal('toggle');
    $('#delete_button').attr("onclick","DeleteUser("+id+")");
     }
</script>


<?php
 include_once 'footer.php';
?>


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: false
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->