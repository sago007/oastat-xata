<?php

/**
 * File: index.php
 * Description:
 * -------------
 *
 * This is an entry file for this Dataface Application.  To use your application
 * simply point your web browser to this file.
 */


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

/*
The site specific data is stored in index.xata.php
See index.xata.php.sample for a sample
*/
include 'index.xata.php';

