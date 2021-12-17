<?php

declare(strict_types=1);

namespace App\Application\Actions\Users;

use App\Application\Actions\Users\UsersAction;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteUsersAction extends UsersAction
{
    protected function action(): Response
    {
        $usersId = (int) $this->resolveArg('id');
        $users = $this->users->destroy($usersId);
        return $this->respondWithData($users);
    }
}
