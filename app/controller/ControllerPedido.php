<?php

namespace App\Controller;

use Exception;
use Src\Classes\ClassRender;
use App\Model\ClassPedido;
use Src\Interfaces\InterfaceView;

class ControllerPedido extends ClassPedido
{
    protected $id;
    protected $id_pedido;
    protected $produto;
    protected $unidade;
    protected $valor_unidade;
    protected $valor_total;

    use \Src\Traits\TraitUrlParse;

    public function __construct()
    {
        if (count($this->parseUrl()) == 1) {
            $render = new ClassRender();
            $render->setTitle("cadastro");
            $render->setDescription("Faça seu cadastro");
            $render->setKeywords("Cadastro de Clientes, cadastro");
            $render->setDir("pedido");
            $render->renderLayout();
        }
    }

    public function recVariaveis()
    {
        isset($_POST['id']) ? $this->id = $_POST['id'] : "Falha Id";
        isset($_POST['id_pedido']) ? $this->id_pedido = filter_input(INPUT_POST, 'id_pedido', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
        isset($_POST['produto']) ? $this->produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
        isset($_POST['unidade']) ? $this->unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
        isset($_POST['valor_unidade']) ? $this->valor_unidade = filter_input(INPUT_POST, 'valor_unidade', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
        isset($_POST['valor_total']) ? $this->valor_total = filter_input(INPUT_POST, 'valor_total', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
    }

    public function toCreate()
    {

        $this->recVariaveis();

            parent::create($this->id_pedido, $this->produto, $this->unidade, $this->valor_unidade, $this->valor_total);

        $result = array(
            "msg" =>  "Cadastro Realizado Com  Sucesso!"
        );

        $itens = array(
            "result" => $result,
        );

        echo json_encode($itens);
    }

    public function seleciona()
    {   
        $linhasCab = "";
        $linhasTab = "";
        $msgAcao = "Inicio";
        $ObjCadastro = new ClassPedido();

       // $this->recVariaveis();
        $arrResult = json_decode($ObjCadastro->selecionaClientes("","","","","",""));

        // $linhasCab .=  "<th>Editar</th>";
        $linhasCab .=  "<th>Deletar</th>";
        $linhasCab .=  "<th>id_pedido</th>";
        $linhasCab .= "<th>Produto</th>";
        $linhasCab .=  "<th>Unidade</th>";
        $linhasCab .=  "<th>Valor Unit</th>";
        $linhasCab .=  "<th>Valor Total</th>";

        if ($arrResult->linhas > 0) {
            foreach ($arrResult->result as $val => $itemResult) {

                // $linhasTab .= "<td><input type='checkbox' id='id' name='id[]' value ='$itemResult->id'></td>";
                $linhasTab .= "<tr>";
                // $linhasTab .= '<td ><a href="http://localhost/mercado/editar"><img src="public\img\edit.png"></a></td>';
                $linhasTab .=   "<td id='$itemResult->id' title='Delete' data-toggle='modal' data-target='#my-modal'class='icons'><img src='public\img\delete.gif' width='17' height='17'></td>";
                $linhasTab .= "<td>$itemResult->id_pedido</td>";
                $linhasTab .= "<td>$itemResult->produto</td>";
                $linhasTab .= "<td>$itemResult->unidade</td>";
                $linhasTab .= "<td>$itemResult->valor_unidade</td>";
                $linhasTab .= "<td>$itemResult->valor_total</td>";
                $linhasTab .= "</tr>";
            }

            $msgAcao .= '|Buscou dados';
        } else {

            $msgAcao .= '|Não buscou dados';
        }

        $result = array(
            "tabCab" =>  $linhasCab,
            "tabLinha" => $linhasTab,
        );
        $itens = array(
            "result" => $result,
            "msgAcao" => $msgAcao
        );

        echo json_encode($itens);
    }

    public function deletar()
    {
        $this->recVariaveis();

        foreach ($this->id as $idDelete) :

            $this->deletarClientes($idDelete);
            
        endforeach;

       return header("Location:http://localhost/mercado/cadastro");

    }
}
