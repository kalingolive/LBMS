<?php
 include_once 'header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $this->lang->line('title'); ?></small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $this->lang->line('sub_title'); ?></h2>

                    <ul class="nav navbar-right panel_toolbox">
                    <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_user_modal"><?php echo $this->lang->line('add_user'); ?></button></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 <!--  <?php
                   echo $controller->session->userdata('role');
                  ?> -->
                    <p class="text-muted font-13 m-b-30">
                     <?php echo $this->lang->line('description'); ?>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         <th><?php echo $this->lang->line('id'); ?></th>
                          <th><?php echo $this->lang->line('full_name'); ?></th>
                          <th><?php echo $this->lang->line('username'); ?></th>
                          <th><?php echo $this->lang->line('phone'); ?></th>
                          <th><?php echo $this->lang->line('sex'); ?></th>
                          <th><?php echo $this->lang->line('role'); ?></th>
                          <th><?php echo $this->lang->line('last_login'); ?></th>
                          <th><?php echo $this->lang->line('status'); ?></th>
                          
                          <th><?php echo $this->lang->line('actions'); ?></th>
                        </tr>
                      </thead>


                      <tbody>

                  <?php foreach($user_data as $row)
                      {
                        if($row->id == $this->session->userdata('id'))
                          continue;
                        ?>
                        <tr>
                          <td><?php echo $row->id; ?></td>
                          <td><?php echo $row->first_name . " " . $row->last_name; ?></td>
                          <td><?php echo $row->user_name; ?></td>
                          <td><?php echo $row->phone; ?></td>
                          <td><?php echo $row->sex; ?></td>
                          <td><?php if($row->role == 1) echo "<span class='label label-success'>Head Officer</span>"; elseif($row->role == 3) echo "<span class='label label-danger'>System Admin</span>"; elseif($row->role == 2) echo "<span class='label label-warning'>Land Bank Officer</span>"; elseif($row->role == 4) echo "<span class='label label-warning'>Land Transfer Officer</span>"; else echo "<span class='label label-default'>Other</span>"; ?></td>
                          <td><?php echo $row->last_login . " (From ".$row->last_ip.")"; ?></td>
                          <td><?php if($row->is_active == 1) echo "<span class='label label-success'>Active</span>"; else echo "<span class='label label-danger'>Not Active</span>"; ?></td>
                          <td>
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" href="#" onclick="view_user(<?php echo $row->id; ?>);"><i class="fa fa-folder"></i> <?php echo $this->lang->line('action_view'); ?></button>
                            <button type="button" class="btn btn-danger btn-xs"  onclick="open_confirm(<?php echo $row->id; ?>)" ><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('action_delete'); ?></button>
                          </td>
                        </tr>
                         <?php
                      }
                        ?>
                      </tbody>
                    </table>
                  </div>
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
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_modal_title'); ?></h4>
              </div>
              <div class="modal-body">
                

                <form id="add_user"  method="post" action="<?php echo base_url(); ?>index.php/user/add_user" >  
                  
                    <div class="form-group">
                        <label for="fname" class="form-label"><?php echo $this->lang->line('modal_first_name'); ?></label>
                        <input type="text" class="form-control" name="fname" id="fname_add" required>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="form-label"><?php echo $this->lang->line('modal_last_name'); ?></label>
                        <input type="text" class="form-control" name="lname" id="lname_add" required>
                    </div>

                    <div class="form-group">
                        <label for="uname" class="form-label"><?php echo $this->lang->line('modal_username'); ?></label>
                        <input type="text" class="form-control" name="uname" id="uname_add" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label"><?php echo $this->lang->line('modal_email'); ?></label>
                        <input type="email" class="form-control" name="email" id="email_add" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label"><?php echo $this->lang->line('modal_phone'); ?></label>
                        <input type="phone" class="form-control" name="phone" id="phone_add" required>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="form-label"><?php echo $this->lang->line('modal_sex'); ?></label>
                        <select class="form-control" name="sex" id="sex_add" required>
                        <option value=""><?php echo $this->lang->line('modal_select_sex'); ?></option>
                        <option value="Male"><?php echo $this->lang->line('modal_male'); ?></option>
                        <option value="Female"><?php echo $this->lang->line('modal_female'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label"><?php echo $this->lang->line('modal_password'); ?></label>
                        <input type="password" class="form-control" name="password" id="password_add" required>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label"><?php echo $this->lang->line('modal_role'); ?></label>
                        <select class="form-control" name="role" id="role_add" required>
                        <option value=""><?php echo $this->lang->line('modal_select_role'); ?></option>
                        <option value="1"><?php echo $this->lang->line('modal_head_officer'); ?></option>
                        <option value="2"><?php echo $this->lang->line('modal_bank_officer'); ?></option>
                        <option value="4"><?php echo $this->lang->line('modal_transfer_officer'); ?></option>
                        <?php 
                        if($this->session->userdata('role') == 3)
                         {
                         ?>
                        <option value="3"><?php echo $this->lang->line('modal_system_admin'); ?></option>
                        <?php
                         }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label"><?php echo $this->lang->line('modal_status'); ?></label>
                        <select class="form-control" name="status" id="status_add" required>
                        <option value="1"><?php echo $this->lang->line('modal_active'); ?></option>
                        <option value="0"><?php echo $this->lang->line('modal_not_active'); ?></option>
                        </select>
                    </div>

                    <!-- SELECT PROFILE IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_profile_image'); ?></label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="default.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo $this->lang->line('modal_select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                        <input type="file" name="profile_image" id="profile_image" accept="image/*">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_close'); ?></button>
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
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_modal_edit_user'); ?></h4>
              </div>
              <div class="modal-body">
                <form id="edit_user"  method="post" action="<?php echo base_url(); ?>index.php/user/edit_user" >  
                  
                    <input type="hidden" class="form-control" name="user_id" id="user_id" required>
                    <div class="form-group">
                        <label for="fname" class="form-label"><?php echo $this->lang->line('modal_first_name'); ?></label>
                        <input type="text" class="form-control" name="fname_edit" id="fname_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="form-label"><?php echo $this->lang->line('modal_last_name'); ?></label>
                        <input type="text" class="form-control" name="lname_edit" id="lname_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="uname" class="form-label"><?php echo $this->lang->line('modal_username'); ?></label>
                        <input type="text" class="form-control" name="uname_edit" id="uname_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label"><?php echo $this->lang->line('modal_email'); ?></label>
                        <input type="email" class="form-control" name="email_edit" id="email_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label"><?php echo $this->lang->line('modal_phone'); ?></label>
                        <input type="phone" class="form-control" name="phone_edit" id="phone_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="form-label"><?php echo $this->lang->line('modal_sex'); ?></label>
                        <select class="form-control" name="sex_edit" id="sex_edit" required>
                        <option value=""><?php echo $this->lang->line('modal_select_sex'); ?></option>
                        <option value="Male"><?php echo $this->lang->line('modal_male'); ?></option>
                        <option value="Female"><?php echo $this->lang->line('modal_female'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label"><?php echo $this->lang->line('modal_edit_password'); ?></label>
                        <input type="password" class="form-control" name="password_edit" id="password_edit">
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label"><?php echo $this->lang->line('modal_role'); ?></label>
                        <select class="form-control" name="role_edit" id="role_edit" required>
                        <option value=""><?php echo $this->lang->line('modal_select_role'); ?></option>
                        <option value="1"><?php echo $this->lang->line('modal_head_officer'); ?></option>
                        <option value="2"><?php echo $this->lang->line('modal_bank_officer'); ?></option>
                        <option value="4"><?php echo $this->lang->line('modal_transfer_officer'); ?></option>
                        <?php 
                        if($this->session->userdata('role') == 3)
                         {
                         ?>
                        <option value="3"><?php echo $this->lang->line('modal_system_admin'); ?></option>
                        <?php
                         }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label"><?php echo $this->lang->line('modal_status'); ?></label>
                        <select class="form-control" name="status_edit" id="status_edit" required>
                        <option value="1"><?php echo $this->lang->line('modal_active'); ?></option>
                        <option value="0"><?php echo $this->lang->line('modal_not_active'); ?></option>
                        </select>
                    </div>

                    <!-- SELECT PROFILE IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_profile_image'); ?></label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?php echo base_url();?>uploads/file.png" id="user_src" alt="...">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_close'); ?></button>
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
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('remove_modal_delete_user'); ?></h4>
              </div>
              <div class="modal-body">
               <?php echo $this->lang->line('modal_remove_sure'); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_close'); ?></button>
                <button type="button" class="btn btn-danger" id="delete_button"><?php echo $this->lang->line('modal_delete_button'); ?></button>
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
              responsive: true
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