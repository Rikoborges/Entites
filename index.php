<?php 

require_once 'DAO/DAOClient.php';

DAOClient $dao = new DAOClient();

$tab = $dao->selectALL();

foreach ($clients as $client)

?>