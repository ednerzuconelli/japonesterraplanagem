package japonesterraplanagem;

import org.apache.commons.mail.EmailException;
import org.apache.commons.mail.SimpleEmail;

public class EnviarEmail {

	public EnviarEmail() {
		// TODO Auto-generated constructor stub
	
		SimpleEmail email = new SimpleEmail();
		email.setSSLOnConnect(true);
		email.setHostName( "smtp.gmail.com.br" );
		email.setSslSmtpPort( "465" );
		email.setAuthentication("desenvolvimento.tifire@gmail.com", "DesTi@675");
		
		//email.setAuthenticator(new DefaultAuthenticator( "rodrigo@seudominio.com.br" ,  "1234" ) );
		try {
		    email.addTo("contato@tifire.com", "Tifire");
			email.setFrom( "desenvolviento.tifire@gmail.com");
		    //email.setDebug(true); 
		     
		    email.setSubject( "Assunto do E-mail" );
		    email.setMsg( "Texto sem formatação" );
		    //email.addTo( "rodrigoaramburu@gmail.com" );//por favor trocar antes de testar!!!!
		     
		    email.send();
		     
		} catch (EmailException e) {
		    e.printStackTrace();
		} 
	}
}
