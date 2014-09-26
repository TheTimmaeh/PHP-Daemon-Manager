<?php

  #Display all errors, output gets stored in log file
  error_reporting('E_ALL');

  #Read Deamon configuration file
  $daemons = parse_ini_file('daemons.ini', true);

  #Define path to 'service'
  $service = '/usr/sbin/service';

  #Loop through Daemons found in configuration file
  foreach($daemons as $daemon => $config){

    #Check whether Daemon controller exists
    if(file_exists("/etc/init.d/{$daemon}")){

      #Get the status of the Daemon
      $status = shell_exec("{$service} {$daemon} status");

      #Start Daemon, if not running, but enabled in configuration file
      if(trim($status) != 'Online' && $config['enabled']) shell_exec("{$service} {$daemon} start");

      #Stop Daemon, if running, but disabled in configuration file
      else if(trim($status) == 'Online' && !$config['enabled']) shell_exec("{$service} {$daemon} stop");

    }

  }

?>
