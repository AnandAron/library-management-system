var HttpClient = function() {
    this.get = function(aUrl, aCallback) {
        var anHttpRequest = new XMLHttpRequest();
        anHttpRequest.onreadystatechange = function() { 
            if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                aCallback(anHttpRequest.responseText);
        }

        anHttpRequest.open( "GET", aUrl, true );            
        anHttpRequest.send( null );
    }
}
function loadJsonData(){
	var client = new HttpClient();
if(document.getElementById('isbn-af').value==""){window.alert("Invalid Data");}
else{
client.get('https://www.googleapis.com/books/v1/volumes?q=isbn:'+document.getElementById('isbn-af').value, function(response) {
	var res=JSON.parse(response);

	console.log(res);
    if(res.totalItems!=0){
	var i=0;
	var auth="";	
	for (i=0;i<res.items[0].volumeInfo.authors.length;i++){
		if (i!=0) {auth=auth+" , ";}
		auth=auth+res.items[0].volumeInfo.authors[i];
	
	}
	document.getElementById("author-af").value=auth;
document.getElementById("title-af").value=res.items[0].volumeInfo.title;
document.getElementById("desc-af").value=res.items[0].volumeInfo.description;
    }
    else{ window.alert('Details Not Found for this ISBN');}

});
}
}
function loadResults(){

    var url = config.path.ajax 
            + "/books?category_id=" + $('#category_fill').val();

    var table = $('#all-books');
    
    var default_tpl = _.template($('#allbooks_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Books in this category</td></tr>');
            } else {
                table.html('');
                for (var book in data) {
                    table.append(default_tpl(data[book]));
                }
            }
        },
        beforeSend : function(){
            table.css({'opacity' : 0.4});
        },
        complete : function() {
            table.css({'opacity' : 1.0});
        }
    });
}

$(document).ready(function(){

    $("#category_fill").change(function(){
        loadResults();
    });

    $(document).on("click","#addbooks",function(){
	console.log("Posting!!")
        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };
		sendJSON.isbn = f$('input[data-form-field~=isbn]').val();
		sendJSON.book_id = f$('input[data-form-field~=book_id]').val();
        sendJSON.title = f$('input[data-form-field~=title]').val();
        sendJSON.author = f$('input[data-form-field~=author]').val();
        sendJSON.description = f$('textarea[data-form-field~=description]').val();
        sendJSON.category = f$('select[data-form-field~=category]').val();
        sendJSON.number = 1;

        if(sendJSON.isbn == "" || sendJSON.title == "" || sendJSON.author == "" || sendJSON.description == "" || sendJSON.book_id == ""){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Book Details Not Complete'} ));
            send_flag = false;
        }
        
        if(send_flag == true){
		
            $.ajax({
                type : 'POST',
                data : {
                    add_book_data : JSON.stringify(sendJSON)
                },
                url : config.path.ajax + '/books',
                success: function(data) {                    
                    module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
				document.getElementById("author-af").value="";
				document.getElementById("title-af").value="";
				document.getElementById("desc-af").value="";
				document.getElementById("isbn-af").value="";
				document.getElementById("book_id-af").value="";
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


    loadResults();

});

function createCORSRequest(method, url) {
  var xhr = new XMLHttpRequest();
  if ("withCredentials" in xhr) {

    // Check if the XMLHttpRequest object has a "withCredentials" property.
    // "withCredentials" only exists on XMLHTTPRequest2 objects.
    xhr.open(method, url, true);

  } else if (typeof XDomainRequest != "undefined") {

    // Otherwise, check if XDomainRequest.
    // XDomainRequest only exists in IE, and is IE's way of making CORS requests.
    xhr = new XDomainRequest();
    xhr.open(method, url);

  } else {

    // Otherwise, CORS is not supported by the browser.
    xhr = null;

  }
  return xhr;
}