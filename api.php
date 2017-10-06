<?php

require_once("Rest.inc.php");

require_once('conf/config.php');

require_once('dao/EventDAO.php');
require_once('dao/MatchDAO.php');
require_once('dao/TeamDAO.php');


class API extends REST {

    public $data = "";

    private $connexion_string = "host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD;
    private $db = NULL;

    public function __construct() {
        parent::__construct();    // Init parent contructor
        $this->dbConnect();     // Initiate Database connection
    }

    /*
     *  Database connection 
     */
    private function DbConnect() {
        $this->db = pg_connect($this->connexion_string);
    }

    /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */
    public function ProcessApi() {
        
        $request_parts = explode('/', $_SERVER['REQUEST_URI']);
        
        if (isSet($request_parts[1]) && $request_parts[1] == "api") {
            if (isSet($request_parts[2])) {
                $func = strtolower($request_parts[2]);
                if ((int) method_exists($this, $func) > 0) {
                    $this->$func($request_parts);
                } else {
                    $this->response('', 404);   // If the method not exist with in this class, response would be "Page not found".
                }
            } else {
                $this->response('', 404);    // If the method not exist with in this class, response would be "Page not found".
            }
            $this->response('', 404);    // If the method not exist with in this class, response would be "Page not found".
        }
    }
    
    
    private function teams($request_parts) {
        switch($this->get_request_method()) {
            case "GET":
                $teamDAO = new TeamDAO($this->db);
                $matchDAO = new MatchDAO($this->db);
                
                if (isSet($request_parts[4])) {
                    if ($request_parts[4] == "matchs") {
                        $teams = $matchDAO->FindByTeam($request_parts[3]);
                    } else {
                        $this->response('', 406);
                    }
                } else {
                    if (isSet($request_parts[3])) {
                        $teams = $teamDAO->Find($request_parts[3]);
                    } else {
                        $teams = $teamDAO->FindAll();
                    }
                }
                
                if ($teams) {
                    $this->response(json_encode($teams), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                break;
                
            case "DELETE":
                $teamDAO = new TeamDAO($this->db);
                
                if (isSet($request_parts[3])) {
                    $teams = $teamDAO->Delete($request_parts[3]);
                } else {
                    $this->response('', 406);
                }
                
                if ($teams) {
                    $this->response(json_encode($teams), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                
                break;
                
            case "PUT":
                $teamDAO = new TeamDAO($this->db);
                
                if (isSet($request_parts[3])) {
                    
                    //$bodyParams = file_get_contents('php://input');
                    $bodyParams = json_decode(file_get_contents('php://input'));
                    if (isSet($bodyParams->name)){
                        $teams = $teamDAO->Update($request_parts[3], $bodyParams->name);
                    } else {
                        $this->response('', 406);
                    }
                } else {
                    $this->response('', 406);
                }
                
                if ($teams) {
                    $this->response(json_encode($teams), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                break;
            
            case "POST":
                $teamDAO = new TeamDAO($this->db);
                
                $bodyParams = json_decode(file_get_contents('php://input'));
                if (isSet($bodyParams->name)){
                    $teams = $teamDAO->Insert($bodyParams->name);
                } else {
                    $this->response('', 406);
                }
                
                if ($teams) {
                    $this->response(json_encode($teams), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                break;
                
            default:
                // Cross validation if the request method is GET else it will return "Not Acceptable" status
                $this->response('', 406);
                break;
        }

    }

    private function events($request_parts) {
        switch($this->get_request_method()) {
            case "GET":
                $eventDAO = new EventDAO($this->db);
                
                if (isSet($request_parts[3])) {
                    $events = $eventDAO->Find($request_parts[3]);
                } else {
                    $events = $eventDAO->FindAll();
                }
                
                if ($events) {
                    $this->response(json_encode($events), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                break;
                
            case "DELETE":
                $eventDAO = new EventDAO($this->db);
                
                if (isSet($request_parts[3])) {
                    $events = $eventDAO->Delete($request_parts[3]);
                } else {
                    $this->response('', 406);
                }
                
                if ($events) {
                    $this->response(json_encode($events), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                
                break;
                
            case "PUT":
                $eventDAO = new TeamDAO($this->db);
                
                if (isSet($request_parts[3])) {
                    
                    //$bodyParams = file_get_contents('php://input');
                    $bodyParams = json_decode(file_get_contents('php://input'));
                    if (isSet($bodyParams->name)){
                        $events = $eventDAO->Update($request_parts[3], $bodyParams->name);
                    } else {
                        $this->response('', 406);
                    }
                } else {
                    $this->response('', 406);
                }
                
                if ($events) {
                    $this->response(json_encode($events), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                break;
                
            default:
                // Cross validation if the request method is GET else it will return "Not Acceptable" status
                $this->response('', 406);
                break;
        }
    }
    
    private function matchs($request_parts) {
        switch($this->get_request_method()) {
            case "GET":
                $matchDAO = new MatchDAO($this->db);
                
                if (isSet($request_parts[4])) {
                    if ($request_parts[4] == "matchs") {
                        $matchs = $matchDAO->FindByTeam($request_parts[3]);
                    } else {
                        $this->response('', 406);
                    }
                } else {
                    if (isSet($request_parts[3])) {
                        $matchs = $matchDAO->Find($request_parts[3]);
                    } else {
                        $matchs = $matchDAO->FindAll();
                    }
                }
                
                if ($matchs) {
                    $this->response(json_encode($matchs), 200);
                } else {
                    $this->response('', 204); // If no records "No Content" status
                }
                break;
                
            default:
                // Cross validation if the request method is GET else it will return "Not Acceptable" status
                $this->response('', 406);
                break;
        }
    }
}

// Initiiate Library
$api = new API;
$api->processApi();
