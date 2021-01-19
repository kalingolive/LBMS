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

            </div>

            <div id="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Land Preparation Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">



                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Land Bank Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                  </div>
                </div>
              </div>


              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Land Transfer Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form  method="post" id="add_prep_land_form" action="<?php echo base_url(); ?>index.php/land_preparation/add_land" >  
                      
                      <input type="hidden" name="report_type" id="report_type" value="2"/>
                       <div class="form-group">
                        <label for="search_date_from" class="form-label"><?php echo $this->lang->line('search_date_from'); ?></label>
                        <input class="date-picker form-control" type="date" name="search_date_from" id="search_date_from" required/>
                       </div>

                       <div class="form-group">
                        <label for="search_date_to" class="form-label"><?php echo $this->lang->line('search_date_to'); ?></label>
                        <input class="date-picker form-control" type="date" name="search_date_to" id="search_date_to" required/>
                       </div>

                       <div class="form-group">
                        <label for="search_land_use" class="form-label"><?php echo $this->lang->line('search_land_use'); ?></label>
                        <select class="form-control" name="search_land_use" id="search_land_use" required>
                        <option value=""><?php echo $this->lang->line('search_select_land_use'); ?></option>
                        <option value="commerce"><?php echo $this->lang->line('search_commerce'); ?></option>
                        <option value="mixed use"><?php echo $this->lang->line('search_mixed_use'); ?></option>
                        <option value="residential"><?php echo $this->lang->line('search_residential'); ?></option>
                        <option value="green area"><?php echo $this->lang->line('search_green_area'); ?></option>
                        <option value="service"><?php echo $this->lang->line('search_service'); ?></option>
                        <option value="manufacturing & storage "><?php echo $this->lang->line('search_manuf'); ?></option>
                        <option value="administrative"><?php echo $this->lang->line('search_administrative'); ?></option>
                        <option value="recreation"><?php echo $this->lang->line('search_recreation'); ?></option>
                        </select>
                    </div>

                        <div class="form-group">
                        <label for="displaced no of family" class="form-label"><?php echo $this->lang->line('search_land_type'); ?></label>
                          <input type="number" class="form-control" min="1" name="add_family_displaced" id="add_family_displaced" />
                       </div>

                        <div class="form-group">
                        <label for="compensation estimation" class="form-label"><?php echo $this->lang->line('search_land_size'); ?></label>
                          <input type="number" class="form-control" min="1" name="add_compensation" id="add_compensation" />
                       </div>

                       <div class="form-group">
                        <label for="compensation estimation" class="form-label"><?php echo $this->lang->line('search_woreda'); ?></label>
                          <input type="number" class="form-control" min="1" name="add_compensation" id="add_compensation" />
                       </div>

                       <div class="form-group">
                        <label for="compensation estimation" class="form-label"><?php echo $this->lang->line('search_sex'); ?></label>
                          <input type="number" class="form-control" min="1" name="add_compensation" id="add_compensation" />
                       </div>

                        <br><br>
                      <input type="submit" class="btn btn-success" name="submit" value="<?php echo $this->lang->line('search_generate'); ?>">    
                  
                    </form>


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


    <script>
    $('#search_date_from, #search_date_to').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log("start.toISOString(), end.toISOString(), label");
        });
    </script>
