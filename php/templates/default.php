<?
header('Content-Type: text/html; charset=utf-8');
$host = $_SERVER['HTTP_HOST'];
setlocale(LC_TIME, "pt_BR.utf8");
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Bem vindo &agrave; <? print $host; ?>! Hostinger - Hospedagem gratuita com PHP e MySQL.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://cdn.rawgit.com/hostinger/banners/master/hostinger_welcome/css/site.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
    <div id="content">
        <div class="header">
            <a id="logo" href="http://www.hostinger.com.br/"><img src="https://hostinger.s3.amazonaws.com/r/1238bb7c196b067741224bc0a441acb7/f949990c073acdc929342d88090ba299.png" alt="Hospedagem" /></a>
        </div>
        <div class="content">
            <h1>Sua conta foi criada!</h1>
            <p>O site <b><? print $host; ?></b> foi instalado com sucesso no servidor! Por favor apague o arquivo <b>default.php</b> da pasta <b>public_html</b> e fa&ccedil;a o upload de seus arquivos usando FTP ou o Gerenciador de Arquivos.</p>
            <div class="clear"></div>
        </div>
        <div class="footer"></div>
        <div class="clear"></div>
    </div>
    <div id="footer">
        <div class="links">
            <a href="http://www.hostinger.com.br/hospedagem-web" target="_blank">Hospedagem Web</a>
            <span class="pipe">|</span>
            <a href="http://www.hostinger.com.br/hospedagem-gratuita" target="_blank">Hospedagem Gratuita</a>
            <span class="pipe">|</span>
            <a href="http://www.hostinger.com.br/forum" target="_blank">Forum de Suporte</a>
            <span class="pipe">|</span>
            <a href="http://cpanel.hostinger.com.br/" target="_blank">Login</a>
        </div>
        <div class="copyright">Hostinger Brasil &copy; <? print date('Y'); ?>. Todos os Direitos Reservados.</div>
        <div class="social-icons">
            <a href="http://www.facebook.com/Hostinger.com.br"><img src="https://raw.githubusercontent.com/hostinger/banners/master/hostinger_welcome/images/fb.gif" /></a>
            <a href="https://twitter.com/HostingerCOM"><img src="https://raw.githubusercontent.com/hostinger/banners/master/hostinger_welcome/images/twitter.gif" /></a>
        </div>
    </div>
</div>
</body>
</html>