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

