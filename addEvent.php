<?php
include "connection.php";
if(!isset($_SESSION['Admin_id'])){
    header("Location:index.html");
}

$cat="SELECT * FROM `category`";
$runCat=mysqli_query($connect,$cat);

$SelectBrand="SELECT * FROM `brands`";
$runBrand=mysqli_query($connect,$SelectBrand);

$empty=FALSE;
$NoCat=FALSE;
if(isset($_POST['Add'])){
    $EventName=mysqli_real_escape_string($connect, $_POST['eventName']);
    $eventCover=$_FILES['cover']['name'];
    $category=$_POST['cat'];
    $date=$_POST['date'];
    $brand=$_POST['brand'];

    if (empty($EventName) || empty($eventCover) || empty($category)) {
        $empty=TRUE;
    }else{
        if($category=="no" || $brand=="no"){
            $NoCat=TRUE;
        }elseif(empty($date)){
        $insertEvent="INSERT INTO `events`(`EventId`,`EventName`,`EventCover`,`CatId`, `BrandId` ) VALUES (NULL, '$EventName', '$eventCover', '$category','$brand') ";
        $RunInsert=mysqli_query($connect,$insertEvent);
        move_uploaded_file($_FILES['cover']['tmp_name'], "../uploaded/" . $eventCover);
        
        // echo "EVENT ADDED SUCCESSFULLY";
        // header("location:BlackAdamPremiere.php?details=$")
        }else{
            $insertEvent="INSERT INTO `events` VALUES (NULL, '$EventName', '$eventCover', '$date', '$category','$brand') ";
            $RunInsert=mysqli_query($connect,$insertEvent);
            move_uploaded_file($_FILES['cover']['tmp_name'], "../uploaded/" . $eventCover);
            // echo "EVENT ADDED SUCCESSFULLY";
        }
    }

    

}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="css/addEvent.css">
</head>
<body>
    
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data" id="uploadForm">
            <!-- Text Input -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="eventName" placeholder="Enter a title" required>
            </div>

            <!-- Date Input -->
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
            <label for="company">company:</label>
            <select id="imageDropdown" name="brand">
                <option value="no" disabled selected>Select company</option>
                <?php foreach ($runBrand as $value){?>
                <option value="<?php echo $value['BrandId'];?>"><?php echo $value['BrandName']; }?> </option>
            </select>
            


            
                

            <label for="category">Category:</label>
            <select id="videoDropdown" name="cat">
                <option value="no" disabled selected>Select category</option>
                <?php foreach ($runCat as $data){?>
                <option value="<?php echo $data['CatId'];?>"><?php echo $data['CatName']; }?> </option>
            </select>
</div>

            <!--  Image Upload -->
            <div class="form-group">
                <label for="imageUpload">Upload Event's Cover:</label>
                <input type="file"  name="cover" id="imageUpload" accept="image/*" multiple onchange="previewImages()">
                <div id="imagePreview" class="preview-container"></div>
            </div>

        <!-- Gannah: error message -->
        <?php if($NoCat){?>
        <div class="alert alert-danger">Please Choose the Event's Category</div> 
        <?php }if($empty){?>
        <div class="alert alert-danger">Please fill required data</div> 
        <?php } ?>


            <!-- Submit Button -->
            <button type="submit" name="Add" class="submit-btn">Submit</button>
        </form>
    </div>

    <script src="js/addEvent.js"></script>
</body>
</html>
