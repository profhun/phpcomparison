<tr class="{if $index%2 == 1}"even"{else}"odd"{/if}">
    <td>{$row.id}</td>
    <td>{$row.name}</td>
    <td>{$row.age}</td>
    <td>{implode from=$row.lotto_numbers delim=", "}</td>
</tr>
<tr class="{($index%2)?"even":"odd"}">
    <td colspan="4">
        <h4>Lead</h4>
        <p>{$row.lead}</p>
        <h4>Description</h4>
        <p>{$row.description}</p>
        <br/>
    </td>
</tr>