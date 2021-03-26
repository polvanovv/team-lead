<?php

declare(strict_types=1);

use App\App;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

(function () {
    $app = new App();
    $app->run();
})();

