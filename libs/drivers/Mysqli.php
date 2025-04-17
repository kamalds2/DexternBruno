<?php

/**
 * database
 * 
 * This is MYSQLI driver database 
 * @uses connect the database
 * 
 * PHP version 5
 * 
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Database {
    
    /**
     * Using create the database connection object
     * var $con string
     * 
     */
    public $con;
    /**
     * Constructor
     * 
     * This is main database connect method in database package
     * 
     * @param string  $DB_SERVER server name
     * @param string  $DB_NAME database name
     * @param string  $DB_USERNAME database user name
     * @param string $DB_PASSWORD database password
     * 
     * return create object
     */
    public function __construct($DB_SERVER, $DB_NAME, $DB_USERNAME, $DB_PASSWORD) {
        $this->con = mysqli_connect('localhost', $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    }
    /**
     * findAll
     * This is select query method 
     * @param string $sql
     * @param array $data
     * @param string $fetchmode
     * 
     * return array
     * 
     */
    public function findAll($sql, $data = array(), $fetchmode = MYSQLI_ASSOC) {
        
        $row = mysqli_query($this->con, $sql);
        $result = mysqli_fetch_all($row, $fetchmode);
        return $result;
      
    }
    /**
     * find
     * This single record select method 
     * @param string $sql
     * @param array $data
     * @param string $fetchmode
     * 
     * return array
     * 
     */
    public function find($sql, $data = array(), $fetchmode = MYSQLI_ASSOC) {
        
        $row = mysqli_query($this->con, $sql);
        $result = mysqli_fetch_array($row, $fetchmode);
        return $result;
        
    }
    /**
     * insert
     * 
     * This is insert method for inserting data into database
     * 
     * @param string $table
     * @param array $data
     * 
     * return boolean
     */
    public function insert($table, $data) {
        
        $sql = "INSERT INTO $table";
        $tablefiledNames = '';
        $tablefiledValues = '';
        foreach($data as $key => $value) {
            $tablefiledNames .= "`$key`, ";
            $tablefiledValues .= "'$value', " ;
            
        }
        $sql .= "(" . rtrim($tablefiledNames, ', ') . ") VALUES (". rtrim($tablefiledValues, ', ') . ")";
        $result = mysqli_query($this->con, $sql);
        
        
    }
    /**
     * update
     * This is update method for updateing the values in to database
     * 
     * @param string $table
     * @param array $data 
     * @param string $where
     * 
     * return boolean
     */
    public function update($table, $data, $where) {
        $sql = "UPDATE $table SET ";
        foreach($data as $key => $value) {
            $sql .= "`$key`='$value', ";
        }
        
        $sql = rtrim($sql, ', ') . 'WHERE' . $where . ';';
        $result = mysqli_query($this->con, $sql);
        
    }
   /**
     * delete
     * This is delete method for deleting the records from database
     * @param string $table
     * @param string $where
     * @param integer $limit
     * 
     * return boolean
     */
    public function delete($table, $where, $limit = 1) {
        $sql = "DELETE FROM $table WHERE $where LIMIT $limit";
        $result = mysqli_query($this->con, $sql);
    }
    /**
     * lastInsertId
     * This is lastInsertId method for getting last inserted  record id
     * 
     * return integer
     */
    public function lastInsertId() {
        return mysqli_insert_id($this->con);
    }
}
?>
