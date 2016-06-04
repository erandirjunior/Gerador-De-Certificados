<?php 
require_once('bibliotecas/wide/lib/WideImage.php');
require_once('functions/func.php');
  
if(isset($_POST['email']) && $_POST['email'] != '') : 

	if($cadastro = lendo($_POST['email'])):
	
		if($cadastro['caminho'] == ""){

			$caminho = criandoImagem($cadastro);			

		} else {
			$caminho = $cadastro["caminho"];
		}
	
	else :

		$erro = "E-mail não encontrado";

	endif;

endif;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="container">

	<?php if (isset($caminho)) : ?>

		<img class="logo" src="imagem/logo.jpg">
			
		<a href="foto.php?download=<?php echo $caminho; ?>"><img class="conclusao" src="imagem/exibicao.jpg"></a>
		<div class="download">clique na imagem para baixar seu certificado.</div>
		
	<?php else : ?>
		
		<img class="logo" src="imagem/logo.jpg">
		
		<?php echo isset($erro) ? "<p class=\"erro\">".$erro."</p>" : ""; ?>
		<p>Digite o seu e-mail que foi cadastrado.</p>

		<form method="post" >
			<input class="form-control" type="text" name="email" placeholder="Seu e-mail">		
			<input class="btn btn-primary" type="submit" name="entrar" value="entrar">
		</form>
		
	<?php endif; ?>

	</div>

</body>
</html>