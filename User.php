<?php

require_once "Config.php";

class User extends Config {

    public function getAllUser(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0) {
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function addUser($username, $email, $password, $firstname, $lastname, $birthdate){
        //check if the username and email is already in the database
        $sql = "SELECT * FROM users WHERE usernmae = '$username' OR email = 'email'";
        $result = $this->conn->query($eql);

        //check if there are records returned
        if($result->num_rows > 0) {
            return "Username or Email already exist.";
        } else {
            //convert the password into an encrypted text
            $hashed_password = md5($password);
            //Insert the date in users table
            $sql = "INSERT INTO users(username, email, password, firstname, lastname, birthdate)
                    VALUES('$username', '$email', '$hashed_password', '$firstname', '$lastname', '$birthdate')";
            $result = $this->conn->query($sql);

            if($result == TRUE) {
                header("Location: userlist.php");
            } else {
                echo "Error:" . $this->conn->error;
            }
        }
    }

    public function getOneUser($user_id){
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $this->conn->query($sql);

        //check if there is a result
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        } else {
            echo "Error." .$this->conn->error;
        }
    }
    
    public function updateUser($user_id, $username, $email, $firstname, $lastname, $birthdate){
        //check if the username and email is in the database
        $sql = "SELECT * FROM users WHERE username='$username' AND user_id != $user_id OR email='$email' AND user_id != $user_id";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0) {
            return "Username or Email already exist.";
        } else {
            $sql = "UPDATE users SET username='$username', email='$email', firstname='$firstname',              
                    lastname='$lastname', birthdate='$birthdate' WHERE user_id = $user_id";
            $result = $this->conn->query($sql);
            if($result == FALSE){
                echo "ERROR:" . $this->conn->error;
            } else {
                header("Location: userlist.php");
            }
        }
    }

    public function deleteUser($user_id) {
        $sql = "DELETE FROM users WHERE user_id = $user_id";

        $result = $this->conn->query($sql);

        if($result == FALSE) {
            echo "Error: " . $this->conn->error;
        } else {
            header("Location: userlist.php");
        }
    }

    public function addUserPhoto($user_id, $directory, $target_file, $tmp_name){
        $target_file = date('dMYHis')."_".$user_id.str_replace(" ", "", $target_file);
        if(move_uploaded_file($tmp_name, $directory.$target_file)){
            $filename = $directory.$target_file;
            $sql = "UPDATE users SET user_image='$target_file' WHERE user_id = $user_id";
            $result = $this->conn->query($sql);

            if($result == FALSE) {
                echo "ERROR: " . $this->conn->error;
            } else {
                header("Location: userlist.php");
            }
        }
    }

    public function login($username, $password){
        $hashed_password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";

        $result = $this->conn->query($sql);

        if($result == TRUE) {
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: userlist.php");            
        } else {
            echo "Error: " . $this->conn->error;
        }
    }

}