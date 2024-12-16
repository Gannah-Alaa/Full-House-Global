<?php
include 'connection.php';

$cat="SELECT * FROM `category`";
$runCat=mysqli_query($connect,$cat);
if(isset($_GET['categories'])){
    $CatId=$_GET['categories'];

    $SelectEvents="SELECT * FROM `events` JOIN `category` ON `events`.`CatId`=`category`.`CatId`
JOIN `brands` ON `events`.`BrandId`=`brands`.`BrandId`
Where `events`.`CatId` = $CatId";
$RunSelect= mysqli_query($connect, $SelectEvents);
}else{

$SelectEvents="SELECT * FROM `events` JOIN `category` ON `events`.`CatId`=`category`.`CatId`
JOIN `brands` ON `events`.`BrandId`=`brands`.`BrandId`";
$RunSelect= mysqli_query($connect, $SelectEvents);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullHouseGlobal Portfolio</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="/imgs/white logo.png">
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

    <main >
        <img class="top-img" src="imgs/portfolio-header.png" alt="">
        <!-- header -->
        <div class="header text-center text-white">
            <div class="d-flex align-items-center justify-content-center gap-5">
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <hr class="underline">
                </div>
                <h1>Our Recent <span class="glow">Projects</span></h1>
                <div class="glow-line d-flex align-items-center gap-1 my-3">
                    <hr class="underline">
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                    <iconify-icon icon="icon-park-outline:dot" width="8" height="8"></iconify-icon>
                </div>
            </div>
            <h3 class="my-3">Transforming visions into reality</h3>
        </div>
        <!-- tabs -->
        <div class="container tabs">
            <ul class="nav nav-pills justify-content-center mb-3 gap-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation"><a href="portfolio.php">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                        type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button></a>
                </li>
                <?php foreach($runCat as $categ){ ?>
                <li class="nav-item" role="presentation"><a href="portfolio.php?categories=<?php echo $categ['CatId']?>">
                    <button class="nav-link" id="pills-roadshows-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-roadshows" type="button" role="tab" aria-controls="pills-roadshows"
                        aria-selected="false"><?php echo $categ['CatName'] ?></button></a>
                </li>
                <?php } ?>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- all -->
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="row mt-5 gy-4">

                    <!-- Gannah: start card loop here insha2allah -->

                    <?php foreach($RunSelect as $data){?>

                        <div class="event col-md-4 ">
                            <a href="BlackAdamPremiere.php?details=<?php echo $data['EventId'] ?>">
                            <div class="event-block position-relative">
                                    <div class="event-tag"><?php echo $data['CatName'] ?></div>
                                    <img src="<?php echo "../uploaded/".$data['EventCover'] ?>" class="w-100 mb-4">
                                    <div class="event-description">
                                        <h3 class="h2"><?php echo $data['EventName'] ?></h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h3><?php echo $data['BrandName'] ?></h3>
                                            <img src="<?php echo "../uploaded/".$data['BrandLogo'] ?>" alt="vox cinema logo" class="w-25">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php } ?>

                        <!-- Gannah end card loop here insha2allah -->

                    </div>
                </div>

                <div class="tab-pane fade" id="pills-roadshows" role="tabpanel" aria-labelledby="pills-roadshows-tab"
                    tabindex="0">
                    <div class="row mt-5 gy-4">

                        <div class="col-md-4">
                            <div class="event-block position-relative">
                                <a href="">
                                    <img src="imgs/events/fayrouz roadshow summer 24 northcoast delta/1.png" alt=""
                                        class="w-100 mb-4">
                                    <div class="event-description">
                                        <h3 class="h2">Fayrouz Summer 2024 <br> North Coast/Delta</h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h3>Fayrouz</h3>
                                            <img src="imgs/logos/fayrouz.webp" alt="" class="w-25">
                                        </div>
                                    </div>
                                    <div class="event-tag">Road Show</div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- instore promotions -->
                <div class="tab-pane fade" id="pills-instore" role="tabpanel" aria-labelledby="pills-instore-tab"
                    tabindex="0">
                    <div class="row mt-5 gy-4">

                        <div class="col-md-4">
                            <div class="event-block position-relative">
                                <a href="">
                                    <img src="imgs/events/fayrouz coffee isp/1.png" alt="" class="w-100 mb-4">
                                    <div class="event-description">
                                        <h3 class="h2">Fayrouz Coffee Sampling</h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h3>Fayrouz</h3>
                                            <img src="imgs/logos/alahram.png" alt="" class="w-25">
                                        </div>
                                    </div>
                                    <div class="event-tag">In-Store Promotions</div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- marketing activations -->
                <div class="tab-pane fade" id="pills-activations" role="tabpanel"
                    aria-labelledby="pills-activations-tab" tabindex="0">

                    <div class="row mt-5 gy-4">
                        <div class="col-md-4">
                            <div class="event-block position-relative">
                                <a href="ssNorthCoastGates.html">
                                    <img src="imgs/events/ss northcoast gates/spirospathis.jpg" alt=""
                                        class="w-100 mb-4">
                                    <div class="event-description">
                                        <h3 class="h2">North Coast Gates</h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h3>Spero Spathis</h3>
                                            <img src="imgs/logos/ss.png" alt="" class="w-25">
                                        </div>
                                    </div>
                                    <div class="event-tag">Marketing Activation</div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="event-block position-relative">
                                <a href="voxBlackAdamPremiere.html">
                                    <img src="imgs/events/vox black adam movie/1.png" alt="" class="w-100 mb-4">
                                    <div class="event-description">
                                        <h3 class="h2">The Black Adam Movie Premiere</h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h3>Vox Cinemas</h3>
                                            <img src="imgs/logos/vox logo.png" alt="" class="w-25">
                                        </div>
                                    </div>
                                    <div class="event-tag">Marketing Activation</div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- events & exhibitions -->
                <div class="tab-pane fade" id="pills-events" role="tabpanel" aria-labelledby="pills-events-tab"
                    tabindex="0">
                    <div class="row mt-5 gy-4">

                        <div class="col-md-4">
                            <div class="event-block position-relative">
                                <a href="">
                                    <img src="imgs/events/abdeenpalace.jpeg" alt="" class="w-100 mb-4">
                                    <div class="event-description">
                                        <h3 class="h2">Abu Dhabi International Book Fair</h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h3>Abu Dhabi ALC</h3>
                                            <img src="imgs/logos/alc white.png" alt="" class="w-25">
                                        </div>
                                    </div>
                                    <div class="event-tag">Events & Exhibitions</div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
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
    <!-- bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

</body>

</html>