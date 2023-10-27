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
                    <h1>Project Work Plane</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard-details'); ?>">Home</a></li>
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
                                    <h3 class="card-title">Projects Details</h3>
                                </div>

                                <div class="col-sm-5">
                                    <h3><?php echo $project[0]['name'] ?></h3>
                                </div>

                                <div class="col-sm-3 d-flex justify-content-around">

                                    <button type="button" class="btn btn-primary add_branch">Add</button>
                                    <button type="button" class="btn btn-primary back ">Back</button>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>Job Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total Area</th>
                                        <th>Note</th>
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

<div class="modal fade add-project-work-plan">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="" style="background-color:#439bc1;padding:10px;">

                <div class="row">
                    <div class="col-sm-9">
                        <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Add Contractor</h2>
                    </div>
                    <div class="col-sm-1">
                        <i type="button" data-toggle="tooltip" data-placement="left" title="Add Project Work Plan" class="fas fa-plus-square add" style="color: #ffffff; font-size: 1.5em; float: right; cursor: pointer; margin-right: 0.5em;"></i>
                        <!-- <button type="button" class="btn btn-success add">Add</button> -->
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>


            </div>
            <div class="modal-body">
                <form id="sub-master-data">


                    <input type="hidden" class="form-control insert_id" id="insert_id" name="insert_id" value='0'>
                    <div class="work-plan">

                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success update float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    /* Back button */

    $(document).on('click', '.back', function() {
        window.location = "<?php echo base_url("Project") ?>";
    });


    /* hide and show */

    $('.add_branch').click(function() {
        $('.add-project-work-plan').modal('show');
    });

    // /* adding project */

    // $('#add_branch_m').submit(function() {

    //     var note = $('#note').val();

    //     var formData = new FormData(this);
    //     formData.append('note', note);
    //     $.ajax({
    //         type: "POST",
    //         url: '<?php echo base_url("add-new-branch") ?>',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function(response) {
    //             response = jQuery.parseJSON(response);
    //             if (response.result == 1) {
    //                 toastr["success"](response.message);
    //                 $("#add-new-branch").modal("hide");
    //                 history.go(0);
    //             } else {
    //                 toastr["error"](response.message);
    //             }
    //         }
    //     });

    // });


    var project_id = '<?php echo $project[0]['id'] ?>';


    // ---- Data-Table ----

    $('#library-table').DataTable({
        "processing": true,
        "serverSide": true,
        // "responsive": true,
        "searching": true,
        "lengthChange": false,
        ajax: {
            url: '<?php echo base_url('show-all-project-work-plan-data') ?>',
            data: {
                'cat': project_id
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
                "width": "300px",
                "targets": [5]
            },
            {
                "width": "150px",
                "targets": [6]
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

        // localStorage.setItem("projectWorkId", id);

        window.location = "<?php echo base_url("project-work-plan") ?>?id=" + id;

    });


    $(document).ready(function() {
        let count = Number(localStorage.getItem('count')) || 0;
        // alert(`count ${count}`);
        localStorage.setItem('count', count + 1);
        addrow();
    });

    $(".add").click(function() {
        addrow();
    });

    function addrow() {

        var insert_id = $("#insert_id").val();
        insert_id = parseFloat(insert_id) + 1;

        $("#insert_id").val(insert_id);


        var name = "name" + insert_id;
        var start_date = "start_date" + insert_id;
        var end_date = "end_date" + insert_id;
        var length = "length" + insert_id;
        var breadth = "breadth" + insert_id;
        var height = "height" + insert_id;
        var units = "units" + insert_id;
        var total = "total" + insert_id;
        var note = "note" + insert_id;

        var mode = '';
        mode += '<div class="new_test">';
        mode += '<div class="row mt-2">';
        mode += '<div class="col-sm-2">';
        mode += '<label>Job Name</label>';
        mode += '<input type="text" class="form-control" name="name[]" id=' + name + ' placeholder="Job Name">';
        mode += '</div>';
        mode += '<div class="col-sm-2">';
        mode += '<label>Start Date</label>';
        mode += '<input type="date" class="form-control" name="start_date[]" id=' + start_date + ' placeholder="Start Date">';
        mode += '</div>';
        mode += '<div class="col-sm-2">';
        mode += '<label>End Date</label>';
        mode += '<input type="date" class="form-control" name="end_date[]" id=' + end_date + ' placeholder="End Date">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Length</label>';
        mode += '<input type="number" class="form-control" name="length[]" id=' + length + ' onkeyup="get_amount(' + insert_id + ')" placeholder="L" value="1">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Breadth</label>';
        mode += '<input type="number" class="form-control" name="breadth[]" id=' + breadth + ' onkeyup="get_amount(' + insert_id + ')" placeholder="B" value="1">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Height</label>';
        mode += '<input type="number" class="form-control" name="height[]" id=' + height + ' onkeyup="get_amount(' + insert_id + ')" placeholder="H" value="1">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Units</label>';
        mode += '<input type="number" class="form-control" name="units[]" id=' + units + ' placeholder="Units">';
        mode += '</div>';
        mode += '<div class="col-sm-2">';
        mode += '<label>Total</label>';
        mode += '<input type="number" class="form-control" name="total[]" id=' + total + ' placeholder="Total">';
        mode += '</div>';
        mode += '</div>';
        mode += '<div class="row mt-2">';
        mode += '<div class="col-sm-12">';
        mode += '<label>Note</label>';
        mode += ' <textarea name="note[]" class="form-control" id=' + note + '></textarea>';
        mode += '</div>';
        mode += '</div>';
        mode += '<div class="row mt-2">';
        mode += '<div class="col-sm-6"></div>';
        mode += '<div class="col-sm-3"></div>';
        mode += '<div class="col-sm-3 d-flex justify-content-end">';
        mode += '<button type="button" class="btn btn-danger remove">Remove</button>';
        mode += '</div>';
        mode += '</div>';
        mode += '</div>';

        $(".work-plan").append(mode).fadeIn('slow');

        $(".remove").click(function() {
            $(this).closest('.new_test').remove();
            var insert_id = $("#insert_id").val();
            if (insert_id >= 1) {
                insert_id = parseFloat(insert_id) - 1;
                $("#insert_id").val(insert_id);
            }
            // alert(insert_id);
            // if (insert_id == 0) {
            //     document.querySelector(".paymode").style.display = "none";
            // }


        });
    }

    function get_amount(insert_id) {
        var a = $("#length" + insert_id).val();
        var b = $("#breadth" + insert_id).val();
        var c = $("#height" + insert_id).val();

        var final = a * b * c;

        $("#total" + insert_id).val(final);
    }


    /* add the sub master */

    // $(document).ready(function() {
        $('#sub-master-data').submit(function(e) {
            e.preventDefault();

            // var master_name = '<?php echo $master[0]['name'] ?>';
            formdata = new FormData($(this)[0]);
            // formdata.append('master_name', master_name);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url("project-work-plan-add") ?>',
                data: formdata,
                contentType: false,
                processData: false,
                // success: function(response) {
                //     // console.log(response);
                //     response = jQuery.parseJSON(response);
                //     if (response.result == 1) {
                //         toastr["success"](response.message);
                //         // $('.add-sub-master-data')[0].reset();
                //         $('#library-table').DataTable().ajax.reload(null, false);
                //         $(".add-project-work-plan").modal("hide");
                //         // history.go(0);
                //     } else {
                //         toastr["error"](response.message);
                //     }
                // }
            });
        });
    // });
</script>


<?php
echo view('includes/footer');
?>