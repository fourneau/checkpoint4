<?php

namespace App\Service;

use Symfony\Component\Security\Core\Security;

class AdminService
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function someMethod()
    {
        $user = $this->security->getUser();
    }
}