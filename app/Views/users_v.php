<?php
echo view('includes/header');
?>

<script src="<?php echo base_url('public/datatable/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('public/datatable/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
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
                            <div class="col-sm-9">
                                <h3 class="card-title">Users Details</h3>
                            </div>

                            <div class="col-sm-3">
                                <i type="button" data-toggle="tooltip" data-placement="left" title="Add Users" class="fas fa-plus-square add_branch" style="color: #3e5871; font-size: 1.5em; float: right; cursor: pointer; margin-right: 0.5em;"></i>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="library-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl-No</th>
                                        <th>User Photo</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Role</th>
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

<!-- Add New Users -->

<div class="modal fade" id="add-new-branch">
    <div class="modal-dialog modal-md" style="max-width:700px;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="add-header">
                <h4 class="modal-title">Add New Users</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <!--col--4-->
                    <div class="col-sm-12">
                        <div>
                            <form id="add_branch_m" enctype="multipart/form-data">
                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Phone Number</label>
                                        <input type="number" class="form-control" name="phone">
                                    </div>
                                </div><!--row-->

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="mail">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div><!--row-->

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Set the Role</label>
                                        <select class="form-control" name="role">
                                            <option value="">Select the Option</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Office</option>
                                            <option value="3">Site Engineer</option>
                                        </select>
                                    </div>
                                </div><!--row-->

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>Date fo Birth</label>
                                        <input type="date" class="form-control" name="dob">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Upload Photo</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div><!--row-->


                                <div class="row mt-5">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div><!--row-->
                            </form>
                        </div><!--add-patient-->
                    </div><!--col--9-->
                </div><!--row-->
            </div><!--modal--body-->
        </div>
    </div>
</div>

<!-- Add new user end  -->

<!-- update user  -->

<div class="modal fade" id="update-project">
    <div class="modal-dialog modal-md" style="max-width:700px;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="add-header">
                <h4 class="modal-title">Add New Projects</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <!--col--4-->
                    <div class="col-sm-12">
                        <div>
                            <form id="add_branch_m" enctype="multipart/form-data">
                                <input type="hidden" name="get_id" id="get_id">
                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Phone Number</label>
                                        <input type="number" class="form-control" name="phone" id="phone">
                                    </div>
                                </div><!--row-->

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="mail" id="mail">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" id="address">
                                    </div>
                                </div><!--row-->

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" id="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Set the Role</label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="">Select the Option</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Office</option>
                                            <option value="3">Site Engineer</option>
                                        </select>
                                    </div>
                                </div><!--row-->

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label>Date fo Birth</label>
                                        <input type="date" class="form-control" name="dob" id="dob">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Upload Photo</label>
                                        <input type="file" class="form-control" name="photo" id="photo">
                                    </div>
                                </div><!--row-->


                                <div class="row mt-5">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div><!--row-->                              
                            </form>
                        </div><!--add-patient-->
                    </div><!--col--9-->
                </div><!--row-->
            </div><!--modal--body-->
        </div>
    </div>
</div>

<!-- update user end -->

<!-- Project Assessment -->

<div class="modal fade" id="Assessment-project">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="add-header">
                <h4 class="modal-title">Projects Assessment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <!--col--4-->
                    <div class="col-sm-12">
                        <div>
                            <form id="Assessment_project" enctype="multipart/form-data">
                                <input type="hidden" name="Assess_id" id="Assess_id">
                                <div class="row mt-2">
                               
                                    <select name="countries"  id="countries" class="countries form-control">
                                        <option value="">Select</option>

                                        <?php 
                                            foreach($branchdata as $key=>$val){
                                        ?>
                                            
                                            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>

                                        <?php } ?>                              
                                    
                                    </select>
                                                                       
                                </div><!--row-->                                                         


                                <div class="row mt-5">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div><!--row-->
                            </form>
                        </div><!--add-patient-->
                    </div><!--col--9-->
                </div><!--row-->
            </div><!--modal--body-->
        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('countries')  // id
</script> -->



<script>
    /* hide and show */

    $('.add_branch').click(function() {
        $('#add-new-branch').modal('show');
    });

    // project Assessment

    $('#Assessment_project').submit(function() {

        var valu = $('#countries').val();

        const z = valu;

        var formData = new FormData(this);
        formData.append('countries', z);

        $.ajax({
            type: "POST",
            url: '<?php echo base_url("project-assessment-add") ?>',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = jQuery.parseJSON(response);
                if (response.result == 1) {
                    toastr["success"](response.message);
                    $("#Assessment-project").modal("hide");
                    history.go(0);
                } else {
                    toastr["error"](response.message);
                }
            }
        });

    });

    $(document).on('click', '#assessmentCountryBtn', function(){
        var id = $(this).data('id');


        $.ajax({
			url:"<?php echo base_url("assessment-project")?>",
			type:"POST",
			data:{id:id},
			success:function(response) {
				response = jQuery.parseJSON(response);
				console.log('data :--',response.message);
				if(response.result == 1){
					$("#Assess_id").val(id);	
                    $("#Assessment-project").modal("show");    
                    
                    // var x = z.split(",");

                    $(".countries").val(response.message[0].project_assessment);
                    
				}
			}
		}); 
	});



    /* adding project */

    $('#add_branch_m').submit(function() {

        var formData = new FormData(this);
        // formData.append('note', note);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("add-new-user") ?>',
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

    /* Update data */

    $(document).on('click', '#updateCountryBtn', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "<?php echo base_url("edit-user") ?>",
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
                    $("#phone").val(response.message.phoneNumber);
                    $("#mail").val(response.message.email);
                    $("#address").val(response.message.address);
                    $("#dob").val(response.message.dob);
                    // $("#image").val(response.message.image);
                    $("#password").val(response.message.password);

                    $("#role").val(response.message.role_id);                   
                  
                    $("#update-project").modal("show");
                }
            }
        });
    });

    // Delete Data

    $(document).on('click', '#deleteCountryBtn', function(){
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
        cancelButtonColor:'#d33',
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false 
        },
        function(isConfirm){   
        if(isConfirm){ 
            $(".sweet-alert").hide();
            $(".sweet-overlay").hide();
            $.ajax({
                url:"<?php echo base_url("delete-user")?>",
                type:"POST",
                data:{id:id},
                success:function(response) {
                response = jQuery.parseJSON(response);
                // console.log(response);
                if(response.result == 1){
                    toastr["success"](response.message);
                    $('#library-table').DataTable().ajax.reload(null, false);
                }else{
                    toastr["error"](response.message);
                }
                }   
            });
        }
        else 
        {
            $(".sweet-alert").hide();
            $(".sweet-overlay").hide();
        }
        });
    });

    // ---- Data-Table ----

    $('#library-table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "lengthChange": false,
        "ajax": "<?php echo base_url('show-all-student-data') ?>",
        "dom": "lBfrtip",
        "stateSave": true,
        "info": false,
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
                "targets": [1],
                "render": function(data, type, row) {
                    return '<image src="upload_file/users/' + data + '" data-id="' + row[0] + '" style="width:100%"  id="test" />';
                }
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

                    if (data == 1) {
                        return '<p>Admin</p>';
                    } else if (data == 2) {
                        return '<p>Office</p>';
                    } else {
                        return '<p>Site Engineer</p>';
                    }
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
</script>


<?php
echo view('includes/footer');
?>