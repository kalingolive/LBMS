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

              <?php echo $title; ?>
<!-- 
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $this->lang->line('sub_title'); ?></h2>
                   <!--  <?php
               echo "<pre>";
               print_r($land_data);
               echo "</pre>";
              ?> -->
                   <!--  <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <ul class="nav navbar-right panel_toolbox">
                    <?php
                     // if($this->session->userdata('role') == 2)
					  if(1)
                      {
                    ?>
                    <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_modal" onclick="add_form()"><?php echo $this->lang->line('add_land'); ?></button></li>
                    <?php
                      }
                    ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <?php echo $this->lang->line('description'); ?>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><?php echo $this->lang->line('land_code'); ?></th>
                          <th><?php echo $this->lang->line('land_type'); ?></th>
                          <th><?php echo $this->lang->line('woreda'); ?></th>
                          <th><?php echo $this->lang->line('block'); ?></th>
                          <th><?php echo $this->lang->line('parcel'); ?></th>
                          <th><?php echo $this->lang->line('total_area'); ?></th>
                          <th><?php echo $this->lang->line('occupied_area'); ?></th>
                          <th><?php echo $this->lang->line('open_area'); ?></th>
                          <th><?php echo $this->lang->line('status'); ?></th>
                          
                          <th><?php echo $this->lang->line('actions'); ?></th>
                        </tr>
                      </thead>
                      <?php
                       // echo "<pre>";
                       // print_r($transfer_data);
                       //echo "</pre>";
                      ?>

                      <tbody>
                      <?php foreach($land_data as $row)
                      {
                        if(!empty($transfer_data[1][$row->land_code]))
                          $total_area_alloc = $transfer_data[1][$row->land_code][0]->total_area_alloc;
                        else
                          $total_area_alloc = 0;

                        if(!empty($transfer_data[2][$row->land_code]))
                          $total_area_bid = $transfer_data[2][$row->land_code][0]->total_area_bid;
                        else
                          $total_area_bid = 0;

                        $total_area_occupied = $total_area_alloc + $total_area_bid;

                        ?>
                        <tr>
                          <td><?php echo $row->land_code; ?></td>
                          <td><?php echo $row->l_title; ?></td>
                          <td><?php echo $row->w_title; ?></td>
                          <td><?php echo $row->b_title; ?></td>
                          <td><?php echo $row->parcel; ?></td>
                          <td><?php echo $row->area_size . " KM"; ?></td>
                          <td><?php echo $total_area_occupied . " KM"; 
                          //calculating percentages 
                          $percentage = number_format(($total_area_occupied / $row->area_size) * 100, 0);
                          echo " <span style='color: red;'>(".$percentage."%)</span>";
                          ?></td>
                          <td><?php echo "<span style='color: green;'>".($row->area_size - $total_area_occupied) . "</span> KM"; ?></td>
                          <td><?php if($row->status == 0) { if($total_area_occupied > 0) echo "Partially Occupied"; else echo "Unoccupied"; } else {echo "Occupied";} ?></td>
                          <td>


                          <a href="<?php echo base_url().'index.php/Lands/print_land/'.$row->parcel_id; ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> <?php echo $this->lang->line('action_view'); ?></a>

                          <?php
                             if($this->session->userdata('role') == 3)
                              {
                          ?>
                          <button type="button" class="btn btn-info btn-xs" data-toggle="modal" href="#" onclick="view_land(<?php echo $row->parcel_id; ?>);"><i class="fa fa-pencil"> <?php echo $this->lang->line('action_edit'); ?></i></button>
                            <button type="button"  class="btn btn-danger btn-xs"  onclick="open_confirm(<?php echo $row->parcel_id; ?>)" ><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('action_delete'); ?></button>
                          <?php
                              }
                          ?>
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
        <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_modal_title'); ?></h4>
              </div>
              <div class="modal-body">
                

                <form  method="post" action="<?php echo base_url(); ?>index.php/lands/add_land" >  
                  
                  <input type="hidden" name="coord_size" id="coord_size" value="0"/>
				  
				   <div class="form-group">
                    <label for="land_prep_id" class="form-label"><?php echo $this->lang->line('Prepared_land'); ?></label>
                      <select name="land_prep_id" class="form-control" id="land_prep_add" required />
                     
                     </select>
                   </div>
				   
                  <div class="form-group">
                    <label for="woreda" class="form-label"><?php echo $this->lang->line('modal_woreda'); ?></label>
                      <select name="woreda" class="form-control" id="woreda_add" required>
                     
                     </select>
                   </div>
                    <div class="form-group">
                        <label for="block" class="form-label"><?php echo $this->lang->line('modal_block'); ?></label>
                        <input type="text" class="form-control" name="block" id="block_add" required>
                    </div>

                    <div class="form-group">
                        <label for="parcel" class="form-label"><?php echo $this->lang->line('modal_parcel'); ?></label>
                        <input type="text" class="form-control" name="parcel" id="parcel_add" required>
                    </div>

                    <div class="form-group">
                        <label for="desc" class="form-label"><?php echo $this->lang->line('modal_land_description'); ?></label>
                        <input type="text" class="form-control" name="desc" id="desc_add" placeholder="eg. MJ or IZ" required>
                    </div>

                    <div class="form-group">
                        <label for="area" class="form-label"><?php echo $this->lang->line('modal_area'); ?></label>
                        <input type="text" class="form-control" name="area" id="area_add" required>
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label"><?php echo $this->lang->line('modal_status'); ?></label>
                        <select name="status" class="form-control" id="status_add" required>
                         <option value="0"><?php echo $this->lang->line('modal_not_occupied'); ?></option>
                         <option value="1"><?php echo $this->lang->line('modal_occupied'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="land_type" class="form-label"><?php echo $this->lang->line('modal_land_type'); ?></label>
                        <select name="land_type" class="form-control" id="landType_add" required>
                       
                       </select>
                    </div>

                    <!-- SELECT LAND IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_land_image'); ?></label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/200x200" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo $this->lang->line('modal_select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                        <input type="file" name="land_image" id="land_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                       
                    <div id="coordinates" style='clear:both'> 

                    </div>
                    <button class="btn btn-success" id="add_coord" onclick="add_coordinate(1);"><i class="fa fa-plus"> <?php echo $this->lang->line('modal_add_coordinate'); ?></i></button>
                    <button class='btn btn-danger' onclick='remove_coordinate(event);'><i class='fa fa-close'> Remove Coordinate</i></button>

                    <br><br>
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
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_modal_edit_land'); ?></h4>
              </div>
              <div class="modal-body">
                <form role="form" id="land_edit_form" method="post" action="<?php echo base_url(); ?>index.php/lands/edit_land">

                  <input type="hidden" name="update_coord_size" id="update_coord_size" value="0"/>
                <input type="hidden" class="form-control" name="parcel_id" id="parcel_id" required>
				
				
				   <div class="form-group">
                    <label for="land_prep_id" class="form-label"><?php echo $this->lang->line('Prepared_land'); ?></label>
                      <select name="land_prep_edit" class="form-control" id="land_prep_edit" required />
                     
                     </select>
                   </div>
                    <div class="form-group">
                    <label for="woreda" class="form-label"><?php echo $this->lang->line('modal_woreda'); ?></label>
                      <select name="woreda_edit" class="form-control" id="woreda_edit" required>
                     
                     </select>
                   </div>
                    <div class="form-group">
                        <label for="block" class="form-label"><?php echo $this->lang->line('modal_block'); ?></label>
                        <input type="text" class="form-control" name="block_edit" id="block_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="parcel" class="form-label"><?php echo $this->lang->line('modal_parcel'); ?></label>
                        <input type="text" class="form-control" name="parcel_edit" id="parcel_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="desc" class="form-label"><?php echo $this->lang->line('modal_land_description'); ?></label>
                        <input type="text" class="form-control" name="desc_edit" id="desc_edit" placeholder="eg. MJ or IZ" required>
                    </div>

                    <div class="form-group">
                        <label for="area" class="form-label"><?php echo $this->lang->line('modal_area'); ?></label>
                        <input type="text" class="form-control" name="area_edit" id="area_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label"><?php echo $this->lang->line('modal_status'); ?></label>
                        <select name="status_edit" class="form-control" id="status_edit" required>
                         <option value="0"><?php echo $this->lang->line('modal_not_occupied'); ?></option>
                         <option value="1"><?php echo $this->lang->line('modal_occupied'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="land_type" class="form-label"><?php echo $this->lang->line('modal_land_type'); ?></label>
                        <select name="landType_edit" class="form-control" id="landType_edit" required>
                       
                       </select>
                    </div>

                  <!-- SELECT IMAGE FILE -->
                  <div class="form-group">
                      <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_land_image'); ?></label>
                      
                      <div>
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                  <img src="<?php echo base_url();?>uploads/file.png" id="land_src" alt="...">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                              <div>
                                  <span class="btn btn-white btn-file">
                                      <span class="fileinput-new"><?php echo $this->lang->line('modal_select_image'); ?></span>
                                      <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                      <input type="file" name="update_land_image" id="update_land_image" accept="image/*">
                                  </span>
                                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                              </div>
                          </div>
                      </div>
                  </div>

                    <div id="update_coordinates">

                    </div>

                    <button class="btn btn-success" id="update_add_coord" ><i class="fa fa-plus"> <?php echo $this->lang->line('modal_add_coordinate'); ?></i></button>
                    
                    <button class='btn btn-danger' onclick='update_remove_coordinate(event);'><i class='fa fa-close'> <?php echo $this->lang->line('modal_remove_coordinate'); ?></i></button>
                    <br><br>
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('modal_update'); ?></button>
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
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('remove_modal_delte_land'); ?></h4>
              </div>
              <div class="modal-body">
                <?php echo $this->lang->line('modal_remove_sure'); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_close'); ?></button>
                <button type="button" id="delete_button" class="btn btn-danger"><?php echo $this->lang->line('modal_delete_button'); ?></button>
              </div>
            </div>
          </div>
        </div>

<script>
            function open_confirm(id){
            $('#delete_modal').modal('toggle');
            $('#delete_button').attr("onclick","DeleteLand("+id+")");
             }

             
            function add_coordinate(item_size)
            {
              var item_counter = item_size;
                var coor_div = $('#coordinates');
                    
                    var form_item = "<div class='form-group coor"+item_size+"'>";
                    form_item += "<label for='coordinate' class='form-label'>Coordinate X"+ item_size +"</label>";
                    form_item += "<input type='text' class='form-control' id='coordinate_X"+item_size+"' name='coordinate_X"+item_size+"' placeholder='Enter Coordinates' required>";
                    form_item += "<label for='coordinate' class='form-label'>Coordinate Y"+ item_size +"</label>";
                    form_item += "<input type='text' class='form-control' id='coordinate_Y"+item_size+"' name='coordinate_Y"+item_size+"' placeholder='Enter Coordinates' required>";
                    form_item += "</div>";
                    $('#coordinates').append(form_item);
                    $('#coord_size').val(item_counter);
                    item_counter += 1;
                    $('#add_coord').attr("onclick","add_coordinate("+item_counter+")");
                    //var class_name = '.qty'+item_counter;
                   // console.log(class_name);
                    //$(class_name).empty()            
            }

            function update_add_coordinate(item_size)
            {
              var item_counter = item_size;
                var coor_div = $('#update_coordinates');
                    
                    var form_item = "<div class='form-group coor"+item_size+"'>";
                    form_item += "<label for='coordinate' class='form-label'>Coordinate X"+ item_size +"</label>";
                    form_item += "<input type='text' class='form-control' id='update_coordinate_X"+item_size+"' name='update_coordinate_X"+ item_size +"' placeholder='Enter Coordinates' required>";
                    form_item += "<label for='coordinate' class='form-label'>Coordinate Y"+ item_size +"</label>";
                    form_item += "<input type='text' class='form-control' id='update_coordinate_Y"+item_size+"' name='update_coordinate_Y"+ item_size +"' placeholder='Enter Coordinates' required>";
                    form_item += "</div>";
                    $('#update_coordinates').append(form_item);
                    $('#update_coord_size').val(item_counter);
                    item_counter += 1;
                    $('#update_add_coord').attr("onclick","update_add_coordinate("+item_counter+")");
                    //var class_name = '.qty'+item_counter;
                   // console.log(class_name);
                    //$(class_name).empty()            
            }

            function remove_coordinate(event)
            {
              event.preventDefault();
              var element_id = $('#coord_size').val();
              if(element_id == 1)
                showErrorMessage('Atleast one coordinate is needed !!');
              else if(element_id == 0)
                showErrorMessage('There are no coordinates to remove !!');
              else
              {
                $('#coordinates .coor'+element_id).remove();
              $('#add_coord').attr("onclick","add_coordinate("+element_id+")");
              $('#coord_size').val(element_id-1);
              }
            }

            function update_remove_coordinate(event)
            {
              event.preventDefault();
              var element_id = $('#update_coord_size').val();
              if(element_id == 1)
                showErrorMessage('Atleast one coordinate is needed !!');
              else
              {
                $('#update_coordinates .coor'+element_id).remove();
              $('#update_add_coord').attr("onclick","update_add_coordinate("+element_id+")");
              $('#update_coord_size').val(element_id-1);
              }
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