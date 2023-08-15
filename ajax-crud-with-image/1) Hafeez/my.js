$(function () {
    

    // contact insert
    $('#form-submit').on('submit',function(event) {
        event.preventDefault();
        var form = $(this);
    $.ajax({
           url: "client",
           type: "POST",
           dataType: "JSON",
           data:  new FormData(this),
    contentType: false,
          cache: false,
    processData: false,
     beforeSend: function(){
        $(".load").fadeIn();
    },
        success: function(data){
            if(data == "success"){
                $("#exampleModal").modal("hide");
                swal("Great", "Successfully Client Data Inserted", "success");
                form[0].reset();
                return getCustomerData();
            }
        },

        error: function(xhr, XMLHttpRequest, textStatus, errorThrown) {
            return getErrorData(xhr.responseText);
            
         },

        complete: function(){
				$(".load").fadeOut();
			},
        });

        
    });
    
    
    // contact update
    $("#edit").on("submit", function(arg){
		arg.preventDefault();
        // var form =$(this);
        var ids= $('#update').val()
		$.ajax({
			url: "client/"+ids,
			type: "POST",
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            data:  new FormData(this),
			beforeSend: function(){
				$(".load").fadeIn();
			},
			success: function(response){
				if(response == "success"){
					swal("Data Updated", "Success", "success");
					$("#exampleModal2").modal("hide");
					return getCustomerData();
				}
            },
            error: function(xhr, XMLHttpRequest, textStatus, errorThrown) {
                // alert(xhr.responseText);
                return getErrorData(xhr.responseText);
                
             },
             
			complete: function(){
				$(".load").fadeOut();
			}
		});

	});


    function getErrorData(error){
        $.ajax({
            url: "errordata/"+error, 
            type: "get",
            dataType: "HTMl",
            success: function(data){
                alert(data);
            }	
        })
    };

    function getCustomerData(){
        $.ajax({
            url: "getdata", 
            type: "get",
            dataType: "HTMl",
            success: function(response){
                $("#showAllDataHere").html(response);
            }	
        })
    }

    
}) //end





// =====================================================
//to remove error message
$('.modal').on('hidden.bs.modal', function () {
    $('.showError').html('');
})

//nicher func gula eta pay na tai 2nd bar dea holo
function getCustomerData(){
    $.ajax({
        url: "getdata", 
        type: "get",
        dataType: "HTMl",
        success: function(response){
            $("#showAllDataHere").html(response);
        }	
    })
}

//single view
function singleview(v){
    $.ajax({
        type:"get",
        url:'client/'+v,
        dataType: "html",
        success: function(response){
        $('#view').html(response);
        }
    })
}

//Edit
function edit(v){
    $.ajax({
        type:"get",
        url:'client/'+v+'/edit',
        dataType: "html",
        success: function(response){
        $('#edit').html(response);
        
        }
    })
}


// Delete Data
$(document).on("click", "#delete", function(arg){
    arg.preventDefault();
    var id = $(this).val();
    var token = $('meta[name="csrf-token"]').attr('content')
    

    $.ajax({
        url: 'client/'+id,
        type: "DELETE",
        data:{
         _token:token,
        },
        dataType: "JSON", 
        success(response){
            swal("Deleted", "Customer Data Has Been Deleted", "success");
            return getCustomerData();
        }
    })

})

//pagination
$(document).on('click', '.pagination li a', function(v) {
    v.preventDefault();
    //url taken
    var page = $(this).attr('href');
    //url number taken
    var pageNumber = page.split("?page=")[1]
    return getPagination(pageNumber);
    console.log(pageNumber);
    
})

function getPagination(prm) {
    $.ajax({
        url: 'paginate'+"?page="+prm,
        type: 'GET',
        dataType: 'HTML',
        success: function(response){
            $("#showAllDataHere").html(response);

        }
    })
}