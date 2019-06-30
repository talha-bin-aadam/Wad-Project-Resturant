<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
    require_once "db_connection.php";

}
if(isset($_GET['edit_item'])){
    $get_id = $_GET['edit_item'];
    $get_item = "select * from menu_items where item_id='$get_id'";
    $run_item = mysqli_query($con, $get_item);
    $row_item = mysqli_fetch_array($run_item);
    $item_id = $row_item['item_id'];
    $item_title = $row_item['item_title'];
    $item_cat = $row_item['item_cat'];
    $item_title = $row_item['item_title'];
    $item_price = $row_item['item_price'];
    $item_image = $row_item['item_image'];
    $item_desc = $row_item['item_desc'];

    $get_cat = "select * from menu_category where cat_id = '$item_cat'";
    $run_cat = mysqli_query($con,$get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];

}
if(isset($_POST['update_item'])){
    //getting text data from the fields
    $item_title = $_POST['item_title'];
    $item_cat = $_POST['item_cat'];
    $item_price = $_POST['item_price'];
    $item_desc = $_POST['item_desc'];
    //getting image from the field
    $item_image = $_FILES['item_image']['name'];
    $item_image_tmp = $_FILES['item_image']['tmp_name'];

    move_uploaded_file($item_image_tmp,"item_images/$item_image");

    $update_item = "update menu_items set item_cat = '$item_cat', 
                                        item_title = '$item_title' ,
                                        item_price = '$item_price',
                                        item_desc = '$item_desc',
                                        item_image = '$item_image', 
                                        where item_id='$item_id'";

    $updated_item = mysqli_query($con, $update_item);
    if($updated_item){
        header("location: index.php?view_items");
    }
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Item </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="item_title">Item Title</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="item_title" name="item_title" placeholder="Title"
                           value="<?php echo $item_title;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="item_cat">Item Category</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="item_cat" id="item_cat" required class="form-control">
                        <option><?php echo $cat_title;?></option>
                        <?php
                        $get_cats = "select * from menu_category";
                        $run_cats = mysqli_query($con, $get_cats);
                        while ($row_cats= mysqli_fetch_array($run_cats)){
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            echo "<option value='$cat_id'>$cat_title </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="item_image">Item Image</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <img class="img-thumbnail" src='item_images/<?php echo $item_image;?>' width='80' height='80'>
                    <input class="form-control-file" type="file" id="item_image" name="item_image" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="item_price">Item Price</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="item_price" name="item_price" placeholder="Item Price"
                           value="<?php echo $item_price;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="item_desc">Item Description</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="form-control"  name="item_desc" id="item_desc" rows="4" placeholder="Item Description">
                        <?php echo $item_desc;?>
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_item" name="update_item"
                           value="Update Item Now">
                </div>
            </div>
        </form>
    </div>
</div>
