<tr class="{if $index%2}even{else}odd{/if}">
    <td>{$row.id}</td>
    <td>{$row.name}</td>
    <td>{$row.age}</td>
    <td>{foreach $row.lotto_numbers val implode=", "}{$val}{/foreach}</td>
</tr>
<tr class="{if $index%2}even{else}odd{/if}">
    <td colspan="4">
        <h4>Lead</h4>
        <p>{$row.lead}</p>
        <h4>Description</h4>
        <p>{$row.description}</p>
        <br/>
    </td>
</tr>