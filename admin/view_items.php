<div class="row">
    <div class="col-sm-12">
        <h1>Items</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_item = "select * from menu_items";
            $run_item = mysqli_query($con,$get_item);
            $count_item = mysqli_num_rows($run_item);
            if($count_item==0){
                echo "<h2> No items found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_item = mysqli_fetch_array($run_item)) {
                    $item_id = $row_item['item_id'];
                    $item_cat = $row_item['item_cat'];
                    $item_title = $row_item['item_title'];
                    $item_price = $row_item['item_price'];
                    $item_image = $row_item['item_image'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $item_title; ?></td>
                        <td><img class="img-thumbnail" src='item_images/<?php echo $item_image;?>' width='80' height='80'></td>
                        <td><?php echo $item_price; ?>/-</td>
                        <td><a href="index.php?edit_item=<?php echo $item_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="index.php?del_item=<?php echo $item_id?>" class="btn btn-danger">
                                <i class="fa fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>