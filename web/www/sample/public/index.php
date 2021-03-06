<?php

use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;


/**
 * ルートを管理するクラス。
 * デフォルトの挙動は以下の通り。
 *
 * http://w.builwing.info/2015/04/05/phalcon%E3%81%AE%E3%83%93%E3%83%A5%E3%83%BC%E3%82%B3%E3%83%B3%E3%83%9D%E3%83%BC%E3%83%8D%E3%83%B3%E3%83%88/
 */
error_reporting(E_ALL);

define('APP_PATH', realpath('..'));



try {
    // TODO ログのテスト
    $logger = new FileAdapter("../app/logs/test.log");
    $logger->alert(
        "This is an alert"
        );



    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
