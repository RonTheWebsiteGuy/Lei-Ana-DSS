$(document).ready(function() {

	//~~~~~~~~~~~~~~~~~~~~~1.1 EDIT PROGRAM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	$('.edit-program').click(function() {
			//get original data
			var x = $(this).closest("tr").find(".Mname").text();
			//add inputs
			$(this).closest("tr").find(".Mname").append('<input type="text" value="' + x +'">');

			$(this).parent().children(".edit-program, .remove-program").addClass("hideit");
			$(this).parent().children(".save-program, .cancel-program").removeClass("hideit");
		});

	//~~~~~~~~~~~~~~~~~~~~1.2 SAVE PROGRAM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		$('.save-program').click(function() {
			//	ajax post function
			$.ajax({
				url: 'processing/edit-program.php',
				type: "POST",
				data: {
					//locate data fields
					pid : $(this).closest("tr").find(".pid").text(),
					Mname : $(this).closest("tr").find(".Mname input").val(),

				},
				success:function(data) {
					alert(data + " successful");
				},
				error: function() {
					alert("error ajax");
				}
			});

		//find values of inputs
		var x = $(this).closest("tr").find(".pid input").val();
		var y = $(this).closest("tr").find(".Mname input").val();
		//change fields to values of inputs
		$(this).closest("tr").find(".pid").text(x);
		$(this).closest("tr").find(".Mname").text(y);

		//hide inputs
		$(this).closest("tr").find(".pid input").remove();
		$(this).closest("tr").find(".Mname input").remove();

		//switch out buttons
		$(this).parent().children(".save-program, .cancel-program").addClass("hideit");
		$(this).parent().children(".edit-program, .remove-program").removeClass("hideit");

		});


		//~~~~~~~~~~~~1.3 CANCEL Program~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

		$('.cancel-program').click(function() {
			//hide inputs
			$(this).closest("tr").find(".pid input").remove();
			$(this).closest("tr").find(".Mname input").remove();

			$(this).parent().children(".save-program, .cancel-program").addClass("hideit");
			$(this).parent().children(".edit-program, .remove-program").removeClass("hideit");

		});


		//~~~~~~~~~~~~~~1.4 ADD PROGRAM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

		$('#add-program').click(function() {
		//	ajax post function
			$.ajax({
				url: 'processing/add-program.php',
				type: "POST",
				data: {
					//locate data fields
					Mname : $("#addMname").val(),
				},
				success:function(data) {
					alert(data + " successful");
				},
				error: function() {
					alert("error ajax");
				}
			});
		});

		//~~~~~~~~~~~~~~~~~~~~1.5 REMOVE PROGRAM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			$('.remove-program').click(function() {
				//	ajax post function
				$.ajax({
					url: 'processing/remove-program.php',
					type: "POST",
					data: {
						//locate data fields
						pid : $(this).closest("tr").find(".pid").text(),

					},
					success:function(data) {
						alert(data + " successful");
					},
					error: function() {
						alert("error ajax");
					}
				});

			//hide inputs
			$(this).closest("tr").find(".pid input").remove();
			$(this).closest("tr").find(".Mname input").remove();

			//switch out buttons
			$(this).parent().children(".save-program, .cancel-program").addClass("hideit");
			$(this).parent().children(".edit-program, .remove-program").removeClass("hideit");

			});



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
