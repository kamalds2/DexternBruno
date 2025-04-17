<?php
/**
 * database
 * 
 * This is PDO driver database extends from PDO
 * 
 * @uses connect the database
 * 
 * PHP version 5
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Database extends PDO {
    /**
     * Constructor
     * 
     * This is main database connect method in database package
     * 
     * @param string  $DB_SERVER server name
     * @param string  $DB_NAME database name
     * @param string  $DB_USERNAME database user name
     * @param string $DB_PASSWORD database password
     */
    public function __construct($DB_SERVER, $DB_NAME, $DB_USERNAME, $DB_PASSWORD) {
        parent::__construct('mysql:host=' . $DB_SERVER . ';dbname=' . $DB_NAME, $DB_USERNAME, $DB_PASSWORD,array(
            PDO::ATTR_PERSISTENT => true
        ));
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    public function findAll($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $res = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $res->bindValue("$key", $value);
           
        }
        $res->execute();
        return $res->fetchAll($fetchMode);
     
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
    public function find($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC) {
     
        $res = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $res->bindValue("$key", $value);
           
        }
        $res->execute();
        return $res->fetch($fetchMode);  
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
        
        $tablefiledNames = implode(', ', array_keys($data));
        $tablefiledValues = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($tablefiledNames) VALUES ($tablefiledValues)";
        $query = $this->prepare($sql);
        if(!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->errorInfo());
        }
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        $query->execute();
        if($query->rowCount() > 0) {
          return true;
      } else {
         return false;
      }        
    }
    
    /**
     * update
     * This is update method for updateing the values in to database
     * 
     * @param string $table
     * @param array $data 
     * @param string $where
     * 
     * @return boolean
     */
    public function update($table, $data, $where) {
        $filedNames = NULL;
        foreach ($data as $key => $value) {
            $filedNames .= "`$key`=:$key," ;
        }
        $filedNames = rtrim($filedNames, ',');
        $sql = "UPDATE $table SET $filedNames WHERE $where";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        $query->execute();
        if($query->rowCount() > 0) {
          return true;
      } else {
         return false;
      }   
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
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
        
    }
    /**
     * 
     * @param string $sql
     * @return boolean
     */
    public function moduleInstalation($sql) {
     if(!$this->exec($sql)) {
         return 1;
     } else {
         return 0;    
     }
        
    }
    /**
     * 
     * @param string $table
     * @param string $where
     * @param integer $ids
     * @return boolean
     */
    public function deleteAll($table, $where, $ids) {
        
        return $this->exec("DELETE FROM $table WHERE $where IN($ids)");
    }

   
    
}
?>
