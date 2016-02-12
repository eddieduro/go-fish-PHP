<?php
  class Card
  {
    private $score;
    private $description;

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
  }
?>
card class
->score
->desc

$cardOne = new Card(rand(1,10), firstcard);
$cardOne->save();

$allCards = array($cardOne....)

$allCards[0];

draw()
if (card.getDesc == firstcard) {
  card.drawNewCard()
