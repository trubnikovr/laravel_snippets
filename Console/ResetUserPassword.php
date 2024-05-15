<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetUserPassword extends Command
{
    protected $signature = 'user:reset-password {email} {password}';
    protected $description = 'Resets a user’s password';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            $this->error('User not found!');
            return 1;
        }

        $user->password = \Illuminate\Support\Facades\Hash::make($password);
        $user->save();
        $this->info('Password reset successfully!');
        return 0;
    }

}
