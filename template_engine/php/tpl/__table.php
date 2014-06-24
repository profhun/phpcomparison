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
        <?php foreach($template_data as $index=>$row){ ?>
            <?php require '__table_row.php'; ?>
        <?php } ?>
    </tbody>
</table>