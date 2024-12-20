<?php 
include 'connection.php';

$update=FALSE;
$BrandLogo="";
$BrandName="";

if(isset($_POST['addBrand'])){
    $BrandName=mysqli_real_escape_string($connect, $_POST['BrandName']);
    $BrandLogo=$_FILES['img']['name'];

    $InsertBrand="INSERT INTO `brands` VALUES (NULL, '$BrandName','$BrandLogo')";
    $RunInsert=mysqli_query($connect,$InsertBrand);
    move_uploaded_file($_FILES['img']['tmp_name'], "../uploaded/" . $BrandLogo);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="/imgs/white logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/addCompany.css">

    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>

    <main>
        <img class="top-img" src="imgs/portfolio-header.png" alt="">
        <!-- header -->
        <div class="header text-center text-white overflow-hidden">
            <div class="d-flex align-items-center justify-content-center gap-5">
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <hr class="underline">
                </div>
                <h1>Add <span class="glow">Company</span></h1>
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <hr class="underline">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                </div>
            </div>
        </div>

        <!-- add event -->
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data" class="form">
                <!-- upload  -->
                <label class="custum-file-upload" for="file">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill=""
                                    d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="text">
                        <span>Click to upload image</span>
                    </div>
                    <input type="file" name="img" id="file">
                </label>

                <!-- end upload  -->

                <input required="" class="input" type="text" name="BrandName" id="name" placeholder="name">
                <button class="login-button" type="submit" name="addBrand">Add Company</button>
            </form>

        </div>



        <!-- end add event  -->

    </main>


    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>



</body>

</html>