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
        <link rel=stylesheet href="<?php echo base_url(); ?>assets/normal/css/bootstrap.min.css" >
    </head>
    <body>
        <div class="container">
            <div class="row">
                <a href="#" id="role_list">role.list</a>                
                <table id="role_list_table" class="table table-bordered">
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
                <tbody>
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
                </tbody>
                </table>
            </div>
            <div class="row">
                <a href="#" id="role_list">user.list</a>                
                <table id="role_list_table" class="table table-bordered">
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
                <tbody>
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
                </tbody>
                </table>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>assets/normal/js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/normal/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#role_list_table').hide();
                $('#role_list').click(function () {
                    $('#role_list_table').toggle();
                });
            });
        </script>
    </body>
</html>
