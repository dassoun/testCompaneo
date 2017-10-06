<?php

class EventDAO {
    protected $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function FindAll() {
        $sql = "SELECT id, name, event_start_date, event_end_date FROM events";
        $result = pg_query($this->db, $sql);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
    
    public function Find($id) {
        $sql = "SELECT id, name, event_start_date, event_end_date FROM events WHERE id = $1";
        $params = array($id);
        $result = pg_query_params($this->db, $sql, $params);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
    
    public function Delete($id) {
        $sql = "DELETE FROM events WHERE id = $1";
        $params = array($id);
        $result = pg_query_params($this->db, $sql, $params);
        
        return $result;
    }
    
    public function Insert($name, $event_start_date, $event_end_date) {
        $sql = "INSERT INTO events (name, event_start_date, event_end_date) VALUES ($1, $2, $3, $4)";
        $params = array($name, $event_start_date, $event_end_date);
        $result = pg_query_params($this->db, $sql, $params);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
}

