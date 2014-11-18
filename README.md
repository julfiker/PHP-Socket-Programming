PHP-Socket-Programming
======================

This is php socket programming example. In fact I have written this script solving following problem. I got it from client. I never done any script before related socket programming. Today I had some study and made this script. I enjoyed a lot to do this things.

The problem:
------------
Write a server that listens on port 6543 and is designed to run forever.
The server must accept plain text commands (ended by the \n character) and reply with plain text (ended by the \n character).
- Accept the following commands (be case-insensitive):
    a) "UPTIME"   => the server must respond with how long it's been running
    b) "REQUESTS" => the server must respond with how many requests it has served since started (1 request = 1 command received)
    c) "CLIENTS"  => the server must respond with how many unique clients it has served since started (1 client = 1 IP address)
    d) "STOP"     => the server must respond to the a) b) and c) commands, then shut down
- Ignore any other command silently


How to run this script
----------------------
1. Dont run it by http on browser
2. Use only command line. 
3. Change permission to make it executable, permission command is "sudo chmod a+x SocketCli.php"
4. Open a terminal, run command in the terminal "php -q SocketCli.php", dont close this terminal
5. Open another terminal run "telnet localhost 6543"
6. Thats it :).


Contact information
---------------------
You can contact me if you need anything regarding any kind of programming issue. I am enjoying Programing as a learner.

Email: infro.jewel@gmail.com

More information
----------------
Just visit following link

http://julfikerbd.wordpress.com/


Enjoy!

