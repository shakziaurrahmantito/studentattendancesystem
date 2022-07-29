$(function(){

	setTimeout(function(){
		$("#stateUpdate").fadeOut();
	},5000);

	$("#logins").click(function(){
		var username 		= $("#username").val();
		var password 		= $("#password").val();
		var dataString 		= "username="+username+"&password="+password;
		$.ajax({
			type 	: "POST",
			url 	: "getLogin.php",
			data 	: dataString,
			success : function(data){
				if ($.trim(String(data)) == "empty") {
					$("#state").fadeIn();
					$("#state").html("<span class='error'>Field must not be empty.</span>");
					setTimeout(function(){
						$("#state").fadeOut();
					},5000);
				}
				else if ($.trim(String(data)) == "success") {
					window.location = "index.php";
				}
				else if ($.trim(String(data)) == "nomatch") {
					$("#state").fadeIn();
					$("#state").html("<span class='error'>Username & password no match.</span>");
					setTimeout(function(){
						$("#state").fadeOut();
					},5000);
				}
				else{
					$("#state").hide();
				}
			}
		});
		return false;
	});	

	// For add student.

	$("#add").click(function(){
		var name 		= $("#name").val();
		var roll 		= $("#roll").val();
		var dataString 		= "name="+name+"&roll="+roll;
		$.ajax({
			type 	: "POST",
			url 	: "getadd.php",
			data 	: dataString,
			success : function(data){

				if ($.trim(String(data)) == "empty") {
					$("#stateAdd").fadeIn();
					$("#stateAdd").html("<span class='error'>Field must not be empty.</span>");
					setTimeout(function(){
						$("#stateAdd").fadeOut();
					},5000);
				}
				else if ($.trim(String(data)) == "exists") {
					$("#stateAdd").fadeIn();
					$("#stateAdd").html("<span class='error'>Roll number already exist.</span>");
					setTimeout(function(){
						$("#stateAdd").fadeOut();
					},5000);
				}else if ($.trim(String(data)) == "success") {
					$("#stateAdd").fadeIn();
					$("#stateAdd").html("<span class='success'>Registration is successfully.</span>");
					$("#name").val("");
					$("#roll").val("");
					setTimeout(function(){
						$("#stateAdd").fadeOut();
					},5000);
				}else if ($.trim(String(data)) == "error") {
					$("#stateAdd").fadeIn();
					$("#stateAdd").html("<span class='exists'>Something is wrong.</span>");
					setTimeout(function(){
						$("#stateAdd").fadeOut();
					},5000);
				}
				else{
					$("#stateAdd").hide();
				}

			}
		});
		return false;
	});

	//For update student

	$("#update").click(function(){

		var name 		= $("#name").val();
		var roll 		= $("#roll").val();
		var rollNumber 	= $("#rollNumber").val();
		var sid 		= $("#sid").val();
		var dataString 	= "name="+name+"&roll="+roll+"&rollNumber="+rollNumber+"&sid="+sid;
		$.ajax({
			type 	: "POST",
			url 	: "getUpdate.php",
			data 	: dataString,
			success : function(data){
				if ($.trim(String(data)) == "empty") {
					$("#stateUpdate").fadeIn();
					$("#stateUpdate").html("<span class='error'>Field must not be empty.</span>");
					setTimeout(function(){
						$("#stateUpdate").fadeOut();
					},5000);
				}else if ($.trim(String(data)) == "success") {
					$("#stateUpdate").fadeIn();
					$("#stateUpdate").html("<span class='success'>Student data update successfully.</span>");
					setTimeout(function(){
						$("#stateUpdate").fadeOut();
					},5000);
				}else if ($.trim(String(data)) == "exists") {
					$("#stateUpdate").fadeIn();
					$("#stateUpdate").html("<span class='error'>Student roll already exist.</span>");
					setTimeout(function(){
						$("#stateUpdate").fadeOut();
					},5000);
				}
				else{
					$("#stateUpdate").hide();
				}
			}
		});

		return false;
	});


	//For empty filed check

	$("#att").click(function(){
		var roll = true;
		$(":radio").each(function(){
			var name = $(this).attr("name");
			if (roll && !$(':radio[name="'+name+'"]:checked').length) {
				roll = false;
				$("#stateAtt").fadeIn();
					$("#stateAtt").html("<span class='error'>Roll missing.</span>");
					setTimeout(function(){
						$("#stateAtt").fadeOut();
					},5000);
			}
		});

		return roll;

	});




});