<?php include_once 'admin_header.php'; ?>
<div class="container">
    <?php echo form_open_multipart('admin/update_products', ['class'=>'form-horizontal']); ?>
        <legend><h2>Edit Product</h2></legend>
        <div class="form-group">
            <label class="col-lg-2 control-label">Product Name: </label>
            <div class="col-lg-4">
                <?php echo form_input(['name'=>'pname', 'class'=>'form-control', 'placeholder'=>'Product Name', 'value'=> $product->pname]); ?>
            </div>
            <div class="col-lg-6">
                <?php echo form_error('pname'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Price(NRs.): </label>
            <div class="col-lg-2">
                <?php echo form_input(['name'=>'price_nrs', 'class'=>'form-control', 'placeholder'=>'Price Per Bracelet', 'value'=> $product->price_nrs]); ?>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('price_nrs'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Product Description: </label>
            <div class="col-lg-6">
                <?php echo form_textarea(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Product Description', 'value'=> $product->description]); ?>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('description'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Selected Image: </label>
            <div class="col-lg-2">
                <p class="thumbnail">
                    <?php if($product->image_path != ''){ ?>
                    <img src="<?php echo $product->image_path; ?>" width="200" height="200"/>
                    <?php } ?>
                </p>
            </div>
            <div class="col-lg-4">
                <?php echo form_error('description'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Replace Image: </label>
            <div class="col-lg-4">
                <?php echo form_upload(['name'=>'image', 'class'=>'form-control']); ?>
            </div>
            <div class="col-lg-6">
                <?php if(isset($error_upload)){ echo $error_upload; }?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2 col-lg-offset-2">
                <?php echo form_reset(['name'=>'reset', 'class'=>'btn btn-default', 'value'=>'Reset']); ?>
                <?php echo form_hidden('hidden_id', $product->id); ?>
                <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-success', 'value'=>'Submit']); ?>
            </div>
        </div>
    </form>
</div>
<?php include_once 'admin_footer.php'; ?>