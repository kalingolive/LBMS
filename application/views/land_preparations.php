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

              <?php //echo $title; ?>
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

                    <ul class="nav navbar-right panel_toolbox">
                    <?php
                      if($this->session->userdata('role'))
                      {
                    ?>
                    <li><a href="<?php echo  base_url().'index.php/land_preparation/add_form' ?>" target="_blank"><button type="button" class="btn btn-success"><?php echo $this->lang->line('add_land_prep'); ?></button></a></li>
                    
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
                          <th><?php echo $this->lang->line('id'); ?></th>
						   <th><?php echo $this->lang->line('prep_land_desc'); ?></th>
                          <th><?php echo $this->lang->line('land_size'); ?></th>
                          <th><?php echo $this->lang->line('land_address'); ?></th>
                          <th><?php echo $this->lang->line('displaced_family'); ?></th>
                          <th><?php echo $this->lang->line('compensation'); ?></th>
                        <!--   <th><?php echo $this->lang->line('family_info'); ?></th> -->
                          
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
                        ?>
                        <tr>
                          <td><?php echo $row->id; ?></td>
						     <td><?php echo $row->description; ?></td>
                          <td><?php echo $row->land_size . " Sq. Meter"; ?></td>
                          <td><?php echo $row->address; ?></td>
                          <td><?php echo $row->no_family_displaced; ?></td>
                          <td><?php echo $row->compensation_estm . " Birr"; ?></td>
  
                          <td>

                          <a href="<?php echo base_url().'index.php/land_preparation/family_info/'.$row->id; ?>"><button type="button" class="btn btn-info btn-xs" ><i class="fa fa-users"> <?php echo $this->lang->line('action_add_family_info'); ?></i></button></a>

                          <a href="<?php echo base_url().'index.php/land_preparation/print_land/'.$row->id; ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> <?php echo $this->lang->line('action_view'); ?></a>

                          <?php
						  if(1)
                             //if($this->session->userdata('role') == 3)
                              {
                          ?>
                          <a href="<?php echo base_url().'index.php/land_preparation/view_land/'.$row->id; ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> <?php echo $this->lang->line('action_edit'); ?></a>
                          <button type="button"  class="btn btn-danger btn-xs"  onclick="open_confirm(<?php echo $row->id; ?>)" ><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('action_delete'); ?></button>
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