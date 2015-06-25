<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tables_oastat_web_players {
    var $mysqli;
    function __construct() {
        $app =& Dataface_Application::getInstance();
        $conf =& $app->conf();
        $this->mysqli = new mysqli($conf['_database']['host'], $conf['_database']['user'], $conf['_database']['password'], $conf['_database']['name']);
    }
    
    function section__recent_games(&$record) {
        $playerid=$record->val('playerid');
        $stmt = $this->mysqli->prepare('SELECT ows.gamenumber, g.mapname FROM oastat_web_scores  ows '.
'INNER JOIN oastat_web_games g ON ows.gamenumber = g.gamenumber '.
'WHERE ows.p = 938 ORDER BY ows.gamenumber DESC LIMIT 10');
        $stmt->bind_param('i', $playerid );
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
}