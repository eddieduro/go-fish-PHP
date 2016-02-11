<?php
  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/Game.php';
  require_once __DIR__.'/../src/Player.php';

  session_start();
  if(empty($_SESSION['games'])) {
    $_SESSION['games'] = array();
  }

  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider, array(
    'twig.path'=> __DIR__.'/../views'
  ));

  $app->get('/', function () use ($app){
    return $app['twig']->render('go_fish.html.twig', array('games' => Game::getAll()));
  });

  $app->get('/add_players', function() use ($app) {
    return $app['twig']->render('add_players.html.twig');
  });

  $app->post('/created_players', function() use ($app) {
    $new_game = new Game();
    $new_players = new Player();
    $player1 = $_POST['player1'];
    $player2 = $_POST['player2'];
    $new_players->setName1($player1);
    $new_players->setName2($player2);
    $new_game->setPlayers($new_players);
    $current_players = $new_game->getPlayers();
    $new_game->save();
    $new_players->save();

    return $app['twig']->render('created_players.html.twig', array('newplayers' => $current_players));
  });

  $app->get('/add_player_one_cards', function () use ($app) {
    return $app['twig']->render('add_player_one_cards.html.twig');
  });



  $app->post('/player_one_hand', function() use ($app) {
    $active_game = Game::getAll();
    $active_players = Player::getAll();
    $current_players = $active_players[0]->getPlayers();
    $cards = $current_players->getCards();
    $current_hand = array();
    
    for($i = 0; $i <= 5; $i++){
      array_push($current_hand,rand(1,10));
    }

    return $app['twig']->render('player_one_hand.html.twig', array('player_one_cards' => $current_hand, 'games' => $current_players));
  });

  $app->get('/add_player_two_cards', function () use ($app) {
    return $app['twig']->render('add_player_two_cards.html.twig');
  });

  $app->post('/player_two_hand', function() use ($app) {
    $active_game = Game::getAll();
    $active_players = Player::getAll();
    $current_players = $active_players[0]->getPlayers();
    $current_score = $active_players[0]->getScore();
    $cards = $current_players->getCards();
    $current_hand = array();
    $draw = array();

    for($i = 0; $i <= 5; $i++){
      array_push($current_hand,rand(1,10));
    }

    if($current_hand[0] == $current_hand[1] && $current_hand[0] == $current_hand[2] && $current_hand[0] == $current_hand[3]){
      $current_players[0]->setScore($current_score + 1);
    }
    return $app['twig']->render('player_two_hand.html.twig', array('player_two_cards' => $current_hand, 'games' => $current_players));
  });
  $app->get('/current_game', function() use ($app) {
    $active_game = Game::getAll();
    $active_players = Player::getAll();
    $current_players = $active_players[0]->getPlayers();
    $cards = $current_players->getCards();
    $current_hand = array();

    for($i = 0; $i <= 5; $i++){
      array_push($current_hand,rand(1,10));
    }
    return $app['twig']->render('current_game.html.twig', array('games' => $current_players));
  });

  $app->get('/restart_game', function() use ($app){
    Game::restartGame();
    return $app['twig']->render('restart_game.html.twig');
  });
  return $app;
?>
