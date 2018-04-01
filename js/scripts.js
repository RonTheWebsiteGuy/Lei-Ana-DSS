///~~~~~~~~~~~~~~~~~~~~~ students-master.php ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$(document).ready(function() {
	/////////////////////////////////EDIT STUDENT/////////////////////////	
	$('.edit-student').click(function() {
			//get original data
			var x = $(this).closest("tr").find(".lname").text();
			var y = $(this).closest("tr").find(".fname").text();
			var z = $(this).closest("tr").find(".majorid span").text();
		
			//add inputs, with original data values
			$(this).closest("tr").find(".lname").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".fname").append('<input type="text" value="' + y +'">'); 
			$(this).closest("tr").find(".majorid select").val(z);
			$(this).closest("tr").find(".majorid select").removeClass("hideit"); 
			
			
			//show and hide buttons
			$(this).parent().children(".edit-student, .remove-student").addClass("hideit");
			$(this).parent().children(".save-student, .cancel-student").removeClass("hideit");
	});

		////////////////////// CANCEL STUDENT////////////////////////////////
		$('.cancel-student').click(function() {
			//hide inputs 
			$(this).closest("tr").find("input").hide();
			$(this).closest("tr").find("select").addClass("hideit");
			
			//show and hide buttons
			$(this).parent().children(".edit-student, .remove-student").removeClass("hideit");
			$(this).parent().children(".save-student, .cancel-student").addClass("hideit");
	});
	
	
	
	
	
	////////////////////////////////SAVE BUTTON///////////////////////////////
	$('.save-student').click(function() {
		//	ajax post function 
		$.ajax({
			url: 'processing/edit-student.php',
			type: "POST",
			data: {
				//locate data fields
				sid : $(this).closest("tr").find(".sid").text(),
				lname : $(this).closest("tr").find(".lname input").val(),
				fname : $(this).closest("tr").find(".fname input").val(),
				majorid : $(this).closest("tr").find(".majorid select").val()
			},
			success:function(data) { 
				alert("successful");

				
				
			},
			error: function() {
				alert("error ajax");
			}
			
			
      });
	//do this after...search and replace, remove and add back buttons
	var x = $(this).closest("tr").find(".lname input").val();
	var y = $(this).closest("tr").find(".fname input").val();
	var z = $(this).closest("tr").find(".majorid select").val(); 
	$(this).closest("tr").find(".lname").text(x); 
	$(this).closest("tr").find(".fname").text(y); 
	$(this).closest("tr").find(".majorid span").text(z);

	$(this).closest("tr").find(".majorid select").addClass("hideit");
	
				
	$(this).parent().children(".save-student, .cancel-student").addClass("hideit");
	$(this).parent().children(".edit-student, .remove-student").removeClass("hideit");
	
	});


	
	
	
	
	$('#add-student').click(function() {
		//	ajax post function 
		$.ajax({
			url: 'processing/add-student.php',
			type: "POST",
			data: {
				//locate data fields
				lname : $("#addfname").val(),
				fname : $("#addlname").val(),
				majorid : $("#addmajorid").val()
			},
			success:function(data) { 
				alert(data);

				
				
			},
			error: function() {
				alert("error ajax");
			}
			
			
      });
	
	
	});
	
	
	
	
});	
	
	
	
