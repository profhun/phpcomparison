<tr class="{% if index%2 == 1 %}even{% else %}odd{% endif %}">
    <td>{{ row.id }}</td>
    <td>{{ row.name }}</td>
    <td>{{ row.age }}</td>
    <td>{{ row.lotto_numbers|join(', ') }}</td>
</tr>
<tr class="{% if index%2 == 1 %}even{% else %}odd{% endif %}">
    <td colspan="4">
        <h4>Lead</h4>
        <p>{{ row.lead }}</p>
        <h4>Description</h4>
        <p>{{ row.description }}</p>
        <br/>
    </td>
</tr>