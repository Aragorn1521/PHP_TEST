<?php

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Db.php');
Class DatabaseCreation {
    
    public function DbCreation(){

    $db = Db::getConnectionDB();
    
    $sql = file_get_contents("components/sql/db_test.sql");
    $db->exec($sql);
}
    
   public function CreatingATable() {
       
    $db = Db::getConnection();
     
    $sql = file_get_contents("components/sql/table_test.sql");
    $db->exec($sql);
}
    public function PopulatingTheTable(){
        
    $db = Db::getConnection();
     
    $sql = file_get_contents("components/sql/table_test_data.sql");
    $db->query($sql);
}

}
 