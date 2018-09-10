function loadResults(){
    var url = config.path.ajax 
            + "/student/create?branch=" + $('#branch_select').val();

 
    var table = $('#students-table');
    
    var default_tpl = _.template($('#allstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Students for these filters</td></tr>');
            } else {
                table.html('');
               var count=0;
                for (var student in data) {
                    count++;
                    table.append(default_tpl(data[student]));
                }
                document.getElementById('num_of_students').innerHTML="Number of students: "+count;
           
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
    $("#branch_select").change(function(){
        loadResults();
    });

 
    
    loadResults();

});
