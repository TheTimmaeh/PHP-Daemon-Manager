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

Open your shell and download the setup file using  
```
wget https://raw.githubusercontent.com/Timmaeh/PHP-Daemon-Manager/master/setup
```
 
  
  
Execute setup with  
```
bash setup
```
and follow the instructions.  
The setup will install all the neccessary services and it create all directories and files including a sample daemon. It will also set up the checking cronjob.
 
 
 
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
