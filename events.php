<?php include 'defaults/header.php'; ?>
<?php include 'defaults/navbar.php'; ?>
<link rel="stylesheet" href="css/event.css">
<div class="main">
    <div class="col-md-8s mx-auto text-center">
        <h3>RECENT EVENTS</h3>
    </div>


    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/images/event.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="/images/platinum1.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="/images/platinum2.jpg" class="w-100 d-block" />
                </div>

            </div>
        </div>
    </div>



    <!--cards-->
    <div class="down">
        <div class="container">

            <div class="row gy-3 my-5">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="images/event.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ANNUAL FASTIBLE</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">NOTICE</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="images/event.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ANNUAL FASTIBLE</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">NOTICE</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="images/event.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">FRESHER'S PARTY</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">NOTICE</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="images/event.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">FRESHER'S PARTY</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">NOTICE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Swiper JS 
        -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            }
        });
    </script>


    <?php include 'defaults/footer.php'; ?>