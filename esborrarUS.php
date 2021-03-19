<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	if ($_POST['usr'] && $_POST['ou']){

	    $uid = $_POST['usr'];
	    $unorg = $_POST['ou'];
    	$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';

    	$opcions = [
    		'host' => 'zend-damiga.fjeclot.net',
    		'username' => 'cn=admin,dc=fjeclot,dc=net',
    		'password' => 'fjeclot',
    		'bindRequiresDn' => true,
    		'accountDomainName' => 'fjeclot.net',
    		'baseDn' => 'dc=fjeclot,dc=net',		
    	];

    	$ldap = new Ldap($opcions);
    	$ldap->bind();
    	if ($ldap->delete($dn))	echo "<b>Entrada esborrada</b><br>"; 
    	else echo "<b>Aquesta entrada no existeix</b><br>";	
	}
?>
<html>
    <head>
        <title>
        	ELIMINAR USUARIS DE LA BASE DE DADES LDAP
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
    	<div class="text-center">
        	<form action="http://zend-damiga.fjeclot.net/daw2_m08uf23_projecte_miguel_david/esborrarUS.php" method="POST">
                Unitat organitzativa: <input type="text" name="ou"><br>
                Usuari: <input type="text" name="usr"><br>
                <input type="submit"/>
                <input type="reset"/>
    		</form>
    		<a href="http://zend-damiga.fjeclot.net/daw2_m08uf23_projecte_miguel_david/menu.php">Torna al menu</a>
    	</div>
	</body>
</html>















