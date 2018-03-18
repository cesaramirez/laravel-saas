<?php

namespace App\Models\Traits;

use App\Models\ConfirmationToken;

trait HasConfirmationToken
{
    public function generateConfirmationToken()
    {
        $this->confirmationToken()->create([
            'token'      => $token = str_random(200),
            'expires_at' => $this->generateConfirmationTokenExpiry(),
        ]);

        return $token;
    }

    protected function generateConfirmationTokenExpiry()
    {
        return $this->freshTimestamp()->addMinutes(10);
    }

    public function confirmationToken()
    {
        return $this->hasOne(ConfirmationToken::class);
    }
}
