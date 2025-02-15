<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Skill Lab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #edf7f9;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #3c8dbc;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #2e5a77;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>

<body>
    @if(session()->has('error'))
    <div id="error-message" class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif


    <div class="container">
        <div class="header">
            <h1>Skill Lab</h1>
            ![Skill Lab Logo]({{ asset('assets/img/skill-lab.jpeg') }})
         
        </div>

        <p>Hi {{ $user->name ?? '' }}</p>
        <p>Thank you for registering with Skill Lab System. Please verify your email address by clicking the button below:</p>
        <a href="{{ $url }}" class="button">Verify Email</a>
        <div class="footer">
            <p>If you did not create an account, no further action is required.</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
    </script>
</body>

</html>