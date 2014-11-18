<?php
    //Create server listener
    $socket = @socket_create_listen("6543") or die ("Failed to create socket!\n");

    //Used Dependencies lib
    include("Lib/RespondTime.php");
    include("Lib/RespondCommand.php");

    use Lib\RespondTime;
    use Lib\RespondCommand;

    //Crate object for RespondTime
    $responseTime =  new RespondTime(time());
    $requests = array();
	
    while (true) {
        $client = socket_accept($socket);
        $welcome = "\nWelcome to the Socket machine.\nType 'uptime' to respond how long it has been running, or \ntype 'stop' to halt the server.\nType anything it will respond revise string that you have inputed\n";
        $requests[] = socket_write($client, $welcome);

        $respondCommand = new RespondCommand($client, $responseTime);

        while (true) {

            //Get input from client
            $input = strtolower(trim(socket_read ($client, 256)));

            // If input "uptime" it would be responded how long it has been running
            if ($input == 'uptime') {
                $respondCommand->runUptime();
                continue;
            }

            //If input "clients" Respond with how many unique clients it has served since started
            if ($input == 'requests') {
                $respondCommand->runRequests($requests);
                continue;
            }

            //If input "clients" Respond with how many unique clients it has served since started
            if ($input == 'clients') {
                $respondCommand->runClients($requests);
                continue;
            }

            //If input "stop" Respond with run all command then shut it down
            if ($input == 'stop') {
                $respondCommand->runAll($requests);
                socket_close ($client);
                break 2;
            }

            $output = strrev($input) . "\n";
            socket_write($client, "respond: ".$output);
            print "Request: $input, Respond: $output\n";
        }

        socket_close ($client);
    }
    socket_close ($socket);
?>
