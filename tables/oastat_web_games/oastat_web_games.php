<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tables_oastat_web_games {
    
    function getTitle(&$record){
		return 'Game '.$record->val('gamenumber').' on '.$record->val('mapname').' at '.$record->getValueAsString('time');
	}
    
    function section__hello(&$record){
    return array(
        'content' => 'Information about the game'.'<br/><img src="images/oa640x400/'.$record->val('mapname').'.jpg" alt="Levelshot from '.$record->val('mapname').'"/>',
        'class' => 'main',
        'label' => 'Info',
        'order' => -1
    );
    }
    
    function section__scores(&$record) {
        $app =& Dataface_Application::getInstance();
        $conf =& $app->conf();
        $mysqli = new mysqli($conf['_database']['host'], $conf['_database']['user'], $conf['_database']['password'], $conf['_database']['name']);
        $gamenumber=$record->val('gamenumber');
        $stmt = $mysqli->prepare('SELECT p, nick, s FROM oastat_web_scores WHERE gamenumber = ? ORDER BY s DESC');
        $stmt->bind_param('i', $gamenumber );
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($playerid, $nick, $score);
        $content = 'Scores: <br/><table>';
        while($stmt->fetch()) { 
            $content .= '<tr><td><a href="index.php?-table=oastat_web_players&-action=browse&-recordid=oastat_web_players%3Fplayerid%3D'.$playerid.'">'.$nick.'</a></td><td>'.$score.'</td></tr>';
        }
        $content .= '</table>';
        return array(
            'content' => $content,
            'class' => 'main',
            'label' => 'Scores',
            'order' => 1
        );
    }
    
}