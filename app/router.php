<?php

$app->get('/', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/index.html');
});

$app->get('/basico', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/orientaciones/basico.html');
});

?>