<?php

/*
 * PHP version 5
 * 
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Database {
    
    /**
     * 
     * @param type $DB_SERVER
     * @param type $DB_NAME
     * @param type $DB_USERNAME
     * @param type $DB_PASSWORD
     */
    public function __construct($DB_SERVER, $DB_NAME, $DB_USERNAME, $DB_PASSWORD) {
        
        mysql_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD);
        $this->SelectDb($DB_NAME);
    }
    
    /**
     * 
     * @param string $DB_NAME
     */
    public function SelectDb($DB_NAME) {
        return mysql_select_db($DB_NAME);
    }
    /**
     * 
     * @param string $sql
     * @param array $data
     * @return array
     */
    public function findAll($sql, $data = array()) {
        
        $query = mysql_query($sql);
        while($res = mysql_fetch_array($query)) {
            $result []= $res;
        }
       return $result;
        
    }
   /**
    * 
    * @param string $sql
    * @param array $data
    * @return array
    */
   public function find($sql, $data = array()) {
        $query = mysql_query($sql);
        $res = mysql_fetch_array($query);
        return $res;
    }
   /**
    * 
    * @param string $table
    * @param array $data
    * @return boolean
    */
    public function insert($table, $data) {
        
        $sql = "INSERT INTO $table";
        $fnames = '';
        $fvalues = '';
        foreach($data as $key => $value) {
            $fnames .= "`$key`, ";
            $fvalues .= "'$value', ";
        }
        $sql .="(" . rtrim($fnames, ', ') . ") VALUES (" . rtrim($fvalues, ', ') .")";
        $res = mysql_query($sql);
        return $res;
       
    }
    /**
     * 
     * @param string $table
     * @param array $data
     * @param string $where
     */
    public function update($table, $data, $where) {
        
        $sql = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "`$key`='$value', ";
        }
       $sql = rtrim($sql, ', ') . 'WHERE' . $where . ';';
        $result = mysqli_query($sql);
        return $result;
    }
    /**
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     */
    public function delete($table, $where, $limit = 1) {
        
        $sql = "DELETE FROM $table WHERE $where LIMIT $limit";
        $result = mysql_query($sql);
        
    }
    /**
     * 
     * @return integer
     */
    
    public function lastInsertId() {
        return mysql_insert_id(); 
    }
    
    public function moduleInstalation($sql) {
       // echo $sql; exit;
        return mysql_query($sql);
    }
    
}
?>
