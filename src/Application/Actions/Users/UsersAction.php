<?php
declare(strict_types=1);
namespace App\Application\Actions\Users;

use App\Application\Actions\Action;
use App\Domain\Users\Users;
use Psr\Log\LoggerInterface;

abstract class UsersAction extends Action
{
    /**
     * @var Users
     */
    protected Users $users;

    /**
     * @param LoggerInterface $logger
     * @param Users  $users
     */
    public function __construct(LoggerInterface $logger, Users $users)
    {
        parent::__construct($logger);
        $this->users = $users;
    }
}
