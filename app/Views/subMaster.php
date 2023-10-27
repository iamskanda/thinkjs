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
                    <h1>Sub Role Management</h1>
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
                                    <h4 class="card-title">Sub Role Management Details</h4>
                                </div>

                                <div class="col-sm-5">
                                    <h3><?php echo $master[0]['master_name'] ?></h3>
                                </div>

                                <div class="col-sm-3 d-flex justify-content-around">
                                    <button type="button" class="btn btn-primary add_sub_master">Add</button>
                                    <button type="button" class="btn btn-primary back">Back</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>Master Name</th>
                                        <th>Sub Master Name</th>
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

<!-- --------------------------------add sub Master-------------------------- -->

<div class="modal fade add-sub-master-data">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;padding:10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Add Master</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sub-master-data">
                    <input type="hidden" id="master_id" name="master_id" value="<?php echo $master[0]['id'] ?>">
                    <div class="form-group">
                        <label for="">Sub Master Name</label>
                        <input type="text" class="form-control sub_master_name" name="sub_master_name">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success update">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '.back', function() {
        window.location = "<?php echo base_url("master") ?>";
    });

    /* Module open */

    $('.add_sub_master').click(function() {
        $('.add-sub-master-data').modal('show');
    });

    /* add the sub master */

    $(document).ready(function() {
        $('#sub-master-data').submit(function(e) {
            e.preventDefault();

            var master_name = '<?php echo $master[0]['master_name'] ?>';
            formdata = new FormData($(this)[0]);
            formdata.append('master_name', master_name);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url("sub-master-add") ?>',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response);
                    response = jQuery.parseJSON(response);
                    if (response.result == 1) {
                        toastr["success"](response.message);
                        // $('.add-sub-master-data')[0].reset();
                        $('#library-table').DataTable().ajax.reload(null, false);
                        $(".add-sub-master-data").modal("hide");
                        // history.go(0);
                    } else {
                        toastr["error"](response.message);
                    }
                }
            });
        });
    });




    var master_id = '<?php echo $master[0]['id'] ?>';


    /* fetching the data to table */

    $('#library-table').DataTable({
        "processing": true,
        "serverSide": true,
        // "responsive": true,
        "searching": true,
        "lengthChange": false,
        ajax: {
            url: '<?php echo base_url('show-all-sub-master-data') ?>',
            data: {
                "cat": master_id
            }
        },
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
                "targets": [2]
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