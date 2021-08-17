<?php

class db{

    private $host;
    private $user; 
	private $database; 
	private $password;
	private $db;
    private $charset;
    private $connection;

    // aanmaken class constants ( admin en medewerker)
    const ADMIN = 1;
    const MEDEWERKER = 2;
    
    public function __construct(){

        $this->host = 'localhost';
		$this->user = 'root';
		$this->database = 'SpaCity';
        $this->password = '';
        $this->charset = 'utf8mb4';

        try {

        $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";

        $options = [ 
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC, 
            PDO::ATTR_EMULATE_PREPARES => false, 
        ];
            $this->connection = new PDO($dsn, $this->user, $this->password, $options); 

        }catch(\PDOException $e){ 
           throw new \PDOException("Error message is: ". $e->getMessage()); 
        }
    }

    // uitvoeren van een sql select statement
    public function select($statement, $named_placeholder){
        
        $stmt = $this->connection->prepare($statement);
        $stmt->execute($named_placeholder);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    // functie waarmee admins en medewerkers kunnen inloggen
    public function login_med($sql, $named_placeholder, $formvalues){

        $gebr = $formvalues['gebruikersnaam'];
        $ww = $formvalues['wachtwoord'];

        $medewerker = $this->select($sql, $named_placeholder);

        if(is_array($medewerker)){
            
            if(count($medewerker) > 0){
                $medewerker = $medewerker[0];
                $hashed_password = $medewerker['wachtwoord'];
                $gebruikersnaam = $medewerker['gebruikersnaam'];

                if($named_placeholder && password_verify($ww, $hashed_password)){
                session_start();
                    
                    $_SESSION['gebruikers_id'] = $medewerker['id'];
                    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
                    $_SESSION['usertype_id'] = $medewerker['usertype_id'];
                    $_SESSION['loggedin'] = true;
                
                    $usertype = $_SESSION['usertype_id'];
                switch($usertype) {
                    case $_SESSION['usertype_id'] = 1:
                        header("location: welkom_admin.php");
                        exit;
                        break;
                    case $_SESSION['usertype_id'] = 2:
                        header("location: welkom_gebruiker.php");
                        exit;
                        break;
                }
                }else{
                    return "Incorrect username and/or password. Please fix your input and try again.";
                }
            }else{
            return "Failed to login. Please try again";
            }
        }
    }
}

?>