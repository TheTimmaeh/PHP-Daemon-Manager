PHP-Daemon-Manager
==================

Lets you manage PHP daemons using start-stop-daemon.  
 
 
 
Requirements
============

PHP-Daemon-Manager is written in PHP and has been tested on Debian 7 32bit.  
  
  
It requires the following services:  
php5-common php5-cli service start-stop-daemon  
 
 
 
Setup
=====

Open your shell and execute the following commands:  
```
sudo apt-get update
sudo apt-get install php5-common php5-cli service start-stop-daemon
```
 
Copy all files to a specific direction. Personally I'm using the /daemon/ folder.  
  
  
Check pathes for 'start-stop-daemon' and 'php5' with  
```
which start-stop-daemon
which php5
```
and fix the pathes in controller/mydaemon or whatever you call it.  
  
  
Create symlink with  
```
ln -s /daemons/controller/mydaemon /etc/init.d/mydaemon
```
  
  
Check path for 'service' with  
```
which service
```
and fix the path in check.php  
  
  
Edit the cronjob file with  
```
crontab -e
```
and enter  
```
* * * * * /usr/bin/php5 -f /daemons/check.php
```
to check whether the daemons are running once every minute.  
  
Remember to fix the pathes to php5 and your check.php  
 
 
 
Controller
==========

To control the daemons you can either use the daemons.ini or control the daemons by shell commands.  
 
 
**daemons.ini:**
Create a section for the daemon and add the attribute 
```
enabled = 1
```
to control the daemon with the checking cronjob.  
  
enabled = 1 starts the daemon  
enabled = 0 stops the daemon  
 
 
**Shell commands:**
To control the daemon by shell commands, use 
```
service mydaemon [start|stop|status|restart]
```
 
 
Remember: You can't do both. An enabled = 1 will always start the deamon, even when stopped by shell command.  
Also remember to use the name of your daemon instead of mydaemon.
