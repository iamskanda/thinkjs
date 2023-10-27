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
        <div class="card card-outline">
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title" style="color: black;font-size: x-large;">Enter User Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="student_info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Confirm Password</label>
                                                    <input type="text" class="form-control" id="confirm_password" name="confirm_password" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-info btn-block">Submit</button>
                                </div>
                                <div class="col-3"></div>
                            </div><br>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->


</body>

</html>

<script>
    $('#student_info').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        var password = $('#password').val();
        var con_password = $('#confirm_password').val();

        var toster_con = '';

        if (password == con_password) {
            toster_con = true;
        } else {
            toastr.error('Please Enter Correct Password');
        }


        if (toster_con) {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url("entry-student-details") ?>',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    response = jQuery.parseJSON(response);
                    if (response.result == 1) {
                        toastr["success"](response.message);
                        // history.go(0);
                        // alert('work');
                        window.setTimeout(function() {
                            window.location = '<?php echo base_url() ?>';
                        }, 800);
                    } else {
                        toastr["error"](response.message);
                    }
                }
            });
        }



    });
</script>