<?php

// functions.php
session_start();

$DATABASE_USER = "find_me.users";
$DATABASE_NOTE = "find_me.notes";
$MANAGER = new MongoDB\Driver\Manager("://localhost:27017mongodb");

function isDBInit() {
    global $MANAGER, $DATABASE_USER;
    $query = new MongoDB\Driver\Query(['username' => 'admin']);
    $rows = $MANAGER->executeQuery($DATABASE_USER, $query);
    foreach($rows as $row) {
        if($row->username === 'admin') {
            return true;
        }
    }
    return false;
}

function findUser($username, $password) {
    global $MANAGER, $DATABASE_USER;
    $filter = ['username' => $username, 'password' => $password];
    $query = new MongoDB\Driver\Query($filter);
    $res = $MANAGER->executeQuery($DATABASE_USER, $query);
    $user = current($res->toArray());
    if(!empty($user)) {
        $_SESSION['username'] = $user->username;
        return true;
    }
    return false;
}

function findNotes($username) {
    global $MANAGER, $DATABASE_NOTE;
    $ret = array();
    $filter = ['username' => $username];
    $query = new MongoDB\Driver\Query($filter);
    $rows = $MANAGER->executeQuery($DATABASE_NOTE, $query);
    $tab = $rows->toArray();
    $tab = $tab[0];
    foreach($tab->notes as $note) {
        array_push($ret, $note);
    }
    return $ret;
}

// header.php

if(!isDBInit()) {
    include_once('init.php');
    initDB();
    unlink('init.php');
}

if(!isset($_SESSION['username'])) {
    header('Location: /login.php');
    die();
}

// car-info.php

if(isset($_GET['car']) && $_GET['car'] !== '' && !str_contains($_GET['car'], '..')) {
    $car = $_GET['car'];
}
else {
    header('Location: /car-info.php?car=specs/audi.txt');
    die();
}

?>
<main class="container">
    <div class="row p-4 pb-0 align-items-center rounded-3">
      <div class="col-md-6 text-center text-lg-start"></br></br></br></br>
        <h1 class="display-4 fw-bold lh-1 mb-3">Specs of our <?php echo explode('/', explode('.', $car)[0])[1]; ?></h1>
        <p class="col-lg-10 fs-4"><pre><?php include($car ;?>//); ?></pre></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="/car-info.php?car=specs/chevrolet.txt"><button class="btn btn-primary btn-lg px-4 me-md-2" type="button">Chevrolet</button></a>
          <a href="/car-info.php?car=specs/mercedes.txt"><button class="btn btn-outline-secondary btn-lg px-4" type="button">Mercedes</button></a>
        </div>
      </div>
      <div class="col-md-6">
        <img src="assets/img/car.webp" class="img-fluid rounded float-end  shadow-sm" alt="random">
      </div>
    </div>
</main>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>