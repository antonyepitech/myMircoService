<?php

declare(strict_types=1);

namespace App\Application\Actions\Users;

use App\Application\Actions\Users\UsersAction;
use App\Domain\Users\Users;
use Psr\Http\Message\ResponseInterface as Response;

class NewUsersAction extends UsersAction
{
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $users = new Users;
        $users->name = $data["name"];
        $users->save();
        return $this->respondWithData($users);
    }
}
