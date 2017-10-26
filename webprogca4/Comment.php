<?php


class Comment {
    
    public $comment;
    public $date;
    public $userid; 
    public $username;
    public $votes;
    
    function __construct($comment, $date, $userid, $username) 
    {
        $this->comment = $comment;
        $this->date = $date; 
        $this->userid = $userid;
        $this->username = $username;
        $this->votes = 0;
        
    }
    
    function __destruct() {
        
    }
  
    function getComment() {
        return $this->comment;
    }
    
    function getDate() {
        return $this->date;
    }

    
    function getUserid() {
        return $this->userid;
    }

    function getUsername() {
        return $this->username;
    }
    
    function getVotes() {
        return $this->votes;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }
    
    function setDate($date) {
        $this->date = $date;
    }

    
    function setUserid($userid) {
        $this->userid = $userid;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setVotes($votes) {
        $this->votes = $votes;
    }

    //function to check comment for prohibited words
    function validate($comment, $words) 
    {
        foreach($words as $word) 
        {
            if (strpos(strtolower($comment), $word) !== false) 
            {
               $prohibited = true; 
               break;
            } 
            else 
            {
               $prohibited = false;
            }
        }
        return $prohibited; 
    }
    
}