<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Think js</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/adminlte.min.css'); ?>">
    <!-- script -->
    <!-- <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- toastr -->
    <script src="<?php echo base_url('public/assets/toastr/toastr.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css'); ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="brand-link">
                    <img src="<?php echo base_url('public/assets/img/logo1.png'); ?>" alt="DSMS Logo" width="200">
                </a>
            </div>
            <div class="card-body">
                <form id="loginform">
                    <div class="input-group mb-3">
                        <!-- <input type="text" class="form-control" placeholder="Username" name="name" id="name">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div> -->

                        <input type="text" class="form-control" id="otp-tem" value="<?php echo (session()->get('otp_temp')); ?>" disabled >
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="otp" id="otp">
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-info btn-block submit">Submit</button>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</body>

</html>


<script type="text/javascript">
    $("#name").on("keyup change", function(e) {
        var name = $('#name').val();
        console.log(name);
    })

    $('#create_account').click(function() {
        // window.open("<?php echo base_url('Create-account') ?>");
        window.location = '<?php echo base_url('Create-account') ?>';
    });


    function password_show_hide() {

        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    $(document).ready(function() {

        $('#loginform').submit(function(e) {
            e.preventDefault();

            var otp_tem = $('#otp-tem').val();
            var otp = $('#otp').val();

            // console.log('otp'+otp.attr("type"));
            // console.log('otp_tem'+otp_tem.attr("type"));


            var toster_con = '';

            if (otp == otp_tem) {
                toster_con = true;
            } else {
                toastr.error('Please Enter Correct Password');
            }


            if (toster_con) {

                $(".submit").text("Loading...");
                $(".submit").attr('disabled', 'disabled');
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url('login-through-otp') ?>',
                    data: {
                        otp_tem: otp_tem                        
                    },

                    success: function(response) {
                        console.log(response);
                        response = jQuery.parseJSON(response);
                        if (response.result == 1) {

                            toastr["success"](response.message);

                            window.setTimeout(function() {
                                window.location = '<?php echo base_url("Dashboard-Admin") ?>';
                            }, 800);


                        } else if (response.result == 2) {
                            $(".submit").removeAttr('disabled');
                            $(".submit").text("Sign-in");
                            toastr["error"](response.message);
                        } else if (response.result == 3) {
                            $(".submit").removeAttr('disabled');
                            $(".submit").text("Sign-in");
                            toastr["error"](response.message);
                        } else if (response.result == 0) {
                            $(".submit").removeAttr('disabled');
                            $(".submit").text("Sign-in");
                            toastr["error"](response.message);
                        } else if (response.result == 4) {
                            $(".submit").removeAttr('disabled');
                            $(".submit").text("Sign-in");
                            toastr["error"](response.message);
                        }
                    }
                });
            }




        });
    });
</script>