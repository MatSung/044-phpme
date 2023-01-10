<?php

// Panaudojus "Execution operator" parodykite opėracinės sistemos informaciją, kurioje veikia PHP

$info = `cat /etc/os-release`;

echo $info;