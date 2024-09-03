<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Dados</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listagem de Dados</h2>

    <?php
    // Incluir o arquivo de conexão
    include 'conexao.php';

    // Função para exibir dados da tabela
    function exibirTabela($conexao, $query, $nomeTabela, $colunas) {
        $resultado = mysqli_query($conexao, $query);

        // Verificar se há registros
        if (mysqli_num_rows($resultado) > 0) {
            // Exibir os dados em uma tabela
            echo "<h3>Tabela: $nomeTabela</h3>";
            echo "<table>";
            echo "<tr>";
            foreach ($colunas as $coluna) {
                echo "<th>$coluna</th>";
            }
            echo "</tr>";
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                foreach ($colunas as $coluna) {
                    echo "<td>" . $linha[$coluna] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h3>Tabela: $nomeTabela</h3>";
            echo "Nenhum registro encontrado.";
        }
    }

    // Definições das tabelas e suas colunas
    $tabelas = [
        "Componentes" => ["ID_componente", "nome_componente"],
        "EfeitosAmbiente" => ["material", "efeito", "descricao"],
        "EfeitosSaudeHumana" => ["material", "efeito"],
        //"foto" => ["ID_componente", "descricao"], // Adapte as colunas de acordo com a estrutura real da tabela\\
        "Materiais" => ["ID_componente","ID_material", "nome_material"], // Adapte as colunas de acordo com a estrutura real da tabela
        "Valor" => ["ID_componente", "valor$$"] // Adapte as colunas de acordo com a estrutura real da tabela
    ];

    // Exibir todas as tabelas
    foreach ($tabelas as $nomeTabela => $colunas) {
        $query = "SELECT * FROM $nomeTabela";
        exibirTabela($conexao, $query, $nomeTabela, $colunas);
    }

    // Fechar a conexão
    mysqli_close($conexao);
    ?>
</body>
</html>
