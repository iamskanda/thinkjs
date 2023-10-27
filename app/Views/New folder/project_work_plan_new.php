<?php
echo view('includes/header');
?>

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
                                    <h4 class="card-title">Project Work Plane</h4>
                                </div>
                                <div class="col-sm-5">
                                    <h3><?php echo $project[0]['name'] ?></h3>
                                </div>
                                <div class="col-sm-3 d-flex justify-content-around">
                                    <button type="button" class="btn btn-success add">Add</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-primary back">Back</button>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <input type="hidden" class="form-control insert_id" id="insert_id" name="insert_id" value='0'>
                            <div class="work-plan">

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
    $(document).on('click', '.back', function() {
        window.location = "<?php echo base_url("Project") ?>";
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
        mode += '<input type="date" class="form-control" name="end_date[]" id='+end_date+' placeholder="End Date">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Length</label>';
        mode += '<input type="number" class="form-control" name="length[]" id='+length+' onkeyup="get_amount(' + insert_id + ')" placeholder="L" value="1">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Breadth</label>';
        mode += '<input type="number" class="form-control" name="breadth[]" id='+breadth+' onkeyup="get_amount(' + insert_id + ')" placeholder="B" value="1">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Height</label>';
        mode += '<input type="number" class="form-control" name="height[]" id='+height+' onkeyup="get_amount(' + insert_id + ')" placeholder="H" value="1">';
        mode += '</div>';
        mode += '<div class="col-sm-1">';
        mode += '<label>Units</label>';
        mode += '<input type="number" class="form-control" name="units[]" id='+units+' placeholder="Units">';
        mode += '</div>';
        mode += '<div class="col-sm-2">';
        mode += '<label>Total</label>';
        mode += '<input type="number" class="form-control" name="total[]" id='+total+' placeholder="Total">';
        mode += '</div>';
        mode += '</div>';
        mode += '<div class="row mt-2">';
        mode += '<div class="col-sm-12">';
        mode += '<label>Note</label>';
        mode += ' <textarea name="note[]" class="form-control" id='+note+'></textarea>';
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

    function get_amount(insert_id){
        var a = $("#length"+insert_id).val();
        var b = $("#breadth"+insert_id).val();
        var c = $("#height"+insert_id).val();

        var final = a*b*c;

       $("#total"+insert_id).val(final); 
    }
</script>



<?php
echo view('includes/footer');
?>