<?php
 include_once 'header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Land Bank Management</small></h3>
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
                    <h2>Blocks</h2>
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
                    <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_modal">Add New Block</button></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         <th>Id</th>
                          <th>Block Id</th>
                          <th>Woreda Id</th>
                          
                          <th>Actions</th>
                        </tr>
                      </thead>


                      <tbody>

                        <tr>
                          <td>1</td>
                          <td>Block 1</td>
                          <td>Woreda 1</td>
                          <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_modal">View</button>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>2</td>
                          <td>Block 2</td>
                          <td>Woreda 1</td>
                          <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_modal">View</button>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
                          </td>
                         </tr>
                         <tr>
                          <td>3</td>
                          <td>Block 3</td>
                          <td>Woreda 1</td>
                          <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_modal">View</button>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
                          </td>
                        </tr>
                         <tr>
                          <td>4</td>
                          <td>Block 1</td>
                          <td>Woreda 2</td>
                          <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_modal">View</button>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
                          </td>
                        </tr>
                         <tr>
                          <td>5</td>
                          <td>Block 2</td>
                          <td>Woreda 2</td>
                          <td>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_modal">View</button>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_modal">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
                          </td>
                        </tr>
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
                <h4 class="modal-title" id="myModalLabel">Add New Land</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                <h4 class="modal-title" id="myModalLabel">Edit Land</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                <h4 class="modal-title" id="myModalLabel">Delete Land</h4>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Yes Delete</button>
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
    </script>
    <!-- /Datatables -->