<?php

/*
Default sorts
*/
if ( !isset($_REQUEST['-sort']) and (!isset($_REQUEST['-table']) or @$_REQUEST['-table'] == 'oastat_web_games') ){
    $_REQUEST['-sort'] = $_GET['-sort'] = 'time DESC';
}

if ( !isset($_REQUEST['-sort']) and @$_REQUEST['-table'] == 'oastat_web_maplist' ){
    $_REQUEST['-sort'] = $_GET['-sort'] = 'c DESC';
}

if ( !isset($_REQUEST['-sort']) and @$_REQUEST['-table'] == 'oastat_web_kills_by_weapon' ){
    $_REQUEST['-sort'] = $_GET['-sort'] = 'c DESC';
}

/**
 * File: index.php
 * Description:
 * -------------
 *
 * This is an entry file for this Dataface Application.  To use your application
 * simply point your web browser to this file.
 */
require_once '../xataface-2.1.2/public-api.php';
df_init(__FILE__, 'http://oastat.poulsander.com/xataface-2.1.2')->display();

