<?php
require __DIR__ .'/res/settings.php';
$_SESSION['client-ip'] = $_SERVER['REMOTE_ADDR'];

$_SESSION['msg'] = '<br><form><div class="form-group"><label for="q" style="font-weight: bold;">IP/Hostname:</label><input class="form-control mr-sm-2" type="text" placeholder="example.com" name="q" id="q" style="font-size: 150%; text-align: center;"><br><button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="document.getElementById(\'loading\').style.display = \'block\';">Lookup</button></div></form>';
$_SESSION['msg'] .= '<p style="position: fixed;bottom: 0px;right: 20px;z-index: 9001;">Made by <i class="fa fa-code"></i> <a href="https://meta.maamedia.org/wiki/User:Mito">Mito</a></p>';

if(isset($_GET['q'])){
    
    function getDomainName() {

        if(preg_match('/^[a-zA-Z0-9å-öÅ-Ö.-]+$/', $_GET['q'])) {

            $_SESSION['target-hostname'] = preg_replace('/(www\.)/', '', $_GET['q']);
            unset($_SESSION['msg']);
            return true;
            
        } elseif(filter_var($_GET['q'], FILTER_VALIDATE_URL)) {
            $_SESSION['temp'] = parse_url($_GET['q'], PHP_URL_HOST);
            $_SESSION['target-hostname'] = preg_replace('/(www\.)/', '', $_SESSION['temp']);
            unset($_SESSION['msg']);
            return true;
            
        } else {

            $_SESSION['msg'] .= '<h2 style="color: red;">Please enter a valid url/domain.</h2>';
            return false;

        }

    }


    function lookup() {
        $_SESSION['lookupResponse'] = shell_exec('whois ' . $_SESSION['target-hostname']);
    }

    function other() {

        $_SESSION['target-software'] = shell_exec('curl -LI '.$_SESSION['target-hostname'] . ' | grep -i Server: | head -1');
        $_SESSION['target-ip'] = gethostbyname($_SESSION['target-hostname']);

        if ($_SESSION['target-software'] !== null) {

            $_SESSION['target-other'] = 'Web '.$_SESSION['target-software'].'<br>IP: '.$_SESSION['target-ip'];

        } else {

            $_SESSION['target-other'] = 'Web Server: Not available<br>IP: '.$_SESSION['target-ip'];

        }

    }

    if(getDomainName()){
        lookup();
        other();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?></title>
        <meta charset="UTF-8">
        <meta name="theme-color" content="#292b2c"> <!-- Top-bar color for android -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="res/icon.jpg">

        <!-- Bootstrap CSS + Font-Awesome Icon Lib + Tether.io -->
        <link href="res/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether-theme-arrows-dark.min.css" integrity="sha256-XFyid0+5GkcmTcsYkT0chfpGgPQ1TWhrFpR5oHyzc34=" crossorigin="anonymous" />

        <!-- Bootstrap JS +jQuery + Tether.io-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha256-gL1ibrbVcRIHKlCO5OXOPC/lZz/gpdApgQAzskqqXp8=" crossorigin="anonymous"></script>
        <script src="res/bootstrap.min.js"></script>
        <script src="res/night-mode.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script> <!-- clipboard.js CDN -->
        <script>$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});</script>
        
    </head>
    <body style="padding-top: 2rem;">
        <script>new Clipboard('.cbip');</script> <!-- This has to be at the top of body! -->
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="./">WHOIS Lookup</a>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="nav-link cbip" data-clipboard-text="<?php echo $_SESSION['client-ip'];?>" title="Click to copy IP" data-toggle="tooltip" data-placement="bottom">Your IP: <?php echo $_SESSION['client-ip'];?></span>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="">
                    <input class="form-control mr-sm-2" type="text" placeholder="<?php if(isset($_SESSION['target-hostname']) && $_SESSION['target-hostname'] !== ""){echo $_SESSION['target-hostname'];}else{echo "example.com";} ?>" name="q" id="q">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="document.getElementById('loading').style.display = 'block';">Lookup</button>
                </form>
            </div>
        </nav>

        <div class="container" style="padding-top: 2rem; text-align: center;"> <!-- container -->
            <?php
              if(isset($_SESSION['target-hostname'])){
                  echo '<h1 style="padding: 15px;">Lookup results for <a href="http://'.$_SESSION['target-hostname'].'" target="_blank">'.$_SESSION['target-hostname'].'</a></h1>';
              }

              if(isset($_SESSION['msg'])) {
                  echo $_SESSION['msg'];
              }

              if(isset($_SESSION['target-other'])) {
                echo '<div class="jumbotron" style="padding: 15px;">'.$_SESSION['target-other'].'</div>';
              }

              if(isset($_SESSION['lookupResponse'])) {
                  echo '<div class="jumbotron" style="padding: 15px;"><pre>'.$_SESSION['lookupResponse'].'
';

             }
           ?>
   </body>
   <style>
       /* Footer */
footer {
margin-left: 10em; margin-top: 0; padding: 0.75em; }

footer ul {
list-style: none; list-style-image: none; list-style-type: none; margin: 0; padding: 0; }

footer ul li {
margin: 0; padding: 0; padding-top: 0.5em; padding-bottom: 0.5em; color: #333333; font-size: 0.7em; }

footer #footer-icons {
float: right; }

footer #footer-places {
float: left; }

footer #footer-info li {
line-height: 1.4em; }

footer #footer-icons li {
float: left; margin-left: 0.5em; line-height: 2em; }

footer #footer-places li {
float: left; margin-right: 1em; line-height: 2em; }

   </style>
   <footer role="contentinfo">
<a class="nav-link" href="https://meta.maamedia.org/wiki/Maamedia_Privacy_policy">Privacy policy</a>
<a class="nav-link" href="https://meta.maamedia.org/wiki/Special:MyLanguage/Maamedia">About Maamedia</a>
<a class="nav-link" href="https://meta.maamedia.org/wiki/Special:MyLanguage/Maamedia_Tools">About Maamedia Tools</a>
<a class="nav-link" href="https://github.com/Maamedia/Tools/whois">Source code</a>
<a class="nav-link" href="http://phabricator.maamedia.org">Report a bug</a>
           <a href="/whois">
             <img src="https://commons.maamedia.org/images/4/40/Powered_by_MaamediaTools.png" style="width:160px; height:160px;" alt="Powered by Maamedia Tools.">
</a>
</html>
