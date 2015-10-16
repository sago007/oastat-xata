<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('recent_games_bind_result', 'g.gamenumber, g.mapname');

/**
 * Lists a list of recent games
 * @param type $stmt A statement that is ready to execure and must return gamenumber, mapname
 * @return type An array iof content for xataface
 */
function recent_games(&$stmt) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($gamenumber, $mapname);
    $content = 'Recent games: <br/><table>';
    $content .= '<tr><td>Game</td><td>Map</td></tr>';
    while($stmt->fetch()) { 
        $content .= '<tr><td><a href="index.php?-table=oastat_web_games&-action=browse&-recordid=oastat_web_games%3Fgamenumber%3D'.$gamenumber.'">'.$gamenumber.'</a></td><td>'.$mapname.'</td></tr>';
    }
    $content .= '</table>';
    return array(
        'content' => $content,
        'class' => 'main',
        'label' => 'Recent games',
        'order' => 2
    );
}