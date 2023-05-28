<?php
include 'defaults/header.php';
include 'defaults/navbar.php';
?>



<!-- Banner -->
<div class="indexbanner vh-100 d-flex align-items-center" id="home">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto text-center">
        <h1 class="display-4 text-white">Alumni Connect</h1>
        <p class="text-white my-3">A web based platform for our college alumni!</p>
        <p class="text-white">Established in 1946, Karimganj College is one of the pioneering Colleges of Assam</p>
        <a href="donate.php" class="btn btn-lg me-2 custom-bg">Donate</a>
      </div>


    </div>
  </div>
</div>
</div><!-- //Banner -->


<!-- Alumni Card -->


<?php $rows = db_query("SELECT * FROM (SELECT * FROM users WHERE is_varified <> 0 ORDER BY id ASC) AS subquery LIMIT 8"); ?>
<section id="alumni">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8 mx-auto text-center">

        <h1 class="text-dark">Meet Our Alumni</h1>
      </div>
    </div>
    <div class="row text-center g-4">
      <?php if (!empty($rows)) : ?>
        <?php foreach ($rows as $row) : ?>
          <?php if ($row['is_varified'] !== 0) : ?>
            <div class="col-lg-3 col-sm-6">
              <div class="team-member card-effect">
                <img src="<?= get_image($row['image']) ?>" alt="">
                <h5 class="mb-0 mt-4"><?= esc($row['firstname']) ?> <?= esc($row['lastname']) ?> <i class="bi bi-check2-circle"></i></h5>
                <p><?= esc($row['occupation']) ?></p>
                <div class="social-icons">
                  <a href="<?= esc($row['facebook']) ?>" target="_blank"><i class="bi bi-facebook"></i></i></a>
                  <a href="<?= esc($row['twitter']) ?>" target="_blank"><i class="bi bi-twitter"></i></a>
                  <a href="<?= esc($row['linkedin']) ?>" target="_blank"><i class="bi bi-linkedin"></i></i></a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="text-center alert alert-danger">That profile was not found</div>
        <a href="index.php">
          <button class="btn btn-primary m-4">Home</button>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section><!-- ALumni -->


<!-- ALumni -->



<!-- Events -->
<section id="event">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8 mx-auto text-center">

        <h1>Upcoming College Events</h1>
        <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
          in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="blog-post card-effect">
          <img src="./images/event.jpg" alt="">
          <h5 class="mt-4"><a href="#">harum vitae debitis sapiente praesentium aperiam au</a></h5>
          <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="blog-post card-effect">
          <img src="./images/event.jpg" alt="">
          <h5 class="mt-4"><a href="#">harum vitae debitis sapiente praesentium aperiam au</a></h5>
          <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="blog-post card-effect">
          <img src="./images/event.jpg" alt="">
          <h5 class="mt-4"><a href="#">harum vitae debitis sapiente praesentium aperiam au</a></h5>
          <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet </p>
        </div>
      </div>
    </div>

  </div>
</section><!-- Events -->


<!-- About -->
<section id="about">
  <div class="my-5 px-4 ">

    <h1 class="text-center">About US</h1>
    <p class="text-center mt-3"> Established in 1946, Karimganj College is one of the pioneering Colleges of Assam, imparting education in Science, Arts & Commerce. Situated on the bank of Kushiara River demarcating Indo- Bangladesh Border, the College is playing a significant role for last six decades in the field of Higher Education of the region. Today, it is one of the leading colleges under Assam University.<br><br><a href="http://www.karimganjcollege.ac.in" class='btn custom-bg' target="_blank">Learn More...</a></p>
  </div>
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3">About this project and the group</h3>
        <p>
          This project is done for the sole purpose of connecting the alumnus of this esteemed collge and let people view and connect with other alumnus. This project is done by a small group of 5 members from the 2020 batch Computer Application students.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="./images/campus.jpg" class="w-100">
      </div>
    </div>
  </div>


</section>

<!-- about end -->



<!-- contact -->
<section id="contact">
  <div class="my-5 px-4">
    <h1 class="text-center">Contact US</h1>
    <!-- Need to be fix -->
    <div class="h-line bg-dark"></div>
    <!-- end Need to be fix -->
    <p class="text-center mt-3">
      If you have any quary related to college feel free to contact us. <br> Call between 9:00AM - 3:00PM
    </p>
  </div>

  <div class="container">
    <div class="row">

      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4">


          <h5>Address</h5>
          <a href="https://goo.gl/maps/HmPytVNUSLhti3FC6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
            <i class="bi bi-geo-alt-fill"></i> Karimganj College
            Station Road, Karimganj -788710
            Assam, India.
          </a>

          <h5 class="mt-4">Call us</h5>
          <a href="tel: +919957381111" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +91-3843-262108
          </a>
          <br>
          <a href="tel: +919957381111" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +91-3843-267043
          </a>
          <h5 class="mt-4">Email</h5>
          <a href="mailto: masuk27roll@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-envelope-fill"></i> karimganjcollege@gmail.com
          </a>

          <h5 class="mt-4">Follow us</h5>
          <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook me-1"></i>
          </a>
          <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-twitter me-1"></i>
          </a>
          <a href="#" class="d-inline-block text-dark fs-5">
            <i class="bi bi-instagram me-1"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 px-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.9218561407465!2d92.36428657531575!3d24.866518377925292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3751d3a09f7d41d5%3A0x15b4bd9e6989be1f!2sKarimganj%20College!5e0!3m2!1sen!2sin!4v1682740732832!5m2!1sen!2sin" width="600" height="420" style="border:0;" allowfullscreen="" loading="lazy" class="w-100 rounded mb-4"></iframe>
      </div>

    </div>
  </div>
</section>

<!-- contact end -->

<?php include 'defaults/footer.php'; ?>