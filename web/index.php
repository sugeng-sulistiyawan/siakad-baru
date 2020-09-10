<?php

/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2020
 */

defined('BASE_PATH') or define('BASE_PATH', dirname(__DIR__));
defined('VENDOR_PATH') or define('VENDOR_PATH', BASE_PATH . '/vendor');

require VENDOR_PATH . '/autoload.php';

// getenv()
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', $_ENV['DEBUG'] == 'true');
defined('YII_ENV') or define('YII_ENV', $_ENV['ENV']);

require VENDOR_PATH . '/yiisoft/yii2/Yii.php';
require BASE_PATH . '/config/bootstrap.php';

require BASE_PATH . '/config/web.php';

(new yii\web\Application($config))->run();
