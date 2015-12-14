<div class="box box-purple">
    <!-- <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
    </div> -->
    <div class="box-body">
        <table id="category-list" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Token</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($content as $item): ?>
                    <tr>
                        <td><a href="/admin/manage/detail/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></td>
                        <td><?php echo $item['slug']; ?></td>
                        <td><?php echo ucfirst($item['description']); ?></td>
                        <?php
                        if ($item['image'] == null)
                        {
                        ?>
                        <td><img src="/images/category/no-image.jpeg" width="70" height="70"/></td>
                        <?php
                        }
                        else
                        {
                        ?>
                        <td><img src="/images/category/<?=$item['image']?>" width="70" height="70"/></td>
                        <?php
                        }
                        ?>
                        <td><?php echo ucfirst($item['status']); ?></td>                        
                        <td><?php echo $item['token']; ?></td>
                        <td>
                            <a href="/admin/manage/category/detail/<?php echo $item['id']; ?>" title="Detail"><i class="fa fa-eye"></i></a>
                            <a href="/admin/manage/category/edit/<?php echo $item['id']; ?>" title="Update"><i class="fa fa-edit"></i></a>
                            <a href="/admin/manage/category/delete/<?php echo $item['id']; ?>" title="Delete"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Token</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a class="btn btn-success bg-purple btn-flat" href="/role/add">Add</a>
    </div>
</div><!-- /.box -->

<script>
    $(function () {
        $('#category-list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<script src="/assets/normal/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/normal/plugins/datatables/dataTables.bootstrap.min.js"></script>