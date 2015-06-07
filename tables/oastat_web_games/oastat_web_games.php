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
        'content' => 'Information about the game',
        'class' => 'main',
        'order' => '-1'
    );
    }
    
}