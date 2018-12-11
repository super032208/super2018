<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author Hector Delcid
 */
class db {
    

    function dbconnect() {
    $config = array(
      'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_hector;',
      'DB_USER' => 'se266_hector',
      'DB_PASSWORD' => '8001596'
    );

    try {
        /* Create a Database connection and
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the
         * connection by setting the variable to null */
        $db = null;
        $message = $ex->getMessage();
        var_dump($message);
        exit();
    }

    return $db;
}//end function dbconnect

}
