<?php
//comments


declare(strict_types=1);

namespace App\Application\Actions\Users;

use Psr\Http\Message\ResponseInterface as Response;

class GetUsersAction extends UsersAction
{
    protected function action(): Response
    {
        $usersId = (int)$this->resolveArg('id');
        $users = $this->users->find($usersId);
        return $this->respondWithData($users);
    }
}
