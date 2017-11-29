<?php include_once 'public_header.php'; ?>
<div class="container">
    <div class="jumbotron">
        <h1 style="padding-top: 120px;">Nyatapola Accessories</h1>
        <p>Remember us for varieties of Beads bracelets for both men and women. Your Look Says It All.</p>
        <p><a href="#" class="btn btn-default">Learn More</a></p>
    </div>
    <div class="display-flex row">
        <?php
        if (sizeof($products) > 0) {
            foreach ($products as $product) {
                ?>

                <div class="col-md-3">
                    <div class="thumbnail img-thumbnail">
                        <a href="<?php echo base_url("users/view_product_details/") . $product['id']; ?>">
                            <img src="<?php echo $product['image_path']; ?>" width="450" height="500" >
                            <p class="caption" style="padding-top: 15px;">
                                <?php echo word_limiter($product['pname'], 4); ?>
                            </p>
                        </a>
                    </div>
                </div>

                <?php
            }
        }
        ?>
    </div>
</div>
<?php include_once 'public_footer.php'; ?>