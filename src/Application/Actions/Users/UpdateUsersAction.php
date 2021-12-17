<?php

declare(strict_types=1);

namespace App\Application\Actions\Users;

use App\Application\Actions\Users\UsersAction;
use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Users\Users;

class UpdateUsersAction extends UsersAction
{
    protected function action(): Response
    {
        $data = $this->parseBody();
        $usersId = (int) $this->resolveArg('id');
        $users = $this->users->find($usersId);
        foreach($data as $key => $value) {
            if (isset($users->$key))
                $users->$key = $value;
        }
        $users->save();
        return $this->respondWithData($users);
    }

    protected function parseBody() {
        // parsing from key=value&key2=value2 to [key => value, key2 => value2]
        $data;
        $raw = $this->request->getBody()->getContents();
        if (empty($raw))
            return $this->request->getParsedBody();
        $cutted = explode("&", $raw);
        foreach ($cutted as $param) {
            list($key, $value) = explode("=", $param);
            $data[$key] = $value;
        }
        return $data;
    }
}
