<?php

date_default_timezone_set('Europe/Ljubljana');


$path_classes = 'classes';

require_once $path_classes.DIRECTORY_SEPARATOR.'cli.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'console.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'controller.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'parameters.php';

require_once $path_classes.DIRECTORY_SEPARATOR.'programs/programs.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'programs/time.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'programs/hash.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'programs/db.php';
require_once $path_classes.DIRECTORY_SEPARATOR.'programs/cg.php';


new Console();

