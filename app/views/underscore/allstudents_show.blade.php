<%
for(var i=0; i<branches_list.length; i++){
	if(obj.branch == branches_list[i].id){
		var student_branch = branches_list[i].branch;
		break;
	}
}
%>
<tr data-student-id="<%= obj.student_id %>">
	<td><%= obj.student_id %></td>
	<td><%= obj.first_name %></td>
	<td><%= obj.last_name %></td>
	<td><%= obj.roll_num %></td>
	<td><%= student_branch %></td>
	<td><%= obj.books_issued %></td>
</tr>
