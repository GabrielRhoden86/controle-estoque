<?php

namespace App\Model;
use App\Model\ClassConexao;
use Logs\CustomLogger\CustomLogger;
require_once __DIR__ . '/../../logs/CustomLogger.php';

use Exception;

class ClassProduto extends ClassConexao
{
    private $dB;

    protected function create($descricao, $valor_produto, $estoque)
    {
        $id = 0;

        try {
            $this->dB = $this->conexaoDb()->prepare("INSERT into produto values(:id, :descricao, :valor_produto, :estoque)");

            $this->dB->bindParam(":id", $id, \PDO::PARAM_INT);
            $this->dB->bindParam(":descricao", $descricao, \PDO::PARAM_STR);
            $this->dB->bindParam(":valor_produto", $valor_produto, \PDO::PARAM_STR);
            $this->dB->bindParam(":estoque", $estoque, \PDO::PARAM_STR);
            $this->dB->execute();
        } catch (Exception $e) {

            $msgStatus = __FUNCTION__ . ' - ' . $e;
            $acao = get_class($this);
            echo $msgStatus . ' - ' . $acao;

            //$LogController->gravarLog($msgStatus, $acao);

            $item = array(
                "status" => '403',
                "msg" => $acao . ':' . $msgStatus,
                "result" => array(),
                "linhas" => 0
            );

            $res = json_encode($item);

            return $res;
        }
    }

    public function read($id, $descricao, $valor_produto, $estoque)
    {
        $customLogger = new CustomLogger();

        try {
            $Bfetch = $this->dB = $this->conexaoDb()->prepare("SELECT productCode, productName, productLine, productDescription FROM classicmodels.products");
            $Bfetch->execute();

            //Recupera as linhas via fetchAll
            $result = $Bfetch->fetchAll();

            //Quantas linhas retornaram
            $linhas = $Bfetch->rowCount();

            $dados = array();

            if ($linhas > 0) {
                foreach ($result as $row) {
                    $item = [
                        "productCode" => $row[0],
                        "productName" => $row[1],
                        "productLine" => $row[2],
                        "productDescription" => $row[3],
                    ];

                    $dados[] = $item;
                }

                $items = [
                    "status" => "200",
                    "msg" => "OK",
                    "result" => $dados,
                    "linhas" => $linhas
                ];

                $customLogger->logDebug("Listagem função read");
                
                return json_encode($items);
            }
        } catch (Exception $e) {

            $msgStatus = __FUNCTION__ . ' - ' . $e->getMessage();
            $acao = get_class($this);

            $item = [
                "status" => '403',
                "msg" => $acao . ':' . $msgStatus,
                "result" => array(),
                "linhas" => 0
            ];

            $customLogger->logError("ERROR: " .  $msgStatus.' - '.$acao);
            
            $response = json_encode($item);
            return $response;
        }
    }

    public function update($id, $descricao, $valor_produto, $estoque)
    {
        try {
            $Bfetch = $this->dB = $this->conexaoDb()->prepare("UPDATE `db-site`.`produto` SET descricao = :descricao, valor_produto = :valor_produto, estoque = :estoque WHERE (id = :id)");
            $Bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
            $Bfetch->bindParam(":descricao", $descricao, \PDO::PARAM_STR);
            $Bfetch->bindParam(":valor_produto", $valor_produto, \PDO::PARAM_STR);
            $Bfetch->bindParam(":estoque", $estoque, \PDO::PARAM_STR);
            $Bfetch->execute();
        } catch (Exception $e) {
            $msgStatus = __FUNCTION__ . ' - ' . $e;
            $acao = get_class($this);
            echo $msgStatus . ' - ' . $acao;
        }
    }

    public function delete($id)
    {

        try {
            $Bfetch = $this->dB = $this->conexaoDb()->prepare("DELETE FROM `db-site`.`produto` WHERE id = :id");
            $Bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
            $Bfetch->execute();
        } catch (Exception $e) {

            $msgStatus = __FUNCTION__ . ' - ' . $e;
            $acao = get_class($this);
            echo $msgStatus . ' - ' . $acao;

            //$LogController->gravarLog($msgStatus, $acao);
            //$logger->error($msgStatus, ["action" => $acao]);

            $item = array(
                "status" => '403',
                "msg" => $acao . ':' . $msgStatus,
                "result" => array(),
                "linhas" => 0
            );

            $res = json_encode($item);

            return $res;
        }
    }
}

