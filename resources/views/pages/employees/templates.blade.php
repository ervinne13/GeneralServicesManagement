
<script id="show-assigned-area-button-template" type="text/html">

    <a class="action-show-assigned-area" data-username="<%= username %>" href="javascript:void(0)"
       data-toggle="tooltip" title="Show Assigned Areas">
        <i class="fa fa-search"></i>
    </a>

    @if (Auth::user()->role_code === "admin")    
    <a class="action-show-assigned-area" data-username="<%= username %>" href="{!! url("employees/<%= username %>/edit") !!}"
       data-toggle="tooltip" title="Edit">
       <i class="fa fa-pencil"></i>
    </a>
    @endif    
</script>

<script id="assigned-area-task-row-template" type="text/html">
    <tr class="assigned-area-task-row" data-id="<%= id %>">
        <td></td>
        <td><%= area.name %></td>
        <td><%= task.name %></td>
        <td><%= from %> - <%= to %></td>
    </tr>
</script>