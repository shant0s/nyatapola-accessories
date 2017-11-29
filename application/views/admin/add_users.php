<?php include_once 'admin_header.php'; ?>
<div class="container">
    <?php echo form_open('add_users/store_users', ['class'=>'form-horizontal']); ?>
    <?php date_default_timezone_set('Asia/Kathmandu');
            echo form_hidden('created_at', date('d M Y h:i:s')); ?>
        <div class="form-group">
            <div class="col-lg-3">
            <legend><h2>Add Users</h2></legend>
            </div>
            <div class="col-lg-6" style="padding-top: 25px;">
                <?php if($this->session->flashdata('message')) {?>
                <?php $message_class = $this->session->flashdata('message_class'); 
                    echo '<p class="'.$message_class.'">'.$this->session->flashdata('message').'</p>';
                ?>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Firstname: </label>
            <div class="col-lg-4">
                <?php echo form_input(['name'=>'firstname', 'class'=>'form-control', 'placeholder'=>'Firstname', 'value'=> set_value('firstname')]); ?>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('firstname'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Lastname: </label>
            <div class="col-lg-4">
                <?php echo form_input(['name'=>'lastname', 'class'=>'form-control', 'placeholder'=>'Lastname', 'value'=> set_value('lastname')]); ?>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('lastname'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Username: </label>
            <div class="col-lg-4">
                <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Username', 'value'=> set_value('username')]); ?>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('username'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Password: </label>
            <div class="col-lg-4">
                <?php echo form_password(['name'=>'password', 'class'=>'form-control', 'placeholder'=>'Password', 'value'=> set_value('password')]); ?>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('password'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Confirm Password: </label>
            <div class="col-lg-4">
                <?php echo form_password(['name'=>'c_password', 'class'=>'form-control', 'placeholder'=>'Confirm Password', 'value'=> set_value('c_password')]); ?>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('c_password'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 col-lg-offset-2">
                <?php echo form_reset(['name'=>'reset', 'class'=>'btn btn-default', 'value'=>'Reset']); ?>
                <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-success', 'value'=>'Submit']); ?>
            </div>
        </div>
    </form>
</div>
<?php include_once 'admin_footer.php'; ?>