<?php 

require_once 'conexao.php';

global $conexao;

function lendo($email) {

	$email = validaEmail($email);

	if ($email) :

		$conexao = conexao();
	    
	    try {

	        $query = $conexao->prepare("SELECT * FROM xxx WHERE email = ?");
	        $query->bindValue(1, $email);

	        $query->execute();

	        if($query->rowCount() > 0){
	            return  $query->fetch(PDO::FETCH_ASSOC);
	        }
	        
	    } catch (PDOException $e) {
	      echo $e->getMessage();
		}

	else:
		return false;
	endif;
}

function cadastrar($id, $caminho) {

	$conexao = conexao();

    try {

        $query = $conexao->prepare("UPDATE xxx set caminho = ? WHERE id = ?");
        $query->bindValue(1, $caminho);
        $query->bindValue(2, $id);

        $query->execute();
        if($query->rowCount() == 1){
            return true;
        }
        
    } catch (PDOException $e) {
      echo "caralho ".$e->getLine();
	}
}


function validaEmail($email) {

	$email = filter_var($email, FILTER_VALIDATE_EMAIL);

	if ($email) {
		return $email;
	} else {
		return false;
	}

}

function criandoImagem() {
	$arquivo = '../imagem/foto.jpg';		
			$foto = explode("/", 'imagem/foto.jpg');
			$nomeCertificado = $foto[1];

			// Carrega a imagem
			$img = WideImage::load($arquivo);

			$canvas = $img->getCanvas();

			// Escolhe a fonte, o tamanho da letra e sua cor
			$canvas->useFont ('font/arialbd.ttf', 50, $img->allocateColor(0 , 0 , 0));

			// Determina sua posição em relação a imagem e o que será escrito na imagem
			$canvas->WriteText('direito + 500','bottom - 500 ' , $cadastro['nome']);

			$novoNome = uniqid();

			// Salva a imagem com um novo nome
			$novaImagem = $img->saveToFile("../certificados/".$novoNome.$nomeCertificado);

			// Cadastro no banco a imagem
			cadastrar($cadastro['id'], $novoNome.$nomeCertificado);

			// Ler os dados do banco de determinado id
			$cadastro = lendo($_POST['email']);

			// Pega o caminho da imagem
			return $cadastro["caminho"];

}