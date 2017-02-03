<?php

$url = 'https://' . $_SERVER['HTTP_HOST'] . '/';            // Get the server//

$col = 'kdnp/';

header('Location: ' . $url . $col, true, 301);              // Use either 301 or 302//

?>
