<!DOCTYPE html>
<html lang="zxx">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Sales</title>


<link rel="stylesheet" href="css/bootstrap1.min.css" />

<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
<link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />


<link rel="stylesheet" href="vendors/scroll/scrollable.css" />

<link rel="stylesheet" href="css/metisMenu.css">

<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
<style>
    .main_content {
        padding-left: 0px !important;

    }
</style>
</head>

<body class="crm_body_bg">



<section class="main_content dashboard_part large_header_bg">


<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">Log in</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/connexion">
                                        @csrf
                                        <div class="">
                                            <input type="text" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email')}}" placeholder="Enter your email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <div class="text-center">
                                            <a href="/register" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Register</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p><?php  echo date('Y')?> ?? Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>





<script src="js/jquery1-3.4.1.min.js"></script>

<script src="js/popper1.min.js"></script>

<script src="js/bootstrap.min.html"></script>

<script src="js/metisMenu.js"></script>

<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>

<script src="js/custom.js"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/sales-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Sep 2022 10:48:04 GMT -->
</html>



