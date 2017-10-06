<?php

class MatchDAO {
    protected $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function FindAll() {
        $sql = "SELECT id, home_team_id, away_team_id, home_score, away_score, snitch, p, padj, swim, event_id, event_order FROM matches";
        $result = pg_query($this->db, $sql);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
    
    public function Find($id) {
        $sql = "SELECT id, home_team_id, away_team_id, home_score, away_score, snitch, p, padj, swim, event_id, event_order FROM matches WHERE id = $1";
        $params = array($id);
        $result = pg_query_params($this->db, $sql, $params);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
    
    public function FindByTeam($id) {
        $sql = "SELECT id, home_team_id, away_team_id, home_score, away_score, snitch, p, padj, swim, event_id, event_order FROM matches WHERE home_team_id = $1 OR away_team_id = $1";
        $params = array($id);
        $result = pg_query_params($this->db, $sql, $params);
        
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[] = $row;
        }
        
        return $res;
    }
}

