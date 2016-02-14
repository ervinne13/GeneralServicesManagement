
<script id="show-assigned-area-button-template" type="text/html">
    <a class="action-show-assigned-area" data-username="<%= username %>" href="javascript:void(0)">Show Assigned Areas</a>
</script>

<script id="assigned-area-task-row-template" type="text/html">
    <tr class="assigned-area-task-row" data-id="<%= id %>">
        <td></td>
        <td><%= area.name %></td>
        <td><%= task.name %></td>
        <td><%= from %> - <%= to %></td>
    </tr>
</script>