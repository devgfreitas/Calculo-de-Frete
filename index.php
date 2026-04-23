<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Frete</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(45deg, cyan, darkblue);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #08515C;
            border-radius: 15px;
            padding: 10px;
            gap: 5px;
            width: 100%;
            max-width: 560px;
            height: 560px;
        }

        form > label {
            color: white;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            width: 90%;
            height: 35px;
            border-radius: 4px;
            background-color: blue;
            border: 0;
            color: white;
        }

        select {
            width: 90%;
            height: 35px;
            border-radius: 4px;
            background-color: blue;
            border: 0;
            color: white;
        }

        select > option {
            background-color: cyan;
            color: black;
        }

        input[type="text"]::placeholder, input[type="number"]::placeholder {
            color: white;
        }

        input[type="submit"] {
            width: 90%;
            height: 35px;
            border-radius: 4px;
            background-color: darkblue;
            border: 0;
            color: white;
            margin-top: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="processa.php" method="post">
        <label for="name">Nome:</label>
        <input type="text" placeholder="Nome Completo" id="name" name=name>
        <label for="valorcompra">Valor da Compra:</label>
        <input type="number" placeholder="Exemplo: 100" name="valorcompra" id="valorcompra">
        <label for="pesop">Peso do Produto:</label>
        <input type="number" placeholder="Exemplo: 100(kg)" name="pesop" id="pesop">
        <label for="distancia">Distância:</label>
        <input type="number" placeholder="Exemplo: 23(km)" name="distancia" id="distancia">
        <label for="tproduto">Tipo de Produto:</label>
        <select name="tproduto" id="tproduto">
            <option disabled selected value="">Selecione</option>
            <option value="pnormal">Normal</option>
            <option value="pfragil">Frágil</option>
        </select>
        <label for="tentrega">Tipo de Entrega:</label>
        <select name="tentrega" id="tentrega">
            <option selected disabled value="">Selecione</option>
            <option value="enormal">Normal</option>
            <option value="eeconomica">Econômica</option>
            <option value="eexpressa">Expressa</option>
            <option value="eretirada">Retirada</option>
        </select>
        <input type="submit" value="Enviar">
    </form>    
</body>
</html>