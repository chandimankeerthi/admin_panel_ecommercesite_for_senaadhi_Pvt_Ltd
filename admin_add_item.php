<?php
include "config.php";

if(isset($_REQUEST['AddCategory'])){
    
    
    $mainCat=$_REQUEST['newMain'];
    $subCat1=$_REQUEST['newSub1'];
    $subCat2=$_REQUEST['newSub2'];
    $sqlAddCat="INSERT INTO `item_category`(`main_category`, `sub_category_1`, `sub_category_2`) VALUES ('$mainCat','$subCat1','$subCat2')";
    
    $conn->query($sqlAddCat);
}

if(isset($_REQUEST['InsertProduct'])){
$mainCate=$_REQUEST['mainCat'];
$subCate1=$_REQUEST['subCat1'];
$subCate2=$_REQUEST['subCat2'];
$pName=$_REQUEST['productName'];
$pDes=$_REQUEST['productDes'];
$pInfo=$_REQUEST['productInfo'];
$quantity=(int)$_REQUEST['productQuantity'];
$size='Null';
$price=(int)$_REQUEST['productPrice'];
$discount=0;
$stockStatus='NULL';


$target_dir = "../uploads/";
if(isset($_FILES['productImage1'])&& $_FILES['productImage1']['size']>0){
$type=str_replace("image/", "", $_FILES['productImage1']['type']);
$image1=$pName."_1.".$type;
$target_file1 = $target_dir .$image1 ;
move_uploaded_file($_FILES["productImage1"]["tmp_name"], $target_file1);
}else{
$image1='Null';
}
if(isset($_FILES['productImage2'])&& $_FILES['productImage2']['size']>0){
$type=str_replace("image/", "", $_FILES['productImage2']['type']);
$image2=$pName."_2.".$type;
$target_file2 = $target_dir .$image2 ;
move_uploaded_file($_FILES["productImage2"]["tmp_name"], $target_file2);
}else{
$image2='Null';
}
if(isset($_FILES['productImage3'])&& $_FILES['productImage3']['size']>0){
$type=str_replace("image/", "", $_FILES['productImage3']['type']);
$image3=$pName."_3.".$type;
$target_file3 = $target_dir .$image3 ;
move_uploaded_file($_FILES["productImage3"]["tmp_name"], $target_file3);
}else{
$image3='Null';
}

$sql="INSERT INTO `products_new`( `main_category`, `sub_category_1`, `sub_category_2`, `product_name`, `image1`, `image2`, `image3`, `product_description`,`product_information`, `quantity`, `size`, `listed_price_per_item`, `discount`, `stock_status`)
VALUES ('$mainCate','$subCate1','$subCate2','$pName','$image1','$image2','$image3','$pDes','$pInfo',$quantity,$size,$price,$discount,$stockStatus)";
 //$sql="INSERT INTO `products_new`( `main_category`, `sub_category_1`, `sub_category_2`, `product_name`, `image1`, `image2`, `image3`, `product_description`, `product_information`, `quantity`, `size`, `listed_price_per_item`, `discount`, `stock_status`)
 //VALUES ('mainCate','subCate1','subCate2','pName',null,null,null,'pDes','pInfo',1222,null,11111,null,null)";
 //echo $sql;
$conn->query($sql);


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
                <label for="inputmaincatgory" class="form-label">Main Category</label>
                <select class="form-select" aria-label="Default select example" name="mainCat">

                    <option value="Shirt">shirt</option>

                </select>
            </div>
            <div class="col-md-4">
                <label for="inputshirtecategorey" class="form-label">Shirts Category</label>
                <select class="form-select" aria-label="Default select example" name="shirtecategorey">
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
                <input type="text" class="form-control" name="Productname">
            </div>

            <div class="col-md-2">
                <label for="inputProductprice" class="form-label">Product Price</label>
                <input type="number" class="form-control" name="productPrice">
            </div>

            <div class="col-md-2">
                <label for="inputdiscountpercentage" class="form-label">Discount Percentage</label>
                <input type="number" class="form-control" name="discountpercentage">
            </div>

            <div class="col-md-2">
                <label for="inputPq" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="productQuantity">
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



            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px" name="productInfo"></textarea>
                    <label for="floatingTextarea2">Product Information</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px" name="productDes"></textarea>
                    <label for="floatingTextarea2">Product Description</label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputproductimage1" class="form-label">Product Image 01</label>
                <input type="file" class="form-control" id="inputProductImage" name="productImage1">
            </div>
            <div class="col-md-4">
                <label for="inputproductimage2" class="form-label">Product Image 02</label>
                <input type="file" class="form-control" id="inputProductImage" name="productImage2">
            </div>
            <div class="col-md-4">
                <label for="inputproductimage3" class="form-label">Product Image 03</label>
                <input type="file" class="form-control" id="inputProductImage" name="productImage3">
            </div>

            <div class="col-3">
                <input type="submit" class="btn btn-primary" value="Add Product" name="InsertProduct">
            </div>
            <div class="col-6">
                <input type="reset" class="btn btn-primary" value="Clear" name="Clear">
            </div>
        </form></br>
        <h1>Add New Category</h1></br>
        <form class="row g-3">

            <div class="col-md-4">
                <label for="inputCname" class="form-label">Main Category</label>
                <input type="text" class="form-control" id="inputProductName" name="newMain">
            </div>
            <div class="col-md-4">
                <label for="inputCname" class="form-label">Sub Category 01</label>
                <input type="text" class="form-control" id="inputProductName" name="newSub1">
            </div>
            <div class="col-md-4">
                <label for="inputCname" class="form-label">Sub Category 02</label>
                <input type="text" class="form-control" id="inputProductName" name="newSub2">
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Add Category" name="AddCategory">
            </div>
        </form>



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