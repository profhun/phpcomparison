<tr class="{{ ($index%2)?"even":"odd" }}">
    <td>{{ $row['id'] }}</td>
    <td>{{ $row['name'] }}</td>
    <td>{{ $row['age'] }}</td>
    <td>{{ $numbers = implode(", ",$row['lotto_numbers']); }}</td>
</tr>
<tr class="{{ ($index%2)?"even":"odd" }}">
    <td colspan="4">
        <h4>Lead</h4>
        <p>{{ $row['lead'] }}</p>
        <h4>Description</h4>
        <p>{{ $row['description'] }}</p>
        <br/>
    </td>
</tr>