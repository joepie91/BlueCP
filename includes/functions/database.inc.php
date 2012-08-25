<?php
class Database {
    protected $_server;
    protected $_database;
    protected $_user;
    protected $_password;
    protected $_connection;

    public function __construct($server = '127.0.0.1', $database = 'databasename', $user = 'username', $password = 'password'){
        $this->_server   = $server;
        $this->_database = $database;
        $this->_user     = $user;
        $this->_password = $password;
    }

    protected function _sendQuery($query, $getId = false){
        $this->_connection = mysql_connect($this->_server, $this->_user, $this->_password);

        mysql_select_db($this->_database, $this->_connection);

        mysql_query('SET NAMES \'utf8\'');
        mysql_query('SET CHARACTER SET \'utf8\'');

        $result = mysql_query($query, $this->_connection);
        $tmpId  = mysql_insert_id($this->_connection);

        if(isset($this->connection)){
		mysql_close($this->connection);
        }
		
        if ($getId) {
            return $tmpId;
        }

        return $result;
    }
	
    public function select($table, $fields = '*', $where = '1=1', $order = 'id', $limit = '', $desc = false, $limitBegin = 0, $groupby = null, $monitoring = false){
        $query = 'SELECT ' . $fields . ' FROM ' . $table . ' WHERE ' . $where;

        if (!empty($groupby)) {
            $query .= ' GROUP BY ' . $groupby;
        }

        if (!empty($order)) {
            $query .= ' ORDER BY ' . $order;

            if ($desc) {
                $query .= ' DESC';
            }
        }

        if (!empty($limit)) {
            $query .= ' LIMIT ' . $limitBegin . ', ' . $limit;
        }

        $result = $this->_sendQuery($query);

        $resultArray = array();

        while ($row = mysql_fetch_assoc($result)) {
            $resultArray[] = $row;
        }
		
        if ($monitoring) {
            echo $query;
        }

        return $resultArray;
    }

    public function insert($table, $objects){
        $query = 'INSERT INTO ' . $table . ' ( ' . implode(',', array_keys($objects)) . ' ) VALUES(\'' . implode('\',\'', $objects) . '\')';
        $result = $this->_sendQuery($query, true);

        return $result;
    }

    public function update($table, $data, $where){
        if (is_array($data)) {
            $update = array();
            foreach ($data as $key => $val) {
                $update[] .= $key . '=\'' . $val . '\'';
            }

            $query = 'UPDATE ' . $table . ' SET ' . implode(',', $update) . ' WHERE ' . $where;

            $this->_sendQuery($query);
        }
    }
	
    public function delete($table, $id, $where = null){
        if($where === null) {
            $query = 'DELETE FROM ' . $table . ' WHERE id=\'' . $id . '\'';
        } else {
            $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        }
        
        $this->_sendQuery($query);
    }

    public function truncate($table){
        $query = 'TRUNCATE TABLE `' . $table . '`';
        $this->_sendQuery($query);
    } 
}
