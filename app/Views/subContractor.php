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
                    <h1>Sub Contractor Management</h1>
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
                                    <h4 class="card-title">Sub Contractor Details</h4>
                                </div>

                                <div class="col-sm-5">
                                    <h3><?php echo $master[0]['name'] ?></h3>
                                </div>

                                <div class="col-sm-3 d-flex justify-content-around">
                                    <button type="button" class="btn btn-primary add_sub_master">Add</button>
                                    <button type="button" class="btn btn-primary back">Back</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>Contractor Name</th>
                                        <th>Mobile Number</th>
                                        <th>MP</th>
                                        <th>MHP</th>
                                        <th>FP</th>
                                        <th>FHP</th>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;padding:10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Add Contractor</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sub-master-data">
                    <input type="hidden" id="master_id" name="master_id" value="<?php echo $master[0]['id'] ?>">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control sub_master_name" name="sub_master_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="Number" class="form-control sub_phone_number" name="sub_phone_number">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <h4 class="text-center"> <label for="">Charges for Work</label> </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Male</label>
                                <input type="text" class="form-control male" name="male" onkeyup="male_count(this.value)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Female</label>
                                <input type="text" class="form-control female" name="female" onkeyup="female_count(this.value)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Male Helper</label>
                                <input type="text" class="form-control male_helper" name="male_helper" onkeyup="male_helper_count(this.value)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Female Helper</label>
                                <input type="text" class="form-control female_helper" name="female_helper" onkeyup="female_helper_count(this.value)">
                            </div>
                        </div>
                    </div>    
                    
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <h4 class="text-center"> <label for="">Over-Time Charges for Work</label> </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Male</label>
                                <input type="text" class="form-control male_ot" name="male_ot">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Female</label>
                                <input type="text" class="form-control female_ot" name="female_ot">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Male Helper</label>
                                <input type="text" class="form-control male_helper_ot" name="male_helper_ot">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Female Helper</label>
                                <input type="text" class="form-control female_helper_ot" name="female_helper_ot">
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <button type="submit" class="btn btn-success update float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

    function male_count(value){
        var cal = value/8;
        $('.male_ot').val(cal);
    }

    function female_count(value){
        var cal = value/8;
        $('.female_ot').val(cal) ;
    }

    function male_helper_count(value){
        var cal = value/8;
        $('.male_helper_ot').val(cal);
    }

    function female_helper_count(value){
        var cal = value/8;
        $('.female_helper_ot').val(cal);
    }


    $(document).on('click', '.back', function() {
        window.location = "<?php echo base_url("contractor-creation") ?>";
    });

    /* Module open */

    $('.add_sub_master').click(function() {
        $('.add-sub-master-data').modal('show');
    });

    /* add the sub master */

    $(document).ready(function() {
        $('#sub-master-data').submit(function(e) {
            e.preventDefault();

            var master_name = '<?php echo $master[0]['name'] ?>';
            formdata = new FormData($(this)[0]);
            formdata.append('master_name', master_name);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url("sub-contractor-add") ?>',
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
            url: '<?php echo base_url('show-all-sub-contractor-data') ?>',
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
                "targets": [6]
            },
            {
                "width": "150px",
                "targets": [7]
            },

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