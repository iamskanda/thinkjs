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
                    <h1>Indent</h1>
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
                                <div class="col-sm-9">
                                    <h3 class="card-title">Indent Details</h3>
                                </div>

                                <div class="col-sm-3">
                                    <i type="button" data-toggle="tooltip" data-placement="left" title="Add Branch" class="fas fa-plus-square add_branch" style="color: #3e5871; font-size: 1.5em; float: right; cursor: pointer; margin-right: 0.5em;"></i>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>Project Name</th>
                                        <th>Facing</th>
                                        <th>Build-up Area</th>
                                        <th>Location</th>
                                        <th>Launch Date</th>
                                        <th>Photo</th>
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


<script>
    /* hide and show */

    $('.add_branch').click(function() {
        $('#add-new-branch').modal('show');
    });

    /* adding project */

    $('#add_branch_m').submit(function() {

        var note = $('#note').val();

        var formData = new FormData(this);
        formData.append('note', note);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("add-new-branch") ?>',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = jQuery.parseJSON(response);
                if (response.result == 1) {
                    toastr["success"](response.message);
                    $("#add-new-branch").modal("hide");
                    history.go(0);
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
        "ajax": "<?php echo base_url('show-all-branch-data') ?>",
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
                "width": "150px",
                "targets": [2]
            },
            {
                "width": "150px",
                "targets": [3]
            },
            {
                "width": "150px",
                "targets": [4]
            },
            {
                "width": "150px",
                "targets": [5]
            },
            {
                "width": "150px",
                "targets": [6],
                "render": function(data, type, row) {
                    return '<image src="upload_file/' + data + '" data-id="' + row[0] + '" style="width:100%"  id="test" />';
                }
            },
            {
                "width": "150px",
                "targets": [7]
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



    $(document).on('click', '#updateCountryBtn', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "<?php echo base_url("edit-project") ?>",
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
                response = jQuery.parseJSON(response);
                console.log(response);
                if (response.result == 1) {
                    $("#get_id").val(response.message.id);
                    $("#name").val(response.message.name);
                    $("#location").val(response.message.location);
                    $("#face").val(response.message.facing);
                    $("#area").val(response.message.builduparea);
                    $("#dimension").val(response.message.landdimension);
                    $("#start_date").val(response.message.startdate);
                    $("#note").val(response.message.note);
                    // $("#file").val(response.message.uploadfile);
                    $("#update-project").modal("show");
                }
            }
        });
    });

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
                        url: "<?php echo base_url("delete-project") ?>",
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

    $(document).on('click', '#ProjectWorkCountryBtn', function() {
        var id = $(this).data('id');

        localStorage.setItem("projectWorkId", id);
        window.location = "<?php echo base_url("project-work-plan") ?>";

    });
</script>

<?php
echo view('includes/footer');
?>