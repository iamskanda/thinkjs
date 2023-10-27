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
                    <h1>Contractor Creation</h1>
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

                            <div class="col-sm-9">
                                <h3 class="card-title">Contractor Creation Details</h3>
                            </div>

                            <div class="col-sm-3">
                                <i type="button" data-toggle="tooltip" data-placement="left" title="Add Master" class="fas fa-plus-square add_master" style="color: #3e5871; font-size: 1.5em; float: right; cursor: pointer; margin-right: 0.5em;"></i>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>Master Name</th>
                                        <th>Created</th>
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

<!-- --------------------------------add Master-------------------------- -->

<div class="modal fade add-master-data">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;padding:10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Add contractor</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="master-data">
                    <div class="form-group">
                        <label for="">Contractor Creation</label>
                        <input type="text" class="form-control master_name" name="master_name">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success update">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- --------------------update master--------------------------------------------- -->

<div class="modal fade update-master">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;padding:10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Update contractor</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-master-data">
                    <input type="hidden" name="get_id" id="get_id">
                    <div class="form-group">
                        <label for="">Contractor Creation</label>
                        <input type="text" class="form-control master_name_edit" name="master_name_edit">
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
    /* Module open */

    $('.add_master').click(function() {
        $('.add-master-data').modal('show');
    });

    /* adding project */

    $('#master-data').submit(function() {

        var formData = new FormData(this);
        // formData.append('note', note);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("add-contractor-data") ?>',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = jQuery.parseJSON(response);
                if (response.result == 1) {
                    toastr["success"](response.message);
                    $(".add-master-data").modal("hide");
                    history.go(0);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    });

    /* Update data */

    $(document).on('click', '#updateCountryBtn', function() {
        var id = $(this).data('id');

        // alert(id);

        $.ajax({
            url: "<?php echo base_url("update-contractor-data") ?>",
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
                response = jQuery.parseJSON(response);
                // console.log(response);
                if (response.result == 1) {
                    $("#get_id").val(response.message.id);
                    $(".master_name_edit").val(response.message.name);

                    $(".update-master").modal("show");
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
                        url: "<?php echo base_url("delete-contractor") ?>",
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


    /* Sub Master */

    $(document).on('click', '#subMasterCountryBtn', function() {
        var id = $(this).data('id');

        // alert(id);
        // localStorage.setItem("projectWorkId", id);

        window.location = "<?php echo base_url("sub-contractor") ?>?id=" + id;

    });


    /* fetching the data to table */

    $('#library-table').DataTable({
        "processing": true,
        "serverSide": true,
        // "responsive": true,
        "searching": true,
        "lengthChange": false,
        "ajax": "<?php echo base_url('show-all-contractor-data') ?>",
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
                "width": "150px",
                "targets": [1]
            },
            {
                "width": "300px",
                "targets": [2],
                "render": function(data) {
                    return moment(data).format('DD/MM/YYYY HH:mm');
                },
            },
            {
                "width": "200px",
                "targets": [3]
            }

        ],
        autoWidth: false,
        "fnCreatedRow": function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }

    });
</script>


<?php
echo view('includes/footer');
?>