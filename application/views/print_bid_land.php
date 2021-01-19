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
                    <h2><?php echo $this->lang->line('view_sub_title'); ?></h2>

                    <ul class="nav navbar-right panel_toolbox">

                    <li><button type="button" class="btn btn-success" id="print_button"><?php echo $this->lang->line('view_print_land'); ?></button></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                 <!--  <?php
                    echo "<pre>";
                    print_r($land_details);
                    echo "</pre>";
                  ?> --> 

                  <div id="land_details">

                      <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title"><strong><?php echo $this->lang->line('view_land_details'); ?></strong></h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">

                            <h4><?php echo $this->lang->line('view_land_location'); ?> : <b><?php echo $land_details['land_detail'][0]->w_description ."(".$land_details['land_detail'][0]->w_title . ")"; ?></b></h4>
                            <h4><?php echo $this->lang->line('view_block'); ?> : <b><?php echo $land_details['land_detail'][0]->b_title; ?></b></h4>
                           <!--  <h3>Parcel : <b><?php echo $land_details['land_detail'][0]->parcel; ?></b></h3> -->
                            <h4><?php echo $this->lang->line('view_land_bank_code'); ?> : <b><?php echo $land_details['land_detail'][0]->landbank_code; ?></b></h4>
                            <h4><?php echo $this->lang->line('view_land_code'); ?> : <b><?php echo $land_details['land_detail'][0]->land_code; ?></b></h3>
                            <h4><?php echo $this->lang->line('view_area'); ?> : <b><?php echo $land_details['land_detail'][0]->transferred_area . " K.M"; ?></b></h4>
                            <h4><?php echo $this->lang->line('view_transfer_type'); ?> : <b>Bid</b></h3>
                            <h4><?php echo $this->lang->line('view_transferred_to'); ?> : <b><?php echo $land_details['land_detail'][0]->transferred_to ; ?></b></h4>
                            <h4><?php echo $this->lang->line('view_sex'); ?>: <b><?php echo $land_details['land_detail'][0]->sex ; ?></b></h3>
                
                            <h4><?php echo $this->lang->line('view_bid_round'); ?> : <b><?php echo $land_details['land_detail'][0]->bid_round; ?></b></h4>
                            <h4><?php echo $this->lang->line('view_land_use'); ?>: <b><?php echo $land_details['land_detail'][0]->land_use; ?></b></h4>
                            <!-- <h3>Bank Statement : <b><?php if($land_details['land_detail'][0]->bank_statement == 1) echo "Available"; else echo "Not Available"; ?></b></h3>
                            <h3>Compensation : <b><?php if($land_details['land_detail'][0]->compensation == 1) echo "Available"; else echo "Not Available"; ?></b></h3> -->
                          
                            <h4><?php echo $this->lang->line('view_transfer_date'); ?> : <b><?php echo $land_details['land_detail'][0]->transfer_date ; ?></b></h4>

                          </div>
                        </div>
                      </div>

                      <div class="panel winning_image">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title"><strong><?php echo $this->lang->line('view_winning_letter'); ?></strong></h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">

                          <img class="img-responsive" style="border: 4px solid #26B99A; " src="<?php echo base_url().''.$land_details['land_detail'][0]->winning_letter; ?>" alt="Not Avaialable" />
                          
                          </div>
                        </div>
                      </div>

                      <div class="panel site_image">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title"><strong><?php echo $this->lang->line('view_site_plan'); ?></strong></h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">

                            <img class="img-responsive" style="border: 4px solid #26B99A; " src="<?php echo base_url().''.$land_details['land_detail'][0]->siteplan; ?>" alt="Not Avaialable" />
                              
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <h4 class="panel-title"><strong><?php echo $this->lang->line('view_title_deed'); ?></strong></h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">

                            <img class="img-responsive" style="border: 4px solid #26B99A; " src="<?php echo base_url().''.$land_details['land_detail'][0]->title_deed; ?>" alt="Not Avaialable" />
                              
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          <h4 class="panel-title"><strong><?php echo $this->lang->line('view_land_coordinates'); ?></strong></h4>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">

                            <table class="table table-striped table-bordered" style="width: 40%">
                              <thead>
                              <tr>
                               <th>#</th>
                               <th>X</th>
                               <th>Y</th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $counter = 1;
                                 $coordinates = array();
                                   for($i = 0; $i < sizeof($land_details['land_coord']); $i++)
                                   {
                                     echo "<tr>";
                                     echo "<td>" . $counter . "</td>";
                                     echo "<td>" . $land_details['land_coord'][$i]->coordinate . "</td>";
                                     echo "<td>" . $land_details['land_coord'][$i+1]->coordinate . "</td>";
                                     //$coordinates['X'.$counter] = $land_details['land_coord'][$i]->coordinate;                        
                                     $coordinates[$counter] = $controller->UTMtoGeog($land_details['land_coord'][$i]->coordinate, $land_details['land_coord'][$i+1]->coordinate, 37);
                                     echo "</tr>";
                                     $i += 1;
                                     $counter += 1;
                                   }
                                   echo "<input type='hidden' id='coords' value='".json_encode($coordinates)."' />";
                                 ?>
                              </tbody>
                              </table>

                          </div>
                        </div>
                      </div>

<link href='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js'></script>

                      <div class="panel map_location">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          <h4 class="panel-title"><strong><?php echo $this->lang->line('view_map_location'); ?></strong></h4>
                        </a>
                        <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">

                            <div id="map" style="width: 100%;height: 700px;">

                            </div>

                          </div>
                        </div>
                      </div>

                     </div> 
                </div>
              </div>

            </div>
          </div>
        </div>
		<script src="<?php echo base_url(); ?>assets/Assets/vendors/jquery/dist/jquery.min.js"></script>
	
        <!-- /page content 
<link href="<?php //echo base_url(); ?>assets/css/maps/map.css"
rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/map.api.js"></script>
<script src="<?php //echo base_url(); ?>assets/Assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

$(function(){
  var map;
  var coord_array = $('#coords').val();
     coord_array = JSON.parse(coord_array);
    console.log(coord_array);
    initialize();
    function initialize()
    {       
    var mapOptions =
    {
        zoom: 15,
        center: new google.maps.LatLng(coord_array[1][0], coord_array[1][1]),
        mapTypeId: google.maps.MapTypeId.SATELLITE,
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);


    var size = Object.keys(coord_array).length;
    console.log(size);
    for(var i = 1; i <= size; i++)
        {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(coord_array[i][0], coord_array[i][1]),
                map: map,
                title: 'test',
            });
           // console.log(coord_array[1][0]);
        }
     };

     function resetMap(m) {
        x = m.getZoom(); 
        c = m.getCenter();
        google.maps.event.trigger(m, 'resize');
        m.setZoom(x);
        m.setCenter(c);
    };

    $('.map_location').click(function() {
      resetMap(map);
      });

            $('#print_button').click(function(){
              $('.panel-collapse').removeClass('in');
              $('.panel-collapse').addClass('in');
              
                resetMap(map);
              $('#land_details').printThis({
                 header : "Land Bank Management System -- Land Details",
                 printContainer: false,
                 debug: true,
                 importStyle: true,
              });
            });
        });
    // google.maps.event.addDomListener(window, 'load', initialize);
    </script>
-->
<script type="text/javascript">

$(function(){
//  var map;
  var coord_array = $('#coords').val();
  //alert(coord_array);
     coord_array = JSON.parse(coord_array);
     var size = Object.keys(coord_array).length;
    console.log(coord_array);
    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FsaW5nbyIsImEiOiJja2prMHQ0bnk0dXRiMnNucXZ0M2RjYTN4In0.P4MHlZBWxjsAknOAQqZ18Q';




var map = new mapboxgl.Map({
  container: 'map', // container id
  style: 'mapbox://styles/mapbox/satellite-v9', // stylesheet location
  center: [coord_array[1][1], coord_array[1][0]], // starting position
  zoom: 17 // starting zoom
});
     var marker= [4];
      for(var j = 0; j < size; j++){
       
          marker[j] = new mapboxgl.Marker();
    }
    
    for(var i = 1; i <= size; i++)
      {
         marker[i-1] .setLngLat([ coord_array[i][1], coord_array[i][0]])
      .addTo(map);
       //alert(marker[i-1]);
       // alert(coord_array[i][1]);
   
           // console.log(coord_array[1][0]);
     }
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: false
},
trackUserLocation: true
})
);
 /*   initialize();
    function initialize()
    {       
    var mapOptions =
    {
        zoom: 15,
        center: new google.maps.LatLng(coord_array[1][0], coord_array[1][1]),
        mapTypeId: google.maps.MapTypeId.SATELLITE,
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);


    var size = Object.keys(coord_array).length;
    console.log(size);
    for(var i = 1; i <= size; i++)
        {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(coord_array[i][0], coord_array[i][1]),
                map: map,
                title: 'test',
            });
           // console.log(coord_array[1][0]);
        }
     };

     function resetMap(m) {
        x = m.getZoom(); 
        c = m.getCenter();
        google.maps.event.trigger(m, 'resize');
        m.setZoom(x);
        m.setCenter(c);
    };

    $('.map_location').click(function() {
      resetMap(map);
      });

            $('#print_button').click(function(){
              $('.panel-collapse').removeClass('in');
              $('.panel-collapse').addClass('in');
              
                resetMap(map);
              $('#land_details').printThis({
                 header : "Land Bank Management System -- Land Details",
                 printContainer: false,
                 debug: true,
                 importStyle: true,
              });
            });

            $('#print_ldetail').click(function(){
              $('#collapseOne .panel-collapse').addClass('in');              
              $('#collapseOne').printThis({
                 header : "Land Bank Management System -- Land Details",
                 printContainer: false,
                 debug: true,
                 importStyle: true,
              });
            });*/
        }); 
    // google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<?php
 include_once 'footer.php';
?>

