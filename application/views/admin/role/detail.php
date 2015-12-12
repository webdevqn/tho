<div class="box box-purple">
    <div class="box-header with-border">
        <h3 class="box-title">Thông tin chi tiết: <?php echo $content[0]['title']; ?></h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="form-group">
            <label for="title">Tên chức vụ</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $content[0]['title']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <?php
            if ($content[0]['status'] == 'active')
            {
               $content[0]['status'] = 'Kích hoạt';
            }
            else
            {
                $content[0]['status'] = 'Vô hiệu';
            }
            ?>
            <input type="text" class="form-control" id="status" name="status" value="<?php echo ucfirst($content[0]['status']); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="createdAt">Ngày tạo</label>
            <input type="text" class="form-control" id="createdAt" name="createdAt" value="<?php echo date('d/m/Y H:i:s', $content[0]['created_at']); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="createdBy">Tạo bởi</label>
            <input type="text" class="form-control" id="createdBy" name="createdBy" value="<?php echo $content[0]['created_by']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="updatedAt">Cập nhật lúc</label>
            <input type="text" class="form-control" id="updatedAt" name="updatedAt" value="<?php echo date('d/m/Y H:i:s', $content[0]['updated_at']); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="updatedBy">Cập nhật bởi</label>
            <input type="text" class="form-control" id="updatedBy" name="updatedBy" value="<?php echo $content[0]['updated_by']; ?>" disabled>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a class="btn bg-purple btn-flat" href="/admin/manage/role/edit/<?php echo $content[0]['id']; ?>">Chỉnh sửa</a>
        <a role="button" href="/admin/manage/role"class="btn btn-flat bg-navy">Trở lại danh sách</a>
    </div>
</div><!-- /.box -->