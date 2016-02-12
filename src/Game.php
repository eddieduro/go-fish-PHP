<?php
  class Game
  {
    private $deck;
    private $players;
    private $score1 = 0;
    private $score2 = 0;

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

    function setScore1($new_score1){
      $this->score1 = $new_score1;
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

    static function restartGame(){
      $_SESSION['games'] = array();
    }

}
?>
