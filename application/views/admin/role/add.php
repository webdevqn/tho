<?php
echo $this->session->flashdata('error');
?>

<div class="box box-purple">
    <div class="box-header with-border">
        <h3 class="box-title">Thêm chức vụ</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?php echo form_open('admin/manage/role/add'); ?>
    <div class="box-body">
        <div class="form-group">
            <label for="title">Tên chức vụ</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Tên chức vụ" value="<?php echo set_value('title'); ?>">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-flat bg-purple">Thêm chức vụ</button>
        <a role="button" href="/admin/manage/role"class="btn btn-flat bg-navy">Quay lại danh sách</a>
    </div>
</form>
</div><!-- /.box -->