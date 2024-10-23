<!DOCTYPE html>
<html lang="en">
<!-- BUKAN LANDING PAGE -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>{{ config('app.name') }}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
  <!--Main Navigation-->

  <!-- BUAT LOGIN DAN REGISTER DALAM 1 PAGE TETAPI TUTUP SALAH SATUNYA DENGAN SCRIPT, JADI SLIDING -->
  <header>
    <style>
      #father {
        display: flex;
        position: relative;
        background-image: url(https://i.pinimg.com/originals/67/18/22/671822c2f63dd5f65d8fd15c9710420b.jpg);
      }

      .cover {
        width: 50%;
        height: 108vh;
        /* Semi-transparent cover */
        position: absolute;
        top: 0;
        left: 50%;
        /* Hidden by default */
        transition: top 1s ease, left 1s ease;

      }

      #login,
      #regist {
        height: 108vh;
        width: 50%;
        position: relative;
        display: inline-block;
      }


      .none {
        display: none;
      }

      .pict {
        background:
          linear-gradient(120deg, #302b19 25%, #130c0b 25%, #130c0b 50%, #302b19 50%, #302b19 75%, #130c0b 75%, #130c0b 100%, #302b19 100%);
        background-size: 4rem 4rem;
        animation: pattern 15s linear infinite;
      }

      .pict:hover {
        background:
          linear-gradient(135deg, #130c0b 25%, #302b19 25%, #302b19 50%, #130c0b 50%, #130c0b 75%, #302b19 75%, #302b19 100%, #130c0b 100%);
        background-size: 4rem 4rem;
        animation: pattern 2s linear infinite;
      }

      @keyframes pattern {
        to {
          background-position: 2rem;
        }

      }


      /* Height for devices larger than 576px */


      .navbar .nav-link {
        color: #fff !important;
      }

      .btn-primary {
        color: #fff;
        background-color: #130c0bdb;
        border-color: #000000;
      }

      .btn-primary:hover {
        color: #fff;
        background-color: #130c0b;
        border-color: #020606;
      }

      .form-control:hover {
        background-color: #040705db;
        color: white;
      }

      .form-border{
        border: .5px solid #130c0bdb;
      }
    </style>

    <div id="father">
      <div id="login" class="bg-image shadow-2-strong" style="background-color: rgba(0, 0, 0, 0.8);">
        <div id="bigC1" class="">
          <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;position: inherit">
            <div class="container-fluid">
              <!-- Navbar brand -->
              <a class="navbar-brand nav-link" target="_blank" href="#">
                <strong>MyBookList</strong>
              </a>
              <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#father">Home</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#">About</a>
                  </li>
                </ul>

                <ul class="navbar-nav d-flex flex-row">
                  <!-- Icons -->
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://www.youtube.com/" rel="nofollow" target="_blank">
                      <i class="fab fa-youtube"></i>
                    </a>
                  </li>
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://www.facebook.com/" rel="nofollow" target="_blank">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://twitter.com/" rel="nofollow" target="_blank">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://github.com/SamPM092" rel="nofollow" target="_blank">
                      <i class="fab fa-github"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div id="cont" class="mask d-flex align-items-center h-100 mt-5">
            <div class="container">
              <div class="row justify-content-center">

                <div class="col-sm-6 col-md-8">

                  <form class="bg-white rounded shadow-5-strong p-5" action="{{ route('bookView') }}">

                    <!-- Email input -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="email" id="form1Example1" class="form-control form-border" />
                      <label class="form-label" for="form1Example1">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="password" id="form1Example2" class="form-control form-border" />
                      <label class="form-label" for="form1Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <label class="form-check-label" for="form1Example3">

                          </label>
                        </div>
                      </div>

                      <div class="col text-center">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                      </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Sign in</button>

                    <div class="col text-center mt-3">
                      <a href="javascript:moveCover('login')">No Account?</a>
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="regist" class="bg-image shadow-2-strong" style="background-color: rgba(0, 0, 0, 0.8);">
        <div id="bigC2" class="">
          <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000; position: inherit">
            <div class="container-fluid">
              <!-- Navbar brand -->
              <a class="navbar-brand nav-link" target="_blank" href="#">
                <strong>MyBookList</strong>
              </a>
              <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#father">Home</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#">About</a>
                  </li>
                </ul>

                <ul class="navbar-nav d-flex flex-row">
                  <!-- Icons -->
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://www.youtube.com/" rel="nofollow" target="_blank">
                      <i class="fab fa-youtube"></i>
                    </a>
                  </li>
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://www.facebook.com/" rel="nofollow" target="_blank">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://twitter.com/" rel="nofollow" target="_blank">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://github.com/SamPM092" rel="nofollow" target="_blank">
                      <i class="fab fa-github"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div id="cont" class="mask d-flex align-items-center h-100 mt-5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-sm-6 col-md-8">
                  <form class="bg-white rounded shadow-5-strong p-5">
                    <!-- Email input -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="text" id="form1Example1" class="form-control form-border" />
                      <label class="form-label" for="form1Example1">Username</label>
                    </div>

                    <!-- email input  -->

                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="email" id="form1Example2" class="form-control form-border" />
                      <label class="form-label" for="form1Example2">E-mail</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="password" id="form1Example2" class="form-control form-border" />
                      <label class="form-label" for="form1Example2">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Register</button>

                    <div class="col text-center mt-3">
                      <a href="javascript:moveCover('regist')">Already have an account?</a>
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="cover" class="cover pict">

      </div>
    </div>

    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    <div class="py-4 text-center">
      <a role="button" class="btn btn-primary btn-lg m-2" data-mdb-ripple-init
        href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow" target="_blank">
        Learn Bootstrap 5
      </a>
      <a role="button" class="btn btn-primary btn-lg m-2" data-mdb-ripple-init
        href="https://mdbootstrap.com/docs/standard/" target="_blank">
        Download MDB UI KIT
      </a>
    </div>

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Follow MDB on social media</p>
      <a href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" class="btn btn-primary m-1" role="button"
        data-mdb-ripple-init rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        data-mdb-ripple-init target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        data-mdb-ripple-init target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        data-mdb-ripple-init target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>
  <script>

    function toRegist() {
      var bigC1 = document.getElementById("bigC1");
      var login = document.getElementById("login");
      var bigC2 = document.getElementById("bigC2");
      var regist = document.getElementById("regist");

      bigC1.classList.add("none");
      login.classList.add("pict");
      bigC2.classList.remove("none");
      regist.classList.remove("pict");

    }

    function toLogin() {
      var bigC1 = document.getElementById("bigC1");
      var login = document.getElementById("login");
      var bigC2 = document.getElementById("bigC2");
      var regist = document.getElementById("regist");

      bigC1.classList.remove("none");
      login.classList.remove("pict");
      bigC2.classList.add("none");
      regist.classList.add("pict");

    }

    function moveCover(targetDivId) {
      // Get the target content div
      const targetDiv = document.getElementById(targetDivId);
      // Get the cover div
      const cover = document.getElementById("cover");


      // Move the cover div smoothly to the position of the target div
      cover.style.top = `${targetDiv.offsetTop}px`;
      cover.style.left = `${targetDiv.offsetLeft}px`;
    }

    // function swapDivs() {
    // // Get the two div elements by their IDs
    // var div1 = document.getElementById("intro");
    // var div2 = document.getElementById("pict");

    // // Get the parent node (common parent) of the two divs
    // var parent = div1.parentNode;

    // // Swap the divs by inserting div1 before div2's next sibling
    // var nextSibling = div2.nextSibling;

    // // Check if div2 has a next sibling or is the last child
    // if (nextSibling) {
    //     parent.insertBefore(div1, nextSibling);
    // } else {
    //     parent.appendChild(div1);
    // }

    // // Now, insert div2 before the original position of div1
    // parent.insertBefore(div2, div1);

  </script>

</body>

</html>