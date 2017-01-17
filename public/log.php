<?php

require_once __DIR__ . '/../app/autoload.php';

use Server\Log;

if (isset($_GET['act']) && $_GET['act'] == 'clear') {
    Log::clear();

    header('Location: /log.php');
}

$data = Log::load();
preg_match_all('#^([0-9\-]{1,4}\-[0-9\-]{1,2}\-[0-9\-]{1,2} [0-9\-]{1,2}\:[0-9\-]{1,2}:[0-9\-]{1,2})$#misu', $data, $matches);

$count = isset($matches[1]) ? sizeof($matches[1]) : 0;
$data_create = isset($matches[1][0]) ? $matches[1][0] : 'undefined';
$data_update = isset($matches[1][0]) ? end($matches[1]) : 'undefined';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log from <?php echo $data_create; ?> to <?php echo $data_update; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-type">
    <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport">
    <meta charset="UTF-8">
</head>
<body>
    Length: <b><?php echo strlen($data); ?></b>
    Count: <b><?php echo $count; ?></b>
    <a href="/log.php?act=clear">Clear</a><br>
    Date create: <b><?php echo $data_create; ?></b><br>
    Date update: <b><?php echo $data_update; ?></b>
    <hr>
    <pre><?php echo $data; ?></pre>
</body>
</html>