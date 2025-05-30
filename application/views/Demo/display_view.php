<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Pass</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($readData)): ?>
                <?php foreach ($readData as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['Name']; ?></td>
                        <td><?= $row['pass']; ?></td>
                        <td>
                            <?php echo "<form action='Demo/deleteDataRow' method='post' onsubmit=\"return confirm('Are you sure?');\">
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                    <button type='submit' name='delete' title='Delete row' style='border: none; background: none; cursor: pointer;'>❌</button>
                </form>"; ?>
                <!--***** . htmlspecialchars($row['id']) .: This is dynamic PHP code that returns a value, and it's concatenated into the HTML string using .. *****-->

                            <!-- <button type='submit' name='delete'>Delete row</button> -->
                            <!-- <input type='submit' name='delete' value='Delete row'> -->
                            <!-- <input type='submit' name='delete' value='❌' style='border: none; background: none; cursor: pointer;'> -->
                            <!-- 🗑️ -->
                        </td>
                        <td>
                            <form action="Demo/loadDataRowToForm" method="POST">
                                <input type="hidden" name="id" value='<?php echo htmlspecialchars($row["id"]) ?>'>
                                <input type="hidden" name="name" value='<?php echo htmlspecialchars($row["Name"]) ?>'>
                                <input type="hidden" name="pass" value='<?php echo htmlspecialchars($row["pass"]) ?>'>
                                <button type="submit" name="update" title="Update" style='border: none; background: none; cursor: pointer;'>✏️</button>
                            </form>
                            <?php echo "" ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <!-- <td colspan="14" class="text-center">No records found.</td> -->
                    <td colspan="14" class="text-center">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <form action='Demo/add_FormData'>
        <input type="submit" value="Insert">
    </form>
</body>

</html>