<?php

use Core\Session;

Session::destroy();

header('location: /login');
exit();