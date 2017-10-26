<?php

class Article {
    
    public $userid;
    public $username;
    public $title;
    public $category;
    public $text;
    public $date;
    public $comments;
    public $tags; 
    
    function __construct($userid,$username,$title, $category, $text, $date, $comments, $tags) {
        $this->userid = $userid;
        $this->username = $username;
        $this->title = $title;
        $this->category = $category;
        $this->text = $text;
        $this->date = $date;
        $this->comments = $comments;
        $this->tags = $tags;
        
    }
    
    function getUserid() {
        return $this->userid;
    }

    function getUsername() {
        return $this->username;
    }

    function getTitle() {
        return $this->title;
    }

    function getCategory() {
        return $this->category;
    }

    function getText() {
        return $this->text;
    }

    function getDate() {
        return $this->date;
    }
    
    function getComments() {
        return $this->comments;
    }
    
    function getTags() {
        return $this->tags;
    }

    function setUserid($userid) {
        $this->userid = $userid;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

    //fucntion to check the length of article text displayed on home page
    function displayTextLength($displayText)
    {
        if(strlen($displayText) > 140)
        {
            $remove = strlen($displayText) - 140;
            $len = strlen($displayText) - $remove;
            $displayText = substr($displayText, 0, $len);
            
        }
            return $displayText;
    }

    
    
}
