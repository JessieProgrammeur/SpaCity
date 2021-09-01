<?php

    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
    }
    
    include 'db.php';
    include 'validation.php';

    $db = new db();
    
?>

<!DOCTYPE html>
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title>
        </title>
        <meta charset="utf-8"/><meta content="width=device-width,initial-scale=1" name="viewport"/><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Quattrocento" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" type="text/css"/>
<!--<![endif]--><style>*{box-sizing:border-box}th.column{padding:0}a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}#MessageViewBody a{color:inherit;text-decoration:none}p{line-height:inherit}@media (max-width:620px){.icons-inner{text-align:center}.icons-inner td{margin:0 auto}.fullMobileWidth,.row-content{width:100%!important}.image_block img.big{width:auto!important}.stack .column{width:100%;display:block}}</style>
    </head>
        <body style="background-color:#fff;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none">
    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff" width="100%">
        <tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
        <tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
        <tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="menu_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr>
        <td style="color:#072b52;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;font-size:13px;letter-spacing:2px;text-align:center;padding-top:15px;padding-bottom:15px">
    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr>
        <td style="text-align:center;font-size:0">
    <div class="menu-links" style="
    margin-left: 29px;
"><!--[if mso]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px">
<![endif]--><a href="https://www.spacity.nl/jacuzzis/" style="padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;display:inline-block;color:white;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;font-size:13px;text-decoration:none;letter-spacing:2px">JACUZZI'S</a><!--[if mso]></td><td><![endif]--><span class="sep" style="font-size:13px;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;color:white">|</span><!--[if mso]></td><![endif]-->
<!--[if mso]></td><td style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px"><![endif]--><a href="https://www.spacity.nl/hottubs/" style="padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;display:inline-block;color:white;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;font-size:13px;text-decoration:none;letter-spacing:2px">HOTTUBS</a><!--[if mso]></td><td><![endif]--><span class="sep" style="font-size:13px;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;color:white">|</span><!--[if mso]></td><![endif]--><!--[if mso]></td><td style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px"><![endif]--><a href="https://www.spacity.nl/accessoires/" style="padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;display:inline-block;color:white;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;font-size:13px;text-decoration:none;letter-spacing:2px">
ACCESSOIRES</a><!--[if mso]></td></tr></table><![endif]--></div></td></tr>
    </table></td></tr>
</table></th></tr>
    </tbody>
</table></td></tr>
    </tbody>
</table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
<tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
<tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr>
        <td style="width:100%;padding-right:0;padding-left:0;padding-top:20px;padding-bottom:20px">
    <div align="center" style="line-height:10px"><img alt="your-logo" src="logo-spa-city.svg" style="display:block;height:auto;border:0;width:250px;max-width:100%;margin-right: 50px;" title="your-logo" width="150"/>
    </div></td></tr>
</table></th></tr>
    </tbody></table></td></tr>
    </tbody>
</table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
<tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
<tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0">
<div align="center" style="line-height:10px"><img alt="image-jacuzzi-headline" class="big" src="jacuzzi_exclusive_serie.jpg" style="display:block;height:auto;border:0;width:600px;max-width:100%" title="image-hotel-room" width="600"/>
</div></td></tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="text-align:center;width:100%;padding-top:35px"><h1 style="margin:0;color:#fff;direction:ltr;font-family:Lora,Georgia,serif;font-size:50px;font-weight:400;letter-spacing:1px;line-height:120%;text-align:center;margin-top:0;margin-bottom:0"><strong>bedankt voor uw aankoop.</strong></h1></td></tr>
</table></th></tr>
    </tbody>
</table></td></tr>
    </tbody>
</table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
<tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
<tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td style="padding-bottom:40px;padding-left:15px;padding-right:15px;padding-top:40px">
<div style="font-family:Tahoma,Verdana,sans-serif">
<div style="font-size:12px;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;color:#fff;line-height:1.5">
    <p style="margin:0;font-size:16px;text-align:center;mso-line-height-alt:24px"><span style="font-size:16px"><strong>Beste Klant,</strong></span></p>
    <p style="margin:0;font-size:16px;text-align:center">Nogmaals hartelijk dank voor uw bestelling bij SpaCity. Wij hopen dat u tevreden bent met uw<br/>aankoop en deze volledig aan uw verwachtingen voldoet. Uw bestelling is met de grootste zorg<br/>
uitgevoerd en wij streven dan ook naar een perfecte kwaliteit voor alle producten en diensten die u ontvangt. </p></div></div></td></tr>
    </table></th></tr>
</tbody>
    </table></td></tr>
</tbody></table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
<tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
<tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="33.333333333333336%">
    <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0">
<div align="center" style="line-height:10px">
    <img alt="breakfast-room" class="fullMobileWidth big" src="output-onlinepngtools_4.png" style="display:block;height:auto;border:0;width:190px;max-width:100%;padding-top: 5px;" title="breakfast-room" width="190"/></div></td></tr>
</table></th><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="33.333333333333336%"><table border="0" cellpadding="5" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td>
    <div align="center" style="line-height:10px">
<img alt="hotel-room" class="fullMobileWidth big" src="output-onlinepngtools_5.png" style="display:block;height:auto;border:0;width:190px;max-width:100%" title="hotel-room" width="190"/></div></td></tr>
    </table></th><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="33.333333333333336%">
<table border="0" cellpadding="5" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td><div align="center" style="line-height:10px">
    <img alt="hotel-bed" class="fullMobileWidth big" src="output-onlinepngtools_2.png" style="display:block;height:auto;border:0;width:190px;max-width:100%" title="hotel-bed" width="190"/></div></td></tr>
</table></th></tr>
    </tbody>
</table></td></tr>
    </tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
    <tbody><tr><td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
    <tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-left:5px;padding-right:5px;padding-top:30px;text-align:center;width:100%"><h1 style="margin:0;color:#fff;direction:ltr;font-family:Lora,Georgia,serif;font-size:19px;font-weight:400;letter-spacing:1px;line-height:120%;text-align:center;margin-top:0;margin-bottom:0">Vind ons op social media<br/></h1></td></tr>
    </table></th></tr>
</tbody>
    </table></td></tr>
</tbody>
    </table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
    <tbody><tr><td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
    <tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="html_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-top:5px">
    <div align="center" style="font-family:Arial,Helvetica Neue,Helvetica,sans-serif">
    <div style="height:30px;"> </div></div></td></tr>
</table>
    <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0">
        <div align="center" style="line-height:10px">
        <a href="https://www.spacity.nl/" style="outline:0" tabindex="-1" target="_blank"><img alt="your-logo" src="logo-spa-city.svg" style="display:block;height:auto;border:0;width:120px;max-width:100%" title="your-logo" width="120"/></a></div></td></tr>
    </table>
<table border="0" cellpadding="0" cellspacing="0" class="html_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td><div align="center" style="font-family:Arial,Helvetica Neue,Helvetica,sans-serif"><div style="height:30px;"> </div></div></td></tr>
</table>
    <table border="0" cellpadding="0" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="text-align:center;padding-right:0;padding-left:0">
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="126px"><tr><td style="padding:0 5px 0 5px"><a href="https://www.facebook.com/SpaCityWellness/" target="_blank"><img alt="Facebook" height="32" src="facebook2x.png" style="display:block;height:auto;border:0" title="Facebook" width="32"/></a></td><td style="padding:0 5px 0 5px"><a href="instagram.com/spacity.nl/" target="_blank"><img alt="Instagram" height="32" src="instagram2x.png" style="display:block;height:auto;border:0" title="Instagram" width="32"/></a></td><td style="padding:0 5px 0 5px"><a href="https://wa.me/+31854010187" target="_blank"><img alt="WhatsApp" height="32" src="whatsapp2x.png" style="display:block;height:auto;border:0" title="WhatsApp" width="32"/></a></td></tr>
</table></td></tr>
</table>
    <table border="0" cellpadding="0" cellspacing="0" class="html_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:5px"><div align="center" style="font-family:Arial,Helvetica Neue,Helvetica,sans-serif"><div style="height:30px;"> </div></div></td></tr>
    </table></th></tr>
</tbody>
    </table></td></tr>
</tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-8" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f7f6f5" width="100%">
<tbody><tr><td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600">
<tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px"><div style="font-family:Tahoma,Verdana,sans-serif"><div style="font-size:12px;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;color:#f7f6f5;line-height:1.2"><p style="margin:0;mso-line-height-alt:14.399999999999999px"><br/></p><p style="margin:0;text-align:center"><a href="https://www.spacity.nl/algemene-voorwaarden/" rel="noopener" style="text-decoration:underline;color:#f7f6f5" target="_blank" title="http://www.example.com/">Terms &amp; Conditions</a></p>
        <p style="margin:0;text-align:center">.</p><p style="margin:0;font-size:12px;text-align:center"><span style="color:silver"><br/><br/></span></p><p style="margin:0;text-align:center">© Copyright 2021. SpaCity All Rights Reserved.</p><p style="margin:0;text-align:center">www. spacity.nl</p><p style="margin:0;font-size:12px;text-align:center"><span style="color:silver"> </span></p></div></div></td></tr>
    </table></th></tr>
</tbody>
</table></td></tr>
    </tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-9" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0068a5" width="600"><tbody><tr><th class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="icons_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:10px;padding-top:10px;text-align:center"><table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="text-align:center">
<!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]--><!--[if !vml]><!--><table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;display:inline-block;margin-right:-4px;padding-left:0;padding-right:0"><!--<![endif]--><tr><td style="text-align:center;padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:6px"><a href="https://www.designedwithbee.com/"><img align="center" alt="Designed with BEE" class="icon" height="50" src="logo-spa-city.svg" style="display:block;height:auto;border:0" width="100"/></a></td><td style="font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-size:15px;color:white;vertical-align:middle;letter-spacing:undefined;text-align:center"><a href="https://www.spacity.nl/" style="color:white;text-decoration:none">Designed by SpaCity</a></td></tr></table></td></tr></table></td></tr></table></th></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><!-- End --></body></html>