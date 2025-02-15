<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Skill Lab</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/skill-lab.jpeg') }}" >
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- Customized Bootstrap Stylesheet -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  </head>

  <body class="signup-body">
    <section class="signup position-relative">
      <div class="right-down-arrow">
        <img src="{{ asset('assets/img/Ellipse.png') }}" class="img-fluid" alt="" />
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-12 position-relative signup-img">
            <img src="{{ asset('assets/img/login.svg') }}" class="img-fluid text-center align-items-center py-5" alt=""/>
          </div>
          <div class="col-md-6 col-12 py-5 px-4">
            <div class="signup-form text-white my-5">
                @if(session()->has('message'))
                <div id="success-message" class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div id="error-message" class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
              <div class="mb-5">
                <h2>Sign in</h2>
                <div class="d-flex align-items-center">
                  <p class="me-3 login-box-msg text-white">Use your email and password to login</p>
                  <img src="{{ asset('assets/img/skill-lab.jpeg') }}" class="img-fluid rounded-circle col-md-3" alt="" />
              </div>
              </div>
              <form class="signup-input mt-4" action="{{ route('login.save') }}" method="POST">
                @csrf              
                <div class="password-container">
                    <input type="email" class="form-control" name="email" placeholder="Email" required />
                    @if ($errors->has('email'))
                        <span class="text-info">{{ $errors->first('email') }}</span>
                    @endif
                    <img src="{{ asset('assets/img/mail.svg') }}" class="password-toggle pe-2" alt="" />
                </div>
                <div class="password-container">
                    <input type="password" class="password-input form-control subheading" name="password"
                        placeholder="Password" id="password-field" />
                    @error('password')
                        <span class="text-info">{{ $message }}</span>
                    @enderror
                    <img src="{{ asset('assets/img/lock.svg') }}" class="password-toggle pe-2"
                        onclick="togglePasswordVisibility('password-field')" alt="Toggle Password" />
                </div>
                <div class="row text-white keep-me-logged">
                  <div class="col-md-6 d-flex mt-3">
                    <input type="checkbox" class="checkboxing" name="remember" id="remember" />
                    <span>Keep me singed in</span>
                  </div>

                  <div class="col-md-6 mt-3 forget-password text-end">
                    <a href="#" class="text-decoration-none text-white" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                      Forget Password?
                    </a>
                  </div>
                </div>
                <button class="btn save-btn text-white p-3 w-100 mt-4">
                  Sign Up
                </button>
                <a href="{{ url('register') }}" class="btn save-btn text-white p-2 w-100 mt-3">
                  Register
                </a>
                
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Start -->
      <div
        class="modal fade"
        id="exampleModalToggle"
        aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel"
        tabindex="-1"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header border-0 p-0 m-0">
              <button
                type="button"
                class="btn-close mt-2 me-2"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body text-center">
              <h4 class="border-0 text-center w-100 p-0 m-0 fw-bold all-adjustment">Forget Password</h4>
              <p class="mt-2">Check your email inbox for a message</p>
              <p class="mt-0">Click on the link provided in the email  and follow the instructions to create a new password</p>
              <button class="btn save-btn text-white">Ok</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal End -->
    </section>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        function togglePasswordVisibility(fieldId) {
            var field = document.getElementById(fieldId);
            var img = $(field).next('img');
    
            if (field.type === "password") {
                field.type = "text";
                img.attr('src', '{{ asset('assets/img/unlock.svg') }}');
            } else {
                field.type = "password";
                img.attr('src', '{{ asset('assets/img/lock.svg') }}');
            }
        }
    </script>
    <script>
      function togglePasswordVisibility(fieldId) {
          var passwordField = document.getElementById(fieldId);
          var passwordToggle = passwordField.nextElementSibling.querySelector('.password-toggle');

          if (passwordField.type === 'password') {
              passwordField.type = 'text';
              passwordToggle.src = '{{ asset('assets/img/unlock.svg') }}'; // Change to your unlock icon
          } else {
              passwordField.type = 'password';
              passwordToggle.src = '{{ asset('assets/img/lock.svg') }}'; // Change to your lock icon
          }
      }
  </script>
    
  </body>
</html>
