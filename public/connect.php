<?php

function getDatabase() {

        $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;',
            'DB_USER' => 'se266_hector',
            'DB_PASSWORD' => '8001596'
        );


        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $db;
}
$testDB = getDatabase();

?>
