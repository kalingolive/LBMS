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

                    ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                      <form  method="post" id="edit_prep_land_form" action="<?php echo base_url(); ?>index.php/land_preparation/edit_land" >  
                      
                      <input type="hidden" name="update_coord_size" id="update_coord_size" value="0"/>
                      <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $land_data['land_detail'][0]->id; ?>"/>
                       <div class="form-group">
                        <label for="land size" class="form-label"><?php echo $this->lang->line('prep_land_desc'); ?></label>
                          <input type="text" class="form-control"  value="<?php echo $land_data['land_detail'][0]->description; ?>" name="update_land_desc" id="update_land_desc" />
                       </div>

					   <div class="form-group">
                        <label for="land size" class="form-label"><?php echo $this->lang->line('add_land_size'); ?></label>
                          <input type="number" class="form-control" min="1" value="<?php echo $land_data['land_detail'][0]->land_size; ?>" name="update_land_size" id="update_land_size" />
                       </div>

                       <div class="form-group">
                        <label for="Address" class="form-label"><?php echo $this->lang->line('add_land_address'); ?></label>
                          <input type="text" class="form-control" value="<?php echo $land_data['land_detail'][0]->address; ?>" name="update_land_address" id="update_land_address" />
                       </div>

                        <div class="form-group">
                        <label for="displaced no of family" class="form-label"><?php echo $this->lang->line('add_displaced_family'); ?></label>
                          <input type="number" class="form-control" min="1" value="<?php echo $land_data['land_detail'][0]->no_family_displaced; ?>" name="update_family_displaced" id="update_family_displaced" />
                       </div>

                        <div class="form-group">
                        <label for="compensation estimation" class="form-label"><?php echo $this->lang->line('add_compensation'); ?></label>
                          <input type="number" class="form-control" min="1" value="<?php echo $land_data['land_detail'][0]->compensation_estm; ?>" name="update_compensation" id="update_compensation" />
                       </div>


                        <!-- SELECT LAND IMAGE -->
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"><?php echo $this->lang->line('add_land_image'); ?></label>
                            
                            <div class="col-sm-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                        <img src="<?php echo base_url()."uploads/preparation/".$land_data['land_detail'][0]->img_src?>" id="land_src" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new"><?php echo $this->lang->line('add_select_image'); ?></span>
                                            <span class="fileinput-exists"><?php echo $this->lang->line('modal_change'); ?></span>
                                            <input type="file" name="update_land_image" id="update_land_image" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line('modal_remove'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                        <div id="update_coordinates" style='clear:both'>

                        </div>
                        <button class="btn btn-success" id="update_add_coord" onclick="update_add_coordinate(1);"><i class="fa fa-plus"><?php echo $this->lang->line('add_coordinate'); ?> </i></button>
                        <button class='btn btn-danger' onclick='update_remove_coordinate(event);'><i class='fa fa-close'> <?php echo $this->lang->line('remove_coordinate'); ?></i></button>

                        <br><br>
                      <input type="submit" class="btn btn-success" name="submit" value="<?php echo $this->lang->line('modal_save'); ?>">  
                      <input type="reset" class="btn btn-primary" name="clear" value="<?php echo $this->lang->line('modal_clear'); ?>">  
                    

                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->


<script>

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

  function load_content()
  {
    var obj = JSON.parse('<?php echo $land_data_json; ?>');
    var item_size = (obj['land_coord'].length / 2);

  var item_counter = 0;
  $('#update_coordinates').html('');
  for(var i=1;i<=item_size;i++)
  {
      if(item_counter != 0)
          item_counter++;

  var coor_div = $('#coordinates');                
  var form_item = "<div class='form-group coor"+i+"'>";
  form_item += "<label for='coordinate' class='form-label'>Coordinate X"+ i +"</label>";
  form_item += "<input type='text' class='form-control' id='update_coordinate_X"+i+"' name='update_coordinate_X"+i+"' value='"+ obj['land_coord'][item_counter].coordinate +"' placeholder='Enter Coordinates' required>";
  form_item += "<label for='coordinate' class='form-label'>Coordinate Y"+ i +"</label>";
  form_item += "<input type='text' class='form-control' id='update_coordinate_Y"+i+"' name='update_coordinate_Y"+i+"' value='"+ obj['land_coord'][item_counter+1].coordinate +"' placeholder='Enter Coordinates' required>";            
  form_item += "</div>";
  $('#update_coordinates').append(form_item);
  $('#update_add_coord').attr("onclick","update_add_coordinate("+(i+1)+")");
  item_counter++;
  }


  $('#update_coord_size').val(item_size);
  }

</script>



<?php
 include_once 'footer.php';
?>


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
            load_content();
      });
    </script>
    <!-- /Datatables -->