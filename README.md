## Sobre

Este é um script PHP que utiliza as bibliotecas WideImage e mpdf para geração de certificados. Como normalmente os eventos no Brasil precisam deste tipo de material, propomos a geração de um certificado:

 * Nome do participante

Será pedido ao usuário que ele digite seu endereço de e-mail para visualizar
uma lista com seus certificados.

## Softwares necessários

 * PHP >= 5.4.4
 * MySQL >= 4
 * WideImage
 * MPDF


## Instalando e configurando

Clone este repositório para um servidor web.

https://github.com/fsoaresjunior/Gerador-De-Certificados.git

Configure no arquivo conexao.php e func.php para a sua preferência.

## Aparência e Configurações

Coloque a imagem do certificado na pasta `imagem´ como o nome `foto.jpg´.

No arquivo `func.php´ altere o posicionamento do nome, na função `criandoImagem´.


## Formato dos dados e templates de certificados

Um template de certificado é nada mais do que uma imagem de fundo com os locais
pré-definidos para inserção dos dados em forma de texto. Estes templates
precisam ficar na pasta `imagem/´. A localização em que o
texto fica na imagem está no arquivo `func.php`.

Para preencher o banco de dados, você precisa de uma planilha com este formato:

<table>
  <tr>
    <td>id</td>
    <td>nome</td>
    <td>email</td>
    <td>caminho</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Seu nome</td>
    <td>Seu e-mail</td>
    <td>O caminho da imagem</td>
  </tr>
</table>