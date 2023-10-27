<?php
echo view('includes/header');
?>

<script src="<?php echo base_url('public/datatable/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('public/datatable/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard-Admin'); ?>">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-sm-4">
                                    <h3 class="card-title">Employee Details</h3>
                                </div>

                                <div class="col-sm-5">
                                </div>

                                <div class="col-sm-3 d-flex justify-content-around">

                                    <button type="button" class="btn btn-primary add_branch">Add</button>

                                </div>
                            </div>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Password</th>
                                        <th>Create At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Add New employee -->

<div class="modal fade add-project-work-plan">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="" style="background-color:#439bc1;padding:10px;">

                <div class="row">
                    <div class="col-sm-9">
                        <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Add Employee</h2>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>


            </div>
            <div class="modal-body">
                <form id="sub-master-data">


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control name" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="Number" class="form-control phone" name="phone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control password" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success update float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- --------------------update Employee--------------------------------------------- -->

<div class="modal fade update-master">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;padding:10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Update Employee</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-master-data">
                    <input type="hidden" name="get_id" id="get_id">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="name_u" name="name_u">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="Number" class="form-control" id="phone_u" name="phone_u">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" id="password_u" name="password_u">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success update1">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<script>
    /* hide and show */

    $('.add_branch').click(function() {
        $('.add-project-work-plan').modal('show');
    });


    /* adding Employee */

    $('#sub-master-data').submit(function() {

        // var note = $('#note').val();

        var formData = new FormData(this);
        // formData.append('note', note);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("add-new-attendance") ?>',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = jQuery.parseJSON(response);
                if (response.result == 1) {
                    toastr["success"](response.message);
                    $(".add-project-work-plan").modal("hide");
                    history.go(0);
                } else {
                    toastr["error"](response.message);
                }
            }
        });

    });

    // Delete Data

    $(document).on('click', '#deleteCountryBtn', function() {
        var id = $(this).data('id');

        // alert(id);
        // var split_value = split1.split(',');  
        // var user_id = split_value[0];
        // var file = split_value[1];
        swal({
                title: "Are you sure?",
                text: "You want to delete this?",
                type: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonColor: '#d33',
                confirmButtonText: "Yes, Delete",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $(".sweet-alert").hide();
                    $(".sweet-overlay").hide();
                    $.ajax({
                        url: "<?php echo base_url("delete-employee") ?>",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            response = jQuery.parseJSON(response);
                            // console.log(response);
                            if (response.result == 1) {
                                toastr["success"](response.message);
                                $('#library-table').DataTable().ajax.reload(null, false);
                            } else {
                                toastr["error"](response.message);
                            }
                        }
                    });
                } else {
                    $(".sweet-alert").hide();
                    $(".sweet-overlay").hide();
                }
            });
    });

    /* fetch data */

    $(document).on('click', '#updateCountryBtn', function() {
        var id = $(this).data('id');

        // alert(id);

        $.ajax({
            url: "<?php echo base_url("update-employee-data") ?>",
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
                response = jQuery.parseJSON(response);
                // console.log(response);
                if (response.result == 1) {
                    $("#get_id").val(response.message.id);
                    $("#name_u").val(response.message.name);
                    $("#phone_u").val(response.message.phoneNumber);
                    $("#password_u").val(response.message.password);

                    $(".update-master").modal("show");
                }
            }
        });
    });

    /* update */


    $('#update-master-data').submit(function(e) {
        e.preventDefault();
        formdata = new FormData($(this)[0]);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url("update-employee-data-list") ?>',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                response = jQuery.parseJSON(response);
                console.log(response);
                if (response.result == 1) {
                    toastr["success"](response.message);
                    $('#library-table').DataTable().ajax.reload(null, false);
                    $(".update-master").modal("hide");
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    });




    // ---- Data-Table ----

    $('#library-table').DataTable({
        "processing": true,
        "serverSide": true,
        // "responsive": true,
        "searching": true,
        "lengthChange": false,
        "ajax": "<?php echo base_url('show-all-attendance-data') ?>",
        "dom": "lBfrtip",
        "stateSave": true,
        "info": true,
        "bInfo": true,
        "bPaginate": true,
        "iDisplayLength": 10,
        "pageLength": 10,
        "aLengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        "columnDefs": [{
                "width": "10px",
                "targets": [0]
            },
            {
                "width": "200px",
                "targets": [1]
            },
            {
                "width": "200px",
                "targets": [2]
            },
            {
                "width": "200px",
                "targets": [3]
            },
            {
                "width": "200px",
                "targets": [4],
                "render": function(data) {
                    return moment(data).format('DD/MM/YYYY');
                },
            },
            {
                "width": "200px",
                "targets": [5]
            }
        ],
        autoWidth: false,
        "fnCreatedRow": function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }

    });

    $(document).on('click', '#test', function() {
        var id = $(this).data('id');
        alert(id);
    });
</script>


<?php
echo view('includes/footer');
?>