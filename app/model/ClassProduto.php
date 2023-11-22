<?php

namespace App\Model;

use App\Model\ClassConexao;
use Logs\CustomLogger\CustomLogger;

require_once __DIR__ . '/../../logs/CustomLogger.php';

use Exception;

class ClassProduto extends ClassConexao
{
    private CustomLogger $customLogger;
    private \PDOStatement $dB;

    public function __construct()
    {
        $this->customLogger = new CustomLogger();
    }

    /**
     * Cria um novo produto no banco de dados.
     *
     * @param string $descricao
     * @param float $valor_produto
     * @param int $estoque
     * @return void
     */
    protected function create(string $descricao, float $valor_produto, int $estoque): void
    {
        try {
            $this->dB = $this->conexaoDb()->prepare("INSERT into produto values(:descricao, :valor_produto, :estoque)");
            $this->dB->bindParam(":descricao", $descricao, \PDO::PARAM_STR);
            $this->dB->bindParam(":valor_produto", $valor_produto, \PDO::PARAM_STR);
            $this->dB->bindParam(":estoque", $estoque, \PDO::PARAM_STR);
            $this->dB->execute();
            //$this->customLogger->logInfo("EXECUTED FUNCTION: " .__FUNCTION__ .' - '.get_class($this));

        } catch (Exception $e) {
            $msgStatus = __FUNCTION__ . ' - ' . $e->getMessage();
            $class = get_class($this);
            //$this->customLogger->logCritical("FUNCTION: " . $msgStatus . ' - ' . $class);
        }
    }

    public function read()
    {
        try {
            $query = "SELECT productCode, productName, productLine, productDescription FROM classicmodels.products";
            $statement = $this->conexaoDb()->prepare($query);
    
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $rows = $statement->rowCount();
            $dados = [];
    
            if ($rows > 0) {
                foreach ($result as $row) {
                    $item = [
                        "productCode" => $row["productCode"],
                        "productName" => $row["productName"],
                        "productLine" => $row["productLine"],
                        "productDescription" => $row["productDescription"],
                    ];
    
                    $dados[] = $item;
                }
    
                $response = [
                    "result" => $dados,
                    "linhas" => $rows
                ];
    
                return json_encode($response);
            }
        } catch (Exception $e) {
            $msgStatus = __FUNCTION__ . ' - ' . $e->getMessage();
            $class = get_class($this);
            $this->customLogger->logCritical("FUNCTION: " . $msgStatus . ' - ' . $class);
        }
    
        // Retorna um JSON indicando erro, se houver algum problema
        return json_encode(["status" => "500", "msg" => "Erro na leitura de dados"]);
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
            $msgStatus = __FUNCTION__ . ' - ' . $e->getMessage();
            $class = get_class($this);
            $this->customLogger->logCritical("ERROR FUNCTION: " .   $msgStatus . ' - ' . $class);
        }
    }

    public function delete($id)
    {
        try {
            $Bfetch = $this->dB = $this->conexaoDb()->prepare("DELETE FROM `db-site`.`produto` WHERE id = :id");
            $Bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
            $Bfetch->execute();
        } catch (Exception $e) {
            $msgStatus = __FUNCTION__ . ' - ' . $e->getMessage();
            $class = get_class($this);
            $this->customLogger->logCritical("ERROR FUNCTION: " .   $msgStatus . ' - ' . $class);
        }
    }
}
