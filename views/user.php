<title>Perfil de Usuario - <?php echo $user_profile[0]["username"]; ?></title>
<style>
	body {background: #fff;}
</style>

<form enctype="multipart/form-data" id="user_form" class="ui form col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form" method="POST">
	<div class="col-xs-12">
		<div class="col-xs-12 col-sm-6">

			<h4 class="col-xs-12">Imagen de Perfil</h4>
			<img src="<?php echo $user_profile[0]["avatar"]; ?>" alt="" class="img-thumb-profile">
			<div class="input-group prof-img">
				<span class="input-group-addon" id="basic-addon1"><i class="image icon"></i></span>
				<input type="file" name="img_profile" class="img_profile form-control" id="img_profile">
			</div>
			
			
			<script>
				$('.prof-img input').change(function() {
						readURL(this);
					});

					function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function(e) {
							$('.img-thumb-profile').attr('src', e.target.result);
							
						}
						reader.readAsDataURL(input.files[0]);
						}
					}
			</script>

		</div>
		
		<!-- Título de la noticia -->
		<div class="col-xs-12 col-sm-6">
			<h4>Datos Personales</h4>
			<div class="input-group prof-img">
				<span class="input-group-addon label-profile" id="basic-addon1">Nombre</span>
				<input type="text" name="txtName" id="txtName" class="txtName form-control" value="<?php echo $user_profile[0]["name"]; ?>" required="required">
			</div>
			<div class="input-group prof-img">
				<span class="input-group-addon label-profile" id="basic-addon1">Apellido</span>
				<input type="text" name="txtLastName" id="txtLastName" class="txtLastName form-control" value="<?php echo $user_profile[0]["last_name"]; ?>" required="required">
			</div>
			<div class="input-group">
				<span class="input-group-addon label-profile" id="basic-addon1">Usuario</span>
				<input type="text" name="txtUserName" class="txtUserName form-control"  value="<?php echo $user_profile[0]["username"]; ?>" required="required">
			</div>
			<div class="input-group">
				<span class="input-group-addon label-profile" id="basic-addon1">Correo</span>
				<input type="text" name="txtEmailReg" id="txtEmailReg"  class="txtEmailReg form-control"  value="<?php echo $user_profile[0]["email"]; ?>" required="required">
			</div>
			<input type="text" name="txtId" class="txtId" value="<?php echo $user_profile[0]["user_id"]; ?>" style="display: none;">
		</div>
	</div>

	<!-- Botones -->
	<div class="ui buttons pull-right">
	  <button class="ui positive button btnUpdateProfile">Guardar</button>
	  <div class="or" data-text="O"></div>
	  <a href='/' class="ui button btnCancelProfile" >Cancelar</a>
	</div>


</form>
