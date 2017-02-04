<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DBConnection {
    public $db_name = "auto_shop";
    public $db_host = "localhost";
    public $db_user = "root";
    public $db_psw = "";
    public $db = null;
    
    function __construct() {
        
    }
    
    function initDBParams()   {
        if (!isset($this->db))
        $this->db = new PDO("mysql:host={$this->db_host};dbname=".$this->db_name, 
                $this->db_user, $this->db_psw);
    }
    
    function sendSQLDMLRequest($sql_instruction) {
        $this->db->exec("SET NAMES utf8");
        $this->db->exec($sql_instruction);
    }
    
    function sendSQLDQLRequest($sql_instruction)    {
        //query("SET NAMES utf8");
        //echo $sql_instruction;
        $this->sendSQLDMLRequest("SET NAMES utf8");
        $stmt = $this->db->query($sql_instruction);
        
        if (isset($stmt)&&sizeof($stmt)>0)
                return $stmt->fetchAll();
        else {
                return null;
            }
    }
    
}

?>
