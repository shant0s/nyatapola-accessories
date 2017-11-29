<?php include_once 'admin_header.php'; ?>
<div class="container">
    <div class="form-group">
        <div class="col-lg-4">
            <legend><h2>Product List</h2></legend>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-6">
            <?php if ($this->session->flashdata('message')) { ?>
                <?php
                $message_class = $this->session->flashdata('message_class');
                echo '<p class="' . $message_class . '">' . $this->session->flashdata('message') . '</p>';
                ?>
            <?php } ?>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <tbody>
            <?php
            if (sizeof($products) > 0) {
                $count = $this->uri->segment(3);
                foreach ($products as $products) {
                    
                    ?>
                    <tr>
                        <td><?php echo ++$count; ?></td>
                        <td><?php echo $products['pname']; ?></td>
                        <td><?php echo $products['created_at']; ?></td>
                        <td>
                            <a href="<?php echo base_url("admin/edit_products/").$products['id']; ?>" class="btn btn-success">Edit</a> 
                            <a href="<?php echo base_url("admin/delete_products/").$products['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No Content Found.</td>
                </tr>
<?php } ?>
        </tbody>
    </table>
    <center><?php echo $this->pagination->create_links(); ?></center>
</div>
<?php include_once 'admin_footer.php'; ?>