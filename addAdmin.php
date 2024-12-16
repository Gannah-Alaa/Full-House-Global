<?php
include "connection.php";

$empty=FALSE;
$taken=FALSE;
$match=FALSE;
$weak=FALSE;

if (isset($_POST['submit'])) {
  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['copassword'];
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $lower_case = preg_match('@[a-z]@', $password);
  $upper_case = preg_match('@[A-Z]@', $password);
  $numbers = preg_match('@[0-9]@', $password);
  $spaecial_charecters = preg_match('@[^\w]@', $password);


  $select = "SELECT * FROM `admin` WHERE `admin_email`='$email'";
  $run_select = mysqli_query($connect, $select);
  $row = mysqli_num_rows($run_select);

  if (empty($email) || empty($username) || empty($password) || empty($password2)) {
    $empty=TRUE;
  } elseif ($row > 0) {
    $taken=TRUE;
  } elseif ($password != $password2) {
    $match=TRUE;
  } elseif ($lower_case < 1 || $upper_case < 1 || $numbers < 1 || $spaecial_charecters < 1) {
    $weak=TRUE;
  } else {
    $insertquery = "INSERT INTO `admin` VALUES (NULL , '$username' , '$email' , '$hash')";
    $runinsert = mysqli_query($connect, $insertquery);
  }
  echo "added Successfully";
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
    <link rel="stylesheet" href="css/addAdmin.css">

<link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-center justify-content-around w-100">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="portfolio.html">Portfolio</a>
                    </li>
                    <img src="imgs/white logo.png" alt="" class="d-inline-block">

                    <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.html">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                <h1>Our <span class="glow">Admins</span></h1>
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <hr class="underline">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                </div>
            </div>
        </div>

        <!-- add event -->
        

        <button class="button" type="submit" onclick="addadmin()">
          <span class="button__text">Add Admin</span>
          <span class="button__icon"><svg class="svg" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg></span>
          
        </button>

<div class="container">


        <table class="table table-hover table-striped ">
            <thead>
                <tr>
                  <th scope="col">.</th>
                  <th scope="col">Email</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Otto</td>
                  <td> 
                    <button class="del" onclick="showAlert()" >
                        <iconify-icon icon="mynaui:trash" width="24" height="24"></iconify-icon></td>
                    </button>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td >Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
          </table>
        </div>
         <!-- end add event  -->
        
    </main>

    <!-- footer -->
    <footer>
        <div class="footer">
            <div class="row w-100">
                <div class="contact-info col d-flex flex-column align-items-center">
                    <div class="contact-title d-flex position-relative">
                        <iconify-icon icon="iconoir:phone-solid" width="68px" class="d-inline-block"></iconify-icon>
                        <h3>Phone</h3>
                    </div>
                    <div class="d-flex align-items-center">
                        <hr class=" title-dash">
                        <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                        <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    </div>
                    <div>
                        <p>02 245 5955</p>
                        <p>010 000 015 865</p>
                    </div>
                </div>
                <div class="contact-info col d-flex flex-column align-items-center">
                    <div class="contact-title d-flex position-relative">
                        <iconify-icon icon="material-symbols:mail" width="68px"></iconify-icon>
                        <h3>Email</h3>
                    </div>
                    <div class="d-flex align-items-center">
                        <hr class=" title-dash">
                        <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                        <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    </div>
                    <p>info@fullhouseglobal.com</p>
                </div>
                <div class="contact-info col d-flex flex-column align-items-center">
                    <div class="contact-title d-flex position-relative">
                        <iconify-icon icon="basil:location-solid" width="68" height="68"></iconify-icon>
                        <h3>Address</h3>
                    </div>
                    <div class="d-flex align-items-center">
                        <hr class=" title-dash">
                        <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                        <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    </div>
                    <p>24 Ghernata, Elmontaza <br>
                        Heliopolis, cairo, Egypt</p>
                </div>
            </div>
            <hr class="white-line">
            <div class="d-flex justify-content-between p-4">
                <div class="d-flex align-items-center">
                    <img src="imgs/white logo.png" alt="">
                    <h2 class="mx-3">Full House Global</h2>
                </div>
                <div class="icons d-flex gap-lg-4">
                    <span>
                        <a href="https://www.linkedin.com/company/full-house-global" target="_blank">
                            <iconify-icon icon="mage:facebook" width="1.5em"></iconify-icon>
                        </a>
                    </span>
                    <span>
                        <a href="https://www.instagram.com/fullhouseglobal/" target="_blank">
                            <iconify-icon icon="flowbite:instagram-solid" width="1.5em" height="1.5em"></iconify-icon>
                        </a>
                    </span>
                    <span>
                        <a href="https://www.linkedin.com/company/full-house-global" target="_blank">
                            <iconify-icon icon="basil:linkedin-solid" width="1.5em" height="1.5em"></iconify-icon>
                        </a>
                    </span>
                    <span>
                        <a href="https://api.whatsapp.com/send?phone=2001000015865&text=" target="_blank">
                            <iconify-icon icon="fa:whatsapp" width="1.5em" height="1.5em"></iconify-icon>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showAlert() {
            Swal.fire({
                title: 'Delete Admin',
                text: 'Do you want to delete this admin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonText: 'No, cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Deleted!', 'The admin has been Deleted.', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'No admin was Deleted.', 'error');
                }
            });
        }

        function addadmin(){
            const { value: email } =  Swal.fire({
  title: "Input email address",
  input: "email",
  inputLabel: "Your email address",
  inputPlaceholder: "Enter your email address"
});
if (email) {
  Swal.fire(`Entered email: ${email}`);
}
        }
    </script>
    
</body>

</html>