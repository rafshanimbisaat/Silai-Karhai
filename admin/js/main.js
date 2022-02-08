$(document).ready(function(){

	$(".register-btn").on("click", function(){

		$.ajax({
			url : '../admin/classes/Credentials.php',
			method : "POST",
			data : $("#admin-register-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					$(".message").php('<span class="text-success">'+resp.message+'</span>');
				}else if(resp.status == 303){
					$(".message").php('<span class="text-danger">'+resp.message+'</span>');
				}
			}
		});

	});

	$(".login-btn").on("click", function(){

		$.ajax({
			url : '../admin/classes/Credentials.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					//$(".message").php('<span class="text-success">'+resp.message+'</span>');
					window.location.href = window.origin+"/silaikrhaijuw/admin/index.php";
				}else if(resp.status == 303){
					$(".message").php('<span class="text-danger">'+resp.message+'</span>');
				}
			}
		});

	});

});