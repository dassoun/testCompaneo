<?php

class TeamDAO {
    protected $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function FindAll() {
        $sql = "SELECT id, name from Teams";
        $result = pg_query($this->db, $sql);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
    
    public function Find($id) {
        $sql = "SELECT id, name FROM teams WHERE id = $1";
        $params = array($id);
        $result = pg_query_params($this->db, $sql, $params);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
    
    public function Update($id, $name) {
        $sql = "UPDATE teams SET name = $1 WHERE id = $2";
        $params = array($name, $id);
        $result = pg_query_params($this->db, $sql, $params);
                
        return $result;
    }
    
    public function Delete($id) {
        $sql = "DELETE FROM teams WHERE id = $1";
        $params = array($id);
        $result = pg_query_params($this->db, $sql, $params);
                
        return $result;
    }
    
    public function Insert($name) {
        $sql = "INSERT INTO teams (name) VALUES ($1)";
        $params = array($name);
        $result = pg_query_params($this->db, $sql, $params);
                
        return $result;
    }
}

