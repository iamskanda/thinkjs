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
                    <h1>Attendance Management</h1>
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
                                    <h3 class="card-title">Attendance</h3>
                                </div>

                                <div class="col-sm-3">
                                    <i type="button" data-toggle="tooltip" data-placement="left" title="Add Master" class="fas fa-plus-square add_master" style="color: #3e5871; font-size: 1.5em; float: right; cursor: pointer; margin-right: 0.5em;"></i>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label for="">Project Name</label>
                                        <!-- <input type="text" class="form-control master_name_edit" name="master_name_edit"> -->
                                        <select class="form-control" name="" id="">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($branchdata as $key => $val) {
                                            ?>

                                                <option value='<?php echo $val['id']; ?>'><?php echo $val['name']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Category Type</label>
                                        <select class="form-control" name="" id="" onchange="list_data(this.value)">
                                            <option value=''>Select</option>
                                            <?php
                                            foreach ($contractor as $key => $val) {
                                            ?>

                                                <option value='<?php echo $val['id']; ?>'><?php echo $val['name']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group create">
                                        <label for="">Contractor Name</label>
                                        <select class="form-control" name="" id="list-data">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row create">
                                <div class="col-sm-3">
                                    <label for="">Male Head Count</label>
                                    <input type="number" class="form-control mhc" name="mhc">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Male Helper Head Count</label>
                                    <input type="number" class="form-control mhhc" name="mhhc">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Female Head Count</label>
                                    <input type="number" class="form-control fhc" name="fhc">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Female Helper Head Count</label>
                                    <input type="number" class="form-control fhhc" name="fhhc">
                                </div>
                            </div>

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
    $(document).ready(function() {
        $(".create").hide();
    });

    function list_data(value) {     

        var id = value;

        $.ajax({
            type: "POST",
            url: '<?php echo base_url("find-sub-contractor") ?>',
            data: {
                'id': id
            },   
            success: function(response) {
                response = jQuery.parseJSON(response);
                if (response.result == 1) {
                    // console.log(response.message);                    
                    $('#list-data').empty();
                    var mode = '';
                    mode += '<option value="">Select</option>';

                    for (var i = 0; i < response.message.length; i++) {
                        mode += '<option value=' + response.message[i].id + '>' + response.message[i].name + '</option>';
                    }

                    $('#list-data').append(mode);

                    $(".create").show();

                } else {
                    $(".create").hide();
                }
            }
        });
    }
</script>


<?php
echo view('includes/footer');
?>