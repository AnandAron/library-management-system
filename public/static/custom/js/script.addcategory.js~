$(document).ready(function(){

   
    $(document).on("click","#addcategory",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };
	
        sendJSON.category = document.getElementById("cat-af").value;
       
		
        if(sendJSON.category == ""){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Details Not Complete'} ));
            send_flag = false;
        }
        
        if(send_flag == true){

            $.ajax({
                type : 'POST',
                data : {
                    add_category_data : JSON.stringify(sendJSON)
                },
                url : config.path.ajax + '/category',
                success: function(data) {                    
                    module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
				document.getElementById("cat-af").value="";
				
                },
                error: function(xhr,status,error){
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
                },
                beforeSend: function() {
                    form.css({'opacity' : '0.4'});
                },
                complete: function() {
                    form.css({'opacity' : '1.0'});
                }
            });
        }
    }); // add books to database


   

});
