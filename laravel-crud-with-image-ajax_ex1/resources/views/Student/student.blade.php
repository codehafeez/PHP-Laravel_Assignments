<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Ajax Crud with Laravel</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row py-2">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Laravel Ajax Image CURD -Employee data</h4>
				<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertmodal">
					  Add student
					</button>

					<div id="success_msg"></div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-dark table-boarder">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAME</th>
									<th>EMAIL</th>
									<th>IMAGE</th>
									<th>PHONE</th>
									<th>EDIT</th>
									<th>DELETE</th>

								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>

<!-- Insert Modeal -->
<!-- Modal -->
					<div class="modal fade" id="insertmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <form method="POST" enctype="multipart/form-data" id="add_student">
					      <div class="modal-body">
					      	<ul id="error_list"></ul>
					        <div class="from-group">
					        	<label>Name:</label>
					        	<input type="text" name="name" id="student_id" placeholder="Enter student name" class="form-control">
					        </div>
					        <div class="from-group">
					        	<label>Email:</label>
					        	<input type="email" name="email" id="email_id" placeholder="Enter student email" class="form-control">
					        </div>
					        <div class="from-group">
					        	<label>Image:</label>
					        	<input type="file" name="image" id="image_id" class="form-control">
					        </div>
					        <div class="from-group">
					        	<label>Phone:</label>
					        	<input type="number" name="phone" id="phone_id" placeholder="Enter student phone number" class="form-control">
					        </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Submit</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>
<!-- Edit Modal -->
				<div class="modal fade" id="edittmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <form method="POST" enctype="multipart/form-data" id="edit_student">
					      <div class="modal-body">
					      	<ul id="error_list"></ul>
					        <div class="from-group">
					        	<label>Name:</label>
					        	<input type="hidden" name="id" id="eid" class="form-control">
					        	<input type="text" name="name" id="name_eid" class="form-control">
					        </div>
					        <div class="from-group">
					        	<label>Email:</label>
					        	<input type="email" name="email" id="email_eid" class="form-control">
					        </div>
					        <div class="from-group">
					        	<label>Image:</label>
					        	<input type="file" name="image" id="image_eid" class="form-control">
					        </div>
					        <div class="from-group">
					        	<label>Phone:</label>
					        	<input type="number" name="phone" id="phone_eid" class="form-control">
					        </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Submit</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			showdata();
			$(document).on('submit','#add_student',function(e){
				e.preventDefault();

				let formdata=new FormData($('#add_student')[0]);

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					url:"/student",
					type: "POST",
					data: formdata,
					contentType: false,
					processData: false,
					success:function(response){
						// console.log(response);

						if(response.status == 400){
							$("#error_list").html("");
							$("#error_list").addClass("alert alert-danger");
							$.each(response.errors,function(key,value){
								$("#error_list").append('<li>' +value+'</li>');
							});
						}else{
							$("#success_msg").html("");
							$("#success_msg").addClass("alert alert-success");
							$("#success_msg").text(response.message);

							$("#add_student").find('input').val('');
							$("#insertmodal").modal('hide');

							showdata();
						}
					}
				});
			});

			function showdata(){
				$.ajax({
					url:"/getdata",
					type:"GET",
					dataType:"json",
					success:function(response){
						$('tbody').html("");
						$.each(response.data,function(key,value){
							$('tbody').prepend('<tr id="rowid_'+value.id+'">\
								<td>'+value.id+'</td>\
								<td>'+value.name+'</td>\
								<td>'+value.email+'</td>\
								<td><img src="upload/student/'+value.image+'" width="50px" height="50px" </td>\
								<td>'+value.phone+'</td>\
								<td><button type="button" class="edit_student btn btn-primary" value="'+value.id+'">Edit</button></td>\
								<td><button type="button" class="delete_student btn btn-danger" value="'+value.id+'">Delete</button></td>\
								</tr>');
						});
					}
				});
			}

			$(document).on('click','.edit_student',function(e){
				e.preventDefault();
				var emp_id=$(this).val();
				$("#edittmodal").modal('show');

				$.ajax({
					url:"edit/"+emp_id,
					type:"GET",
					success:function(response){
						 //console.log(response.data);
						$("#eid").val(response.data.id);
						$("#name_eid").val(response.data.name);
						$("#email_eid").val(response.data.email);
						$("#phone_eid").val(response.data.phone);
						
					}
				});
			});

			$(document).on('submit','#edit_student',function(e){
				e.preventDefault();

				var id=$("#eid").val();
				let editformdata=new FormData($("#edit_student")[0]);

				
					$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url:"/update/"+id,
						type:"POST",
						data:editformdata,
						contentType:false,
						processData:false,
						success:function(response){
							//console.log(response.status);
							if(response.status == 400){
							$("#error_list").html("");
							$("#error_list").addClass("alert alert-danger");
							$.each(response.errors,function(key,value){
								$("#error_list").append('<li>' +value+'</li>');
							});
						}else{
							$("#success_msg").html("");
							$("#success_msg").addClass("alert alert-success");
							$("#success_msg").text(response.message);

							$("#edit_student").find('input').val('');
							$("#edittmodal").modal('hide');

							showdata();
						}
						}
					});
				

			});

			$(document).on('click','.delete_student',function(e){
				e.preventDefault();

				var deleteId=$(this).val();
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax({
					url:"/delete/"+deleteId,
					type:"DELETE",
					data:{
						"id": deleteId,
						"_token": token,
					},
					success:function(response){
						$("#success_msg").html("");
					$("#success_msg").addClass("alert alert-success");
					$("#success_msg").text(response.message);

					confirm('Are you sure to delete ?');

					$("#rowid_"+ deleteId).remove();
					}
				});

			});
		});
	</script>
</body>
</html>