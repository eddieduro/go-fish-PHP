<?php
  class Player
  {
    private $name1;
    private $name2;
    private $cards = array(1,2,3,4,5,6,7,8,9,10);
    private $score = 0;

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

    function setScore($new_score){
      $this->score = $new_score;
    }

    function getScore(){
      return $this->score;
    }

    function save(){
      array_push($_SESSION['games'], $this);
    }
    static function getAll(){
      return $_SESSION['games'];
    }
  }
?>
