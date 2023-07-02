<?php
namespace App\Model;
use App\Model\ClassConexao;
use Exception;

class ClassPedido extends ClassConexao
{
    private $dB;

    protected function create($id_pedido, $produto, $unidade, $valor_unidade, $valor_total)
    {
        $id = 0;

        try {
            $this->dB = $this->conexaoDb()->prepare("INSERT into pedido values(:id, :id_pedido, :produto, :unidade, :valor_unidade, :valor_total)");

            $this->dB->bindParam(":id", $id, \PDO::PARAM_INT);
            $this->dB->bindParam(":id_pedido", $id_pedido, \PDO::PARAM_STR);
            $this->dB->bindParam(":produto", $produto, \PDO::PARAM_STR);
            $this->dB->bindParam(":unidade", $unidade, \PDO::PARAM_STR);
            $this->dB->bindParam(":valor_unidade", $valor_unidade, \PDO::PARAM_STR);
            $this->dB->bindParam(":valor_total", $valor_total, \PDO::PARAM_STR);
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

    public function selecionaClientes($id, $id_pedido,  $produto, $unidade, $valor_unidade, $valor_total)
    {
        $id_pedido = '%' . $id_pedido . '%';
        $produto = '%' . $produto . '%';
        $unidade = '%' . $unidade . '%';
        $valor_unidade = '%' . $valor_unidade. '%';
        $valor_total = '%' . $valor_total. '%';
        
        try {

            $Bfetch = $this->dB = $this->conexaoDb()->prepare("SELECT * FROM `db-site`.pedido
            where id_pedido like :id_pedido and  produto like :produto and unidade like :unidade and valor_unidade like :valor_unidade and valor_total like :valor_total");
 
            $Bfetch->bindParam(":id_pedido", $id_pedido, \PDO::PARAM_STR);
            $Bfetch->bindParam(":produto", $produto, \PDO::PARAM_STR);
            $Bfetch->bindParam(":unidade", $unidade, \PDO::PARAM_STR);
            $Bfetch->bindParam(":valor_unidade", $valor_unidade, \PDO::PARAM_STR);
            $Bfetch->bindParam(":valor_total", $valor_total, \PDO::PARAM_STR);
            $Bfetch->execute();

            //Recupera as linhas via fetchAll 
            $result = $Bfetch->fetchAll();
            //Quantas linhas retornaram
            $linhas = $Bfetch->rowCount();

            $i = 0;
            $dados = array();

            if ($linhas > 0) {
                foreach ($result as $row) {
                    $item = array(
                        "id" => $row[0],
                        "id_pedido" => $row[1],
                        "produto" => $row[2],
                        "unidade" => $row[3],
                        "valor_unidade" => $row[4],
                        "valor_total" => $row[5],
                    );

                    $dados[] = $item;
                }

                $items = array(
                    "status" => "200",
                    "msg" => "OK",
                    "result" => $dados,
                    "linhas" => $linhas
                );

                return json_encode($items);
            }
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

    public function deletarClientes($id)
    {

        try {
            $Bfetch = $this->dB = $this->conexaoDb()->prepare("DELETE FROM `db-site`.`pedido` WHERE id = :id");
            $Bfetch->bindParam(":id", $id, \PDO::PARAM_INT);
            $Bfetch->execute();
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
}
