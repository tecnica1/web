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
    return $this->view->render($response, 'pagina/noticias.html');
});

$app->get('/contacto', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/contacto.html');
});

$app->get('/autoridades', function ($request, $response) use($app) {
    return $this->view->render($response, 'pagina/institucional/autoridades.html');
});

$app->post('/login', function ($request, $response) use($app, $database) {
    $dni = $request->getParsedBody()['usuario'];
    $password = $request->getParsedBody()['password'];

    $respuesta = "";
    $passok = false;

    if ($database->alumnos[$dni]) {
        $respuesta = "alumno";
        $passok = $password == $database->alumnos[$dni]['dni'];
    } else if ($database->preceptorescursos[$dni]) {
        $respuesta = "preceptor";
        $passok = $password == $database->personal[$dni]['pass'];
    } else if ($database->personal[$dni]) {
        $respuesta = "profesor";
        $passok = $password == $database->personal[$dni]['pass'];
    } else if ($database->padrestutores[$dni]) {
        $respuesta = "padre";
        $passok = $password == $database->padrestutores[$dni]['dni'];
    } else {
        $respuesta = "ERROR";
    }

    $body = $response->getBody();

    if ($passok) {
        $body->write($respuesta);
    } else {
        $body->write("Contraseña Incorrecta");
    }
});




?>