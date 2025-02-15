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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

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
                    <img src="{{ asset('assets/img/login.svg') }}" class="img-fluid text-center align-items-center py-5" alt="" />
                </div>
                <div class="col-md-6 col-12 px-4">
                    <div class="signup-form text-white">
                        <div class="mb-5">
                            <h2>Sign Up</h2>
                            <div class="d-flex align-items-center">
                                <p class="me-3">Create your account to get started</p>
                                <img src="{{ asset('assets/img/skill-lab.jpeg') }}" class="img-fluid rounded-circle col-md-3" alt="" />
                            </div>
                        </div>
                        <form class="signup-input mt-4" action="{{ route('register.save') }}" method="POST">
                            @csrf
                            <div class="name-container">
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    required />
                                @if ($errors->has('name'))
                                    <span class="text-info">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
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
                            <div class="password-container">
                                <input type="password" class="password-input form-control subheading" name="retype_password"
                                    placeholder="Retype Password" id="retype-password-field" />
                                @error('retype_password')
                                    <span class="text-info">{{ $message }}</span>
                                @enderror
                                <img src="{{ asset('assets/img/lock.svg') }}" class="password-toggle pe-2"
                                    onclick="togglePasswordVisibility('retype-password-field')" alt="Toggle Retype Password" />
                            </div>
                            <div class="number-container">
                                <input type="number" class="form-control" name="phone_number"
                                    placeholder="Phone" required />
                                @if ($errors->has('phone'))
                                    <span class="text-info">{{ $errors->first('number') }}</span>
                                @endif
                            </div>
                            <div class="image-container">
                                <input type="file" class="form-control" name="image" style="height:36px" accept="image/*" />
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            
                            <button class="btn save-btn text-white p-3 w-100 mt-4">Sign Up</button>
                            <a href="{{ url('/') }}" class="btn save-btn text-white p-2 w-100 mt-3">
                                Login
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
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