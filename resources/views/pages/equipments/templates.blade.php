
<script id="show-location-button-template" type="text/html">
    <a class="action-show-location" data-id="<%= id %>" href="javascript:void(0)">Show Equipment Locations</a>
</script>

<script id="equipment-location-row-template" type="text/html">
    <tr class="equipment-location-row" data-equipment-id="<%= equipment_id %>" data-area-code="<%= area_code %>">
        <td></td>
        <td><%= area.name %></td>
        <td><%= qty %></td>        
    </tr>
</script>