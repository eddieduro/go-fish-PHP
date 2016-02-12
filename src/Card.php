<?php
  class Card
  {
    private $score;
    private $description;

    function __contruct($score, $description){
      $this->score = $score;
      $this->description = $description;
    }
    function setScore($new_score){
      $this->score = $new_score;
    }

    function getScore(){
      return $this->score;
    }

    function setDescription($new_description){
      $this->description = $new_description;
    }

    function getDescription(){
      return $this->description;
    }
    function save(){
      array_push($_SESSION['games'], $this);
    }
    function draw($card){
      $this->score = $card;
    }
  }
?>
