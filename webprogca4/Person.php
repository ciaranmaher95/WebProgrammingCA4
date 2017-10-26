<?php

class Person {
    
    public $name;
    public $dob;
    public $email;
    public $username;
    public $password;
    
    function __construct($name, $dob, $email, $username, $password) 
    {
        $this->name = $name;
        $this->dob = $dob;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
    
     function getName() {
        return $this->name;
    }

    function getDob() {
        return $this->dob;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDob($dob) {
        $this->dob = $dob;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    //function to check for duplicate usernames or emails
    function duplicates($newUser, $newEmail,$usernames,$emailaddresses)
    {
        foreach($usernames as $username)
        {
            if($newUser == $username)
            {
                $namemessage = "Username is already taken";
                break;
            }
            else
            {
                $namemessage = null;
            }
        }
        
        foreach($emailaddresses as $emailaddress)
        {
            if($newEmail == $emailaddress)
            {
                $emailmessage = "Email is already taken";
                break;
            }
            else
            {
                $emailmessage = null;
            }
            
        }
        $messages = array();
        array_push($messages,$namemessage,$emailmessage);
        return $messages;
    }

    //regex validation for sign up form
    function validation($name,$email,$password)
    {
        if(preg_match('/^[A-Za-z ]{3,20}$/',$name))
        {
            $name = 'valid';
        }
        else 
        {
            $name = 'invalid';
        }
        if(preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i',$email))
        {
            $email = 'valid';
        }
        else 
        {
            $email = 'invalid';
        }
        if(preg_match(' /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/',$password))
        {
            $password = 'valid';
        }
        else 
        {
            $password = 'invalid';
        }
        $messages = array();
        array_push($messages,$name,$email,$password);
        return $messages;
    }


    function capitalizeName($name) {


    $split = explode(" ", $name);
    $firstName = $split[0];
    $capitalFirst = ucwords(strtolower($firstName));
    $secondName = $split[1];
    $capitalSecond = ucwords(strtolower($secondName));
    if (strpos($capitalSecond, 'Mc') === 0) {
        $capitalSecond = 'Mc' . ucwords(substr($secondName, 2, strlen($secondName)));
    }


    return $capitalFirst . " " . $capitalSecond;
}

}