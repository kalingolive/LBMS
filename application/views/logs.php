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
                    <h2><?php echo $this->lang->line('logs'); ?></h2>

                    <ul class="nav navbar-right panel_toolbox">
              
                      <div class="col-md-6">
                        <fieldset>
                          <label><?php echo $this->lang->line('from'); ?></label>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="From" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        </div>
           

                        <div class="col-md-6">
                        <fieldset>
                        <label><?php echo $this->lang->line('to'); ?></label>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="To" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                             
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      <!--   <button type="button" class="btn btn-success" onclick="add_form()">Search</button> -->
                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     <?php echo $this->lang->line('description'); ?>
                    </p>

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Login Activities</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">System Activities</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                            <table id="datatable-buttons1" class="table table-striped table-bordered">
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
                          <?php foreach($login_data as $row)
                              {
                                ?>
                                <tr>
                                  <td><?php echo $row->log_id; ?></td>
                                  <td><?php echo $row->user ." "; if($row->privilage == 1) echo "<span class='label label-success'>Head Officer</span>"; elseif($row->privilage == 3) echo "<span class='label label-danger'>System Admin</span>"; elseif($row->privilage == 2) echo "<span class='label label-warning'>Land Bank Officer</span>"; elseif($row->privilage == 4) echo "<span class='label label-warning'>Land Transfer Officer</span>"; else echo "<span class='label label-default'>Other</span>"; ?></td>
                                  <td><?php echo $row->ip_address; ?></td>
                                  <td style="color: <?php if($row->level == 1) echo "#5CB85C"; elseif($row->level == 2) echo "#F0AD4E"; elseif($row->level == 3) echo "#D9534F"; ?>;"><?php echo $row->action; ?></td>
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
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">
                            <table id="datatable-buttons2" class="table table-striped table-bordered">
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
                          </div>

                        </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
 include_once 'footer.php';
?>


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var oTable1 = null;
        var oTable2 = null;
        var handleDataTableButtons1 = function() {
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
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
              order: [[ 0, "desc" ]],
              responsive: false
            });
          }
        };

        var handleDataTableButtons2 = function() {
          if ($("#datatable-buttons2").length) {
            $("#datatable-buttons2").DataTable({
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
              order: [[ 0, "desc" ]],
              responsive: false
            });
          }
        };

        TableManageButtons1 = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons1();
            }
          };
        }();

        TableManageButtons2 = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons2();
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

        // $datatable.dataTable({
        //   'order': [[ 1, 'asc' ],[7, 'desc'],[8, 'desc']],
        //   'columnDefs': [
        //     { orderable: true, targets: [0] }
        //   ]
        // });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons2.init();
        TableManageButtons1.init();

        var date_range = '';
        var from = '';
        var to = '';

        // $('#reservation').daterangepicker(null, function(start, end, label) {
        //   //console.log(start.toISOString(), end);
        // }).change(function() {
        //  // minDateFilter = new Date(this.value).getTime();
        //   oTable2.fnDraw();
        //   date_range = $("#reservation").val();
        //   date_range = date_range.split('-');
        //   from = date_range[0].trim();
        //   to = date_range[1].trim();
        //   console.log(from);
        // });

         $('#single_cal1').daterangepicker({
          singleDatePicker: true,
          locale: {
            format: 'YYYY-MM-DD'
          },
          singleClasses: "picker_1"
        }).change(function() {
           from = this.value;
           $("#datatable-buttons2").dataTable().DataTable().draw();
          console.log(to);
        });

        $('#single_cal2').daterangepicker({
          singleDatePicker: true,
          locale: {
            format: 'YYYY-MM-DD'
          },
          singleClasses: "picker_1"
        }).change(function() {
           to = this.value;
           $("#datatable-buttons2").dataTable().DataTable().draw();
           $("#datatable-buttons1").dataTable().DataTable().draw();
          console.log(from);
        });

        $.fn.dataTableExt.afnFiltering.push(

          function (oSettings, aData, iDataIndex) {
              if ((from.length > 0 && from !== '') || (to.length > 0 && to !== '')) {
                  var today = new Date();
                  var dd = today.getDate();
                  var mm = today.getMonth();
                  var yyyy = today.getFullYear();
                  if (dd < 10) dd = '0' + dd;

                  if (mm < 10) mm = '0' + mm;

                  today = yyyy + '-' + mm + '-' + dd;
                  var minVal = from;
                  var maxVal = to;
                  if (minVal !== '' || maxVal !== '') {
                      var iMin_temp = minVal;
                      if (iMin_temp === '') {
                          iMin_temp = '1980-01-01';
                        }

                      var iMax_temp = maxVal;
                      if (iMax_temp === '') {
                          iMax_temp = '2050-01-01';
                      }

                      var iMin= '';
                      if (iMin_temp != '') {
                          iMin = iMin_temp;
                         // console.log('min = '+iMin);
                      }

                       var iMax= '';
                      if (iMax_temp != '') {
                          iMax = iMax_temp;
                         // console.log('max = '+iMax);
                      }
                      else if (IMax < IMin)
                      {
                        iMax = '2050-01-01';
                      }

                      var iDate = aData[6];
                  
                      if (iMin === "" && iMax === "") {
                          return true;
                      } else if (iMin === "" && iDate < iMax) {
                          // alert("inside max values"+iDate);
                          return true;
                      } else if (iMax === "" && iDate >= iMin) {
                          // alert("inside max value is null"+iDate);                    
                          return true;
                      } else if (iMin <= iDate && iDate <= iMax) {
                        //  alert("inside both values"+iDate);
                          return true;
                      }
                      return false;
                  }
              }
              return true;
          });

        

      

      });
    </script>
    <!-- /Datatables -->