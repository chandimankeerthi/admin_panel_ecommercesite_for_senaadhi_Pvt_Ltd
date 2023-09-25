<?php
include "config.php";

if(isset($_REQUEST['InsertProduct'])){
$mainCat=$_REQUEST['mainCat'];
$sub_categorey=$_REQUEST['sub_categorey'];
$gendertype=$_REQUEST['gendertype'];
$brand=$_REQUEST['brand'];
$Productname=$_REQUEST['Productname'];
$productPrice=$_REQUEST['productPrice'];
$discountpercentage=$_REQUEST['discountpercentage'];
$productQuantity=$_REQUEST['productQuantity'];
$sleevetype=$_REQUEST['sleevetype'];
$fitype=$_REQUEST['fitype'];
$patterntype=$_REQUEST['patterntype'];
$collartype=$_REQUEST['collartype'];
$size=$_REQUEST['size'];
$colorfamily=$_REQUEST['colorfamily'];
$clothingmaterial=$_REQUEST['clothingmaterial'];
$warrantytype=$_REQUEST['warrantytype'];
$warrantyperiod=$_REQUEST['warrantyperiod'];
$trendtype=$_REQUEST['trendtype'];
$clothingstyle=$_REQUEST['clothingstyle'];
$shipping_cost=$_REQUEST['shipping_cost'];
$productInfo=$_REQUEST['productInfo'];
$productDes=$_REQUEST['productDes'];
$trending='NULL';
$product_type='fashion';
$stockStatus='In Stock';



$target_dir = "../uploads/";
if(isset($_FILES['productImage1'])&& $_FILES['productImage1']['size']>0){
$type=str_replace("image/", "", $_FILES['productImage1']['type']);
$image1=$Productname."_1.".$type;
$target_file1 = $target_dir .$image1 ;
move_uploaded_file($_FILES["productImage1"]["tmp_name"], $target_file1);
}else{
$image1='Null';
}
if(isset($_FILES['productImage2'])&& $_FILES['productImage2']['size']>0){
$type=str_replace("image/", "", $_FILES['productImage2']['type']);
$image2=$Productname."_2.".$type;
$target_file2 = $target_dir .$image2 ;
move_uploaded_file($_FILES["productImage2"]["tmp_name"], $target_file2);
}else{
$image2='Null';
}
if(isset($_FILES['productImage3'])&& $_FILES['productImage3']['size']>0){
$type=str_replace("image/", "", $_FILES['productImage3']['type']);
$image3=$Productname."_3.".$type;
$target_file3 = $target_dir .$image3 ;
move_uploaded_file($_FILES["productImage3"]["tmp_name"], $target_file3);
}else{
$image3='Null';
}


// Handle multiple selected colors
if (isset($_POST['colorfamily']) && is_array($_POST['colorfamily'])) {
    $selectedColors = $_POST['colorfamily'];
    
    // Join the selected colors into a comma-separated string
    $colorFamily = implode(',', $selectedColors);
} else {
    $colorFamily = ''; // Default value if no colors were selected
}


// Handle multiple selected sizes
if (isset($_POST['size']) && is_array($_POST['size'])) {
    $selectedsize = $_POST['size'];
    
    // Join the selected sizes into a comma-separated string
    $Size = implode(',', $selectedsize);
} else {
    $Size = ''; // Default value if no sizes were selected
}


$sql = "INSERT INTO `product_details` (
    `mainCat`, `sub_categorey`, `gendertype`, `brand`, `Productname`, `productPrice`, 
    `discountpercentage`, `productQuantity`, `sleevetype`, `fitype`, `patterntype`, 
    `collartype`, `size`, `colorfamily`, `clothingmaterial`, `warrantytype`, 
    `warrantyperiod`, `trendtype`, `clothingstyle`, `shipping_cost`, `productInfo`, 
    `productDes`, `productImage1`, `productImage2`, `productImage3`, `stockStatus`, 
    `trending`, `product_type`
) VALUES (
    '$mainCat', '$sub_categorey', '$gendertype', '$brand', '$Productname', $productPrice, 
    $discountpercentage, $productQuantity, '$sleevetype', '$fitype', '$patterntype', 
    '$collartype', '$Size', '$colorFamily', '$clothingmaterial', '$warrantytype', 
    '$warrantyperiod', '$trendtype', '$clothingstyle', $shipping_cost, 
    '$productInfo', '$productDes', '$image1', '$image2', '$image3', '$stockStatus', 
    '$trending', '$product_type'
)";

if ($conn->query($sql)) {
    // Insertion was successful
    echo '<script>alert("Product Added Successfully");</script>';
} else {
    // Insertion failed
    echo '<script>alert("Failed to Add Product");</script>';
}

// $sql="INSERT INTO `product_details`(`mainCat`,`sub_categorey`,`gendertype`,`brand`,`Productname`,`productPrice`,`discountpercentage`,`productQuantity`,`sleevetype`,`fitype`,`patterntype`,`collartype`,`size`,`colorfamily`,`clothingmaterial`,`warrantytype`,`warrantyperiod`,`trendtype`,`clothingstyle`,`shipping_cost`,`productInfo`,`productDes`,`productImage1`,`productImage2`,`productImage3`,`stockStatus`,`trending`,`product_type`)
// VALUES ('$mainCat','$sub_categorey','$gendertype','$brand','$Productname',$productPrice,$discountpercentage,$productQuantity,'$sleevetype','$fitype','$patterntype','$collartype','$size','$colorfamily','$clothingmaterial','$warrantytype','$warrantyperiod','$trendtype','$clothingstyle',$shipping_cost,'$productInfo','$productDes','$image1','$image2','$image3','$stockStatus','$trending','$product_type')";
 





}else{}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Tables</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <!-- ==========side navbars start ========== -->
    <?php
        include "admin_sidenav.php";
    ?>
    <!-- ==========side navbars end ========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== topbar start ========== -->
        <?php
        include "admin_topbar.php";
        ?>
        <!-- ========== topbar end ========== -->

        <!--Fortm start-->

        <h1>Add New Shirt</h1></br>
        <form class="row g-3" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="col-md-4">
                <label for="inputmainCat" class="form-label">Main Category</label>
                <select class="form-select" aria-label="Default select example" name="mainCat">

                    <option value="Shirt">shirt</option>

                </select>
            </div>

            <div class="col-md-4">
                <label for="inputsub_categorey" class="form-label">Shirts Category</label>
                <select class="form-select" aria-label="Default select example" name="sub_categorey">
                    <?php
$getCategory="SELECT distinct(category_type) FROM fashion_shirt_category";
$resultSubCategory1=$conn->query($getCategory);
while($rowSub1 = $resultSubCategory1->fetch_array()){
?>
                    <option value="<?php echo $rowSub1['category_type'] ?>"><?php echo $rowSub1['category_type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>


            <div class="col-md-4">
                <label for="inputsgendertype" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" name="gendertype">
                    <option value="Common">Common</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputbrand" class="form-label">Brand</label>
                <select class="form-select" aria-label="Default select example" name="brand">
                    <?php
$getCategory="SELECT distinct(brand_name) FROM fashion_mens_brands ";
$resultSubCategory1=$conn->query($getCategory);
while($rowSub1 = $resultSubCategory1->fetch_array()){
?>
                    <option value="<?php echo $rowSub1['brand_name'] ?>"><?php echo $rowSub1['brand_name'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-5">
                <label for="inputProductname" class="form-label">Product Name</label>
                <input type="text" class="form-control" required name="Productname" maxlength="26">
            </div>

            <div class="col-md-2">
                <label for="inputProductprice" class="form-label">Product Price</label>
                <input type="number" class="form-control" required name="productPrice" min="0">
            </div>

            <div class="col-md-2">
                <label for="inputdiscountpercentage" class="form-label">Discount Percentage</label>
                <input type="number" class="form-control" required name="discountpercentage" max="99" min="0">
            </div>

            <div class="col-md-2">
                <label for="inputPq" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" required name="productQuantity" min="0">
            </div>

            <div class="col-md-4">
                <label for="inputsleevetype" class="form-label">Sleeve Type</label>
                <select class="form-select" aria-label="Default select example" name="sleevetype">
                    <?php
$getCategory="SELECT distinct(sleevs_type) FROM fashion_sleevs";
$resultSubCategory1=$conn->query($getCategory);
while($rowSub1 = $resultSubCategory1->fetch_array()){
?>
                    <option value="<?php echo $rowSub1['sleevs_type'] ?>"><?php echo $rowSub1['sleevs_type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>


            <div class="col-md-4">
                <label for="inputfitype" class="form-label">Fit Type</label>
                <select class="form-select" aria-label="Default select example" name="fitype">
                    <?php
$getCategory="SELECT distinct(fit_size) FROM fashion_fit_type";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['fit_size'] ?>"><?php echo $rowSub2['fit_size'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputpatterntype" class="form-label">Pattern Type</label>
                <select class="form-select" aria-label="Default select example" name="patterntype">
                    <?php
$getCategory="SELECT distinct(pattern) FROM fashion_pattern_type";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['pattern'] ?>"><?php echo $rowSub2['pattern'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>


            <div class="col-md-4">
                <label for="inputcollartype" class="form-label">Collar Type</label>

                <select class="form-select" aria-label="Default select example" name="collartype">
                    <?php
$getCategory="SELECT distinct(collar_type) FROM fashion_collar_type";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
                  
?>
                    <option value="<?php echo $rowSub2['collar_type'] ?>"><?php echo $rowSub2['collar_type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputclothingmaterial" class="form-label">Clothing Material</label>
                <select class="form-select" aria-label="Default select example" name="clothingmaterial">
                    <?php
$getCategory="SELECT distinct(material_name) FROM fashion_clothing_material";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['material_name'] ?>"><?php echo $rowSub2['material_name'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputwarrantytype" class="form-label">Warranty Type</label>
                <select class="form-select" aria-label="Default select example" name="warrantytype">
                    <?php
$getCategory="SELECT distinct(warranty_type) FROM fashion_warranty_type";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['warranty_type'] ?>"><?php echo $rowSub2['warranty_type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputwarrantyperiod" class="form-label">Warranty Period</label>
                <select class="form-select" aria-label="Default select example" name="warrantyperiod">
                    <?php
$getCategory="SELECT distinct(period) FROM furniture_warranty_period";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['period'] ?>"><?php echo $rowSub2['period'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputtrendtype" class="form-label">Trends</label>
                <select class="form-select" aria-label="Default select example" name="trendtype">
                    <?php
$getCategory="SELECT distinct(trend_name) FROM fashion_trends";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['trend_name'] ?>"><?php echo $rowSub2['trend_name'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputclothingstyle" class="form-label">Clothing Style</label>
                <select class="form-select" aria-label="Default select example" name="clothingstyle"">
                    <?php
$getCategory="SELECT distinct(clothing_style) FROM fashion_clothing";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value=" <?php echo $rowSub2['clothing_style'] ?>"><?php echo $rowSub2['clothing_style'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputshipping_cost" class="form-label">Shipping Cost Per Item</label>
                <input type="number" class="form-control" required name="shipping_cost" min="0">
            </div>
            <div class="col-md-10">
                <label for="inputsize" class="form-label">Size :</label>
                <?php
$getCategory="SELECT distinct(size) FROM fashion_size";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
    
?>

                <input type="checkbox" name="size[]" value="<?php echo $rowSub2['size'] ?>">
                <?php echo $rowSub2['size'] ?>



                <?php
}
        ?>
                </select>
            </div>




            <div class="col-md-10">
                <label for="inputcolorfamily" class="form-label">Color Family :</label>


                <?php
$getCategory="SELECT distinct(color) FROM fashion_color_familiy";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>

                <input type="checkbox" name="colorfamily[]" value="<?php echo $rowSub2['color'] ?>">
                <?php echo $rowSub2['color'] ?>

                <?php
}
        ?>
            </div>

            </div>

            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px" required name="productInfo"></textarea>
                    <label for="floatingTextarea2">Product Information</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px" required name="productDes"></textarea>
                    <label for="floatingTextarea2">Product Description</label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputproductimage1" class="form-label">Product Image 01</label>
                <input type="file" class="form-control" id="inputProductImage" required name="productImage1">
            </div>
            <div class="col-md-4">
                <label for="inputproductimage2" class="form-label">Product Image 02</label>
                <input type="file" class="form-control" id="inputProductImage" required name="productImage2">
            </div>
            <div class="col-md-4">
                <label for="inputproductimage3" class="form-label">Product Image 03</label>
                <input type="file" class="form-control" id="inputProductImage" required name="productImage3">
            </div>

            <div class="col-3">
                <input type="submit" class="btn btn-primary" value="Add Product" name="InsertProduct">
            </div>
            <div class="col-6">
                <input type="reset" class="btn btn-primary" value="Clear" required name="Clear">
            </div>
        </form></br>

    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>