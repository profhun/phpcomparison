<table style="border: 1px solid #444444; width: 800px;">
    <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="40%">Name</th>
            <th width="10%">Age</th>
            <th width="40%">Lotto numbers</th>
        </tr>
    </thead>
    <tbody>
        {% for key, row in template_data %}
            {% include '__table_row.php' %}
        {% endfor %}
    </tbody>
</table>