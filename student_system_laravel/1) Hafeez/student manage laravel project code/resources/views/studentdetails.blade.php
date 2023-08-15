@extends('layout.default')

@section('content')
<h1>Student Details</h1>
<input type="text" id="student_search"  placeholder="Search for...">

 
	  <input type="checkbox" class="parameter" id="parameter1" name="param[]" value="fname"> Father name 
	  <input type="checkbox" class="parameter" id="parameter2" name="param[]" value="class"> Class 
	  <input type="checkbox" class="parameter" id="parameter3" name="param[]" value="phnum"> Phone num
	  <input type="checkbox" class="parameter" id="parameter3" name="param[]" value="email"> Email
	  

<table class="table table-bordered scontent">
	<thead>
		<th class="exam_sorting" data-sorting_type="asc" data-column_name="sname" style="cursor: pointer">Student name</th>
		<th class="exam_sorting" data-sorting_type="asc" data-column_name="fname" style="cursor: pointer">Father name</th>
		<th>Class</th>
		<th>Phone num</th>
		<th>Email</th>
    <th>Show</th>
    <th>Add Fee</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		
			@include('studentdetails_ajax')
	</tbody>
</table>



	<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
  <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
  <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
@endsection


@push('footer-scripts')
<script type="text/javascript">
	$(document).ready(function(){


		 $(document).on('click', '.parameter', function(){
     	var filter = [];
        $('.parameter:checked').each(function(){
            filter.push($(this).val());
        });
      $.ajax({
         url:"<?php echo url(''); ?>/studentdetails?filter="+filter,
         success:function(data){
         $('.scontent tbody').html(data);
         }
      })
    });
      
  function fetch_data(page, sort_type="", sort_by="", search="") {
      $.ajax({
         url:"<?php echo url(''); ?>/studentdetails-ajax?page="+page+"&sorttype="+sort_type+"&sortby="+sort_by+"&search="+search,
         success:function(data){
          $('.scontent tbody').html(data);
         }
      })
     }

    

       $(document).on('keyup', '#student_search', function(){
          var search = $('#student_search').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var page = $('#hidden_page').val();
          fetch_data(page, sort_type, column_name, search);
       });

        $(document).on('click', '.exam_sorting', function(){
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if(order_type == 'asc')
            {
             $(this).data('sorting_type','desc');
             reverse_order = 'desc';
            }
            else
            {
             $(this).data('sorting_type','asc');
             reverse_order = 'asc';
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            var search = $('#student_search').val();
            fetch_data(page, reverse_order, column_name, search);
        });

       $(document).on('click', '.pag_link a', function(e){
           e.preventDefault();  
          var search = $('#student_search').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();     
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page, sort_type, column_name, search);
     });


   });
</script>
@endpush

