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
	<td>
		<a class="btn btn-success student-status" data-status="1">Approve</a>
		<a class="btn btn-danger student-status" data-status="0">Reject</a>
	</td>
</tr>
