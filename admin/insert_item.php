<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}

if (isset($_POST['insert_item'])) {
    //getting text data from the fields
    $item_title = test_input($_POST['item_title']);
    $item_cat = test_input($_POST['item_cat']);
    $item_price = test_input($_POST['item_price']);
    $item_desc = test_input($_POST['item_desc']);
    //getting image from the field
    $item_image_name = $_FILES['item_image']['name'];
    $item_image_tmp = $_FILES['item_image']['tmp_name'];
    $item_image_size = $_FILES['item_image']['size'];

    if (!preg_match("/[a-zA-Z0-9]+/", $item_title) || strlen($item_title) < 2) {
        $response = array(
            "type" => "warning",
            "message" => "Enter Valid Item title."
        );
    } else if ($item_cat == "Select Category") {
        $response = array(
            "type" => "warning",
            "message" => "Select Item Category."
        );
    } else if (!preg_match("/\d+(.\d+)?/", $item_price && $item_price > 0)) {
        $response = array(
            "type" => "warning",
            "message" => "Enter Valid Item Price."
        );
    } else if (file_exists($item_image_tmp)) {

        $image_info = getimagesize($item_image_tmp);
        $width = $image_info[0];
        $height = $image_info[1];
        $target_directory = "item_images/";
        $allowed_image_extension = array("png", "jpg", "jpeg");

        // Get image file extension
        $image_extension = pathinfo($item_image_name, PATHINFO_EXTENSION);

        // Validate file input to check if is not empty
        // Validate file input to check if is with valid extension
        if (!in_array($image_extension, $allowed_image_extension)) {
            $response = array(
                "type" => "warning",
                "message" => "Upload valid images. Only PNG and JPEG are allowed."
            );
            //echo $result;
        }    // Validate image file size
        else if ($item_image_size > 2000000) {
            $response = array(
                "type" => "warning",
                "message" => "Image size exceeds 2MB"
            );
        }    // Validate image file dimension
        else if ($width > "1000" || $height > "800") {
            $response = array(
                "type" => "warning",
                "message" => "Image dimension should be within 1000X800"
            );
        } else {
            $updated_img_name = "user_" . time() . "_" . $item_image_name;
            $target = $target_directory . $updated_img_name;
            if (move_uploaded_file($item_image_tmp, $target)) {

                $insert_item = "insert into menu_items (item_cat, item_title, item_desc, item_price, item_image) 
                  VALUES ('$item_cat', '$item_title', '$item_desc', '$item_price', '$updated_img_name');";
                $insert_item = mysqli_query($con, $insert_item);
                if ($insert_item) {
                    //header("location: ".$_SERVER['PHP_SELF']);
                    $response = array(
                        "type" => "success",
                        "message" => "item uploaded successfully."
                    );
                }


            } else {
                $response = array(
                    "type" => "warning",
                    "message" => "item in uploading image files."
                );
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h1 class="text-center my-4"><i class="fas fa-plus fa-md"></i> <span class="d-none d-sm-inline"> Add New </span>
    Item </h1>
<?php if (!empty($response)) { ?>
    <div class="alert alert-<?php echo $response["type"]; ?>">
        <?php echo $response["message"]; ?>
    </div>
<?php } ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="item_title" class="float-md-right"> <span class="d-sm-none d-md-inline"> Item </span>
                Title:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                </div>
                <input type="text" class="form-control" id="item_title" name="item_title"
                       placeholder="Enter Item Title"
                    <?php
                    if (@$response["type"] == "warning") {
                        echo "value='$item_title'";
                    }
                    ?>
                >
            </div>
        </div>
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="item_cat" class="float-md-right"><span class="d-sm-none d-md-inline"> Item </span>
                Category:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-list-alt"></i></div>
                </div>
                <select class="form-control" id="item_cat" name="item_cat">
                    <option>Select Category</option>

                    <?php
                    $getCatsQuery = "select * from menu_category";
                    $getCatsResult = mysqli_query($con, $getCatsQuery);
                    while ($row = mysqli_fetch_assoc($getCatsResult)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        if (@$response["type"] == "warning" && $cat_id == $item_cat) {
                            echo "<option value='$cat_id' selected>$cat_title</option>";
                        } else {
                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="item_price" class="float-md-right"> <span class="d-sm-none d-md-inline"> Item </span>
                Price:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-money-bill"></i></div>
                </div>
                <input class="form-control" id="item_price" name="item_price" placeholder="Enter item Price"
                    <?php
                    if (@$response["type"] == "warning") {
                        echo "value='$item_price'";
                    }
                    ?>
                >
            </div>
        </div>
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="item_img" class="float-md-right"><span class="d-sm-none d-md-inline"> Item </span>
                Image:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-image"></i></div>
                </div>
                <input class="form-control" type="file" id="item_image" name="item_image">
            </div>
        </div>

    </div>
    <div class="row my-3">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="item_desc" class="float-md-right"><span class="d-sm-none d-md-inline"> Item </span>
                Detail:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-comment-alt"></i></div>
                </div>
                <textarea class="form-control" type="file" id="item_desc" name="item_desc"
                          placeholder="Enter Item Detail"></textarea>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto"></div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <button type="submit" name="insert_item" class="btn btn-primary btn-block"><i class="fas fa-plus"></i>
                Insert Now
            </button>
        </div>
    </div>
</form>