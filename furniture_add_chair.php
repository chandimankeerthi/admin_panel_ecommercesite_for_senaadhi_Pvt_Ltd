<?php
include "config.php";

if(isset($_REQUEST['InsertProduct'])){
    $mainCat=$_REQUEST['mainCat'];
    $chaircategorey=$_REQUEST['chaircategorey'];
    $brand=$_REQUEST['brand'];
    $Productname=$_REQUEST['Productname'];
    $productPrice=$_REQUEST['productPrice'];
    $discountpercentage=$_REQUEST['discountpercentage'];
    $productQuantity=$_REQUEST['productQuantity'];
    $armtype=$_REQUEST['armtype'];
    $colorfamily=$_REQUEST['colorfamily'];
    $backheight=$_REQUEST['backheight'];
    $deskchairtype=$_REQUEST['deskchairtype'];
    $upholsterytype=$_REQUEST['upholsterytype'];
    $adjustablehandle=$_REQUEST['adjustablehandle'];
    $warrantytype=$_REQUEST['warrantytype'];
    $warrantyperiod=$_REQUEST['warrantyperiod'];
    $coreconstruction=$_REQUEST['coreconstruction'];
    $patterntype=$_REQUEST['patterntype'];
    $linenfabric=$_REQUEST['linenfabric'];
    $featuretype=$_REQUEST['featuretype'];
    $materialtype=$_REQUEST['materialtype'];
    $shipping_cost=$_REQUEST['shipping_cost'];
    $productInfo=$_REQUEST['productInfo'];
    $productDes=$_REQUEST['productDes'];
    $trending='NULL';
    $product_type='furniture';
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

                          
$sql="INSERT INTO `product_details`(`mainCat`,`sub_categorey`,`brand`,`Productname`,`productPrice`,`discountpercentage`,`productQuantity`,`armtype`,`colorfamily`,`backheight`,`deskchairtype`,`upholsterytype`,`adjustablehandle`,`warrantytype`,`warrantyperiod`,`coreconstruction`,`patterntype`,`linenfabric`,`featuretype`,`productInfo`,`productDes`,`productImage1`,`productImage2`,`productImage3`,`materialtype`,`shipping_cost`,`stockStatus`,`trending`,`product_type`)
VALUES ('$mainCat','$chaircategorey','$brand','$Productname',$productPrice,$discountpercentage,$productQuantity,'$armtype','$colorFamily','$backheight','$deskchairtype','$upholsterytype','$adjustablehandle','$warrantytype','$warrantyperiod','$coreconstruction','$patterntype','$linenfabric','$featuretype','$productInfo','$productDes','$image1','$image2','$image3','$materialtype',$shipping_cost,'$stockStatus','$trending','$product_type')";
 
if ($conn->query($sql)) {
    // Insertion was successful
    echo '<script>alert("Product Added Successfully");</script>';
} else {
    // Insertion failed
    echo '<script>alert("Failed to Add Product");</script>';
}

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

        <h1>Add New Chair</h1></br>
        <form class="row g-3" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="col-md-4">
                <label for="inputmainCat" class="form-label">Main Category</label>
                <select class="form-select" aria-label="Default select example" name="mainCat">

                    <option value="Chair">Chair</option>

                </select>
            </div>

            <div class="col-md-4">
                <label for="inputchaircategorey" class="form-label">Chair Category</label>
                <select class="form-select" aria-label="Default select example" name="chaircategorey">
                    <?php
$getCategory="SELECT distinct(category_name) FROM furniture_chairs_sub_category";
$resultSubCategory1=$conn->query($getCategory);
while($rowSub1 = $resultSubCategory1->fetch_array()){
?>
                    <option value="<?php echo $rowSub1['category_name'] ?>"><?php echo $rowSub1['category_name'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputbrand" class="form-label">Brand</label>
                <select class="form-select" aria-label="Default select example" name="brand">
                    <?php
$getCategory="SELECT distinct(brand_name) FROM furniture_brands ";
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
                <label for="inputarmtype" class="form-label">Chair Arm Type</label>
                <select class="form-select" aria-label="Default select example" name="armtype">
                    <?php
$getCategory="SELECT distinct(type) FROM furniture_arms";
$resultSubCategory1=$conn->query($getCategory);
while($rowSub1 = $resultSubCategory1->fetch_array()){
?>
                    <option value="<?php echo $rowSub1['type'] ?>"><?php echo $rowSub1['type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputbackheight" class="form-label">Back Height</label>
                <select class="form-select" aria-label="Default select example" name="backheight">
                    <?php
$getCategory="SELECT distinct(type) FROM furniture_back_height";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['type'] ?>"><?php echo $rowSub2['type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputdeskchairtype" class="form-label">Desk Chair Type</label>
                <select class="form-select" aria-label="Default select example" name="deskchairtype">
                    <?php
$getCategory="SELECT distinct(type) FROM furniture_desk_chair_type";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['type'] ?>"><?php echo $rowSub2['type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputupholsterytype" class="form-label">Upholstery Type</label>
                <select class="form-select" aria-label="Default select example" name="upholsterytype">
                    <?php
$getCategory="SELECT distinct(type) FROM furniture_upholstery";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['type'] ?>"><?php echo $rowSub2['type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputadjustablehandle" class="form-label">Adjustable Handle Availability</label>
                <select class="form-select" aria-label="Default select example" name="adjustablehandle">
                    <?php
$getCategory="SELECT distinct(availability) FROM furniture_adjustable_handle";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['availability'] ?>"><?php echo $rowSub2['availability'] ?>
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
$getCategory="SELECT distinct(type) FROM furniture_warranty_type";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="<?php echo $rowSub2['type'] ?>"><?php echo $rowSub2['type'] ?>
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
                <label for="inputcoreconstruction" class="form-label">Core Construction</label>
                <select class="form-select" aria-label="Default select example" name="coreconstruction"">
                    <?php
$getCategory="SELECT distinct(core_construction_ype) FROM furniture_core_construction";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value="
                    <?php echo $rowSub2['core_construction_ype'] ?>"><?php echo $rowSub2['core_construction_ype'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputpatterntype" class="form-label">Pattern Type</label>
                <select class="form-select" aria-label="Default select example" name="patterntype"">
                    <?php
$getCategory="SELECT distinct(pattern) FROM furniture_pattern";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value=" <?php echo $rowSub2['pattern'] ?>"><?php echo $rowSub2['pattern'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputlinenfabric" class="form-label">Linen Fabric Type</label>
                <select class="form-select" aria-label="Default select example" name="linenfabric"">
                    <?php
$getCategory="SELECT distinct(fabric_type) FROM furniture_linen_fabric";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value=" <?php echo $rowSub2['fabric_type'] ?>"><?php echo $rowSub2['fabric_type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputfeaturetype" class="form-label">Furniture Feature Type</label>
                <select class="form-select" aria-label="Default select example" name="featuretype"">
                    <?php
$getCategory="SELECT distinct(feature_type) FROM furniture_features";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value=" <?php echo $rowSub2['feature_type'] ?>"><?php echo $rowSub2['feature_type'] ?>
                    </option>
                    <?php
}
        ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputmaterialtype" class="form-label">Furniture Material Type</label>
                <select class="form-select" aria-label="Default select example" name="materialtype"">
                    <?php
$getCategory="SELECT distinct(type) FROM furniture_material";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>
                    <option value=" <?php echo $rowSub2['type'] ?>"><?php echo $rowSub2['type'] ?>
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
                <label for="inputcolorfamily" class="form-label">Color Family :</label>


                <?php
$getCategory="SELECT distinct(color_type) FROM furniture_color_family";
$resultSubCategory2=$conn->query($getCategory);
while($rowSub2 = $resultSubCategory2->fetch_array()){
?>

                <input type="checkbox" name="colorfamily[]" value="<?php echo $rowSub2['color_type'] ?>">
                <?php echo $rowSub2['color_type'] ?>

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
                <input type="reset" class="btn btn-primary" value="Clear" name="Clear">
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