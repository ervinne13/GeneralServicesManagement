
<script id="show-location-button-template" type="text/html">  
    <a class="action-show-location" data-id="<%= id %>" href="javascript:void(0)"
       data-toggle="tooltip" title="Show Equipment Locations">        
        <i class="fa fa-search"></i>
    </a>  

    @if (Auth::user()->role_code === "admin")    
    <a  href="{!! url("equipments/<%= id %>/edit") !!}"
        data-toggle="tooltip" title="Edit">
        <i class="fa fa-pencil"></i>
    </a>
    <a class="action-delete" data-id="<%= id %>" href="javascript:void(0)"
       data-toggle="tooltip" title="Delete Equipment">        
        <i class="fa fa-remove"></i>
    </a>
    @endif     
</script>

<script id="equipment-location-row-template" type="text/html">
    <tr class="equipment-location-row" data-equipment-id="<%= equipment_id %>" data-area-code="<%= area_code %>">
        <td></td>
        <td><%= area.name %></td>
        <td><%= qty %></td>        
    </tr>
</script>