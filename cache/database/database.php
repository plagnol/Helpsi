<?php
//Connection to the Helpsi's database
/**
 * @return PDO database connection object
 */
function getDatabase()
{
    try {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=helpsi', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
    return $bdd;
}
?>
