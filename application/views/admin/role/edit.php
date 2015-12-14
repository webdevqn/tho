<?php
echo $this->session->flashdata('error');
?>

<div class="box box-purple">
    <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa chức vụ: <?php echo $content[0]['title']; ?></h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?php echo form_open('/admin/manage/role/edit/' . $content[0]['id']); ?>
    <div class="box-body">
        <div class="form-group">
            <label for="title">Tên chức vụ</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $content[0]['title']; ?>">
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="active" <?php echo ($content[0]['status'] === 'active') ? 'checked' : ''; ?>>Kích hoạt
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="deleted" <?php echo ($content[0]['status'] === 'deleted') ? 'checked' : ''; ?>>Vô hiệu
                </label>
            </div>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn bg-purple btn-flat">Lưu</button>
        <a role="button" href="/admin/manage/role"class="btn btn-flat bg-navy">Trở lại danh sách</a>
    </div>
</form>
</div><!-- /.box -->