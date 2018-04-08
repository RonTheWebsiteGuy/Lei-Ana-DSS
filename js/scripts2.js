$(document).ready(function() {

//=========================SAVE Course BUTTON=====================
	$('.save-course').click(function() {
		//	ajax post function
		$.ajax({
			url: 'processing/edit-course.php',
			type: "POST",
			data: {
				//locate data fields
				cid : $(this).closest("tr").find(".cid").text(),
				cname : $(this).closest("tr").find(".cname input").val(),
				//crn : $(this).closest("tr").find(".crn input").val()
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
//	var y = $(this).closest("tr").find(".crn input").val();
	$(this).closest("tr").find(".course").text(x);
	//$(this).closest("tr").find(".crn").text(y);

	$(this).parent().children(".save-course, .cancel-course").addClass("hideit");
	$(this).parent().children(".edit-course, .remove-course").removeClass("hideit");

	});

	//1.4
	//==================EDIT Individual Course==================
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

	//-=======================SAVE Individual Course BUTTON==========================
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