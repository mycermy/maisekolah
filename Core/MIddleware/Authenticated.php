<?php

namespace Core\Middleware;

class Authenticated
{
    public function handle()
    {
        if (! isAuthenticated() ?? false) {
            redirectLogin();
        }
    }
}
