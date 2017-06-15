<?php

require 'config/paths.php';

// require 'repository/database.php';
require 'repository/db_config.php';
require 'repository/database.php';

// use auto loader

require 'libs/bootstrap.php';
require 'libs/controller.php';
require 'libs/model.php';
require 'libs/view.php';
require 'libs/functions.php';
require 'libs/session.php';
require 'libs/pagination.php';


$app = new Bootstrap();

?>