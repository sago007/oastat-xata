<?php


require_once 'phplibs/common.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tables_oastat_web_games {
    
    var $mysqli;
    function __construct() {
        $app =& Dataface_Application::getInstance();
        $conf =& $app->conf();
        $this->mysqli = new mysqli($conf['_database']['host'], $conf['_database']['user'], $conf['_database']['password'], $conf['_database']['name']);
    }
    
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
        
        $gamenumber=$record->val('gamenumber');
        $stmt = $this->mysqli->prepare('SELECT p, nick, s, headmodel FROM oastat_web_scores WHERE gamenumber = ? ORDER BY s DESC');
        $stmt->bind_param('i', $gamenumber );
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($playerid, $nick, $score, $headmodel_raw);
        $content = 'Scores: <br/><table>';
        $content .= '<tr><td/><td>Player</td><td>Score</td></tr>';
        while($stmt->fetch()) { 
            $headmodel = get_headmodel_that_exsists($headmodel_raw);
            $content .= '<tr><td><img src="images/player_heads/128_128/'.$headmodel.'.png" alt="'.$headmodel.'"/></td><td><a href="index.php?-table=oastat_web_players&-action=browse&-recordid=oastat_web_players%3Fplayerid%3D'.$playerid.'">'.$nick.'</a></td><td>'.$score.'</td></tr>';
        }
        $content .= '</table>';
        return array(
            'content' => $content,
            'class' => 'main',
            'label' => 'Scores',
            'order' => 1
        );
    }
    
    function section__weapons(&$record) {
        $gamenumber=$record->val('gamenumber');
        $stmt = $this->mysqli->prepare('SELECT k.w, v.keyvalue, k.c FROM oastat_web_kills_by_weapon_gamenumber k INNER JOIN oastat_web_valuelists v ON v.keyid = k.w WHERE k.gamenumber = ? AND v.typename = \'weapon\' ORDER BY c DESC');
        $stmt->bind_param('i', $gamenumber );
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($weapon_number, $weapon, $kills);
        $content = 'Kills by weapon: <br/><table>';
        $content .= '<tr><td>Weapon</td><td>Kill count</td></tr>';
        while($stmt->fetch()) { 
            $content .= '<tr><td>'.$weapon.'</td><td>'.$kills.'</td></tr>';
        }
        $content .= '</table>';
        return array(
            'content' => $content,
            'class' => 'main',
            'label' => 'Kills by weapon',
            'order' => 2
        );
    }
    
}