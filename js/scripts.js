$(document).ready(function() {




	/////////////////////////////////EDIT STUDENT/////////////////////////	
	$('.edit-student').click(function() {
			//get original data
			var x = $(this).closest("tr").find(".lname").text();
			var y = $(this).closest("tr").find(".fname").text();
			//add inputs
			$(this).closest("tr").find(".lname").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".fname").append('<input type="text" value="' + y +'">'); 
			
			$(this).parent().children().addClass("hideit");
			$(this).parent().children(".save-student, .cancel-student").removeClass("hideit");
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
				fname : $(this).closest("tr").find(".fname input").val()
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
	$(this).closest("tr").find(".lname").text(x); 
	$(this).closest("tr").find(".fname").text(y); 
				
	$(this).parent().children(".save-student, .cancel-student").addClass("hideit");
	$(this).parent().children(".edit-student, .remove-student").removeClass("hideit");
	
	});


	
	
	
	
	
	
	
	
	
	
	
	
});	
	
	
	
