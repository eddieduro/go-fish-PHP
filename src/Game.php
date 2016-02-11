<?php
  class Game
  {
    private $cards;
    // private $pool;
    // private $turn;
    private $players;

    function getCards(){
      return $this->cards;
    }
    function getTurn(){
      return $this->turn;
    }
    function setPlayers($new_players){
      $this->players = $new_players;
    }
    function getPlayers(){
      return $this->players;
    }
    function setCards(){
      $this->cards = rand(1, 10);
    }

    function save(){
      array_push($_SESSION['games'], $this);
    }

    static function getAll(){
      return $_SESSION['games'];
    }

    static function restartGame(){
      $_SESSION['games'] = array();
    }

}
?>
