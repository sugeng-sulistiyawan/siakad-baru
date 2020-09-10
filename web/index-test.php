<?php

/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2020
 */

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

defined('BASE_PATH') or define('BASE_PATH', dirname(__DIR__));
defined('VENDOR_PATH') or define('VENDOR_PATH', BASE_PATH . '/vendor');

require VENDOR_PATH . '/autoload.php';

// getenv()
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require VENDOR_PATH . '/yiisoft/yii2/Yii.php';
require BASE_PATH . '/config/bootstrap.php';

require BASE_PATH . '/config/test.php';

(new yii\web\Application($config))->run();
