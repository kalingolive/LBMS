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
                      if($this->session->userdata('role') == 4)
                      {
                    ?>
                    <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#bid_add_modal"><?php echo $this->lang->line('add_transfer'); ?></button></li>
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
                          <th><?php echo $this->lang->line('transferred_to'); ?></th>
                          <th><?php echo $this->lang->line('sex'); ?></th>
                          <th><?php echo $this->lang->line('area'); ?></th>
                          <th><?php echo $this->lang->line('land_use'); ?></th>
                          <th><?php echo $this->lang->line('bid_round'); ?></th>
                          <th><?php echo $this->lang->line('winning_letter'); ?></th>                        
                          <th><?php echo $this->lang->line('transfer_date'); ?></th>                                                                                                       
                          <th><?php echo $this->lang->line('actions'); ?></th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php foreach($transfer_data as $row)
                      {
                        ?>
                        <tr>
                          <td><?php echo $row->land_code; ?></td>
                          <td><?php echo $row->transferred_to; ?></td>
                          <td><?php echo $row->sex; ?></td>
                          <td><?php echo $row->transferred_area; ?></td>
                          <td><?php echo $row->land_use; ?></td>
                          <td><?php echo $row->bid_round; ?></td>
                          <td><?php if($row->winning_letter =! '') echo "<i class='fa fa-check-circle'> Available</i>"; else echo "<i class='fa fa-close'>Unavailable</i>"; ?></td>
                          
                          <td><?php echo $row->transfer_date; ?></td>
                          
                          <td>
                          <a href="<?php echo base_url().'index.php/bid_transfer/print_land/'.$row->land_code; ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> <?php echo $this->lang->line('action_view'); ?></a>

                          <?php
                             if($this->session->userdata('role') == 3)
                              {
                          ?>
                          <button type="button" class="btn btn-info btn-xs" data-toggle="modal" href="#" onclick="view_bid_transfer('<?php echo $row->land_code; ?>');"><i class="fa fa-pencil"></i> <?php echo $this->lang->line('action_edit'); ?></button>
                            <button type="button" class="btn btn-danger btn-xs"  onclick="open_confirm('<?php echo $row->land_code; ?>')" ><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('action_delete'); ?></button>
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
        <div class="modal fade" id="bid_add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_modal_title'); ?></h4>
              </div>
              <div class="modal-body">
                

                <form  method="post" action="<?php echo base_url(); ?>index.php/bid_transfer/add_transfer" >  
                  
                  <input type="hidden" name="coord_size" id="coord_size" value="0"/>
                  <input type="hidden" name="max_area" id="max_area"/>
                  <div class="form-group">
                    <label for="land" class="form-label"><?php echo $this->lang->line('modal_select_land'); ?></label>
                      <select name="land" class="form-control" id="land_add" required>
                       
                     </select>
                   </div>
                    <div class="form-group">
                        <label for="land_code" class="form-label"><?php echo $this->lang->line('modal_land_code'); ?></label>
                        <input type="text" class="form-control" name="land_code" id="land_code_add" required>
                    </div>

                    <div class="form-group">
                        <label for="trans_to" class="form-label"><?php echo $this->lang->line('modal_transferred_to'); ?></label>
                        <input type="text" class="form-control" name="trans_to" id="trans_to_add" required>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="form-label"><?php echo $this->lang->line('modal_sex'); ?></label>
                        <select class="form-control" name="sex" id="sex_add" required>
                        <option value="Male"><?php echo $this->lang->line('modal_male'); ?></option>
                        <option value="Female"><?php echo $this->lang->line('modal_female'); ?></option>
                        <option value="Other"><?php echo $this->lang->line('modal_other'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="area" class="form-label"><?php echo $this->lang->line('modal_area'); ?></label>
                        <input type="number" min="1" max="" class="form-control" name="area" id="area_add" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="proj_prop" class="form-label"><?php echo $this->lang->line('modal_bid_round'); ?></label>
                        <input type="text" class="form-control" name="bid_round" id="bid_round_add" placeholder="" required>
                    </div>

                     <div class="form-group">
                        <label for="land_use" class="form-label">Land Use</label>
                        <select class="form-control" name="land_use" id="land_use_add" required>
                        <option value="commerce"><?php echo $this->lang->line('modal_commerce'); ?></option>
                        <option value="mixed use"><?php echo $this->lang->line('modal_mixed_use'); ?></option>
                        <option value="residential"><?php echo $this->lang->line('modal_residential'); ?></option>
                        <option value="green area"><?php echo $this->lang->line('modal_green_area'); ?></option>
                        <option value="service"><?php echo $this->lang->line('modal_service'); ?></option>
                        <option value="manufacturing & storage "><?php echo $this->lang->line('modal_manuf'); ?></option>
                        <option value="administrative"><?php echo $this->lang->line('modal_administrative'); ?></option>
                        <option value="recreation"><?php echo $this->lang->line('modal_recreation'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="trans_date" class="form-label"><?php echo $this->lang->line('modal_transfer_date'); ?></label>
                        <input class="date-picker form-control" type="date" name="trans_date" id="trans_date_add" required/>
                    </div>


                    <!-- SELECT SITEPLAN IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_site_plan'); ?></label>
                        
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
                                        <input type="file" name="sitePlan_image" id="sitePlan_image_add" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SELECT WINNING LETTER IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_winning_letter'); ?></label>
                        
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
                                        <input type="file" name="winLetter_image" id="winLetter_image_add" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                       
                    <div id="coordinates" style='clear:both'> 

                    </div>
                    <button class="btn btn-success" id="add_coord" onclick="add_coordinate(1);"><i class="fa fa-plus"> <?php echo $this->lang->line('modal_add_coordinate'); ?></i></button>
                    <button class='btn btn-danger' onclick='remove_coordinate(event);'><i class='fa fa-close'> <?php echo $this->lang->line('modal_remove_coordinate'); ?></i></button>

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
        <div class="modal fade" id="bid_edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_modal_edit_land'); ?></h4>
              </div>
              <div class="modal-body">
                <form  method="post" action="<?php echo base_url(); ?>index.php/bid_transfer/edit_transfer" >  
                  
                  <input type="hidden" name="coord_size_edit" id="update_coord_size" value="0"/>
                  <input type="hidden" name="max_area_edit" id="max_area_edit"/>
                  <input type="hidden" name="edit_id" id="edit_id"/>
                  <div class="form-group">
                    <label for="land" class="form-label"><?php echo $this->lang->line('modal_select_land'); ?></label>
                      <select name="land_edit" class="form-control" id="land_edit" required>
                       
                     </select>
                   </div>
                    <div class="form-group">
                        <label for="land_code" class="form-label"><?php echo $this->lang->line('modal_land_code'); ?></label>
                        <input type="text" class="form-control" name="land_code_edit" id="land_code_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="trans_to" class="form-label"><?php echo $this->lang->line('modal_transferred_to'); ?></label>
                        <input type="text" class="form-control" name="trans_to_edit" id="trans_to_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="sex" class="form-label"><?php echo $this->lang->line('modal_sex'); ?></label>
                        <select class="form-control" name="sex_edit" id="sex_edit" required>
                        <option value="Male"><?php echo $this->lang->line('modal_male'); ?></option>
                        <option value="Female"><?php echo $this->lang->line('modal_female'); ?></option>
                        <option value="Other"><?php echo $this->lang->line('modal_other'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="area" class="form-label"><?php echo $this->lang->line('modal_area'); ?></label>
                        <input type="number" min="1" max="" class="form-control" name="area_edit" id="area_edit" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="proj_prop" class="form-label"><?php echo $this->lang->line('modal_bid_round'); ?></label>
                        <input type="text" class="form-control" name="bid_round_edit" id="bid_round_edit" placeholder="" required>
                    </div>

                     <div class="form-group">
                        <label for="land_use" class="form-label">Land Use</label>
                        <select class="form-control" name="land_use_edit" id="land_use_edit" required>
                        <option value="commerce"><?php echo $this->lang->line('modal_commerce'); ?></option>
                        <option value="mixed use"><?php echo $this->lang->line('modal_mixed_use'); ?></option>
                        <option value="residential"><?php echo $this->lang->line('modal_residential'); ?></option>
                        <option value="green area"><?php echo $this->lang->line('modal_green_area'); ?></option>
                        <option value="service"><?php echo $this->lang->line('modal_service'); ?></option>
                        <option value="manufacturing & storage "><?php echo $this->lang->line('modal_manuf'); ?></option>
                        <option value="administrative"><?php echo $this->lang->line('modal_administrative'); ?></option>
                        <option value="recreation"><?php echo $this->lang->line('modal_recreation'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="trans_date" class="form-label"><?php echo $this->lang->line('modal_transfer_date'); ?></label>
                        <input class="date-picker form-control" type="date" name="trans_date_edit" id="trans_date_edit" required/>
                    </div>


                    <!-- SELECT SITEPLAN IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_site_plan'); ?></label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                     <img src="<?php echo base_url();?>uploads/file.png" id="site_src" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo $this->lang->line('modal_select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                        <input type="file" name="sitePlan_image_edit" id="sitePlan_image_edit" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SELECT WINNING LETTER IMAGE -->
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('modal_winning_letter'); ?></label>
                        
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                     <img src="<?php echo base_url();?>uploads/file.png" id="win_src" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo $this->lang->line('modal_select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                        <input type="file" name="winLetter_image_edit" id="winLetter_image_edit" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                       
                    <div id="update_coordinates" style='clear:both'> 

                    </div>
                    <button class="btn btn-success" id="update_add_coord"><i class="fa fa-plus"> <?php echo $this->lang->line('modal_add_coordinate'); ?></i></button>
                    <button class='btn btn-danger' onclick='update_remove_coordinate(event);'><i class='fa fa-close'> <?php echo $this->lang->line('modal_remove_coordinate'); ?></i></button>

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
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('remove_modal_reclaim_land'); ?></h4>
              </div>
              <div class="modal-body">
                <?php echo $this->lang->line('modal_remove_sure'); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_close'); ?></button>
                <button type="button" id="delete_button" class="btn btn-danger"><?php echo $this->lang->line('modal_reclaim_button'); ?></button>
              </div>
            </div>
          </div>
        </div>

<script>
            function open_confirm(id){
            $('#delete_modal').modal('toggle');
            $('#delete_button').attr("onclick","DeleteBid('"+id+"')");
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


//****************************************************
        $('#land_add').change(function(){
            var id = $(this).val();
            var url = window.location.replace = "alloc_transfer/get_land_size/"+id
            $.ajax({
              url: url,
              cache: false,
              success: function(response){

                var data = JSON.parse(response);
               // console.log(data[0].area_size);
                $('#area_add').attr({
                  "min": 1,
                  "max": data[0].area_size
                });
                $('#max_area').val(data[0].area_size);
              }
            });
        });

        $('#reclaim_date_add').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log("start.toISOString(), end.toISOString(), label");
        });

        $('#reclaim_date_edit').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log("start.toISOString(), end.toISOString(), label");
        });

        $('#trans_date_add').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log("start.toISOString(), end.toISOString(), label");
        });

        $('#trans_date_edit').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log("start.toISOString(), end.toISOString(), label");
        });

      });
    </script>
    <!-- /Datatables -->