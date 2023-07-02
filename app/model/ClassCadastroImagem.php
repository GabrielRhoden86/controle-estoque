<?php

namespace App\Model;
use App\Model\ClassConexao;
use Exception;

class ClassCadastroImagem extends ClassConexao  
{
    private $dB;

    protected function cadastroImagem($id_produto, $descricao, $imagem_produto)
    {
        $id = 0;

        try {
            $this->dB = $this->conexaoDb()->prepare("INSERT into imagem_produto values(:id, :id_produto, :descricao)");
            $this->dB->bindParam(":id", $id, \PDO::PARAM_INT);
            $this->dB->bindParam(":id_produto", $id_produto, \PDO::PARAM_INT);
            $this->dB->bindParam(":descricao", $descricao, \PDO::PARAM_STR);
            $this->dB->execute();
                
              //var_dump($this->selecionaIdProduto());
             //return header("Location:http://localhost/mercado/upload");
     
            exit();

        }catch (Exception $e) {
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


    public function deletarProduto($id)
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
