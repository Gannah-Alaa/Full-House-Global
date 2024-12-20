<?php 
include 'connection.php';

if(isset($_GET['details'])){
    $EventId=$_GET['details'];

    $SelectEvent="SELECT * FROM `events` JOIN `category` ON `events`.`CatId`=`category`.`CatId`
    JOIN `brands` ON `events`.`BrandId`=`brands`.`BrandId`
    WHERE `EventId` = $EventId";
    $RunSelect=mysqli_query($connect,$SelectEvent);

    $array=mysqli_fetch_assoc($RunSelect);
    $EventName=$array['EventName'];
    $CatName=$array['CatName'];
    $BrandName=$array['BrandName'];
    $BrandLogo=$array['BrandLogo'];
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Adam Movie Premiere</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/portfolio-events.css">


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
        <div class="back-button position-absolute">
            <a href="portfolio.html">
                <iconify-icon icon="solar:rewind-back-bold" width="2rem"></iconify-icon>
            </a>
        </div>

        <!-- header -->
        <div class="header text-center text-white">
            <div class="d-flex align-items-center justify-content-center gap-5">
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <hr class="underline">
                </div>
                <h1><?php echo $EventName ?></h1>
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <hr class="underline">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                </div>
            </div>
            <div class="event-details d-flex align-items-center justify-content-around ">
                <div class="event-tag"><?php echo $CatName ?></div>
                <h3 class="my-3"><?php echo $BrandName ?></h3>
                <img src="<?php echo "../uploaded/".$BrandLogo ?>" alt="" class="c-logo">
            </div>
        </div>

        <div class="container">
            <div class="event-images row gy-4">

                <a href="imgs/events/vox black adam movie/19-10 IMAX CITY CENTER v3.mp4?autoplay=0">
                    <video src="imgs/events/vox black adam movie/19-10 IMAX CITY CENTER v3.mp4" width="100%" autoplay
                        controls playsinline></video>
                </a>

                <a class="" href="../uploaded/ss.png" data-toggle="lightbox"
                    data-gallery="photo_gallery">
                    <img src="../uploaded/ss.png" alt="" class=" img-fluid">
                </a>

                <a href="imgs/events/vox black adam movie/interviwes.m4v">
                    <video src="imgs/events/vox black adam movie/interviwes.m4v" width="100%" controls
                        playsinline></video>
                </a>
                <a class="" href="../uploaded/OIP.jpg" data-toggle="lightbox"
                    data-gallery="photo_gallery">
                    <img src="../uploaded/OIP.jpg" alt="" class=" img-fluid">
                </a>

            </div>
        </div>

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
                    <p>24 Ghernata, Heliopolis,<br> cairo, Egypt</p>
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

    <!-- bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- lightbox -->
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

</body>

</html>