
<?php
echo $this->session->flashdata('error');
?>

<div class="box box-success">          
    <div class="box-header with-border">
        <h3 class="box-title">Add</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?php $attribute = ['name' => 'add', 'id' => 'add']; ?>
    <?php echo form_open('admin/category/add', $attribute); ?>
    <div class="box-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
        </div>
        <div class="form-group">
            <label for="name">Slug</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-success btn-flat">Submit</button>
    </div>
</form>
</div><!-- /.box -->