#Oastat-xata

This is one of many attempts of finding a good way to present statistics. This uses Xataface for the job. Looks promesing

##Demo

To see the interface in use go to: http://oastat.poulsander.com/oastat-xata/ 

##License

GPL v2 or any later version

##Requirements

1. A working xataface 2.1.2 installation. 
2. A working installation of oastat installation using a mySQL database.

##Installation

Currently it is not that easy to install. It can be done using the following procedure:

  * Clone oastat-xata from github.
  * Install xataface 2.1.2 on your server.
  * Install oastat (https://github.com/sago007/oastat) and set it to use mysql. Assuming the database is called "oastat"
  * Create a new database called oastat_xata on the same server. Execute the create_views.sql on this server. The views refer to the "oastat"-database.
  * Create a user that has at least SELECT access to oastat and full access to oastat_xata. 

  * Copy conf.db.ini.sample to conf.db.ini and adjust conf.db.ini: The [_database] section must match the login information to oastat_xata database.
  * Copy index.xata.php.sample to index.xata.php ad adjust index.xata.php: The two last lines must match the path to the xataface 2.1.2 installation. 
    * The second to last line must point to the local location of xataface-2.1.2. Be default it is assumed to be on the same level as the oastat-xata installation.
    * The last line must point to the web assessible location of xataface-2.1.2. 

##Updating


  * Check permissions of files. The php files should usually have 644 permissions but are sometimes created with 664
  * Execute create_views.sql again (mysql oastat_xata < create_views.sql)


