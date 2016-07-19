<?php
class usuarios{
    function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "appweb"/*"localhost", "ticbgnco_Maxi", "Maximiano123.", "ticbgnco_Maxiappweb"*/);
    }

    function execute($sql){
    $res = $this->mysqli->query($sql);
    $userVO = null;
    if($res->num_rows > 0){
        for($i = 0; $i < $res->num_rows; $i++){
            $row = $res->fetch_assoc();
            $userVO[$i] = new UserVO();
				//echo $row["usrid"]." ".$row["usrnombre"]." ".$row["usrpass"];
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
        $sql = "SELECT * FROM tblusuarios";
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

        if($userVO->getId() != "") {
            $currUserVO = $this->getByUserId($userVO->getId());
        }
        // If the query returned a row then update,
        // otherwise insert a new user.
        if(sizeof($currUserVO) > 0) {
            $sql = "UPDATE tblusuarios SET ".
                "usrnombre='".$userVO->getUsername()."', ".
                "usrpass='".$userVO->getPassword()."' ".
                "WHERE usrid=".$userVO->getId();

            $this->mysqli->query($sql);
            $affectedRows->affected_rows();
        }
        else {
            $sql = "INSERT INTO tblusuarios (usrnombre, usrpass) VALUES('".
                $userVO->getUsername()."', ".
                $userVO->getPassword()."')".

            $this->mysqli->query($sql);
            $affectedRows->affected_rows();
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

            $this->mysqli->query($sql);
            $affectedRows->affected_rows();

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
