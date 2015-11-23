<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>API</title>
    </head>
    <body>
        <a href="#" id="role_list">role.list</a>
        <table>
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Length
                    </th>
                </tr>
            </thead>
            <?php
            foreach ($columns as $column) {
                ?>
            <tr>
                <td>
                    <?php echo $column->name; ?>
                </td>
                <td>
                    <?php echo $column->type; ?>
                </td>
                <td>
                    <?php echo $column->max_length; ?>
                </td>
            </tr>

                <?php
            }
            ?>
        </table>
    </body>
</html>
