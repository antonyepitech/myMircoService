<?php
declare(strict_types=1);

use App\Application\Actions\Users\UpdateUsersAction;
use App\Application\Actions\Users\NewUsersAction;
use App\Application\Actions\Users\GetUsersAction;
use App\Application\Actions\Users\ListUsersAction;
use App\Application\Actions\Users\DeleteUsersAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });
    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', GetUsersAction::class);
        $group->post('', NewUsersAction::class);
        $group->put('/{id}', UpdateUsersAction::class);
        $group->delete('/{id}', DeleteUsersAction::class);
    });
};
