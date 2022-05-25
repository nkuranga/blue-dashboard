<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Monkey Tour Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/ionicons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119595512-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119595512-1');
</script>

	</head>
    <style type="text/css">
        .bg-login-body{
            background: #005294;
        }
    </style>
</head>
<body class="bg-login-body">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container" style="">
            <div class="login-content" style="max-width: 420px; margin-top: 90px;">
                <div class="login-form">
                    <form method="POST"  id="login_form">
                        <div class="row">
                            <div class="col-md12 col-sm-12">
                        <img alt="" src="images/logo.png" style="margin-left: 30px; margin-bottom: 60px;">
                    </div>
                    </div>
                    <div class="alert alert-success successMessage" style="display: none; background: green; color: #fff; text-align: center;"></div>
                    <div class="alert alert-warning errorMessage" style="background: red; display: none; color: #fff; text-align: center;"></div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email or UserName" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login_btn">Sign in</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ?
                                <a href="#"> Sign Up Here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/login.js"></script>
</body>
    
</html>