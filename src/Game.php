<?php
  class Game
  {
    private $deck;
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
