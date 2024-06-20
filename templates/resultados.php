    <?php if (!empty($resultados)) : ?>
        <div class="container d-flex flex-column justify-content-center align-items-center mt-2 mb-2">
            <h4>Resultados de Busqueda para: <?php echo htmlspecialchars($query) ?></h4>
            <?php echo 'Total de Resultados en tu Busqueda: ' . htmlspecialchars((string)$data['total_results']); ?>
        </div>
        <div>
            <?php foreach ($resultados as $pelicula) : ?>
                <div class="container d-flex justify-content-center align-items-center mt-2 mb-2">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <!-- POSTER DE PELICULA -->
                            <?php if (!empty($pelicula['poster_path'])) : ?>
                                <div class="col-md-4 col-12 text-center">
                                    <img src="https://image.tmdb.org/t/p/w200<?php echo $pelicula['poster_path']; ?>" alt="<?php echo htmlspecialchars($pelicula['title']); ?>" class="img-fluid rounded">
                                </div>
                            <?php endif; ?>
                            <!-- SI EL POSTER ES 'NULL' MUESTRA POR PANTALLA 'NO TIENE POSTER' -->
                            <?php if (empty($pelicula['poster_path'])) : ?>
                                <h5 class="card-title m-3">No tiene Poster</h5>
                            <?php endif; ?>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <!-- TITULO DE PELICULA -->
                                    <h5 class="card-title"><?php echo htmlspecialchars($pelicula['title']); ?></h5>

                                    <!-- MUESTRA LA SINOPSIS DE LA PELICULA, SI OVERVIEW ES VACIO SE MUESTRA 'NO CONTIENE' -->
                                    <?php if ($pelicula['overview']) : ?>
                                        <p class="card-text flex-grow-1"><?php echo 'Sinopsis: ' . htmlspecialchars($pelicula['overview']); ?></p>
                                    <?php else : ?>
                                        <p class="card-text flex-grow-1"><?php echo 'Sinopsis: No contiene'; ?></p>
                                    <?php endif; ?>

                                    <!-- MUESTRA EL TITULO EN SU IDIOMA ORIGINAL -->
                                    <p class="card-text"><small class="text-muted"><?php echo 'Titulo Original: ' . htmlspecialchars($pelicula['original_title']); ?></small></p>

                                    <!-- VALORACION/PUNTUACION -->
                                    <p class="card-text"><small class="text-muted"><?php echo 'Valoración: ' . htmlspecialchars(round($pelicula['vote_average'], 1)); ?>/10</small></p>

                                    <!-- MUESTRA EL AÑO DE LANZAMIENTO, SI RELEASE_DATE ES 'NULL' SE MUESTRA 'NO HAY INFORMACION SOBRE ESTO-->
                                    <?php if ($pelicula['release_date']) : ?>
                                        <p class="card-text"><small class="text-muted"><?php echo 'Fecha de Lanzamiento: ' . htmlspecialchars($pelicula['release_date']); ?></small></p>
                                    <?php else : ?>
                                        <p class="card-text"><small class="text-muted"><?php echo 'Fecha de Lanzamiento: No hay Información sobre esto'; ?></small></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (empty($resultados) && isset($_GET['query'])) : ?>
        <div class="container d-flex flex-column justify-content-center align-items-center mt-2 mb-2">
            <h4>Resultados de Busqueda para: <?php echo htmlspecialchars($query) ?></h4>
            <p>No se encontraron resultados para la búsqueda.</p>
        </div>

    <?php endif; ?>