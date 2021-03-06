
<!-- Header -->
<div class="col-xs-12 admin-header">
	<h3>
		<i class="add icon"></i> Agregar Artículo
	</h3>
</div>

<!-- Formulario de carga -->
<form enctype="multipart/form-data" id="article_form" class="ui form col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form" method="POST">
	
	<!-- Título de la noticia -->
	<div class="col-xs-12 col-sm-6">
		<h4>Título</h4>
		<div class="ui left icon input">
			<input type="text" name="txtTitle" id="txtTitle" class="txtTitle" placeholder="Título">
			<i class="write icon"></i>
		</div>
		
	</div>

	<div class="col-xs-12 col-sm-6">
		<h4>Alias</h4>
		<div class="ui left icon input">
			<input type="text" name="txtAlias" id="txtAlias" class="txtAlias" placeholder="Alias">
			<i class="write icon"></i>
		</div>
	</div>
<script>
	   $(document).ready(function () {

        function onchange() {
            //Since you have JQuery, why aren't you using it?
            var box1 = $('#txtTitle');
            box3 = box1.val().replace(/\s+/g,'-');
            box3 = box3.replace('---','-');
            box3 = box3.toLowerCase();
            box3 = box3.replace(/[áàäâå]/,'a');
            box3 = box3.replace(/[éèëê]/,'e');
            box3 = box3.replace(/[íìïî]/,'i');
            box3 = box3.replace(/[óòöô]/,'o');
            box3 = box3.replace(/[úùüû]/,'u');
            box3 = box3.replace(/[ñ]/,'n');
            var box2 = $('#txtAlias');
            box2.val(box3);
        }
        $('#txtTitle').on('change', onchange);
    });

	</script>
	<!-- Categoría de la noticia -->
	<h4>Categoría</h4>
	<div class="ui left icon field">
		<select class="txtCategory" name="txtCategory" id="txtCategory">
			<option value="0">-- SELECCIONAR --</option>
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<!-- Portada de la Noticia -->
	<h4>Imagen de portada</h4>
	<div class="ui left icon input art-img">
		<input type="file" name="img_file" class="img_file" id="img_file">
		<i class="image icon"></i>

	</div>
	<img src="" alt="" class="img-thumb">
	<script>
		$('.art-img input').change(function() {
				readURL(this);
			});

			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
					$('.img-thumb').attr('src', e.target.result);
					$('.img-thumb').css('display','block');
				}
				reader.readAsDataURL(input.files[0]);
				}
			}
	</script>


	<!-- Contenido de la noticia -->
	<script>
		function charcount(txtArtIntro,counter){
			var len=document.getElementById('txtArtIntro').value.length;
			document.getElementById('counter').innerHTML = len;
		}
	</script>
	<h4>Resumen</h4>
	<div class="ui left icon input">
		<textarea name="txtArtIntro" class="txtArtIntro" maxlength="150" id="txtArtIntro" onkeyup="charcount('txtArtIntro','counter')" onkeydown="charcount('txtArtIntro','counter')" onmouseout="charcount('txtArtIntro','counter')"></textarea>
	</div>
	<p class="char-count">El máximo para el resumen es de 150 caracteres: <span id="counter">0</span>/150</p>

	<h4>Cuerpo</h4>
	<div class="ui left icon input">
		<textarea name="txtArtBody" id="bodyeditor"></textarea>
	</div>
	
	<!-- Botones -->
	<div class="ui buttons pull-right">
	  <button class="ui positive button btnSaveArticle">Guardar</button>
	  <div class="or" data-text="O"></div>
	  <a href='articles' class="ui button btnCancelArticle" >Cancelar</a>
	</div>
	
	<div class="progress">
	  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
	    
	  </div>
	</div>
	<h5>Progreso</h5>
</form>
