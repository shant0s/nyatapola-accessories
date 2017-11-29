<?php include 'public_header.php'; ?>
<div class="container">

    <div class="col-lg-12">
        <h2><?php echo $result->pname; ?></h2>
        <hr>
    </div>

    <div class="form-horizontal ">
        <div class="col-lg-6">
            <div class="col-lg-8 thumbnail">
                <?php if ($result->image_path != '') { ?>
                    <img id="zoom_01" src="<?php echo $result->image_path; ?> " width="350" height="300"/>
                <?php } ?>
                    <p class="caption" style="padding: 3px 0 0 2px;"><?php echo '<b><h5>Price NRs.: '.$result->price_nrs.'</h5></b>'; ?></p>
            </div>
            <div class="col-lg-6 row">
                <div class="add_cart">
                    <p><a href="#" class="btn btn-success btn-block">Add To Cart</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">    
        <div class="col-lg-6">
            <p><?php echo nl2br($result->description); ?></p>
        </div>
    </div>

    <form class="col-lg-8 form-horizontal">
        <?php echo form_hidden('p_id', $result->id); ?>
        <?php echo form_hidden('price', $result->price_nrs); ?>
        <div>&nbsp;&nbsp;</div>
        <legend>Buy Now</legend>
        <div class="form-group">
            <label class="col-lg-2 control-label">Quantity: </label>
            <div class="col-lg-2">
                <input type="number" min="0" name="quantity" id="quantity" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Total Price: </label>
            <div class="col-lg-2">
                <input type="text" name="t_price" id="t_price" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Full Name: </label>
            <div class="col-lg-6">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Email: </label>
            <div class="col-lg-6">
                <input type="email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Contact No: </label>
            <div class="col-lg-6">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Address: </label>
            <div class="col-lg-6">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4 col-lg-offset-2">
                <input type="reset" class="btn btn-default" value="Reset"/>
                <input type="submit" class="btn btn-success" value="Submit"/>
            </div>
        </div>
    </form>
</div>
<?php include 'public_footer.php'; ?>