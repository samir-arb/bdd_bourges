 <?php
//PDO ⇒ PHP Data Objects
//Extension PHP fournissant une interface orienté
//objet pour interagir avec la base de donnée.

/*try{
$db = new PDO('mysql:host=localhost; dbname=bdd_bourges', 'root', '');
$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
}catch(Exception $e){
echo "Impossible de se connecter à la base de données.";
die;
}*/

$DB_HOST = '127.0.0.1';   // pas "localhost"
$DB_NAME = 'bdd_bourges'; // NOM EXACT de ta base
$DB_USER = 'root';
$DB_PASS = '';            // Laragon: vide

$dsn = "mysql:host=$DB_HOST;port=3306;dbname=$DB_NAME;charset=utf8mb4";

try {
    $db = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    die('Erreur connexion BDD : ' . htmlspecialchars($e->getMessage()));
}

?> 

