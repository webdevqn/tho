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
            <div class="row">
                <a href="#" id="category_list">category.list</a>                
                <table id="category_list_table" class="table table-bordered">
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
                    foreach ($categories as $category) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $category->name; ?>
                            </td>
                            <td>
                                <?php echo $category->type; ?>
                            </td>
                            <td>
                                <?php echo $category->max_length; ?>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
            
            <div class="row">
                <a href="#" id="product_list">product.list</a>                
                <table id="product_list_table" class="table table-bordered">
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
                    foreach ($products as $product) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $product->name; ?>
                            </td>
                            <td>
                                <?php echo $product->type; ?>
                            </td>
                            <td>
                                <?php echo $product->max_length; ?>
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
                $('#category_list_table').hide();
                $('#product_list_table').hide();
                $('#role_list').click(function () {
                    $('#role_list_table').toggle();
                });
                $('#user_list').click(function () {
                    $('#user_list_table').toggle();
                });
                $('#category_list').click(function () {
                    $('#category_list_table').toggle();
                });
                $('#product_list').click(function () {
                    $('#product_list_table').toggle();
                });
            });
        </script>
    </body>
</html>
