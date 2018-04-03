$(document).ready(function() {

	$('.edit-program').click(function() {
		//var x = $(this).closest("tr").find(".programid").text();
		//$(this).closest("tr").find(".programid").prepend('<input type="text" value="'+ x +'"><br>');

		var y = $(this).closest("tr").find(".programname").text();
		$(this).closest("tr").find(".programname").prepend('<input type="text" value="' + y + '"><br>');

		$(this).replaceWith('<button class="save-program">Save</button>');

	});
});



//bind to element not in existence
$('body').on('click','.save-program',function() {
	$.ajax({
    	data: {
    		'MajorID' : $(this).closest("tr").find(".programid").text(),
    		'Mname' : $(this).closest("tr").find(".programname").text()
    	},
    	type: "post",

    	url: "../processing/save-program.php",
    	success: function(data){
        	alert("Saved Program: " + data);
        }
	});
});

=======
/*
Table of Contents
1. CRUD
	1.1 STUDENT
	1.2 Program
	1.3 Course
	1.4 Individual Course

*/

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

	//1.2
	/////////////////////////////////EDIT Program/////////////////////////
	$('.edit-program').click(function() {
			//get original data
			var x = $(this).closest("tr").find(".Mname").text();
			var y = $(this).closest("tr").find(".pid").text();
			//add inputs
			$(this).closest("tr").find(".Mname").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".pid").append('<input type="text" value="' + y +'">');

			$(this).parent().children().addClass("hideit");
			$(this).parent().children(".save-program, .cancel-program").removeClass("hideit");
	});

  ////////////////////////////////SAVE Program BUTTON///////////////////////////////
	$('.save-program').click(function() {
		//	ajax post function
		$.ajax({
			url: 'processing/edit-program.php',
			type: "POST",
			data: {
				//locate data fields
				pid : $(this).closest("tr").find(".pid").text(),
				mname : $(this).closest("tr").find(".mname input").val(),
			},
			success:function(data) {
				alert("successful");



			},
			error: function() {
				alert("error ajax");
			}


      });
	//do this after...search and replace, remove and add back buttons
	var x = $(this).closest("tr").find(".mname input").val();
	var y = $(this).closest("tr").find(".pid input").val();
	$(this).closest("tr").find(".mname").text(x);
	$(this).closest("tr").find(".pid").text(y);

	$(this).parent().children(".save-program, .cancel-program").addClass("hideit");
	$(this).parent().children(".edit-program, .remove-program").removeClass("hideit");

	});


	//1.3
	/////////////////////////////////EDIT Course/////////////////////////
	$('.edit-course').click(function() {
			//get original data
			var x = $(this).closest("tr").find(".cname").text();
			var y = $(this).closest("tr").find(".crn").text();
			//add inputs
			$(this).closest("tr").find(".cname").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".crn").append('<input type="text" value="' + y +'">');

			$(this).parent().children().addClass("hideit");
			$(this).parent().children(".save-course, .cancel-course").removeClass("hideit");
	});

	////////////////////////////////SAVE Course BUTTON///////////////////////////////
	$('.save-course').click(function() {
		//	ajax post function
		$.ajax({
			url: 'processing/edit-course.php',
			type: "POST",
			data: {
				//locate data fields
				cid : $(this).closest("tr").find(".cid").text(),
				cname : $(this).closest("tr").find(".cname input").val(),
				crn : $(this).closest("tr").find(".crn input").val()
			},
			success:function(data) {
				alert("successful");



			},
			error: function() {
				alert("error ajax");
			}


			});
	//do this after...search and replace, remove and add back buttons
	var x = $(this).closest("tr").find(".course input").val();
	var y = $(this).closest("tr").find(".crn input").val();
	$(this).closest("tr").find(".course").text(x);
	$(this).closest("tr").find(".crn").text(y);

	$(this).parent().children(".save-course, .cancel-course").addClass("hideit");
	$(this).parent().children(".edit-course, .remove-course").removeClass("hideit");

	});

	//1.4
	/////////////////////////////////EDIT Individual Course/////////////////////////
	$('.edit-icourse').click(function() {
			//get original data
			var w = $(this).closest("tr").find(".cname").text();
			var x = $(this).closest("tr").find(".cnumber").text();
			var y = $(this).closest("tr").find(".pid").text();
			var z = $(this).closest("tr").find(".crn").text();
			//add inputs
			$(this).closest("tr").find(".cname").append('<input type="text" value="' + w +'">');
			$(this).closest("tr").find(".cnumber").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".pid").append('<input type="text" value="' + y +'">');
			$(this).closest("tr").find(".crn").append('<input type="text" value="' + z +'">');

			$(this).parent().children().addClass("hideit");
			$(this).parent().children(".save-icourse, .cancel-icourse").removeClass("hideit");
	});

	////////////////////////////////SAVE Individual Course BUTTON///////////////////////////////
	$('.save-course').click(function() {
		//	ajax post function
		$.ajax({
			url: 'processing/edit-individual-course.php',
			type: "POST",
			data: {
				//locate data fields
				cid : $(this).closest("tr").find(".cid").text(),
				cname : $(this).closest("tr").find(".cname input").val(),
				cnumber : $(this).closest("tr").find(".cnumber input").val(),
				pid : $(this).closest("tr").find(".pid input").val(),
				crn : $(this).closest("tr").find(".crn input").val()
			},
			success:function(data) {
				alert("successful");



			},
			error: function() {
				alert("error ajax");
			}


			});
	//do this after...search and replace, remove and add back buttons
	var w = $(this).closest("tr").find(".cname input").val();
	var x = $(this).closest("tr").find(".cnumber input").val();
	var y = $(this).closest("tr").find(".pid input").val();
	var z = $(this).closest("tr").find(".crn input").val();
	$(this).closest("tr").find(".cname").text(w);
	$(this).closest("tr").find(".cnumber").text(x);
	$(this).closest("tr").find(".pid").text(y);
	$(this).closest("tr").find(".crn").text(z);

	$(this).parent().children(".save-icourse, .cancel-icourse").addClass("hideit");
	$(this).parent().children(".edit-icourse, .remove-icourse").removeClass("hideit");

	});



});
