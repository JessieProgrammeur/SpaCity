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
    const GEBRUIKER = 2;
    
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

    // uitvoeren van een update of delete statement
    public function update_or_delete($statement, $named_placeholder, $location){
        $stmt = $this->connection->prepare($statement);
        $stmt->execute($named_placeholder);
        header("location: $location");
        exit();
    }

    // uitvoeren van een insert into statement
    public function insert($sql, $named_placeholder, $location){
        try{
            $this->connection->beginTransaction();

            $statement = $this->connection->prepare($sql);
            $statement->execute($named_placeholder);

            $_SESSION['last_insert_id'] = $last_id = $this->connection->lastInsertId();
            
            $this->connection->commit();

            header("location: $location");

        }catch(Exception $e){
            $this->connection->rollback();
            throw $e;
        }
    }

    // functie die een gebruikers hun gebruikersnaam controleert/ location aangeeft en functie aanmaken gebruikers aanroept
    public function voeg_gebruiker_toe($usertype_id=self::GEBRUIKER, $voornaam, $gebruikersnaam, $wachtwoord, $email, $telefoonnummer){

        try{
            
             $this->connection->beginTransaction();
            
             if(!$this->is_nieuw_gebruiker($gebruikersnaam)){
                 return "Gebruikersnaam bestaat al. Kies een andere gebruikersnaam en probeer opnieuw.";
             }
             
             $gebruikers_id = $this->voeg_gebruiker(NULL, $usertype_id, $voornaam, $gebruikersnaam, $wachtwoord, $email, $telefoonnummer);
             
             $this->connection->commit();
             
             header('location: overzicht_gebruikers.php');
             exit;

        }catch(Exception $e){
            
            $this->connection->rollback();
            echo "Signup failed: " . $e->getMessage();
        }
     }

     // functie die een gebruiker invoegt in de database
     private function voeg_gebruiker($id, $usertype_id, $voornaam, $gebruikersnaam, $wachtwoord, $email, $telefoonnummer){
        
        $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);

        $sql = "INSERT INTO gebruikers VALUES (NULL, :usertype_id, :voornaam, :gebruikersnaam, :wachtwoord, :email, :telefoonnummer, :created, :updated)";

        $statement = $this->connection->prepare($sql);

        $created_at = $updated_at = date('Y-m-d H:i:s');

        $statement->execute([
            'usertype_id'=>$usertype_id,
            'voornaam'=>$voornaam,
            'gebruikersnaam'=>$gebruikersnaam, 
            'wachtwoord'=>$hashed_password, 
            'email'=>$email, 
            'telefoonnummer'=>$telefoonnummer, 
            'created'=> $created_at, 
            'updated'=> $updated_at
        ]);
        
        $gebruikers_id = $this->connection->lastInsertId();
        return $gebruikers_id;
    }

    // functie die controleert of de gebruikersnaam al bestaat
    private function is_nieuw_gebruiker($gebruikersnaam){
        $stmt = $this->connection->prepare('SELECT * FROM gebruikers WHERE gebruikersnaam=:gebruikersnaam');
        $stmt->execute(['gebruikersnaam'=>$gebruikersnaam]);

        $result = $stmt->fetch();

        if(is_array($result) && count($result) > 0){
            return false;
        }
        return true;
    }

    // functie die een gebruikers hun gebruikersnaam controleert/ location aangeeft en functie aanmaken gebruikers aanroept
    public function import_klanten($naam, $postcode, $plaats, $email){

        try{
            
             $this->connection->beginTransaction();
            
             if(!$this->is_nieuw_klant($naam)){
                 return "Klant bestaat al. Controleer import file.";
             }
             
             $klanten_id = $this->voeg_klant(NULL, $naam, $postcode, $plaats, $email);
             
             $this->connection->commit();
             
             header('location: overzicht_klanten.php');
             exit;

        }catch(Exception $e){
            
            $this->connection->rollback();
            echo "Signup failed: " . $e->getMessage();
        }
     }

     // functie die een gebruiker invoegt in de database
     private function voeg_klant($id, $naam, $postcode, $plaats, $email){
        
        $sql = "INSERT INTO klanten VALUES (NULL, :naam, :postcode, :plaats, :email)";

        $statement = $this->connection->prepare($sql);

        $statement->execute([
            'naam'=>$naam,
            'postcode'=>$postcode,
            'plaats'=>$plaats,
            'email'=>$email 
        ]);
        
        $klanten_id = $this->connection->lastInsertId();
        return $klantens_id;

        header('location: overzicht_klanten.php');
             exit;
    }

    // functie die controleert of de gebruikersnaam al bestaat
    private function is_nieuw_klant($naam){
        $stmt = $this->connection->prepare('SELECT * FROM klanten WHERE naam=:naam');
        $stmt->execute(['naam'=>$naam]);

        $result = $stmt->fetch();

        if(is_array($result) && count($result) > 0){
            return false;
        }
        return true;
    }

    public function insert_klanten($sql, $named_placeholder){

        print_r($sql);
        try{
            $this->connection->beginTransaction();

            $statement = $this->connection->prepare($sql);
            $statement->execute($named_placeholder);

            $_SESSION['last_insert_id'] = $last_id = $this->connection->lastInsertId();
            
            $this->connection->commit();


    }catch(Exception $e){
            
        $this->connection->rollback();
        echo "Signup failed: " . $e->getMessage();
    }


}

}

?>