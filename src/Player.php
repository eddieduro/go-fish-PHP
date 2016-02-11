<?php
  class Player
  {
    private $name1;
    private $name2;

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
    function save(){
      array_push($_SESSION['games'], $this);
    }
    static function getAll(){
      return $_SESSION['games'];
    }
  }
?>
