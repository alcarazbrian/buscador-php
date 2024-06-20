<?php

require_once './classes/Buscador.php';

// Inicializa $query con una cadena vacía si no se proporciona un valor
$query = $_GET['query'] ?? '';
// 
$page = (int)($_GET['page'] ?? 1);
// Crear una instancia de Buscador:
$buscador = new Buscador($query, $page);

?>

<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->
<?php Buscador::render_template('head'); ?>
<!-- FIN HEAD -->
<body>
    <!-- FORMULARIO -->
    <?php Buscador::render_template('form'); ?>
    <!-- FIN FORMULARIO -->

    <!-- RESULTADOS DE LA BUSQUEDA -->
    <?php Buscador::render_template('resultados', ['resultados' => $buscador->resultados, 'query' => $buscador->query, 'data' => $buscador->data]); ?>
    <!-- FIN RESULTADOS DE LA BUSQUEDA -->

    <!-- PAGINACION -->
    <?php
    Buscador::render_template('pagination', [
        'query' => $buscador->query,
        'page' => $buscador->page,
        'total_pages' => $buscador->total_pages
    ]);
    ?>
    <!-- FIN PAGINACION -->

    <!-- FOOTER -->
    <?php Buscador::render_template('footer'); ?>
    <!-- FIN FOOTER -->
</body>
</html>