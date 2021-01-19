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
                    <!-- <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_woreda_modal"><?php echo $this->lang->line('add_woreda'); ?></button></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                   <!--  <?php
                    echo "<pre>";
                     print_r($family_data);
                    echo "</pre>"; 
                    ?> -->

                      <div class="col-sm-5 col-md-5 col-xs-5">

                      <p class="pull-center">Add Family Info</p>

                             <form  method="post" id="add_family_info_form" action="<?php echo base_url(); ?>index.php/land_preparation/add_family_info" >  
                            
                            <input type="hidden" name="land_id" value="<?php echo $land_id; ?>" />
                             <div class="form-group">
                              <label for="land size" class="form-label"><?php echo $this->lang->line('add_owner_name'); ?></label>
                                <input type="text" class="form-control" name="add_owner_name" id="add_owner_name" />
                             </div>

                             <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_partner_name'); ?></label>
                                <input type="text" class="form-control" name="add_partner_name" id="add_partner_name" />
                             </div>

                              <div class="form-group">
                              <label for="displaced no of family" class="form-label"><?php echo $this->lang->line('add_family_size'); ?></label>
                                <input type="number" class="form-control" min="1" name="add_family_size" id="add_family_size" />
                             </div>

                             <!-- SELECT CONFIRMATION IMAGE -->
                              <div class="form-group">
                                  <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_conf_document'); ?></label>
                                  
                                  <div class="col-sm-6">
                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="http://placehold.it/200x200" alt="...">
                                          </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                          <div>
                                              <span class="btn btn-white btn-file">
                                                  <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                                  <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                  <input type="file" name="land_conf_image" id="land_conf_image" accept="image/*">
                                              </span>
                                              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              <!-- SELECT FAMILY SIZE CONFIRMATION IMAGE -->
                              <div class="form-group">
                                  <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_size_conf'); ?></label>
                                  
                                  <div class="col-sm-6">
                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="http://placehold.it/200x200" alt="...">
                                          </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                          <div>
                                              <span class="btn btn-white btn-file">
                                                  <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                                  <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                  <input type="file" name="size_conf_image" id="size_conf_image" accept="image/*">
                                              </span>
                                              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!-- SELECT ID CARD IMAGE -->
                              <div class="form-group">
                                  <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_id_card_image'); ?></label>
                                  
                                  <div class="col-sm-6">
                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="http://placehold.it/200x200" alt="...">
                                          </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                          <div>
                                              <span class="btn btn-white btn-file">
                                                  <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                                  <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                  <input type="file" name="id_card_image" id="id_card_image" accept="image/*">
                                              </span>
                                              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <hr />

                              <p style='clear:both'>Add Family Land Info</p>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_assigned_id'); ?></label>
                                <input type="text" class="form-control" name="add_assigned_id" id="add_assigned_id" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_address'); ?></label>
                                <input type="text" class="form-control" name="add_family_land_address" id="add_family_land_address" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_type'); ?></label>
                                <select class="form-control" name="add_family_land_type" id="add_family_land_type" >
                                <option value="farm">Urban Farm</option>
                                <option value="residence">Residence</option>
                                <option value="both">Both</option>
                                </select>
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_taken_size'); ?></label>
                                <input type="number" class="form-control" name="add_family_land_taken_size" id="add_family_land_taken_size" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_left_size'); ?></label>
                                <input type="number" class="form-control" name="add_family_land_left_size" id="add_family_land_left_size" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_residence'); ?></label>
                                <input type="number" class="form-control" name="add_family_comps_residence" id="add_family_comps_residence" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_farm'); ?></label>
                                <input type="number" class="form-control" name="add_family_comps_farm" id="add_family_comps_farm" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_paid'); ?></label>
                                <input type="number" class="form-control" name="add_family_comps_paid" id="add_family_comps_paid" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_unpaid'); ?></label>
                                <input type="number" class="form-control" name="add_family_comps_unpaid" id="add_family_comps_unpaid" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_residence_given_size'); ?></label>
                                <input type="number" class="form-control" name="add_family_residence_given_size" id="add_family_residence_given_size" />
                              </div>

                              <div class="form-group">
                              <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_farm_given_size'); ?></label>
                                <input type="number" class="form-control" name="add_family_farm_given_size" id="add_family_farm_given_size" />
                              </div>

                                 
                              <div style='clear:both'> </div>
                              <br><br>
                            <input type="submit" class="btn btn-success" name="submit" value="<?php echo $this->lang->line('modal_save'); ?>">  
                            <input type="reset" class="btn btn-primary" name="clear" value="<?php echo $this->lang->line('modal_clear'); ?>">  
                          

                          </form>
                      </div>

                      <div class="col-sm-6 col-md-6 col-xs-6">
                        <p class="pull-center">Family Information</p>

                        <!-- start accordion -->
                          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            
                            <?php 
                            $i = 1;
                             foreach ($family_data as $family) {
                            ?>
                            <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i; ?>">
                                <h4 class="panel-title"><strong>Family #<?php echo $i." ".$family->owner_name; ?></strong> </h4>
                              </a>
                              <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">

                                      <form  method="post" id="update_family_info_form" action="<?php echo base_url(); ?>index.php/land_preparation/update_family_info" >  
                                       <div class="form-group">
                                        <label for="land size" class="form-label"><?php echo $this->lang->line('add_owner_name'); ?></label>
                                          <input type="text" class="form-control" name="update_owner_name" id="update_owner_name" value="<?php echo $family->owner_name; ?>" />
                                       </div>

                                       <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_partner_name'); ?></label>
                                          <input type="text" class="form-control" name="update_partner_name" id="update_partner_name" value="<?php echo $family->partner_name; ?>" />
                                       </div>

                                        <div class="form-group">
                                        <label for="displaced no of family" class="form-label"><?php echo $this->lang->line('add_family_size'); ?></label>
                                          <input type="number" class="form-control" min="1" name="update_family_size" id="update_family_size" value="<?php echo $family->size_of_family; ?>" />
                                       </div>

                                       <!-- SELECT CONFIRMATION IMAGE -->
                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_conf_document'); ?></label>
                                            
                                            <div class="col-sm-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                        <img src="<?php echo base_url().'uploads/preparation/displaced_family/'.$family->conf_document; ?>" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                                            <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                            <input type="file" name="land_conf_image" id="land_conf_image" accept="image/*">
                                                        </span>
                                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- SELECT FAMILY SIZE CONFIRMATION IMAGE -->
                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_size_conf'); ?></label>
                                            
                                            <div class="col-sm-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                        <img src="<?php echo base_url().'uploads/preparation/displaced_family/'.$family->family_size_conf; ?>" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                                            <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                            <input type="file" name="size_conf_image" id="size_conf_image" accept="image/*">
                                                        </span>
                                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SELECT ID CARD IMAGE -->
                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_id_card_image'); ?></label>
                                            
                                            <div class="col-sm-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                        <img src="<?php echo base_url().'uploads/preparation/displaced_family/'.$family->id_card; ?>" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                                            <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                                            <input type="file" name="id_card_image" id="id_card_image" accept="image/*">
                                                        </span>
                                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <p style='clear:both'>Add Family Land Info</p>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_assigned_id'); ?></label>
                                          <input type="text" class="form-control" name="update_assigned_id" id="update_assigned_id" value="<?php echo $family->assigned_id; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_address'); ?></label>
                                          <input type="text" class="form-control" name="update_family_land_address" id="update_family_land_address" value="<?php echo $family->address; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_type'); ?></label>
                                          <select class="form-control" name="update_family_land_type" id="update_family_land_type" >
                                          <option <?php if($family->taken_land_type == "farm") echo "selected" ?> value="farm">Urban Farm</option>
                                          <option <?php if($family->taken_land_type == "residence") echo "selected" ?> value="residence">Residence</option>
                                          <option <?php if($family->taken_land_type == "both") echo "selected" ?> value="both">Both</option>
                                          </select>
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_taken_size'); ?></label>
                                          <input type="number" class="form-control" name="update_family_land_taken_size" id="update_family_land_taken_size" value="<?php echo $family->land_taken_size; ?>"  />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_land_left_size'); ?></label>
                                          <input type="number" class="form-control" name="update_family_land_left_size" id="update_family_land_left_size" value="<?php echo $family->land_left_size; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_residence'); ?></label>
                                          <input type="number" class="form-control" name="update_land_address" id="update_family_comps_residence" value="<?php echo $family->comps_for_residence; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_farm'); ?></label>
                                          <input type="number" class="form-control" name="update_family_comps_farm" id="update_family_comps_farm" value="<?php echo $family->comps_for_farm; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_paid'); ?></label>
                                          <input type="number" class="form-control" name="update_family_comps_paid" id="update_family_comps_paid" value="<?php echo $family->comps_paid; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_comps_unpaid'); ?></label>
                                          <input type="number" class="form-control" name="update_family_comps_unpaid" id="update_family_comps_unpaid" value="<?php echo $family->comps_unpaid; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_residence_given_size'); ?></label>
                                          <input type="number" class="form-control" name="update_family_residence_given_size" id="update_family_residence_given_size" value="<?php echo $family->residence_given_land_size; ?>" />
                                        </div>

                                        <div class="form-group">
                                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_family_farm_given_size'); ?></label>
                                          <input type="number" class="form-control" name="update_family_farm_given_size" id="update_family_farm_given_size" value="<?php echo $family->farm_given_land_size; ?>" />
                                        </div>

                                           
                                        <div style='clear:both'> </div>
                                        <br><br>
                                      <input type="submit" class="btn btn-success" name="submit" value="<?php echo $this->lang->line('modal_save'); ?>"> 

                                      <input type="button" class="btn btn-danger" name="clear" value="<?php echo $this->lang->line('family_remove'); ?>">  
                                    

                                    </form>
                                </div>
                              </div>
                            </div>

                            <?php
                            $i++;
                             }
                            ?>


                          </div>

                      </div>

                    </div>
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