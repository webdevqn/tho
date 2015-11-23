<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>RESTs</title>
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
                    foreach ($roles as $role) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $role->name; ?>
                            </td>
                            <td>
                                <?php echo $role->type; ?>
                            </td>
                            <td>
                                <?php echo $role->max_length; ?>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
            <div class="row">
                <a href="#" id="user_list">user.list</a>                
                <table id="user_list_table" class="table table-bordered">
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
                    foreach ($users as $user) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $user->name; ?>
                            </td>
                            <td>
                                <?php echo $user->type; ?>
                            </td>
                            <td>
                                <?php echo $user->max_length; ?>
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
                $('#user_list_table').hide();
                $('#role_list').click(function () {
                    $('#role_list_table').toggle();
                });
                $('#user_list').click(function () {
                    $('#user_list_table').toggle();
                });
            });
        </script>
    </body>
</html>
