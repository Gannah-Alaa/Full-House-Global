<?php
include 'connection.php';

$cat="SELECT * FROM `category`";
$runCat=mysqli_query($connect,$cat);

$SelectBrand="SELECT * FROM `brands`";
$runBrand=mysqli_query($connect,$SelectBrand);


$empty=FALSE;
$NoCat=FALSE;

if(isset($_GET['edit'])){
    $EditId=$_GET['edit'];

    $SelectEdit="SELECT * FROM `events` JOIN `category` ON `category`.`CatId` = `events`.`CatId` WHERE `EventId` = $EditId";
    $runSelect=mysqli_query($connect,$SelectEdit);

    $Array=mysqli_fetch_assoc($runSelect);
    $EventName=$Array['EventName'];
    $Cover=$Array['EventCover'];
    $date=$Array['Date'];
    $category=$Array['CatId'];
    $brand=$Array['BrandId'];

    $selCat="SELECT * FROM `category` WHERE `CatId`='$category'";
        $runSelCat=mysqli_query($connect,$selCat);

        $fetch=mysqli_fetch_assoc($runSelCat);
        $SelectedCat=$fetch['CatName'];

    $selBrand="SELECT * FROM `brands` WHERE `BrandId`='$brand'";
        $runSelBrand=mysqli_query($connect,$selBrand);

        $fet=mysqli_fetch_assoc($runSelBrand);
        $SelectedBrand=$fet['BrandName'];
}

if(isset($_POST['update'])){
    $Cover=$Array['EventCover'];
    $EventName=mysqli_real_escape_string($connect,$_POST['eventName']);
    $category=$_POST['cat'];
    $date=$_POST['date'];
    $brand=$_POST['brand'];

    if($category=="no"){
        $category=$Array['CatId'];
    }    if($brand=="no"){
        $brand=$Array['BrandId'];
    }


    if ($_FILES['cover']['tmp_name']){
        $Cover=$_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'],"../uploaded/".$Cover);
    }

    $UpdateEvent="UPDATE `events` SET `EventName` = '$EventName', `Date`= '$date', `BrandId`='$brand', `EventCover`='$Cover',`CatId`='$category'
     WHERE `EventId`='$EditId'";                
    $RunUpdate=mysqli_query($connect,$UpdateEvent);
    header("location:AdminPortfolio.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="css/addEvent.css">
</head>
<body>
    <div class="form-container">
<div class="heading">
    <h1>Edit event</h1>            
    <img src="<?php echo "../uploaded/", $Cover ?>" alt="">
</div>

        <form method="POST" enctype="multipart/form-data" id="uploadForm">
            <!-- Text Input -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="eventName" value="<?php echo $EventName;?>" placeholder="Enter a title" required>
            </div>
            <!-- Date Input -->
            <div class="form-group">
                <label for="date">Date:<?php echo $date;
        if($date==NULL){
            echo "No Date chosen";
        }
        ?></label>
                <input type="date" id="date" name="date" value="<?php echo $date; ?>" required>
            </div>
            <div class="form-group">
            <label for="company">company:</label>
            <select id="imageDropdown" name="brand">
                <option value="no" selected><?php echo $SelectedBrand; ?></option>
                <?php foreach ($runBrand as $value){?>
                <option value="<?php echo $value['BrandId'];?>"><?php echo $value['BrandName']; }?> </option>
            </select>
                          

            <label for="category">Category:<?php echo $SelectedCat; ?></label>
            <select id="videoDropdown"  name="cat">
                <option value="no"  selected><?php echo $SelectedCat; ?></option>
                <?php foreach ($runCat as $data){?>
                    <option value="<?php echo $data['CatId'];?>"><?php echo $data['CatName']; }?> </option>
            </select>
</div>

            <!--  Image Upload -->
            <div class="form-group">
                <label for="imageUpload">Upload Event's Cover:</label>
                <input type="file" name="cover" id="imageUpload" accept="image/*" multiple onchange="previewImages()">
                <div id="imagePreview" class="preview-container"></div>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="update" class="submit-btn">Submit</button>
        </form>
    </div>

    <script src="js/addevent.js"></script>
</body>
</html>
