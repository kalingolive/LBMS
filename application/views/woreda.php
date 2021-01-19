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
                    <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_woreda_modal"><?php echo $this->lang->line('add_woreda'); ?></button></li>
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
                          <th><?php echo $this->lang->line('woreda_title'); ?></th>
                          <th><?php echo $this->lang->line('woreda_description'); ?></th>
                          
                          <th><?php echo $this->lang->line('actions'); ?></th>
                        </tr>
                      </thead>


                      <tbody>
                  <?php foreach($woreda_data as $row)
                      {
                        ?>
                        <tr>
                          <td><?php echo $row->id; ?></td>
                          <td><?php echo $row->title; ?></td>
                          <td><?php echo $row->description; ?></td>
                          <td>
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" href="#" onclick="view_woreda(<?php echo $row->id; ?>);"><i class="fa fa-folder"></i>  <?php echo $this->lang->line('action_view'); ?></button>
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
        <div class="modal fade" id="add_woreda_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_modal_title'); ?></h4>
              </div>
              <div class="modal-body">
                

                <form id="add_woreda"  method="post" action="<?php echo base_url(); ?>index.php/woreda/add_woreda" >  
                  
                    <div class="form-group">
                        <label for="woreda_title" class="form-label"><?php echo $this->lang->line('modal_title'); ?></label>
                        <input type="text" class="form-control" name="woreda_title" id="woreda_title_add" required>
                    </div>

                    <div class="form-group">
                        <label for="woreda_desc" class="form-label"><?php echo $this->lang->line('modal_description'); ?></label>
                        <input type="text" class="form-control" name="woreda" id="woreda_desc_add" required>
                    </div>

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
        <div class="modal fade" id="edit_woreda_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_modal_edit_woreda'); ?></h4>
              </div>
              <div class="modal-body">
                <form id="edit_woreda"  method="post" action="<?php echo base_url(); ?>index.php/woreda/edit_woreda" >  
                  
                    <input type="hidden" class="form-control" name="woreda_id" id="woreda_id" required>
                    <div class="form-group">
                        <label for="woreda_title" class="form-label"><?php echo $this->lang->line('modal_title'); ?></label>
                        <input type="text" class="form-control" name="woreda_title" id="woreda_title_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="woreda_desc" class="form-label"><?php echo $this->lang->line('modal_description'); ?></label>
                        <input type="text" class="form-control" name="woreda" id="woreda_desc_edit" required>
                    </div>

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
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('remove_modal_delete_woreda'); ?></h4>
              </div>
              <div class="modal-body">
                <?php echo $this->lang->line('modal_remove_sure'); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_close'); ?></button>
                <button id="delete_button" type="button" class="btn btn-danger"><?php echo $this->lang->line('modal_delete_button'); ?></button>
              </div>
            </div>
          </div>
        </div>





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

        function open_confirm(id){
            $('#delete_modal').modal('toggle');
            $('#delete_button').attr("onclick","DeleteWoreda('"+id+"')");
             }
    </script>
    <!-- /Datatables -->