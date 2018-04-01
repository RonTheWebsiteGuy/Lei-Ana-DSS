/*
Table of Contents
1. Edit and Save buttons
	1.1 STUDENT
	1.2 Program
	1.3 Course
	1.4 Individual Course

*/

$(document).ready(function() {



	//1.1
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

  ////////////////////////////////SAVE STUDENT BUTTON///////////////////////////////
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
			var x = $(this).closest("tr").find(".cname").text();
			var y = $(this).closest("tr").find(".crn").text();
			//add inputs
			$(this).closest("tr").find(".cname").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".crn").append('<input type="text" value="' + y +'">');

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
	var x = $(this).closest("tr").find(".course input").val();
	var y = $(this).closest("tr").find(".crn input").val();
	$(this).closest("tr").find(".course").text(x);
	$(this).closest("tr").find(".crn").text(y);

	$(this).parent().children(".save-icourse, .cancel-icourse").addClass("hideit");
	$(this).parent().children(".edit-icourse, .remove-icourse").removeClass("hideit");

	});










});
