<?php

$date = new DateTime();
$my_time = $date->format('H:i:s');
$team1 = Array('Misha', 'Sasha', 'Zhenya');
$team2 = Array('Yana', 'Pasha', 'Tanya');
$events = Array('goal', 'free kick', 'penalty', '');

$players = Array('Misha', 'Sasha', 'Zhenya', 'Yana', 'Pasha', 'Tanya',);


$goals1 = 0;
$goals2 = 0;

$player1 = $team1[array_rand($team1)];
$player2 = $team2[array_rand($team2)];
$player = $players[array_rand($players)];
$team = in_array($player, $team1) ? 'left_team' : 'right_team';
$event = $events[array_rand($events)];



echo "<tr>
        <td>$my_time</td>
        <td>$team</td>
        <td>$player</td>
        <td>$event</td>
    </tr>";