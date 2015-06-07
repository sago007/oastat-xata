<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tables_oastat_web_maplist {
    function section__hello(&$record){
        return array(
            'content' => '<img src="images/oa640x400/'.$record->val('mapname').'.jpg" alt="Levelshot from '.$record->val('mapname').'"/>',
            'class' => 'main',
            'label' => 'Level shot',
            'order' => -1
        );
    }
}