<?php

namespace App\Helpers;

use App\User;
use App\ActivityLog;

trait ActivityLogger
{
    public function logActivity(User $user, $action, $message)
    {
        return ActivityLog::create([
            'logger' => $user->getFullName(),
            'log_action' => $action,
            'log_message' => $message,
        ]);
    }
}
