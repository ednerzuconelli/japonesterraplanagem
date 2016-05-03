<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Japones Terra Planagem</title>
  <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="./css/social-buttons.css" />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"/>
<script type="text/javascript">

$(document).ready(function(){
	
    $("#telefone").mask("(99) 9999-9999");
    
   
		
		$( "#form" ).submit(function( event ) {	
			  vazio=false;
			  if($.trim($('#nome').val()) == ''){
				  vazio=true;
				  $('#nome').focus();
			  }else
			  if( ($.trim($('#email').val()) == '') ){
					  vazio=true;
					  $('#email').focus();
			  }else
			  if($.trim($('#assunto').val()) == ''){
					vazio=true;
				    $('#assunto').focus();
			  }else
				if($.trim($('#mensagem').val()) == ''){
						vazio=true;
					    $('#mensagem').focus();
				 };
			    
			   if(vazio)
				 event.preventDefault();
			});
		
  /*jQuery('.camera_wrap').camera({
	height: '30%',
	pagination: false,
	alignment: 'leftCenter',
	thumbnails: false
});
  
jQuery('.camera_wrap').cameraStop();*/

verifyVazio();
    
    });
    


}
</script>
</head>
<body>
    <div class="site">
		<div class="contato">
			<div class="contato-email"  >Email: japonesterraplanagem@gmail.com</div>
			<div class="contato-fone"> Fones: (44) 9867-7363(tim)   (44) 9148-5054(vivo)</div>

		</div>
		<div >
			
			
				<p class="logo">
				  	<img src="cabecalho02.jpg" alt="" width="100%"
						height="180px" />
				</p>
	 			
	 			<br />

				<ul class="menu">
					<li><a href="index.html">Home</a></li>
					<li><a href="institucional.html">Institucional</a></li>
					<li><a href="oquefazemos.html">O que fazemos?</a></li>
					<li><a href="#">Serviços</a>
						<ul>
							<li><a href="#">Caminhão Prancha</a></li>
							<li><a href="#">Curva de Nível e Nivelamento de Terrenos</a></li>
							<li><a href="#">Terraplanagem</a></li>
							<li><a href="#">Escavação de Piscinas</a></li>
							<li><a href="#">Escavação Hidraulicas</a></li>
						</ul></li>
					<li><a href="#">Contato</a></li>
				</ul>
			
		</div>
		
<div class="content"> 
   <div class="content_info caixaTexto fundoTextoJust info_vertical" >
   <div style="width:100%;height:800px">
    <section>
      <div class="one">
      
        <!--<form class="fundoTextoJust" action="emailbs2.php" method="post">-->
        <form id="form" class="fundoTextoJust" action="contato.php" method="post">
           Nome:<br/>
          <input type="text" name="nome" id="nome" required="required"> <br/>
           Telefone:<br/>
          <input type="text" name="telefone" id="telefone" ><br/>
          Email:<br/>
          <input type="text" name="email" id="email" required="required"> <br/>
          Cidade/Estado:<br/>
          <input type="text" name="cidade" id="cidade"> <input type="text" name="estado" size="2" id="estado">  <br/>
          Assunto:<br/>
          <input type="text" name="assunto" id="assunto" required="required"> <br/>
          Mensagem:<br/>
          <textarea type="text" name="mensagem"  id="mensagem" rows="8" cols="35" required="required">
          </textarea><br/> <br/>
          <input type="submit" value="Enviar"  id="submit"  name="submit" >
          
        </form>
      
      
      </div>
      <div class="two"><div style="margin-left:45%" id="map-canvas"/></div>
    </section>
   </div>
  </div>    
</div> 
  
</div>
	<div class="footer">
				<div class="footer-left">
					<a  href="https://www.facebook.com/japonesterraplanagememgeral/?fref=ts" target="_blank" class="sb blue facebook" > </a>
					<br />
					<i class="fa fa-whatsapp" aria-hidden="true" > Whatsapp (44) 9867-7363</i>
				</div>
				<div class="footer-right">
				<div class="caixaTexto fundoTextoJust info_horizontal"
					>
					<table style="margin-left: auto; margin-right: auto;">
						<tbody>
							<tr>
								<td style="padding: 10px 20px">
									<div>
										<h3>
											<b>Contato</b>
										</h3>
										<ul style="list-style-type: none" class="fundoTextoJust">
											<li><span class="glyphicon glyphicon-map-marker"></span>
												Ch Santa Maria, S N, Agua Da Areia, Munhoz De Melo PR</li>
											<li><span class="phone::before"></span>
												(44) 9867-7363 (44) 9148-5054</li>
											<li><span class="glyphicon glyphicon-envelope"></span>
												japonesterraplanagem@gmail.com</li>
										</ul>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
			
		</div>

			
		</div>	
<?php

if (!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["assunto"]) && !empty($_POST["mensagem"]) ) {
    
require_once 'swiftmailer/lib/swift_required.php';

date_default_timezone_set('UTC');

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
->setUsername('sgitifire')
->setPassword('sgi123mudar');

$mailer = Swift_Mailer::newInstance($transport);


$emailSetTO='contato@tifire.com';
$nome=$_POST["nome"];
$telefone=$_POST["telefone"];
$email=$_POST["email"];
$cidade=$_POST["cidade"];
$estado=$_POST["estado"];
$assunto=$_POST["assunto"];
$mensagem=$_POST["mensagem"];


$message = Swift_Message::newInstance($assunto)
  ->setFrom(array('japonesterraplanagem@gmail.com' => $nome))
  ->setTo(array($emailSetTO))
  ->setBody("Nome=".$nome."\n"."Telefone=".$telefone."\n"."Email= ".$email."\n"."Cidade\Estado=".$cidade."\\".$estado."\n"."Assunto=".$assunto."\n\n".$mensagem);

$result = $mailer->send($message);

if(!$result)
 echo "Erro ao enviar: ".$result;
else  echo '<script type="text/javascript">'
   , 'alert("Envio com sucesso");'
   , '</script>'
;

}
?>


</body>
</html>