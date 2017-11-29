<?php include_once 'public_header.php'; ?>
<div class="container">
    <?php echo form_open('user_login/login_user', ['class' => 'form-horizontal']); ?>
    <div class="form-group">
        <div class="col-lg-2">
            <legend><h2>User Login</h2></legend>
        </div>
        <div class="col-lg-4" style="padding-top: 25px;">
            <?php if($this->session->flashdata('message')){?>
             <?php  echo '<p class="text-danger">'.$this->session->flashdata('message').'</p>'; ?>   
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-1">
            <label>Username</label>
        </div>
        <div class="col-lg-4">
            <?php echo form_input(['name' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'value' => set_value('username')]); ?>
        </div>
        <div class="col-lg-4">
            <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-1">
            <label>Password</label>
        </div>
        <div class="col-lg-4">
            <?php echo form_password(['name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']); ?>
        </div>
        <div class="col-lg-4">
            <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-1"></div>
        <div class="col-lg-4">
            <?php echo form_reset(['name' => 'reset', 'class' => 'btn btn-default', 'value' => 'Reset']); ?>
            <?php echo form_submit(['name' => 'submit', 'class' => 'btn btn-Success', 'value' => 'Submit']); ?>
        </div>
    </div>
</form>
</div>
<?php include_once 'public_footer.php'; ?>
