<?php
include('../conexion.php');
include_once ('../model.class/Preguntas.php');

mysql_set_charset('utf8');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreguntaDal
 *
 * @author Ricardo
 */
class PreguntaDal
{
    function insertPregunta(Preguntas $p)
    {
        try 
        {
           $insert = "INSERT INTO preguntas VALUES(null,'". $p->getNombreCliente() . "', "
                   . "'" . $p->getPregunta() . "','" . $p->getEmail() . "', "
                   . "" . $p->getTelefonoContacto() .");";
           $query = mysql_query($insert);          
           if($query === FALSE) 
           { 
                die(mysql_error()); // TODO: better error handling
           }
           return $query;
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
                      
    }
    function enviarMail(Preguntas $p)
    {       
        $to = $p->getEmail();
        $subject = "Recepcion pregunta Portal Inmobiliario NotNull";
        $message = "
        <html>
            <head>
            <title>Recepci&oacuten pregunta</title>
            </head>
            <body>
            <p>
            <FONT color=#000080 size=2
            face='Century Gothic'>
            Estimado " . $p->getNombreCliente() . ",".  
            "
            </FONT>   
            </p>
            <br>
            <DIV><SPAN class=648433414-04082015><FONT color=#000080 size=2
            face='Century Gothic'>Nuestros ejecutivos se pondrán en contacto
            contigo</FONT></SPAN></DIV>
            <DIV><SPAN class=648433414-04082015><FONT color=#000080 size=2
            face='Century Gothic'>lo antes posible.</FONT></SPAN></DIV>
            <DIV><SPAN class=648433414-04082015><FONT color=#000080 size=2
            face='Century Gothic'></FONT></SPAN>&nbsp;</DIV>
            <DIV><SPAN class=648433414-04082015><FONT color=#000080 size=2
            face='Century Gothic'><a href = http://portalinmobiliarionotnull.site40.net/index.php >Sigue visitando nuestro
            portal</a></FONT></SPAN></DIV>
            <DIV><SPAN class=648433414-04082015><FONT color=#000080 size=2
            face='Century Gothic'></FONT></SPAN>&nbsp;</DIV>
            <DIV><SPAN class=648433414-04082015><FONT color=#000080 size=2
            face='Century Gothic'>Saludos,</FONT></SPAN></DIV>
            <DIV class=Section1>
            <DIV>
            <P style='mso-margin-top-alt: auto; mso-margin-bottom-alt: auto' class=MsoNormal
            align=left><SPAN
            style='FONT-FAMILY: Verdana; COLOR: navy; FONT-SIZE: 10pt'><SPAN
            class=648433414-04082015></SPAN><STRONG><FONT face='Century Gothic'>I<SPAN
            class=648433414-04082015>nformaciones Not
            Null</SPAN></FONT></STRONG><BR></SPAN><SPAN
            style='FONT-FAMILY: Verdana; COLOR: navy; FONT-SIZE: 7.5pt'><SPAN
            class=648433414-04082015></SPAN><FONT face='Century Gothic'><FONT size=2>P<SPAN
            class=648433414-04082015>ortal Inmobiliario
            !Null</SPAN></FONT></FONT><BR></SPAN><SPAN class=SpellE><SPAN
            style='FONT-FAMILY: 'Century Gothic'; COLOR: #666666; FONT-SIZE:
            7.5pt'>Tel</SPAN></SPAN><SPAN
            style='FONT-FAMILY: 'Century Gothic'; COLOR: #666666; FONT-SIZE: 7.5pt'>.&nbsp;
            (562)&nbsp;<SPAN class=648433414-04082015>1111 1111</SPAN><BR>Fax&nbsp;
            (562)&nbsp;<SPAN class=648433414-04082015>1111 1111</SPAN><BR><SPAN
            class=648433414-04082015>Calle !notNull</SPAN>, Santiago Centro –
            Chile<BR></SPAN><SPAN
            style='FONT-FAMILY: 'Century Gothic'; COLOR: blue; FONT-SIZE: 7.5pt'><A
            href='mailto:informaciones@portalinmobiliarionotnull.site40.net'>informaciones</A></SPAN></P>
            <P style='mso-margin-top-alt: auto; mso-margin-bottom-alt: auto'
            class=MsoNormal><B><SPAN
            style='FONT-FAMILY: Webdings; COLOR: green; FONT-SIZE: 18pt;
            mso-bidi-font-family: Arial; mso-ansi-language: CA'
            lang=CA>P</SPAN></B><B><U><SPAN
            style='COLOR: green; FONT-SIZE: 8pt; mso-ansi-language: CA' lang=CA>
            </SPAN></U></B><SPAN style='COLOR: green; FONT-SIZE: 10pt'>Antes de imprimir
            este correo</SPAN><SPAN
            style='COLOR: green; FONT-SIZE: 10pt; mso-ansi-language: CA' lang=CA>, piense si
            es necesario hacerlo. </SPAN></P>
            <P style='mso-margin-top-alt: auto; mso-margin-bottom-alt: auto'
            class=MsoNormal><B><SPAN
            style='COLOR: green; FONT-SIZE: 10pt; mso-ansi-language: CA' lang=CA>Cuidar el
            medio ambiente es tarea de&nbsp;todos.</SPAN></B></P></DIV></DIV>
            <DIV>&nbsp;</DIV></BODY></HTML>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";

        // More headers
        $headers .= 'From: <informaciones@portalinmobiliarionotnull.site40.net>' . "\r\n";

        mail($to,$subject,$message,$headers);

    }
    function listadoPreguntas()
    {
        try 
        {
            $sql = "SELECT * FROM preguntas";
            $query = mysql_query($sql);
            while ($row = mysql_fetch_array($query)) 
            {
              $nombreCliente = $row['nombreCliente'];  
              $pregunta = $row['pregunta'];
              $email = $row['email'];
              $telefono = $row['teléfonoContacto'];
              echo("<tr class='row'>");
                echo("<td class='col-sm-2'>" . $nombreCliente   . "</td>");
                echo("<td class='col-sm-4'>" . $pregunta        . "</td>");
                echo("<td class='col-sm-2'>" . $email           . "</td>");
                echo("<td class='col-sm-2'>" . $telefono        . "</td>");
                echo("<td class='col-sm-2'>");
                    echo("<button class='btn btn-success'>");
                        echo("<i class='fa fa-envelope'></i> email");
                    echo("</button>");
                    echo("<button class='btn btn-success'>");
                        echo("<i class='fa fa-skype'></i> skype");
                    echo("</button>");                                           
                echo("</td>");
            echo("</tr>");
            }
        }
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
}
