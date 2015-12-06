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
                <a href="#" id="show_category_list">category.list</a>
                <div id="category_list">
                    <div class="col-md-6">
                        <div id="request_category_list"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="response_category_list"></div>
                    </div>
                </div>                    
            </div>
            <div class="row">
                <a href="#" id="show_category_add">category.add</a>
                <div id="category_add">
                    <div class="col-md-6">
                        <div id="request_category_add"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="response_category_add"></div>
                    </div>
                </div>                    
            </div>
        </div>

        <script src="<?php echo base_url(); ?>assets/normal/js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/normal/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/rest/js/renderjson.js"></script>
        <script>
            $(document).ready(function () {
                $('#role').hide();
                $('#user').hide();
                $('#category_list').hide();
                $('#category_add').hide();
                $('#product').hide();
                $('#show_category_list').click(function () {
                    $('#category_list').toggle();
                    document.getElementById("request_category_list").appendChild(
                        renderjson({
                            link: 'api/v1/category.list',
                            data_request: 'NOT_REQUIRED'
                        })
                    );
                    document.getElementById("response_category_list").appendChild(
                        renderjson({
                            code: '200/400/600',
                            status: 'SUCCESS/FAILED',
                            message: 'SUCCESSFULLY/MISSING PARAMS/SERVER ERRORS',
                            data: [
                                {
                                id: '',
                                name: '',
                                slug: '',
                                description: '',
                                image: '',
                                token: '',
                                status: '',
                                created_by: '',
                                updated_by: '',
                                created_at: '',
                                updated_at: ''
                            },
                            {
                                id: '',
                                name: '',
                                slug: '',
                                description: '',
                                image: '',
                                token: '',
                                status: '',
                                created_by: '',
                                updated_by: '',
                                created_at: '',
                                updated_at: ''
                            },
                            {}
                            ]
                        })
                    );
                });   
                $('#show_category_add').click(function () {
                    $('#category_add').toggle();
                    document.getElementById("request_category_add").appendChild(
                        renderjson({
                            link: 'api/v1/category.add',
                            data_request: {
                                name: 'REQUIRED',
                                description: 'NOT_REQUIRED',
                                image: 'NOT_REQUIRED'
                            }
                        })
                    );
                    document.getElementById("response_category_add").appendChild(
                        renderjson({
                            code: '200/400/600',
                            status: 'SUCCESS/FAILED',
                            message: 'SUCCESSFULLY/MISSING PARAMS/SERVER ERRORS',
                            data: {
                                id: '',
                                name: '',
                                slug: '',
                                description: '',
                                image: '',
                                token: '',
                                status: '',
                                created_by: '',
                                updated_by: '',
                                created_at: '',
                                updated_at: ''
                            }
                        })
                    );
                });
            });
        </script>
    </body>
</html>
