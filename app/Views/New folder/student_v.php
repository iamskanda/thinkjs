<?php
echo view('includes/header');
?>

<script src="<?php echo base_url('public/datatable/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('public/datatable/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<div>
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6 animated bounceInRight">
               <h1 class="m-0"><span class="fa fa-users"></span> Students List</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Students</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="card-body animated pulse">
            <div class="row">
               <div class="col-sm-9"></div>
               <div class="col sm-3"> <i type="button" data-toggle="tooltip" data-placement="left" title="Add Student" class="fas fa-plus-square add_student" style="color: #3e5871; font-size: 1.5em; float: right; cursor: pointer; margin-right: 0.5em;"></i></div>
            </div>
            <table id="library-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Sl-No</th>
                     <th>Name</th>
                     <th>Phone Number</th>
                     <th>Address</th>
                     <th>Aadhar</th>
                     <th>Date of Birth</th>
                     <th>Image</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody> </tbody>

            </table>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->

   <!-- Add New Branch -->

   <div class="modal fade" id="add-new-branch">
      <div class="modal-dialog modal-md" style="max-width:700px;">
         <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="add-header">
               <h4 class="modal-title">Add New Branch</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <div class="row">
                  <!--col--4-->
                  <div class="col-sm-12">
                     <div>
                        <form id="add_branch_m">
                           <div class="row">
                              <div class="col-sm-2"><label>Branch Name</label></div>
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="branch">
                                 </div>
                              </div>
                              <div class="col-sm-2"></div>
                           </div><!--row-->

                           <div class="row">
                              <div class="col-sm-2"><label>Address</label></div>
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <textarea type="text" class="form-control" name="address" id="address" rows="4" cols="50"></textarea>
                                 </div>
                              </div>
                              <div class="col-sm-2"></div>
                           </div><!--row-->

                           <div class="row">
                              <div class="col-sm-2"><label>Email-ID</label></div>
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <input type="email" class="form-control" name="email">
                                 </div>
                              </div>
                              <div class="col-sm-2"></div>
                           </div><!--row-->

                           <div class="row">
                              <div class="col-sm-2"><label>Mobile</label></div>
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="mobile">
                                 </div>
                              </div>
                              <div class="col-sm-2"></div>
                           </div><!--row-->

                           <div class="row">
                              <div class="col-sm-2"><label>Person Name</label></div>
                              <div class="col-sm-8">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="person_name">
                                 </div>
                              </div>
                              <div class="col-sm-2"></div>
                           </div><!--row-->

                           <div class="row">
                              <div class="col-sm-2"><label>Gender</label></div>
                              <div class="col-sm-4">
                                 <select class="form-control" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                 </select>
                              </div>
                              <div class="col-sm-6"></div>
                           </div><!--row-->


                           <div class="row">
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
</div>

<script>
   $('.add_student').click(function() {
      $('#add-new-branch').modal('show');
   });
</script>


<script>
   // ---- Data-Table ----

   $('#library-table').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "<?php echo base_url('show-all-student-data') ?>",
      "dom": "lBfrtip",
      stateSave: true,
      info: true,
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
            "render" : function(data,type,row){
               return '<image src="public/student/'+data+'" data-id="'+row[0]+'" style="width:100%"  id="test" />';
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