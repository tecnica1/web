<?php

$app->get('/', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/index.html');
});

$app->get('/basico', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/orientaciones/basico.html');
});

$app->get('/informatica', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/orientaciones/informatica.html');
});

$app->get('/construccion', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/orientaciones/construccion.html');
});

$app->get('/turismo', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/orientaciones/turismo.html');
});

$app->get('/noticias', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/noticias.php');
});



$app->get('/contacto', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/contacto.php');
});

$app->get('/autoridades', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/institucional/autoridades.html');
});
?>