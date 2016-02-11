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
    var_dump($current_players);
    return $app['twig']->render('created_players.html.twig', array('newplayers' => $current_players));
  });


  $app->get('/current_game', function() use ($app) {
    $active_game = Game::getAll();
    $active_players = Player::getAll();
    $current_players = $active_players[0]->getPlayers();
    // $current_player2 = $active_players[0]->getName2();
    // $current_session = array($current_players);
    return $app['twig']->render('current_game.html.twig', array('game' => $current_players));
  });

  $app->get('/restart_game', function() use ($app){
    Game::restartGame();
    return $app['twig']->render('restart_game.html.twig');
  });
  return $app;
?>
