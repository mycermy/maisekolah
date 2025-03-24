<?php

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if (isAuthenticated() ?? false) {
            redirectDashboard();
        }
    }
}
