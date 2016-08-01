<?php
require_once 'control/datos.php';

class usuarios {
    protected $connect;
    protected $db;
    // Attempts to initialize the database connection using the supplied info.
   function __construct() {
        $this->connect = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        $this->db = mysql_select_db(DB_NAME);
   }

    // Executes the specified query and returns an associative array of reseults.
    protected function execute($sql) {
        $res = mysql_query($sql, $this->connect) or die(mysql_error());
		$userVO=null;
        if(mysql_num_rows($res) > 0) {
			for($i = 0; $i < mysql_num_rows($res); $i++) {
				$row = mysql_fetch_assoc($res);
				$userVO[$i] = new UserVO();
				$userVO[$i]->setId($row["usrid"]);
				$userVO[$i]->setUsername($row["usrnombre"]);
				$userVO[$i]->setPassword($row["usrpass"]);
			}
        }
        return $userVO;
	}

    // Retrieves the corresponding row for the specified user ID.
    public function getByUserId($userId) {
        $sql = "SELECT * FROM tblusuarios WHERE usrid=".$userId;
        return $this->execute($sql);
    }

    // Retrieves all users currently in the database.
    public function getUsers() {
        $sql = "SELECT * FROM tblusuarios ORDER By usrnombre asc";
        return $this->execute($sql);
    }

    // Retrieves all users currently in the database.
    public function getByUserPass($usuario,$pass) {
        $sql = "SELECT * FROM tblusuarios WHERE usrnombre='".$usuario."' AND usrpass='".$pass."'";
        return $this->execute($sql);
    }

    //Saves the supplied user to the database.
    public function save($userVO) {
        $affectedRows = 0;
        $currUserVO=null;
        if($userVO->getId() != "") {
			$currUserVO = $this->getByUserId($userVO->getId());
        }
        // If the query returned a row then update,
        // otherwise insert a new user.
        if(sizeof($currUserVO) > 0) {
            $sql = "UPDATE tblusuarios SET ".
                "usrNombre='".$userVO->getUsername()."', ".
                "usrpass='".$userVO->getPassword()."' ".
                "WHERE usrid=".$userVO->getId();

            mysql_query($sql, $this->connect) or die(mysql_error());
            $affectedRows = mysql_affected_rows();
        }
        else {
            $sql = "INSERT INTO tblusuarios (usrNombre, usrpass) VALUES('".
                $userVO->getUsername()."', '".
                $userVO->getPassword()."')";
            mysql_query($sql, $this->connect) or die(mysql_error());
            $affectedRows = mysql_affected_rows();
        }
        return $affectedRows;
    }

    // Deletes the supplied user from the database.
    public function delete($userVO) {
        $affectedRows = 0;

        // Check for a user ID.
        if($userVO->getId() != "") {
            $currUserVO = $this->getByUserId($userVO->getId());
        }

        // Otherwise delete a user.
        if(sizeof($currUserVO) > 0) {
            $sql = "DELETE FROM tblusuarios WHERE usrid=".$userVO->getId();
            mysql_query($sql, $this->connect) or die(mysql_error());
            $affectedRows = mysql_affected_rows();
        return $affectedRows;
    }
  }
}

class UserVO {
	protected $id;
	protected $username;
	protected $password;


	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setUsername($username) {
		$this->username = $username;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setPassword($password) {
	$this->password = $password;
	}
	public function getPassword() {
	return $this->password;
	}
}
