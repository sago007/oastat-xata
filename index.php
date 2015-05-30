<?php
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
