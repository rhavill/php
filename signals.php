<?php
// tick use required as of PHP 4.3.0
//declare(ticks = 100);

// signal handler function
function sig_handler($signo)
{

     switch ($signo) {
         case SIGINT:
             // handle shutdown tasks
             echo "Caught SIGINT...\n";
             exit;
             break;
         case SIGTERM:
             // handle shutdown tasks
             echo "Caught SIGTERM...\n";
             exit;
             break;
         case SIGHUP:
             // handle restart tasks
             echo "Caught SIGHUP...\n";
             break;
         case SIGUSR1:
             echo "Caught SIGUSR1...\n";
             break;
         default:
             // handle all other signals
     }

}

echo "Installing signal handler for process ".posix_getpid()."...\n";

// setup signal handlers
pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP,  "sig_handler");
pcntl_signal(SIGUSR1, "sig_handler");
pcntl_signal(SIGINT, "sig_handler");

// or use an object, available as of PHP 4.3.0
// pcntl_signal(SIGUSR1, array($obj, "do_something"));


// send SIGUSR1 to current process id
//echo"Generating signal SIGTERM to self...\n";
//posix_kill(posix_getpid(), SIGUSR1);
$count = 0;
while (1) {
    $count++;
    if ($count % 1000 == 0) {
        pcntl_signal_dispatch();
    }
}
