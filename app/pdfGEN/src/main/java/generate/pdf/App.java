package generate.pdf;

import org.apache.fop.apps.*;
import javax.xml.transform.*;
import javax.xml.transform.sax.SAXResult;
import javax.xml.transform.stream.StreamSource;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;

public class App {

    private static FopFactory fopFactory = FopFactory.newInstance(new File(".").toURI());
    private static TransformerFactory tFactory = TransformerFactory.newInstance();

    public static void main(String[] args) {


        File xmlFile = new File("src/main/resources/" + args[0]);
        File xslFile = new File("src/main/resources/" + args[1]);
        File pdfDir = new File("../../public/uploads");
        pdfDir.mkdirs();
        File pdfFile = new File(pdfDir, args[2]);


        OutputStream out;
        try {
            //Load the stylesheet
            Templates templates = tFactory.newTemplates(
                    new StreamSource(xslFile));

            //First run (to /dev/null)
            out = new org.apache.commons.io.output.NullOutputStream();
            FOUserAgent foUserAgent = fopFactory.newFOUserAgent();
            Fop fop = fopFactory.newFop(MimeConstants.MIME_PDF, foUserAgent, out);
            Transformer transformer = templates.newTransformer();
            transformer.setParameter("page-count", "#");
            transformer.transform(new StreamSource(xmlFile),
                    new SAXResult(fop.getDefaultHandler()));


            //Second run (the real thing)
            out = new java.io.FileOutputStream(pdfFile);
            out = new java.io.BufferedOutputStream(out);
            try {
                foUserAgent = fopFactory.newFOUserAgent();
                fop = fopFactory.newFop(MimeConstants.MIME_PDF, foUserAgent, out);
                transformer = templates.newTransformer();
                transformer.transform(new StreamSource(xmlFile),
                        new SAXResult(fop.getDefaultHandler()));
            } finally {
                out.close();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
