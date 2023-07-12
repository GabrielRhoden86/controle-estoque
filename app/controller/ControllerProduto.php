<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use App\Model\ClassProduto;

class ControllerProduto extends ClassProduto
{
    protected $id;
    protected $descricao;
    protected $valor_produto;
    protected $estoque;

    use \Src\Traits\TraitUrlParse;

    public function __construct()
    {
        if (count($this->parseUrl()) == 1) {
            $render = new ClassRender();
            $render->setTitle("Produtos");
            $render->setDescription("Faça seu cadastro");
            $render->setKeywords("Produtos,Lista");
            $render->setDir("produto");
            $render->renderLayout();
        }
    }

    public function recVariaveis()
    {
        isset($_POST['id']) ? $this->id = $_POST['id'] : "Falha Id";
        isset($_POST['descricao']) ? $this->descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
        isset($_POST['valor_produto']) ? $this->valor_produto = filter_input(INPUT_POST, 'valor_produto', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
        isset($_POST['estoque']) ? $this->estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
    }

    public function toCreate()
    {
        $this->recVariaveis();

        if (!$this->descricao == "" or !$this->valor_produto == "" or !$this->estoque == "") {
            parent::create($this->descricao, $this->valor_produto, $this->estoque);
        }
        $result = array(
            "msg" =>  "Cadastro Realizado Com  Sucesso!"
        );
        $itens = array(
            "result" => $result,
        );

        echo json_encode($itens);
    }

    public function getRead()
    {
        $linhasCab = "";
        $linhasTab = "";
        $msgAcao = "Inicio";
        $ObjCadastro = new ClassProduto();

        $arrResult = json_decode($ObjCadastro->read(0, "", "", ""));

        $linhasCab .=  "<th>Editar</th>";
        $linhasCab .=  "<th>Excluir</th>";
        $linhasCab .=  "<th>ID</th>";
        $linhasCab .= "<th>Descrição</th>";
        $linhasCab .=  "<th>Valor</th>";
        $linhasCab .=  "<th>Estoque</th>";
        $linhasCab .=  "<th>Imagem</th>";

        if ($arrResult->linhas > 0) {
            foreach ($arrResult->result as $val => $itemResult) {

                $linhasTab .= "<tr>";
                $linhasTab .= '<td ><a href="http://localhost/mercado/editar-produto/?id=' . $itemResult->id . '&descricao=' . $itemResult->descricao . '&valor_produto=' . $itemResult->valor_produto . '&estoque=' . $itemResult->estoque . '"><img src="public\img\edit.png"></a></td>';
                $linhasTab .=   "<td id='$itemResult->id'  title='Delete' data-toggle='modal' data-target='#my-modal'class='icons'><img src='public\img\delete.gif' width='17' height='17'></td>";
                $linhasTab .=   "<td>$itemResult->id</td>";
                $linhasTab .=   "<td>$itemResult->descricao</td>";
                $linhasTab .=   "<td>$itemResult->valor_produto</td>";
                $linhasTab .=   "<td>$itemResult->estoque</td>";
                $linhasTab .=   "<td>img</td>";
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

    function putUpdate()
    {
        $this->recVariaveis();
        parent::update($this->id, $this->descricao, $this->valor_produto, $this->estoque);
        return header("Location:http://localhost/controle-estoque/editar-produto");
        exit();
    }

    public function deleting()
    {
        $this->recVariaveis();

        foreach ($this->id as $idDelete) :
            $this->delete($idDelete);
        endforeach;

        return header("Location:http://localhost/controle-estoque/produto");
        exit();
    }
}
