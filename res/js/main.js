$(document).ready(function() {

	var root = "/";


	//Registro de usuarios
	$(".btnReg").on("click", function(){

		//Declaro variables.
		var name 	 = $(".txtName").val().trim(),
			lastname = $(".txtLastName").val().trim(),
			username = $(".txtUserName").val().trim(),
			email	 = $(".txtEmailReg").val().trim(),
			pass 	 = $(".txtPassReg").val().trim()
			self	 = this;

			if (
				name !== "" &&
				lastname !== "" &&
				username !== "" &&
				email !== "" &&
				pass !== ""
				) {
				// Envio de datos

				$.ajax({
					type: "POST",
					url: root + 'res/php/user_actions/register.php',
					data:{
						name: name,
						lastname: lastname,
						username:username,
						email:email,
						pass:pass
					},
					beforeSend: function(){
						$(self).addClass("loading");
					},
					success: function(data){
						$(self).removeClass("loading");
						
						if (data) {
							window.location.href = '/log-in';
						} else {
							$(self).removeClass("loading");
						alert("Usuario ya existente.");
						}
					},
					error: function(){
						$(self).removeClass("loading");
						alert("Ha ocurrido un error con el registo.");
					}

				});
			} else {
				alert("Por favor, complete todos los campos.");
			}

	});

	//Edit User
	$(".btnUpdateProfile").on("click", function(e){

		//Declaro variables.
		var name 	 = $(".txtName").val().trim(),
			lastname = $(".txtLastName").val().trim(),
			username = $(".txtUserName").val().trim(),
			email	 = $(".txtEmailReg").val().trim(),
			file_data 	= $('#img_profile').prop('files')[0],
			self	 = this;


			if (
				name !== "" &&
				lastname !== "" &&
				username !== "" &&
				email !== ""
				) {
				// Envio de datos
			var formData = new FormData($("#user_form")[0]);
			formData.append('file', file_data);
    			var $this = $(this);
    			e.preventDefault();
			$.ajax({
				xhr: function(){
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							//$('.progress-bar').css("width", percentComplete);
							console.log(percentComplete);
						} 
					},false,false);
					return xhr;
				},
				type: "POST",
				url: root + "res/php/user_actions/update_profile.php",
				data: formData,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$(self).addClass("loading");
				},
				success:function(data){
					$(self).removeClass("loading");
					alert('Perfil guardada con éxito');
					window.location.reload();
				},
				error: function(){
					$(self).removeClass("loading");
					alert('Error...');
				}
			});

		} else {
			alert ('Por favor complete todos los datos')
		}

	});


	//Log In
	$(".btnUserLogIn").on("click" , function(){
		var email = $(".txtUserEmailLogin").val().trim(),
			pass = $(".txtUserPassLogin").val().trim();


		$.ajax({
			type: "POST",
			url: root + 'res/php/user_actions/login.php',
			data: {
				email: email,
				pass: pass
			},
			success: function(data){
				console.log(data);
				if(data != "false"){
					window.location.href = "/user/" + data;
				}else if(data == "false"){
					alert("Sus credenciales no son válidas. Por favor intente nuevamente");
				}
			}
		});
	});

});