<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'phplibs/common.php';

class tables_oastat_web_players {
    var $mysqli;
    function __construct() {
        $app =& Dataface_Application::getInstance();
        $conf =& $app->conf();
        $this->mysqli = new mysqli($conf['_database']['host'], $conf['_database']['user'], $conf['_database']['password'], $conf['_database']['name']);
    }
    
    function section__hello(&$record){
        $playerhead = clean_modelname($record->val('headmodel'));
        return array(
            'content' => '<br/><img src="images/player_heads/128_128/'.$playerhead.'.png" alt="Picture of '.$playerhead.'"/>',
            'class' => 'main',
            'label' => 'Info',
            'order' => -1
        );
    }
    
    function section__recent_games(&$record) {
        $playerid=$record->val('playerid');
        $stmt = $this->mysqli->prepare('SELECT '.constant("recent_games_bind_result").' FROM oastat_web_scores  ows '.
'INNER JOIN oastat_web_games g ON ows.gamenumber = g.gamenumber '.
'WHERE ows.p = ? ORDER BY ows.gamenumber DESC LIMIT 10');
        $stmt->bind_param('i', $playerid );
        return recent_games($stmt);
    }
}