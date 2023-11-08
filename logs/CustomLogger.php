<?php

namespace Logs\CustomLogger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
require __DIR__ . "/../vendor/autoload.php";


date_default_timezone_set('America/Sao_Paulo');

class CustomLogger
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger("web");

        $streamHandler = new StreamHandler("log.txt", Logger::DEBUG);
        $lineFormatter = new LineFormatter("[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n", "Y-m-d H:i:s");
        $streamHandler->setFormatter($lineFormatter);

        $this->logger->pushHandler($streamHandler);

        $this->logger->pushProcessor(function ($record) {
            //$record["extra"]["SERVER"] = $_SERVER;
            $record["extra"]["HTTP_HOST"] = $_SERVER["HTTP_HOST"];
            $record["extra"]["OPENSSL_CONF"] = $_SERVER["OPENSSL_CONF"];
            $record["extra"]["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
            $record["extra"]["REQUEST_METHOD"] = $_SERVER["REQUEST_METHOD"];
            $record["extra"]["HTTP_USER_AGENT"] = $_SERVER["HTTP_USER_AGENT"];
            return $record;
        });
    }

    // caso seja necessário algum argumento a mais   
    //  public function logDebug($message, $context= [])
    //     {
    //         $this->logger->debug($message, $context);
    //     }

    public function logDebug($message)
    {
        $this->logger->debug($message);
    }
    
    public function logInfo($message)
    {
        $this->logger->info($message);
    }

    public function logNotice($message, )
    {
        $this->logger->notice($message);
    }

    public function logWarning($message)
    {
        $this->logger->warning($message);
    }

    public function logError($message)
    {
        $this->logger->error($message);
    }

    public function logCritical($message)
    {
        $this->logger->critical($message);
    }

    public function logAlert($message)
    {
        $this->logger->alert($message);
    }
}
