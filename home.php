<?php
session_start();
include_once('config.php');
//print_r($_SESSION);
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: index.php');
} else {

    $logado = $_SESSION['usuario'];
}
$sql = "SELECT * FROM associados ORDER BY id DESC";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Dashboard - Associados</title>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Barra de navegação -->
        <a class="navbar-brand ps-3" href="index.php">Dashboard</a>
        <!-- Altenar barra lateral -->

        <!-- Pesquisa na barra de navegação -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Barra de navegação -->

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Gerenciamento</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseServer" aria-expanded="false" aria-controls="collapseServer">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                                </svg>
                            </div>
                            Home
                        </a>

                        <a class="nav-link collapsed" href="javascript:carrega('addAssociado.php')" data-bs-toggle="collapse" data-bs-target="#collapseServer" aria-expanded="false" aria-controls="collapseServer">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </div>
                            Add Associado
                        </a>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <a class="nav-link collapsed" href="#" onclick="window.location.href='sair.php'" data-bs-toggle="collapse" data-bs-target="#collapseServer" aria-expanded="false" aria-controls="collapseServer">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                </svg>
                            </div>
                            Sair
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small fs-6 fw-bold">Logado como: </div>
                    <?php echo $logado ?>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1>Sistema de Associados</h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item active">
                            Associação Progresso dos Pequenos Produtores Rurais do PA Presidente
                        </li>
                    </ol>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card bg-primary text-center text-white h-100">
                                <div class="card-header">
                                    <h6>Associados cadastrados</h6>
                                </div>
                                <div class="card-body">
                                    Existem 000 Associados cadastrados

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-success text-center text-white h-100">
                                <div class="card-header">
                                    <h6>Plano Anual</h6>
                                </div>
                                <div class="card-body">
                                    Existem 000 Associados com plano anual

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-warning text-center text-white h-100">
                                <div class="card-header">
                                    <h6>Plano Mensal</h6>
                                </div>
                                <div class="card-body">
                                    Existem 000 Associados com plano mensal

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-danger text-center text-white h-100">
                                <div class="card-header">
                                    <h6>Plano vencendo</h6>
                                </div>
                                <div class="card-body">
                                    Existem 000 Associados com plano vencendo

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3 ">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <span><i class="bi bi-table me-2 fw-bold fs-5">Relação de Associados</i></span>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="tabelaAssociados" class="table table-striped data-table" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>Matricula</th>
                                                        <th>Nome</th>
                                                        <th>CPF</th>
                                                        <th>Ultima renovação</th>
                                                        <th>Data de vencimento</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($user_data = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<th scope='row'>" . $user_data['id'] . "</th>";
                                                        echo "<td>" . $user_data['nome'] . "</td>";
                                                        echo "<td>" . $user_data['cpf'] . "</td>";
                                                        echo "<td>" . $user_data['renovacao'] . "</td>";
                                                        echo "<td>" . $user_data['vencimento'] . "</td>";
                                                        echo "<td><a class='btn btn-success btn-sm' href='perfilAssociado.php?id=$user_data[id]'>Visualizar</a></td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Matricula</th>
                                                        <th>Nome</th>
                                                        <th>CPF</th>
                                                        <th>Ultima renovação</th>
                                                        <th>Data de vencimento</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript">
        function carrega(addAssociado) {
            //carrega os dados de: pagina_conteudo.php na div id="conteudo"
            $('#layoutSidenav_content').load(addAssociado.php);
        }
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/script.js"></script>


</body>

</html>