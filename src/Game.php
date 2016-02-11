<?php
  class Game
  {
    private $deck;
    private $players;
    private $score = 0;

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

    static function restartGame(){
      $_SESSION['games'] = array();
    }

}
?>
