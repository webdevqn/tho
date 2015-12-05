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
        <link rel=stylesheet href="<?php echo base_url(); ?>assets/rest/css/style.css" >
    </head>
    <body>        
        <div class="container">
            <div class="row">
                <a href="#" id="role_list">role.list</a>                
                <table id="role_list_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Required
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($roles as $key => $role) {
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?php echo $role->Field; ?>
                                </td>
                                <td>
                                    <?= strpos($role->Type, 'int') !== false ? 'int' : 'string'; ?>
                                </td>
                                <td>
                                    <?= $role->Null == 'NO' ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>' ?>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2">
                                <div id="request_role"></div>
                            </td>

                            <td colspan="2">
                                <div id="response_role"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <a href="#" id="user_list">user.list</a>                
                <table id="user_list_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Required
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $key => $user) {
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?php echo $user->Field; ?>
                                </td>
                                <td>
                                    <?= strpos($user->Type, 'int') !== false ? 'int' : 'string'; ?>
                                </td>
                                <td>
                                    <?= $user->Null == 'NO' ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>' ?>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                            <tr>
                            <td colspan="2">
                                <div id="request_user"></div>
                            </td>

                            <td colspan="2">
                                <div id="response_user"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <a href="#" id="category_list">category.list</a>                
                <table id="category_list_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Required
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $key => $category) {
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?php echo $category->Field; ?>
                                </td>
                                <td>
                                    <?= strpos($category->Type, 'int') !== false ? 'int' : 'string'; ?>
                                </td>
                                <td>
                                    <?= $category->Null == 'NO' ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>' ?>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                            <tr>
                            <td colspan="2">
                                <div id="request_category"></div>
                            </td>

                            <td colspan="2">
                                <div id="response_category"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <a href="#" id="product_list">product.list</a>                
                <table id="product_list_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Required
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $key => $product) {
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?php echo $product->Field; ?>
                                </td>
                                <td>
                                    <?= strpos($product->Type, 'int') !== false ? 'int' : 'string'; ?>
                                </td>
                                <td>
                                    <?= $product->Null == 'NO' ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>' ?>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                            <tr>
                            <td colspan="2">
                                <div id="request_product"></div>
                            </td>

                            <td colspan="2">
                                <div id="response_product"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>assets/normal/js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/normal/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/rest/js/renderjson.js"></script>
        <script>
            $(document).ready(function () {
                $('#role_list_table').hide();
                $('#user_list_table').hide();
                $('#category_list_table').hide();
                $('#product_list_table').hide();
                $('#role_list').click(function () {
                    $('#role_list_table').toggle();
                    document.getElementById("request_role").appendChild(
                        renderjson({
                            link: 'api/v1/role.list',
                            data_request: { 
                                id: 'int', 
                                title: 'string', 
                                created_by: 'int',
                                created_at: 'int',
                                updated_at: 'int'
                            } 
                        })
                    );
                    document.getElementById("response_role").appendChild(
                        renderjson({
                            code: '',
                            status: '',
                            message: '',
                            data: []
                        })
                    );
                });
                $('#user_list').click(function () {
                    $('#user_list_table').toggle();
                    document.getElementById("request_user").appendChild(
                        renderjson({
                            link: 'api/v1/user.list',
                            data_request: { 
                                id: 'int', 
                                title: 'string', 
                                created_by: 'int',
                                created_at: 'int',
                                updated_at: 'int'
                            } 
                        })
                    );
                    document.getElementById("response_user").appendChild(
                        renderjson({
                            code: '',
                            status: '',
                            message: '',
                            data: []
                        })
                    );
                });
                $('#category_list').click(function () {
                    $('#category_list_table').toggle();
                    document.getElementById("request_category").appendChild(
                        renderjson({
                            link: 'api/v1/category.list',
                            data_request: { 
                                id: 'int', 
                                title: 'string', 
                                created_by: 'int',
                                created_at: 'int',
                                updated_at: 'int'
                            } 
                        })
                    );
                    document.getElementById("response_category").appendChild(
                        renderjson({
                            code: '',
                            status: '',
                            message: '',
                            data: []
                        })
                    );
                });
                $('#product_list').click(function () {
                    $('#product_list_table').toggle();
                    document.getElementById("request_product").appendChild(
                        renderjson({
                            link: 'api/v1/product.list',
                            data_request: { 
                                id: 'int', 
                                title: 'string', 
                                created_by: 'int',
                                created_at: 'int',
                                updated_at: 'int'
                            } 
                        })
                    );
                    document.getElementById("response_product").appendChild(
                        renderjson({
                            code: '',
                            status: '',
                            message: '',
                            data: []
                        })
                    );
                });
            });
        </script>
    </body>
</html>
