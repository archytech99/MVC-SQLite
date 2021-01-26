<?php

define('APP_PATH', __DIR__);
define('BASE_PATH', trim(__DIR__,"\\app"));
define('CONTROLLER_PATH', BASE_PATH . "/app/Controller/");
define('MODEL_PATH', BASE_PATH . "/app/Model/");
define('CONTROLLER_SPACE', "archytech99\\Controller\\");
define('MODEL_SPACE', "archytech99\\Model\\");
define('APP_NAME', config('APP_NAME'));
define('SQLITE_FILE', BASE_PATH.'/app/Dbase/phpsqlite.db');
