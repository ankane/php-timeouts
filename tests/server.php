<?php

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($sock, '127.0.0.1', 4567);
socket_listen($sock, 5);

echo 'Ready for connections (use another window to run tests)...' . "\n";

while (true) {
    $msgsock = socket_accept($sock);
    sleep(2);
    socket_close($msgsock);
}
