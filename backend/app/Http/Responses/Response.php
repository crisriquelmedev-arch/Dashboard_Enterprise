<?php

declare(strict_types=1);

namespace App\Http\Responses;

interface Response
{
    public function send(): void;
}