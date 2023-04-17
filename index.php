<?php include 'defaults/header.php'; ?>

<?php include 'defaults/nav.php'; ?>

<!-- Main Content Area -->
<!-- Banner Image  -->
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
  <div class="container-fluid">
    <div class="row" style="min-height: 720px;">
      <div class="col-lg-4 text-white align-self-center">
        <h1 class="d-flex justify-content-lg-start justify-content-center">75 years of celebration (Logo section)
        </h1>
      </div>
      <div class="col-lg-4 align-self-end">
        <a href="" class="d-flex justify-content-center" style="text-decoration: none;">
          <button type="button" class="btn btn-outline-warning btn-lg">Register as a Alumni</button>
        </a>
      </div>
      <div class="col-lg-4 text-white align-self-center">
        <h1 class="d-flex justify-content-lg-start justify-content-center pb-2">Alumni Connect</h1>
        <div class="d-flex justify-content-lg-start justify-content-center">
          <p style="width:400px">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Accusamus, porro maiores! Itaque, corrupti? Asperiores eligendi assumenda totam iste voluptatem labore,
            sint a perspiciatis in reprehenderit incidunt, dicta voluptates maiores autem.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>






<!-- Login form -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control shadow-none">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control shadow-none">
          </div>
          <div class="d-flex  justify-content-between mb-1">
            <a href="javascript: void(0)" class="text-secondary text-decoration-none">New user Register!</a>
            <button type="submit" class="btn btn-dark shadow-none align-item-center">Login</button>
            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end login -->

<!-- register form -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-2"></i> User Registration
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control shadow-none">
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control shadow-none">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control shadow-none">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control shadow-none">
          </div>
          <div class="mb-4">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control shadow-none">
          </div>
          <div class="text-center my-1">
            <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- end register -->




<div class="container my-5 d-grid gap-5">
  <div class="p-5 border">
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
      natus iusto fugit id saepe neque rerum magni laudantium accusantium
      dolorem numquam quasi.
    </p>
  </div>
  <div class="p-5 border">
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
      natus iusto fugit id saepe neque rerum magni laudantium accusantium
      dolorem numquam quasi.
    </p>
  </div>
  <div class="p-5 border">
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
      natus iusto fugit id saepe neque rerum magni laudantium accusantium
      dolorem numquam quasi.
    </p>
  </div>
  <div class="p-5 border">
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
      natus iusto fugit id saepe neque rerum magni laudantium accusantium
      dolorem numquam quasi.
    </p>
  </div>
  <div class="p-5 border">
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
      natus iusto fugit id saepe neque rerum magni laudantium accusantium
      dolorem numquam quasi.
    </p>
  </div>
</div>

<?php include './defaults/footer.php'; ?>