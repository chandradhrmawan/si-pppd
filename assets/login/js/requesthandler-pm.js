$(document).ready( function () {

	$("#btnAddDetail").live("click", function(){
		showProjectDetail();
	});

	$("#btnCancelDetail").live("click", function(){
		hideProjectDetail();
	});

	function showProjectDetail(){
		$("#addContentDetail").show();
	}
	
	function hideProjectDetail(){
		$("#addContentDetail").hide();
	}

	function changeDepartmentForm(empId){
		var formData = {
			departementId:$("#tic-input-dept").val(),
			action: "department-change"
		};
		
		$.ajax({
			type: "POST",
			url: BASE_URL+"it/ticket",
			data: formData,
			dataType: "json",
			success: function(response){
				$("#tic-emp-name").html(response.html);
				$('#tic-input-emp').val(empId);
			}
		});

		return false; 
	}



});