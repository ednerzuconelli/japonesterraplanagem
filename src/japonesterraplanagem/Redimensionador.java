package japonesterraplanagem;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
 
/**
 * Redimensionar que utiliza a classe<br/>
 * RedimensionarImagem para fazer o redimensionamento
 * @author Cássio Alexandre de Sousa
 */
public class Redimensionador {
 
    //log da aplicação
    private static final Logger logger = Logger.getLogger(Redimensionador.class.getName());
    private static final String DE = "D:\\NetBeansProjects\\japonesterraplanagem\\WebContent\\image\\image1.jpg";
    private static final String PARA = "D:\\NetBeansProjects\\japonesterraplanagem\\WebContent\\image\\image1r.jpg";
 
    /**
     * @param args
     * @return 
     */
    public void creare() {
        //cria o redimensionar imagem
        RedimensionarImagem redImagem = new RedimensionarImagem(400,300);
 
        FileOutputStream fos = null;
        try {
            //realizar o redimensionamento obtendo o array de byte para salver
            byte[] bytesImagem = redImagem.redimensionar(new FileInputStream(DE));
            fos = new FileOutputStream(PARA);
            fos.write(bytesImagem);
        } catch (FileNotFoundException e) {
            logger.log(Level.SEVERE, e.getMessage());
        } catch (IOException e) {
            logger.log(Level.SEVERE, e.getMessage());
        }finally{
            //libera recursos
            if(fos != null){
                try {
                    fos.close();
                } catch (IOException e) {
                    logger.log(Level.SEVERE, e.getMessage());
                }
            }
        }
    }   

}
