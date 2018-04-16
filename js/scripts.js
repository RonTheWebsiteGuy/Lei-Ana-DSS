/*
Table of Contents
1. Edit and Save buttons
	1.1 STUDENT
	1.2 Program
	1.3 Course
	1.4 Individual Course

*/

//	1. CRUD
//	1.1 Students



$(document).ready(function() {

//~~~~~~~~~~~~~~~~~~~~~1.1 EDIT STUDENT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	$('.edit-student').click(function() {
			//get original data
			var x = $(this).closest("tr").find(".lname").text();
			var y = $(this).closest("tr").find(".fname").text();
			var z = $(this).closest("tr").find(".majorid span").text();
			//alert(z);
			//add inputs
			$(this).closest("tr").find(".lname").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".fname").append('<input type="text" value="' + y +'">');
			$(this).closest("tr").find(".majselect").removeClass("hideit").val(z);

			$(this).parent().children(".edit-student, .remove-student").addClass("hideit");
			$(this).parent().children(".save-student, .cancel-student").removeClass("hideit");
	});

//~~~~~~~~~~~~~~~~~~~~1.2 SAVE STUDENT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
				major : $(this).closest("tr").find(".majselect option:selected").attr("data-maj")
			},
			success:function(data) {
				alert(data + " successful");
			},
			error: function() {
				alert("error ajax");
			}
		});

	//find values of inputs
	var x = $(this).closest("tr").find(".lname input").val();
	var y = $(this).closest("tr").find(".fname input").val();
	var z = $(this).closest("tr").find(".majselect").val();
	//change fields to values of inputs
	$(this).closest("tr").find(".lname").text(x);
	$(this).closest("tr").find(".fname").text(y);
	$(this).closest("tr").find(".majorid span").text(z);

	//hide inputs
	$(this).closest("tr").find(".lname input").remove();
	$(this).closest("tr").find(".fname input").remove();
	$(this).closest("tr").find(".majselect").addClass("hideit");

	//switch out buttons
	$(this).parent().children(".save-student, .cancel-student").addClass("hideit");
	$(this).parent().children(".edit-student, .remove-student").removeClass("hideit");

	});


	//~~~~~~~~~~~~1.3 CANCEL STUDENT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	$('.cancel-student').click(function() {
		//hide inputs
		$(this).closest("tr").find(".lname input").remove();
		$(this).closest("tr").find(".fname input").remove();
		$(this).closest("tr").find(".majselect").addClass("hideit");


		$(this).parent().children(".save-student, .cancel-student").addClass("hideit");
		$(this).parent().children(".edit-student, .remove-student").removeClass("hideit");

	});


	//~~~~~~~~~~~~~~1.4 ADD STUDENT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	$('#add-student').click(function() {
	//	ajax post function
		$.ajax({
			url: 'processing/add-student.php',
			type: "POST",
			data: {
				//locate data fields
				sid : $("#addsid").val(),
				lname : $("#addlname").val(),
				fname : $("#addfname").val(),
				major : $("#addmajor option:selected").attr("data-maj")
			},
			success:function(data) {
				alert(data + " successful");
			},
			error: function() {
				alert("error ajax");
			}
		});
	});
});


///////////////////////////////////////////////////////////////////////////////////////////TERMS//////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {

	//========================= 3.1 EDIT TERM ==========================
	$(".edit-term").click(function() {

			//get original data
			var x = $(this).closest("tr").find(".termid").text();
			var y = $(this).closest("tr").find(".termname").text();
			var u = $(this).closest("tr").find(".termstart").text();
			var v = $(this).closest("tr").find(".termend").text(); 
			
//			alert( x + y + u + v);
			
			//add inputs, with original data values
			$(this).closest("tr").find(".termname").append('<input type="text" value="' + y +'">');
			$(this).closest("tr").find(".termstart").append('<input type="date" value="' + u +'">');
			$(this).closest("tr").find(".termend").append('<input type="date" value="' + v +'">');
			
			//show and hide buttons
			$(this).parent().children(".edit-term, .remove-term").addClass("hideit");
			$(this).parent().children(".save-term, .cancel-term").removeClass("hideit");
	});



//================================      3.2   SAVE TERM================================
	$('.save-term').click(function() {
		//	ajax post function
		$.ajax({
			url: 'processing/edit-term.php',
			type: "POST",
			data: {
				//locate data fields
				termid : $(this).closest("tr").find(".termid").attr("data-id"),
				termname : $(this).closest("tr").find(".termname input").val(),
				termstart : $(this).closest("tr").find(".termstart input").val(),
				termend : $(this).closest("tr").find(".termend input").val()
			},
			success:function(data) {
				alert(data + "successful");
			},
			error: function() {
				alert("error ajax");
			}


      });

	//do this after...search and replace, remove and add back buttons
	var y = $(this).closest("tr").find(".termname input").val();
	var a = $(this).closest("tr").find(".termstart input").val();
	var b = $(this).closest("tr").find(".termend input").val();
	//$(this).closest("tr").find(".termid").text(x);
	$(this).closest("tr").find(".termname").text(y);
	$(this).closest("tr").find(".termstart").text(a);
	$(this).closest("tr").find(".termend").text(b);
	
	$(this).parent().children(".save-term, .cancel-term").addClass("hideit");
	$(this).parent().children(".edit-term, .remove-term").removeClass("hideit");

	});

	
		//~~~~~~~~~~~~~~3.3 ADD TERM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	$('#add-term').click(function() {
	//	ajax post function
		$.ajax({
			url: 'processing/add-term.php',
			type: "POST",
			data: {
				//locate data fields
				//sid : $("#addsid").val(),
				termname : $("#addname").val(),
				termstart : $("#addstart").val(),
				termend : $("#addend").val()
			},
			success:function(data) {
				alert(data + " successful");
			},
			error: function() {
				alert("error ajax");
			}
		});
	});
	
	
	
//======================  3.4CANCEL TERM=====================
		$('.cancel-term').click(function() {
			//hide inputs
			$(this).closest("tr").find("input").hide();

			//show and hide buttons
			$(this).parent().children(".edit-term, .remove-term").removeClass("hideit");
			$(this).parent().children(".save-term, .cancel-term").addClass("hideit");
	});


});




///////////////////////////////////////////////////////////////////////////////////////////COURSES//////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {

	//========================= 4.1 EDIT COURSE  ==========================
	$(".edit-course").click(function() {

			//get original data
			var x = $(this).closest("tr").find(".cnum").text();
			var y = $(this).closest("tr").find(".cname").text();
			
			//add inputs, with original data values
			$(this).closest("tr").find(".cnum").append('<input type="text" value="' + x +'">');
			$(this).closest("tr").find(".cname").append('<input type="text" value="' + y +'">');
			
			//show and hide buttons
			$(this).parent().children(".edit-course, .remove-course").addClass("hideit");
			$(this).parent().children(".save-course, .cancel-course").removeClass("hideit");
	});



//================================      4.2   SAVE TERM================================
	$('.save-course').click(function() {
		//	ajax post function
		$.ajax({
			url: 'processing/edit-course.php',
			type: "POST",
			data: {
				//locate data fields
				cid : $(this).closest("tr").attr("data-id"),
				cnum : $(this).closest("tr").find(".cnum input").val(),
				cname : $(this).closest("tr").find(".cname input").val()
			},
			success:function(data) {
				alert(data + "successful");
			},
			error: function() {
				alert("error ajax");
			}
      });

	//do this after...search and replace, remove and add back buttons
	var x = $(this).closest("tr").find(".cnum input").val();
	var y = $(this).closest("tr").find(".cname input").val();
	
	//$(this).closest("tr").find(".termid").text(x);
	$(this).closest("tr").find(".cnum").text(x);
	$(this).closest("tr").find(".cname").text(y);
	
	$(this).parent().children(".save-course, .cancel-course").addClass("hideit");
	$(this).parent().children(".edit-course, .remove-course").removeClass("hideit");

	});

	
		//~~~~~~~~~~~~~~4.3 ADD STUDENT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	$('#add-course').click(function() {
	//	ajax post function
		$.ajax({
			url: 'processing/add-course.php',
			type: "POST",
			data: {
				//locate data fields
				cnum : $("#addcnum").val(),
				cname : $("#addcname").val(),
			},
			success:function(data) {
				alert(data + " successful");
			},
			error: function() {
				alert("error ajax");
			}
		});
	});
	
	
	
//======================  4.4CANCEL TERM=====================
		$('.cancel-course').click(function() {
			//hide inputs
			$(this).closest("tr").find("input").hide();

			//show and hide buttons
			$(this).parent().children(".edit-course, .remove-course").removeClass("hideit");
			$(this).parent().children(".save-course, .cancel-course").addClass("hideit");
	});

});