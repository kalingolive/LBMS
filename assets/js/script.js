$(function() {

        $('#add_modal form').submit(function() { 
            var options = { 
            success             :   addSuccessFunction,
            error               :   addErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#edit_modal form').submit(function() { 
            var options = { 
            success             :   editSuccessFunction,
             error               :   editErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#add_prep_land_form').submit(function() { 
            var options = { 
            success             :   addPrepSuccessFunction,
            error               :   addPrepErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#add_family_info_form').submit(function() { 
            var options = { 
            success             :   addFamilySuccessFunction,
            error               :   addFamilyErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#edit_prep_land_form').submit(function() { 
            var options = { 
            success             :   editPrepSuccessFunction,
            error               :   editPrepErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#update_family_info_form').submit(function() { 
            var options = { 
            success             :   editFamilySuccessFunction,
            error               :   editFamilyErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#alloc_add_modal form').submit(function() { 
            var options = { 
            success             :   addTransSuccessFunction,
            error               :   addTransErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#alloc_edit_modal form').submit(function() { 
            var options = { 
            success             :   editTransSuccessFunction,
            error               :   editTransErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#bid_add_modal form').submit(function() { 
            var options = { 
            success             :   addTransSuccessFunction,
            error               :   addTransErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#bid_edit_modal form').submit(function() { 
            var options = { 
            success             :   editTransSuccessFunction,
            error               :   editTransErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#add_user_modal form').submit(function() { 
            var options = { 
            success             :   addUserSuccessFunction,
            error               :   addUserErrorFunction
        }; 
            $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#edit_user_modal form').submit(function() { 
            var options = { 
            success             :   editUserSuccessFunction,
             error               :   editUserErrorFunction
        };
           $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#edit_profile').submit(function() { 
            var options = { 
            success             :   editUserSuccessFunction,
             error               :   editUserErrorFunction
        };
           $(this).ajaxSubmit(options); 
            return false; 
        });

        $('#add_modal').on('shown.bs.modal', function(e){
				//alert();
                var url = window.location.replace = "woreda/get_woredas"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#woreda_add').html('');
                        $('#woreda_add').append($html);

                      }
                    });

                    var url = window.location.replace = "lands/list_landTypes"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#landType_add').html('');
                        $('#landType_add').append($html);

                      }
                    });

             });
		

 $('#add_block_modal').on('shown.bs.modal', function(e){
				//alert();
                var url = window.location.replace = "woreda/get_woredas"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#woreda_add').html('');
                        $('#woreda_add').append($html);

                      }
                    });

                    var url = window.location.replace = "lands/list_landTypes"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#landType_add').html('');
                        $('#landType_add').append($html);

                      }
                    });

             });
			 







		
			 
			 
			 
			 
			 
			         $('#add_modal').on('shown.bs.modal', function(e){
						
                var url = window.location.replace = "land_preparation/get_land_prep"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.description+"</option>";
                        });
                        $('#land_prep_add').html('');
                        $('#land_prep_add').append($html);

                      }
                    });

                    var url = window.location.replace = "lands/list_landTypes"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#landType_add').html('');
                        $('#landType_add').append($html);

                      }
                    });

             });
			 
			 
			 
			 
			 
			 
			 
			 

        $('#edit_modal').on('shown.bs.modal', function(e){
             var url = window.location.replace = "woreda/get_woredas"
            $.ajax({
              url: url,
              cache: false,
              success: function(response){
                var data = JSON.parse(response);
                
                $html = '';
                $.each(data, function(key, value){
                  $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                });
                $('#woreda_edit').html('');
                $('#woreda_edit').append($html);

              }
			  
	
            });
			
					   var url = window.location.replace = "land_preparation/get_land_prep"
            $.ajax({
              url: url,
              cache: false,
              success: function(response){
                var data = JSON.parse(response);
                
                $html = '';
                $.each(data, function(key, value){
                  $html += "<option value='"+value.id+"'>"+value.description+"</option>";
                });
                $('#land_prep_edit').html('');
                $('#land_prep_edit').append($html);

              }
			      });

            var url = window.location.replace = "lands/list_landTypes"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#landType_edit').html('');
                        $('#landType_edit').append($html);

                      }
                    });

         });


        $('#alloc_add_modal').on('shown.bs.modal', function(e){
                var url = window.location.replace = "alloc_transfer/get_lands"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        console.log(data);
                        $html = '<option value="">Select Land</option>';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.land_code+"'>"+value.land_code+"</option>";
                        });
                        $('#land_add').html('');
                        $('#land_add').append($html);
                      }
                    });

             });

        $('#alloc_edit_modal').on('shown.bs.modal', function(e){
             var url = window.location.replace = "alloc_transfer/get_lands"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        console.log(data);
                        $html = '<option value="">Select Land</option>';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.land_code+"'>"+value.land_code+"</option>";
                        });
                        $('#land_edit').html('');
                        $('#land_edit').append($html);
                      }
                    });

                    var id = $(this).val();

                });
                   

        $('#bid_add_modal').on('shown.bs.modal', function(e){
                var url = window.location.replace = "alloc_transfer/get_lands"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        console.log(data);
                        $html = '<option value="">Select Land</option>';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.land_code+"'>"+value.land_code+"</option>";
                        });
                        $('#land_add').html('');
                        $('#land_add').append($html);
                      }
                    });

             });

        $('#bid_edit_modal').on('shown.bs.modal', function(e){
             var url = window.location.replace = "alloc_transfer/get_lands"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        console.log(data);
                        $html = '<option value="">Select Land</option>';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.land_code+"'>"+value.land_code+"</option>";
                        });
                        $('#land_edit').html('');
                        $('#land_edit').append($html);
                      }
                    });

                });
                   
});



 $('#add_woreda').submit(function(event){
    event.preventDefault();
    $form = $(this);

    var title = $('#woreda_title_add').val();
    var desc = $('#woreda_desc_add').val();

    var url = $(this).attr('action');
    $.ajax({
      url: url,
      data: {"title":title,"description":desc},
      type: "POST",
      success: function(response){
        console.log(response);
        if(response)
        {
            showSuccess('Woreda successfully Inserted');
            location.reload(true);
        }
        else
        {
            showErrorMessage('There is an error inserting woreda');
            jQuery('#add_woreda_modal').modal('toggle');
        }

      }
    });


 });
 
 
 
 
 
 
 
 
 
 
  $('#add_block').submit(function(event){
    event.preventDefault();
    $form = $(this);

    var title = $('#block_add').val();
    var woreda = $('#woreda_add').val();

    var url = $(this).attr('action');
    $.ajax({
      url: url,
      data: {"title":title,"woreda_id":woreda},
      type: "POST",
      success: function(response){
        console.log(response);
        if(response)
        {
            showSuccess('Block successfully Inserted');
            location.reload(true);
        }
        else
        {
            showErrorMessage('There is an error inserting woreda');
            jQuery('#add_woreda_modal').modal('toggle');
        }

      }
    });


 });

 //----------------------------------------------------------------------------------

function view_woreda(id)
{
    jQuery('#edit_woreda_modal').modal('show', {backdrop: 'static'});
    //console.log(window.location.origin);
    var url = window.location.replace = "woreda/view_woreda";
    var response = new Object();
    $.ajax({
        url: url,
        data: "view_id=" + id,
        type: "POST",
        success: function(response)
        {
            var obj = JSON.parse(response);
            console.log(obj);
             
            jQuery('#edit_woreda_modal .modal-body #woreda_title_edit').val(obj[0].title);
            jQuery('#edit_woreda_modal .modal-body #woreda_desc_edit').val(obj[0].description);
            jQuery('#edit_woreda_modal .modal-body #woreda_id').val(obj[0].id);
    
            
        }
    });
}


function view_block(id)
{
    jQuery('#edit_block_modal').modal('show', {backdrop: 'dynamic'});
    //console.log(window.location.origin);
	           var url = window.location.replace = "woreda/get_woredas"
                    $.ajax({
                      url: url,
                      cache: false,
                      success: function(response){
                        var data = JSON.parse(response);
                        
                        $html = '';
                        $.each(data, function(key, value){
                          $html += "<option value='"+value.id+"'>"+value.title+"</option>";
                        });
                        $('#woreda_edit').html('');
                        $('#woreda_edit').append($html);

                      }
                    });
    var url2 = window.location.replace = "block/view_block";
    var response = new Object();
    $.ajax({
        url: url2,
        data: "view_id=" + id,
        type: "POST",
        success: function(response2)
        {
            var obj2 = JSON.parse(response2);
            console.log(obj2);
             
            jQuery('#woreda_edit').val(obj2[0].woreda_id);
			//alert(obj[0].woreda_id);
            jQuery('#block_edit').val(obj2[0].block_title);
            jQuery('#prep_id').val(obj2[0].id);
    
            
        }
    });
}

//----------------------------------------------------------------------------------

$('#edit_woreda').submit(function(event){
    event.preventDefault();
    var url = $('#edit_woreda').attr('action');
    var id = jQuery('#edit_woreda_modal .modal-body #woreda_id').val();
    var title = jQuery('#edit_woreda_modal .modal-body #woreda_title_edit').val();
    var description = jQuery('#edit_woreda_modal .modal-body #woreda_desc_edit').val();
    var response = new Object();
    $.ajax({
        url: url,
        data: {"edit_id":id, "title":title, "description": description},
        type: "POST",
        success: function(response)
        {
            var obj = JSON.parse(response);
            console.log(obj);  
            if (!obj) {
                    showErrorMessage('There is an error updating woreda');
                    jQuery('#edit_woreda_modal').modal('toggle');
                }
                else {
                    showSuccess('Woreda successfully Updated!!');
                    jQuery('#edit_woreda_modal').modal('toggle');
                    location.reload(true);
                }  

        }
    });
});

    

//----------------------------------------------------------------------------------

$('#edit_block').submit(function(event){
	
    event.preventDefault();
    var url = $('#edit_block').attr('action');
    var id = jQuery('#prep_id').val();
    var woreda = jQuery('#woreda_edit').val();
    var block = jQuery('#block_edit').val();
	
    var response = new Object();
    $.ajax({
        url: url,
        data: {"edit_id":id, "title":block, "woreda": woreda},
        type: "POST",
        success: function(response)
        {
			//alert();
            var obj = JSON.parse(response);
            console.log(obj);  
            if (!obj) {
                    showErrorMessage('There is an error updating block');
                    jQuery('#edit_block_modal').modal('toggle');
                }
                else {
                    showSuccess('Block successfully Updated!!');
                    jQuery('#edit_block_modal').modal('toggle');
                    location.reload(true);
                }  

        }
    });
});

    

//----------------------------------------------------------------------------------

function view_user(id)
{
    jQuery('#edit_user_modal').modal('show', {backdrop: 'static'});
    //console.log(window.location.origin);
    var url = window.location.replace = "user/view_user";
    
    var response = new Object();
    $.ajax({
        url: url,
        data: "view_id=" + id,
        type: "POST",
        success: function(response)
        {
            var obj = JSON.parse(response);
            console.log(obj);
             
            jQuery('#edit_user_modal .modal-body #fname_edit').val(obj[0].first_name);
            jQuery('#edit_user_modal .modal-body #lname_edit').val(obj[0].last_name);
            jQuery('#edit_user_modal .modal-body #uname_edit').val(obj[0].user_name);
            jQuery('#edit_user_modal .modal-body #password_edit').val('');
            jQuery('#edit_user_modal .modal-body #role_edit').val(obj[0].role);
            jQuery('#edit_user_modal .modal-body #email_edit').val(obj[0].email);
            jQuery('#edit_user_modal .modal-body #phone_edit').val(obj[0].phone);
            jQuery('#edit_user_modal .modal-body #sex_edit').val(obj[0].sex);
            jQuery('#edit_user_modal .modal-body #status_edit').val(obj[0].is_active);
            jQuery('#edit_user_modal .modal-body #user_id').val(obj[0].id);
            jQuery('#edit_user_modal .modal-body #user_src').attr("src",window.location.origin+'/land_bank/'+obj[0].img_src);  
        }
    });
}


// function add_land(event)
// {
// 	event.preventDefault();
// 	var woreda = $('#woreda_add').val();
// 	var block = $('#block_add').val();
// 	var parcel = $('#parcel_add').val();
// 	var status = $('#status_add').val();
// 	var area = $('#area_add').val();
//     var land_type = $('#landType_add').val();
//     var coord_size = $('#coord_size').val();
// 	var land_image = $('#land_image').val();
//     //var form_image = new FormData($('#add_modal form')[0]);
//     // jQuery.each(jQuery('#land_image')[0].files, function(i,file){
//     //     form_image.append('file-'+i, file);
//     // })
    
    
//     //console.log(form_image);

//     if(coord_size == 0)
//     {
//         showErrorMessage("Atleast one coordinate is mandatory to register land !!");
//     }
//     else
//     {
//             var coordinates = new Array(coord_size);
//             // for (var i = 0; i < coordinates.length; i++) {
//             // coordinates[i] = new Array(2);
//             // }

//             for(var i=0;i<coord_size;i++)
//             {
//                 coordinates[i] = [$('#coordinate_X'+(i+1)).val(), $('#coordinate_Y'+(i+1)).val()];
//                // coordinates[i] = $('#coordinate_Y'+(i+1)).val();
//             }

//             var url = window.location.replace = "lands/add_land"
//             $.ajax({
//               url: url,
//               data: {"woreda":woreda,"block":block,"parcel":parcel,"area":area,"status":status,"land_type":land_type, "coordinates": coordinates, "coord_size": coord_size},
//               type: "POST",
//               success: function(response){
//                 console.log(response);
//                 if(response)
//                 {
//                     console.log(coordinates);
//                     showSuccess('Land successfully Inserted');
//                     location.reload(true);
//                 }
//                 else
//                 {
//                     showErrorMessage('There is an error inserting land');
//                     jQuery('#add_modal').modal('toggle');
//                 }

//               }
//             });
//     }

// }

//------------------------------------------------------------------------------------
function view_land(id)
{
    jQuery('#edit_modal').modal('show', {backdrop: 'static'});
    //console.log(window.location.origin);
    var url = window.location.replace = "lands/view_land";
    var response = new Object();
    $.ajax({
        url: url,
        data: "view_id=" + id,
        type: "POST",
        success: function(response)
        {
            var obj = JSON.parse(response);
            //console.log(obj[0]);
           console.log(obj['land_coord']);
            // jQuery('#food_modal .modal-body #food_cat').find('option').remove().end();
            // for (var i = 0; i < obj[1].length; i++) {
            //     //console.log(obj[1][i].cat_name + ' ');
            //     var list_item = "<option value='"+ obj[1][i].id +"'>" + obj[1][i].cat_name + "</option>";
            //     jQuery('#food_modal .modal-body #food_cat').append(list_item);
            // };
            setTimeout(function() {
                jQuery('#edit_modal .modal-body #woreda_edit').val(obj['land_detail'][0].woreda_id);
				jQuery('#edit_modal .modal-body #land_prep_edit').val(obj['land_detail'][0].prep_id);
				//alert(obj['land_detail'][0].prep_id );
                jQuery('#edit_modal .modal-body #landType_edit').val(obj['land_detail'][0].l_id);
            }, 500);
             
            jQuery('#edit_modal .modal-body #parcel_id').val(obj['land_detail'][0].parcel_id);
            jQuery('#edit_modal .modal-body #block_edit').val(obj['land_detail'][0].b_title);
            jQuery('#edit_modal .modal-body #parcel_edit').val(obj['land_detail'][0].parcel);
            jQuery('#edit_modal .modal-body #desc_edit').val(obj['land_detail'][0].desc);
            jQuery('#edit_modal .modal-body #area_edit').val(obj['land_detail'][0].area_size);
            jQuery('#edit_modal .modal-body #status_edit').val(obj['land_detail'][0].status);
            jQuery('#edit_modal .modal-body #land_src').attr("src",window.location.origin+'/land_bank/uploads/lands/'+obj['land_detail'][0].img_src);
            
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
    });
}

//-----------------------------------------------------------------------------------
function view_alloc_transfer(id)
{
    jQuery('#alloc_edit_modal').modal('show', {backdrop: 'static'});
    //console.log(window.location.origin);
    var landbank_code = '';
    var transferred_area = 0;
    var url = window.location.replace = "alloc_transfer/view_alloc_transfer";
    var response = new Object();
    $.ajax({
        url: url,
        data: "view_id=" + id,
        type: "POST",
        success: function(response)
        {
            var obj = JSON.parse(response);
            //console.log(obj[0]);
           console.log(obj['land_detail'][0].landbank_code);
            
            setTimeout(function() {
                jQuery('#alloc_edit_modal .modal-body #land_edit').val(obj['land_detail'][0].landbank_code);
                //jQuery('#alloc_edit_modal .modal-body #landType_edit').val(obj['land_detail'][0].l_id);
            }, 500);
            landbank_code = obj['land_detail'][0].landbank_code;
            transferred_area = obj['land_detail'][0].transferred_area;
            jQuery('#alloc_edit_modal .modal-body #edit_id').val(obj['land_detail'][0].transfer_id);
            jQuery('#alloc_edit_modal .modal-body #land_code_edit').val(obj['land_detail'][0].land_code);
            jQuery('#alloc_edit_modal .modal-body #trans_to_edit').val(obj['land_detail'][0].transferred_to);
            jQuery('#alloc_edit_modal .modal-body #proj_title_edit').val(obj['land_detail'][0].project_title);
            jQuery('#alloc_edit_modal .modal-body #area_edit').val(obj['land_detail'][0].transferred_area);
            jQuery('#alloc_edit_modal .modal-body #max_area_edit').val(obj['land_detail'][0].area_size);
            jQuery('#alloc_edit_modal .modal-body #proj_prop_edit').val(obj['land_detail'][0].project_proposal);
            jQuery('#alloc_edit_modal .modal-body #land_use_edit').val(obj['land_detail'][0].land_use);
           // jQuery('#alloc_edit_modal .modal-body #bank_state_edit').val(obj['land_detail'][0].bank_statement);
            jQuery('#alloc_edit_modal .modal-body #eia_edit').val(obj['land_detail'][0].EIA);
            jQuery('#alloc_edit_modal .modal-body #trans_date_edit').val(obj['land_detail'][0].transfer_date);
            jQuery('#alloc_edit_modal .modal-body #reclaim_date_edit').val(obj['land_detail'][0].reclaim_date);

            jQuery('#alloc_edit_modal .modal-body #comp_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].compensation);
            jQuery('#alloc_edit_modal .modal-body #bank_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].bank_statement);

            jQuery('#alloc_edit_modal .modal-body #approval_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].approval_letter);
            jQuery('#alloc_edit_modal .modal-body #siteplan_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].siteplan);
            jQuery('#alloc_edit_modal .modal-body #titleDeed_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].title_deed);
            
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
            
        },
        complete : function (response) {
            var url = window.location.replace = "alloc_transfer/get_land_size/"+landbank_code
            $.ajax({
              url: url,
              cache: false,
              type: "POST",
              success: function(response){
                var data = JSON.parse(response);
                //console.log(data);
                $('#alloc_edit_modal .modal-body #area_edit').attr({
                  "min": 1,
                  "max": parseInt(data[0].area_size) + parseInt(transferred_area)
                });
              }
            });
        }
    });
}


//-----------------------------------------------------------------------------------
function view_bid_transfer(id)
{
    jQuery('#bid_edit_modal').modal('show', {backdrop: 'static'});
    //console.log(window.location.origin);
    var landbank_code = '';
    var transferred_area = 0;
    var url = window.location.replace = "bid_transfer/view_bid_transfer";
    var response = new Object();
    $.ajax({
        url: url,
        data: "view_id=" + id,
        type: "POST",
        success: function(response)
        {
            var obj = JSON.parse(response);
            //console.log(obj[0]);
           console.log(obj);
            
            setTimeout(function() {
                jQuery('#bid_edit_modal .modal-body #land_edit').val(obj['land_detail'][0].landbank_code);
                //jQuery('#alloc_edit_modal .modal-body #landType_edit').val(obj['land_detail'][0].l_id);
            }, 500);
             landbank_code = obj['land_detail'][0].landbank_code;
             transferred_area = obj['land_detail'][0].transferred_area;
            jQuery('#bid_edit_modal .modal-body #edit_id').val(obj['land_detail'][0].transfer_id);
            jQuery('#bid_edit_modal .modal-body #land_code_edit').val(obj['land_detail'][0].land_code);
            jQuery('#bid_edit_modal .modal-body #trans_to_edit').val(obj['land_detail'][0].transferred_to);
            jQuery('#bid_edit_modal .modal-body #area_edit').val(obj['land_detail'][0].transferred_area);
            jQuery('#bid_edit_modal .modal-body #max_area_edit').val(obj['land_detail'][0].area_size);
            jQuery('#bid_edit_modal .modal-body #sex_edit').val(obj['land_detail'][0].sex);
            jQuery('#bid_edit_modal .modal-body #land_use_edit').val(obj['land_detail'][0].land_use);
            jQuery('#bid_edit_modal .modal-body #bid_round_edit').val(obj['land_detail'][0].bid_round);
           // jQuery('#bid_edit_modal .modal-body #bank_state_edit').val(obj['land_detail'][0].bank_statement);
            jQuery('#bid_edit_modal .modal-body #trans_date_edit').val(obj['land_detail'][0].transfer_date);

            jQuery('#bid_edit_modal .modal-body #site_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].siteplan);
            jQuery('#bid_edit_modal .modal-body #win_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].winning_letter);
            jQuery('#bid_edit_modal .modal-body #titleDeed_src').attr("src",window.location.origin+'/land_bank/'+obj['land_detail'][0].title_deed);
            
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
            
        },
        complete : function (response) {
            var url = window.location.replace = "bid_transfer/get_land_size/"+landbank_code
            $.ajax({
              url: url,
              cache: false,
              type: "POST",
              success: function(response){
                var data = JSON.parse(response);
                console.log(data);
                $('#bid_edit_modal .modal-body #area_edit').attr({
                  "min": 1,
                  "max": parseInt(data[0].area_size) + parseInt(transferred_area)
                });
              }
            });
        }
    });
}
//------------------------------------------------------------------------------------
// function edit_land(event)
// {
//    event.preventDefault(); 
//     //var url = window.location.replace = "view_food";
//     var url = jQuery('#land_edit_form').attr('action');
//     var response = new Object();
//     var id = jQuery('#edit_modal .modal-body #parcel_id').val();
//     var woreda = jQuery('#edit_modal .modal-body #woreda_edit').val();
//     var land_type = jQuery('#edit_modal .modal-body #landType_edit').val();
//     var block = jQuery('#edit_modal .modal-body #block_edit').val();
//     var parcel = jQuery('#edit_modal .modal-body #parcel_edit').val();
//     var area = jQuery('#edit_modal .modal-body #area_edit').val();
//     var status = jQuery('#edit_modal .modal-body #status_edit').val();
//     var coord_size = $('#update_coord_size').val();

//     var coordinates = new Array(coord_size);
//     // for (var i = 0; i < coordinates.length; i++) {
//     // coordinates[i] = new Array(2);
//     // }

//     for(var i=0;i<coord_size;i++)
//     {
//         coordinates[i] = [$('#update_coordinate_X'+(i+1)).val(), $('#update_coordinate_Y'+(i+1)).val()];
//        // coordinates[i] = $('#coordinate_Y'+(i+1)).val();
//     }
//     $.ajax({
//         url: url,
//         data: {"edit_id" : id , "woreda" : woreda , "land_type" : land_type , "block" : block, "parcel" : parcel, "area_size" : area, "status" : status, "coordinates": coordinates, "coord_size": coord_size},
//         type: "POST",
//         success: function(response)
//         {
//             //console.log(response);
//             if(response)
//             {
//                 showSuccess('Data Updated successfully');
//                 jQuery('#edit_modal').modal('toggle');
//                 location.reload(true);
//             }
                
//             else
//                showErrorMessage('There is an error updating the record'); 
//         }
//     });
// }

//--------------------------------------------------------------------------------------------------------------------------------------
function DeleteLand(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.replace = "lands/delete_land";

        //alert(url);
        $.ajax({
            url: url,
            data: "delete_id=" + id,
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error deleting the Land');
                    jQuery('#delete_modal').modal('toggle');
                }
                else {
                    showSuccess('Land successfully Deleted!!');
                    jQuery('#delete_modal').modal('toggle');
                    location.reload(true);
                }

            }
        });
    
}

//--------------------------------------------------------------------------------------------------------------------------------------
function DeleteAlloc(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.replace = "alloc_transfer/delete_transfer";

        //alert(url);
        $.ajax({
            url: url,
            data: "delete_id=" + id,
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error reclaiming tranferred land');
                    jQuery('#delete_modal').modal('toggle');
                }
                else {
                    showSuccess('Land transfer successfully Reclaimed!!');
                    jQuery('#delete_modal').modal('toggle');
                    location.reload(true);
                }

            }
        });
    
}

//--------------------------------------------------------------------------------------------------------------------------------------
function DeleteBid(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.replace = "bid_transfer/delete_transfer";

        //alert(url);
        $.ajax({
            url: url,
            data: "delete_id=" + id,
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error deleting tranferred land');
                    jQuery('#delete_modal').modal('toggle');
                }
                else {
                    showSuccess('Land transfer successfully Deleted!!');
                    jQuery('#delete_modal').modal('toggle');
                    location.reload(true);
                }

            }
        });
    
}

//--------------------------------------------------------------------------------------------------------------------------------------
function DeleteUser(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.replace = "user/delete_user";

        //alert(url);
        $.ajax({
            url: url,
            data: "delete_id=" + id,
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error deleting user');
                    jQuery('#delete_modal').modal('toggle');
                }
                else {
                    showSuccess('User successfully Deleted!!');
                    jQuery('#delete_modal').modal('toggle');
                    location.reload(true);
                }

            }
        });
    
}

//--------------------------------------------------------------------------------------------------------------------------------------
function DeleteWoreda(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.replace = "woreda/delete_woreda";

        //alert(url);
        $.ajax({
            url: url,
            data: "delete_id=" + id,
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error deleting woreda');
                    jQuery('#delete_modal').modal('toggle');
                }
                else {
                    showSuccess('Woreda successfully Deleted!!');
                    jQuery('#delete_modal').modal('toggle');
                    location.reload(true);
                }

            }
        });
    
}
//--------------------------------------------------------------------------------------------------------------------------------------


function Deleteblock(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.replace = "block/delete_block";

        //alert(url);
        $.ajax({
            url: url,
            data: "delete_id=" + id,
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error deleting woreda');
                    jQuery('#delete_modal').modal('toggle');
                }
                else {
                    showSuccess('Woreda successfully Deleted!!');
                    jQuery('#delete_modal').modal('toggle');
                    location.reload(true);
                }

            }
        });
    
}

//--------------------------------------------------------------------------------------------------------------------------------------
function ChangeUserPass(id) {
    //var r = confirm("Are you sure you want to delete this Food? Be careful the Food might had order transaction!")
    var url = window.location.origin + "/land_bank/index.php/user/change_pass";

        //alert(url);
        var old_password = $('#old_password_edit').val();
        var new_password = $('#new_password_edit').val();
        console.log(old_password);
        $.ajax({
            url: url,
            data: {"edit_id":id,"old_password":old_password, "new_password":new_password},
            type: "POST",
            cache: false,
            success: function(response) {
                if (!response) {
                    showErrorMessage('There is an error chnaging password');
                    jQuery('#changePass_modal').modal('toggle');
                }
                else {
                    showSuccess('User Password successfully updated!!');
                    jQuery('#changePass_modal').modal('toggle');
                    //location.reload(true);
                }

            }
        });
    
}

function addSuccessFunction()
{
    showSuccess('Land successfully Inserted');
   location.reload(true);
}

function addPrepSuccessFunction()
{
    showSuccess('Land Preparation successfully Inserted');
   //location.reload(true);
}

function addFamilySuccessFunction()
{
    showSuccess('Displaced Family successfully Inserted');
   //location.reload(true);
}

function editPrepSuccessFunction()
{
    showSuccess('Land Preparation successfully Updated');
   //location.reload(true);
}

function editFamilySuccessFunction()
{
    showSuccess('Displaced Family successfully Updated');
   //location.reload(true);
}

function addErrorFunction()
{
    showErrorMessage('There is an error inserting land');
    location.reload(true);
}

function addPrepErrorFunction()
{
    showErrorMessage('There is an error inserting land preparation');
    //location.reload(true);
}

function addFamilyErrorFunction()
{
    showErrorMessage('There is an error inserting displaced family');
    //location.reload(true);
}

function editPrepErrorFunction()
{
    showErrorMessage('There is an error updating land preparation');
    //location.reload(true);
}

function editFamilyErrorFunction()
{
    showErrorMessage('There is an error updating displaced family');
    //location.reload(true);
}

function editSuccessFunction()
{
 showSuccess('Land successfully Updated');
    location.reload(true);   
}

function editErrorFunction()
{
    showErrorMessage('There is an error updating land');
    location.reload(true);   
}

function addTransSuccessFunction()
{
    showSuccess('Land successfully Transferred');
    location.reload(true);
}

function addTransErrorFunction()
{
    showErrorMessage('There is an error transferring land');
    location.reload(true);
}

function editTransSuccessFunction()
{
 showSuccess('Land Transfer successfully Updated');
    location.reload(true);   
}

function editTransErrorFunction()
{
    showErrorMessage('There is an error updating transfer');
    location.reload(true);   
}


function addUserSuccessFunction()
{
    showSuccess('User successfully Registered');
    location.reload(true);
}

function addUserErrorFunction()
{
    showErrorMessage('There is an error registering user');
    location.reload(true);
}

function editUserSuccessFunction()
{
 showSuccess('User detail successfully updated');
    //location.reload(true);   
}

function editUserErrorFunction()
{
    showErrorMessage('There is an error updating user detail');
    //location.reload(true);   
}
