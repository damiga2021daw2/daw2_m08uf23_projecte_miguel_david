<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
ini_set('display_errors',0);
if ($_GET['usr'] && $_GET['ou']){
    $domini = 'dc=fjeclot,dc=net';
    $opcions = [
        'host' => 'zend-damiga.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    $ldap = new Ldap($opcions);
    $ldap->bind();
    $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
    $usuari=$ldap->getEntry($entrada);
    echo "<b><u>".$usuari["dn"]."</b></u><br>";
    foreach ($usuari as $atribut => $dada) {
        if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
    }
}
?>
<html>
    <head>
        <title>
        	MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
    	<div class="text-center">
        	<form action="http://zend-damiga.fjeclot.net/daw2_m08uf23_projecte_miguel_david/visualitzarUS.php" method="GET">
                Unitat organitzativa: <input type="text" name="ou"><br>
                Usuari: <input type="text" name="usr"><br>
                <input type="submit"/>
                <input type="reset"/>
    		</form>
    		<a href="http://zend-damiga.fjeclot.net/daw2_m08uf23_projecte_miguel_david/menu.php">Torna al menu</a>
    	</div>
	</body>
</html>