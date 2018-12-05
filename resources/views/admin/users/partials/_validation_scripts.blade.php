//Confirm Reject
	$('#confirm_rejection').on('click',function(e){
	    e.preventDefault();
	    var rejectForm = $('#reject-form');
	    swal({
	        title: "@lang('Are you sure?')",
	        text: "@lang('Once you reject this request, you will not be able to revert!')",
	        buttons: ['Cancel', 'Confirm'],
	        dangerMode: true,
	      })
	      .then((willDelete) => {
	        if (willDelete) {
	          rejectForm.submit();
	          swal("@lang('All is well!')", {icon: "success",});

	        } else {
	          //swal("Your imaginary file is safe!");
	        }
	      });
	});
	//delete user details Not working yet
	$('.btn-del-user').on('click', function(e){
		e.preventDefault();
		var url = $(this).attr('data-url');
		console.log(url)
		swal({
			title: "Are you sure?",
			text: "Do you really want to delete User",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		  })
		  .then((willDelete)=> {
			if (willDelete) {
				$.ajax({
					dataType  :'JSON',
					method      :'GET',
					url       : url,
					success     :function(response){
						console.log(response);
						if (response.status == 'success') {
							swal({title:"Great Job",text:response.message,icon:response.status })
							.then((willReload) =>{
									if (willReload) {
								location.reload();
								}
							});
						}
						if(response.status =='error'){
							swal({title:"Error",text:response.message,icon:"warning"});
						}
					}
				});
			} else {
			swal("User Information is safe!");
			}
		});
	});
	//edit user details
	$('#editUserModal').on('show.bs.modal', function (event) {

		var editUserBtn = $(event.relatedTarget) // Button that triggered the modal
		var url = editUserBtn.data('url')
		var editUserModal = $(this)
		console.log(url);
		$.ajax({
			dataType  :'JSON',
			type      :'GET',
			url       : url,
			success   :function(response){
				console.log(response)
				if(response.status == 'success') {
					editUserModal.find('input[name="id"]').val(response.data.id)
					editUserModal.find('input[name="first_name"]').val(response.data.first_name)
					editUserModal.find('input[name="last_name"]').val(response.data.last_name)
					editUserModal.find('input[name="email"]').val(response.data.email)
					editUserModal.find('input[name="hris_number"]').val(response.data.hris_number)
					editUserModal.find('input[name="phone"]').val(response.data.phone)
					editUserModal.find('input[name="role"]').val(response.data.role)
					editUserModal.find('input[name="location"]').val(response.data.location)
					//editUserModal.find('input[name="path_scanned_id"]').val(response.data.path_scanned_id)
					editUserModal.find('select[name="department_id"]').val(response.data.department_id).trigger('change')
					editUserModal.find('select[name="gender"]').val(response.data.gender).trigger('change')
					editUserModal.find('select[name="user_status"]').val(response.data.user_status).trigger('change')
					if(response.data.isAdmin == 1){
						editUserModal.find('.isAdmin').attr("checked", "checked")
					}

				}
				if(response.status =='error'){
					toastr.warning(response.data,'Oops Something is not alright');
				}
			}
		});
	});
	//Confirm Approval
	$('#confirm_approval').on('click',function(e){
	    e.preventDefault();
	    var rejectForm = $('#approval-form');
	    swal({
	        title: "@lang('Are you sure?')'",
	        text: "@lang('Once you accept, you will not be able to revert!')",
	        buttons: ['Cancel', 'Confirm'],
	        dangerMode: true,
	      })
	      .then((willDelete) => {
	        if (willDelete) {
	          rejectForm.submit();
	          swal("@lang('All is well!')", {icon: "success",});

	        } else {
	          //swal("Your imaginary file is safe!");
	        }
	      });
	});



	$('#rejectionReasonModal').on('show.bs.modal', function (event) {

	    var rejectBtn = $(event.relatedTarget) // Button that triggered the modal
	    var url = rejectBtn.data('url')
	    var rejectionReasonModal = $(this)

	    console.log(url);

	    $.ajax({
	        dataType  :'JSON',
	        type      :'GET',
	        url       : url,
	        success   :function(response){
	            console.log(response)
	            if(response.status == 'success') {
	                rejectionReasonModal.find('input[name="id"]').val(response.data.id)
	            }
	            if(response.status =='error'){
	                toastr.warning(response.data,'@lang("Oops Something is not alright")');
	            }
	        }
	    });
	});

	$('#approvalFormModal').on('show.bs.modal', function (event) {

	    var approvalBtn = $(event.relatedTarget) // Button that triggered the modal
	    var url = approvalBtn.data('url')
	    var approvalFormModal = $(this)

	    console.log(url);

	    $.ajax({
	        dataType  :'JSON',
	        type      :'GET',
	        url       : url,
	        success   :function(response){
	            console.log(response)
	            if(response.status == 'success') {
	                approvalFormModal.find('input[name="id"]').val(response.data.id)
	            }
	            if(response.status =='error'){
	                toastr.warning(response.data,'@lang("Oops Something is not alright")');
	            }
	        }
	    });
	});
	$('#deleteUserModal').on('show.bs.modal', function (event) {

	    var rejectBtn = $(event.relatedTarget) // Button that triggered the modal
	    var url = rejectBtn.data('url')
	    var rejectionReasonModal = $(this)

	    console.log(url);

	    $.ajax({
	        dataType  :'JSON',
	        type      :'GET',
	        url       : url,
	        success   :function(response){
	            console.log(response)
	            if(response.status == 'success') {
	                rejectionReasonModal.find('input[name="id"]').val(response.data.id)
	            }
	            if(response.status =='error'){
	                toastr.warning(response.data,'@lang("Oops Something is not alright")');
	            }
	        }
	    });
	});
    $('#viewUserImageModal').on('show.bs.modal', function (event) {

        var viewUserImageBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = viewUserImageBtn.data('url')
        var viewUserImageModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                       viewUserImageModal.find('div.image').html('<img id="imageSrc" src="'+((response.user.image_path == null ) ? '/img/profile/man.svg' : response.user.image_path)+'"   class="rounded mx-auto d-block" alt="..." >')
                       viewUserImageModal.find('span.user_name').text(response.user.first_name+' '+response.user.last_name)
                    }
                if(response.status =='error'){
                    toastr.warning(response.data,'Oops Something is not alright');
                }
            }
        });
	});
	$('#viewUserImageModal').on('hidden.bs.modal', function (e) {

		$(this).find('div.image').html('');
	});

   $('.downloadBtn').on('click', function(e){
       // console.log()
        $(this).attr('href',$('#imageSrc').attr('src'));
   });


	  $('.action').on('click', function(e){

		  e.preventDefault();

		  var url = $(this).attr('data-url');
		  var checkboxData = new Array();
		  $('input[type=checkbox][name="id[]"]:checked').each(function() {
			 checkboxData.push($(this).val());
		  });

		   swal({
			  title: "@lang('Are you sure?')'",
			  text: "@lang('Once you accept, you will not be able to revert!')",
			  buttons: ['Cancel', 'Confirm'],
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				  console.log(checkboxData);
				  postform(url,JSON.stringify(checkboxData));

			  } else {
				swal("Nothing to be done!");
			  }
		  });
	  });

	  function postform (url, data){

		   $.ajax({
			  dataType  :'JSON',
			  type      :'GET',
			  url       : url,
			  data      : { data: data},
			  success   :function(response){

				   if (response.status =="success") {
						swal({title:"Great Job",text:response.message,icon:response.status })
						  .then((willReload) =>{
								  if (willReload) {
							  location.reload();
							  }
						  });
				   }else{
					 swal({title:"Error",text:response.message,icon:response.status });

				   }

			  }
		  });
	  }

