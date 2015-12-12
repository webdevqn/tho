<div class="box box-purple">
    <!-- <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
    </div> -->
    <div class="box-body">
        <table id="branch-list" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <th>Tạo bởi</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($content as $item): ?>
                    <tr>
                        <?php
                        if ($item['status'] == 'active')
                        {
                            $item['status'] = 'Kích hoạt';
                        }
                        else
                        {
                            $item['status'] = 'Vô hiệu';
                        }
                        ?>
                        <td><a href="/admin/manage/role/detail/<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></td>
                        <td><a href="/admin/manage/role/detail/<?php echo $item['id']; ?>"><?php echo $item['status']; ?></a></td>
                        <td><a href="/admin/manage/role/detail/<?php echo $item['id']; ?>"><?php echo $item['created_by']; ?></a></td>
                        <td>
                            <a href="/admin/manage/role/detail/<?php echo $item['id']; ?>" title="Detail"><i class="fa fa-plus"></i></a>
                            <a href="/admin/manage/role/edit/<?php echo $item['id']; ?>" title="Update"><i class="fa fa-edit"></i></a>
                            <a href="/admin/manage/role/delete/<?php echo $item['id']; ?>" title="Delete"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a class="btn bg-purple btn-flat" href="/admin/manage/role/add">Thêm chức vụ</a>
    </div>
</div><!-- /.box -->

<script>
    $(function () {
        $('#branch-list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<script src="/assets/normal/plugins/datatables/jquery.dataTables.js"></script>
<script src="/assets/normal/plugins/datatables/dataTables.bootstrap.min.js"></script>