<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['name'] ?? '';
    $valor = isset($_POST['valorcompra']) ? (float) $_POST['valorcompra'] : 0;
    $peso = isset($_POST['pesop']) ? (float) $_POST['pesop'] : 0;
    $distancia = isset($_POST['distancia']) ? (float) $_POST['distancia'] : 0;

    $tipo = strtolower($_POST['tproduto'] ?? '');
    $entrega = strtolower($_POST['tentrega'] ?? '');

    $frete_peso = 0;
    $frete_distancia = 0;
    $base = 50;
    $var = 0;
    $resultado = 0;

    switch($entrega) {
        case 'eeconomica':
            if ($peso <= 5) $frete_peso = 10;
            else $frete_peso = 20;

            if ($distancia > 100) $frete_distancia += 10;
            break;

        case 'enormal':
            if ($peso <= 5) $frete_peso = 20;
            elseif ($peso <= 10) $frete_peso = 35;
            else $frete_peso = 50;

            if ($distancia > 100) $frete_distancia += 15;
            break;

        case 'eexpressa':
            if ($peso > 10) $base += 20;
            if ($distancia > 100) $frete_distancia = 20;
            break;
        default:
            $entrega = 'inválido';
            break;
    }
    switch($tipo) {
        case 'pfrágil':
            $var = 15;
            break;

        case 'pnormal':
            $var = 0;
            break;

        default:
            $var = 0;
            break;
    }
    if ($valor > 500) {
        $frete_distancia = 0;
        $frete_peso = 0;
    }
    $resultado = $valor + $frete_peso + $frete_distancia + $var;
    if (
        empty($_POST['name']) ||
        empty($_POST['valorcompra']) ||
        empty($_POST['pesop']) ||
        empty($_POST['distancia']) ||
        empty($_POST['tproduto']) ||
        empty($_POST['tentrega'])
    ) {
        echo "<div class='erro'>Preencha todos os campos!</div>";
    } else {
        echo "<h2>NOTA FISCAL</h2>";

        echo "<div class='linha'><span>Produto:</span><span>$nome</span></div>";
        echo "<div class='linha'><span>Entrega:</span><span>$entrega</span></div>";
        echo "<div class='linha'><span>Tipo:</span><span>$tipo</span></div>";
        echo "<div class='linha'><span>Valor do produto:</span><span>R$ $valor</span></div>";
        echo "<div class='linha'><span>Frete Peso:</span><span>R$ $frete_peso</span></div>";
        echo "<div class='linha'><span>Distância:</span><span>R$ $frete_distancia</span></div>";
        echo "<div class='linha'><span>Adicional:</span><span>R$ $var</span></div>";

        echo "<div class='total'>Total: R$ $resultado</div>";
    }
}
?>