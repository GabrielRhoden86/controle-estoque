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

        $streamHandler = new StreamHandler(__DIR__."/log.log", Logger::DEBUG);
        $lineFormatter = new LineFormatter("[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n", "Y-m-d H:i:s");
        $streamHandler->setFormatter($lineFormatter);

        $this->logger->pushHandler($streamHandler);

        $this->logger->pushProcessor(function ($record) {
            //$record["extra"]["SERVER"] = $_SERVER;
            $record["extra"]["HTTP_HOST"] = $_SERVER["HTTP_HOST"];
            //$record["extra"]["OPENSSL_CONF"] = $_SERVER["OPENSSL_CONF"];
            //$record["extra"]["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
            $record["extra"]["REQUEST_METHOD"] = $_SERVER["REQUEST_METHOD"];
            //$record["extra"]["HTTP_USER_AGENT"] = $_SERVER["HTTP_USER_AGENT"];
            return $record;
        });
    }

    //depuração 
    public function logDebug($message)
    {
        $this->logger->debug($message);
    }
    
    //confirmam que as coisas estão funcionando como esperado.
    public function logInfo($message)
    {
        $this->logger->info($message);
    }

    //registrar eventos que são de interesse durante a execução normal, mas não indicam um problema.
    public function logNotice($message, )
    {
        $this->logger->notice($message);
    }

    // para registrar uma tentativa de login mal sucedida.
    public function logWarning($message)
    {
        $this->logger->warning($message);
    }

    //para registrar um erro de conexão com o banco de dados.
    public function logError($message)
    {
        $this->logger->error($message);
    }

    //para registrar um serviço(function) que está indisponível.
    public function logCritical($message)
    {
        $this->logger->critical($message);
    }

    //para registrar um erro crítico que precisa ser corrigido imediatamente. que indisponibiliza o serviço
    public function logAlert($message)
    {
        $this->logger->alert($message);
    }
}
