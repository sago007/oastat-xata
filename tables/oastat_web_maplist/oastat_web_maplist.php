<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tables_oastat_web_maplist {
    var $mysqli;
    function __construct() {
        $app =& Dataface_Application::getInstance();
        $conf =& $app->conf();
        $this->mysqli = new mysqli($conf['_database']['host'], $conf['_database']['user'], $conf['_database']['password'], $conf['_database']['name']);
    }
    
    function section__hello(&$record){
        return array(
            'content' => '<img src="images/oa640x400/'.$record->val('mapname').'.jpg" alt="Levelshot from '.$record->val('mapname').'"/>',
            'class' => 'main',
            'label' => 'Level shot',
            'order' => -1
        );
    }
    
    function section__recent_games(&$record) {
        $mapname=$record->val('mapname');
        $stmt = $this->mysqli->prepare('SELECT g.gamenumber FROM '.
'oastat_web_games g '.
'WHERE g.mapname = ? ORDER BY g.gamenumber DESC LIMIT 10');
        $stmt->bind_param('s', $mapname );
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($gamenumber);
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