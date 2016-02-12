<?php
  class Player
  {
    private $name1;
    private $name2;
    private $cards;
    private $score1 = 0;
    private $score2 = 0;

    function setName1($new_player1){
      $this->name1 = $new_player1;
    }
    function getName1(){
      return $this->name1;
    }

    function setName2($new_player2){
      $this->name2 = $new_player2;
    }
    function getName2(){
      return $this->name2;
    }

    function setCards($new_card){
      $this->cards = $new_card;
    }

    function getCards(){
      return $this->cards;
    }

    function setScore1($new_score1){
      $this->score = $new_score1;
    }

    function getScore1(){
      return $this->score1;
    }

    function setScore2($new_score2){
      $this->score = $new_score2;
    }

    function getScore2(){
      return $this->score2;
    }

    function save(){
      array_push($_SESSION['games'], $this);
    }
    static function getAll(){
      return $_SESSION['games'];
    }
  }
?>
