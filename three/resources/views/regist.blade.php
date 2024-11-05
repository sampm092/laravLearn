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
  @extends('layout.scrollbar')
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
        height: 798px;
        /* Semi-transparent cover */
        position: absolute;
        top: 0;
        left: 0;
        /* Hidden by default */
        transition: top 1s ease, left 0.5s ease;

      }

      #login,
      #regist {
        height: max-content;
        width: 50%;
        position: relative;
        display: inline-block;
        padding-bottom: 50px;
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

      @media only screen and (max-width: 1000px) {
        #login{
          display: none;
        }
        #cover{
          display: none;
        }
        #regist{
          width: 100%;
        }

        .navbar-nav,.nav-item{
          display: flex !important;
          flex-direction: row;
          padding-right: .5rem;
          padding-left: .5rem;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }

      .main-Color {
        color: #8f6d06;
      }

      .main-Color:hover {
        color: #130c0bdb;
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

      .form-border {
        border: .5px solid #130c0bdb;
      }

      ::-webkit-file-upload-button {
        display: none;
      }

      
    </style>

    @include('layout.notif')
    <div id="father">
      <div id="login" class="bg-image shadow-2-strong" style="background-color: rgba(0, 0, 0, 0.8);">
      </div>
      <div id="regist" class="bg-image shadow-2-strong" style="background-color: rgba(0, 0, 0, 0.8);">
        <div id="bigC2">
          <nav class="navbar navbar-expand-lg navbar-dark d-lg-block" style="z-index: 2000; position: inherit">
            <div class="container-fluid">
              <!-- Navbar brand -->
              
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                  <a class="navbar-brand nav-link"  href="{{route('welcome')}}">
                    <strong>{{ config('app.name') }}</strong>
                  </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#father">Home</a>
                  </li>
                


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
          </nav>
          <div id="cont" class="mask d-flex align-items-center h-100 mt-5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="{{ route('registore')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="text" name="username"
                        class="form-control form-border @error('username') is-invalid @enderror" />
                      <label class="form-label">Username</label>
                      @error('username')
              <div class="alert alert-danger mt-2">
              {{ $message }}
              </div>
            @enderror
                    </div>

                    <!-- email input  -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="email" name="email"
                        class="form-control form-border @error('email') is-invalid @enderror" />
                      <label class="form-label">E-mail</label>
                      @error('email')
              <div class="alert alert-danger mt-2">
              {{ $message }}
              </div>
            @enderror

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4" data-mdb-input-init>
                      <input type="password" name="password"
                        class="form-control form-border @error('password') is-invalid @enderror" />
                      <label class="form-label">Password</label>
                      @error('password')
              <div class="alert alert-danger mt-2">
              {{ $message }}
              </div>
            @enderror

                    </div>

                    <!-- Submit button -->
                    <div style="display:flex">
                      <input type="submit" name="submit" class="btn btn-primary btn-block" data-mdb-ripple-init
                        value="Register">
                      <div style="width: 15%; margin-left: 5px" class="btn btn-primary">
                        <p style="color: white;position: absolute;font-size: 20px;margin: inherit;">+</p>
                        <input type="file" accept=".png, .jpg, .jpeg" class="btn" name="picture"
                          style="opacity: 0%;max-width: -webkit-fill-available;" />
                      </div>
                    </div>
                    <div class="col text-center mt-3">
                      <a href="{{route('login')}}" class="main-Color">Already have an account?</a>
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Cover -->
      <div id="cover" class="cover pict" style="border-left: 1px #ffc107 solid; border-right: 1px #ffc107 solid">

      </div>
    </div>

    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

  <!--Footer-->
  @extends('layout.footer')
  <!--Footer-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>
  <script>

    // function toRegist() {}
    //   var bigC1 = document.getElementById("bigC1");
    //   var login = document.getElementById("login");
    //   var bigC2 = document.getElementById("bigC2");
    //   var regist = document.getElementById("regist");

    //   bigC1.classList.add("none");
    //   login.classList.add("pict");
    //   bigC2.classList.remove("none");
    //   regist.classList.remove("pict");

    // }

    // function toLogin() {
    //   var bigC1 = document.getElementById("bigC1");
    //   var login = document.getElementById("login");
    //   var bigC2 = document.getElementById("bigC2");
    //   var regist = document.getElementById("regist");

    //   bigC1.classList.remove("none");
    //   login.classList.remove("pict");
    //   bigC2.classList.add("none");
    //   regist.classList.add("pict");

    // }

    function moveCover(targetDivId) {
      // Get the target content div
      const targetDiv = document.getElementById(targetDivId);
      // Get the cover div
      const cover = document.getElementById("cover");


      // Move the cover div smoothly to the position of the target div
      cover.style.top = `${targetDiv.offsetTop}px`;
      if (targetDivId == 'login') {
        cover.style.left = `-50%`;
      } else {
        cover.style.left = `${targetDiv.offsetLeft}px`;
      }

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