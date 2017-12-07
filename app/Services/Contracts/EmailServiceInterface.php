<?php
namespace App\Services\Contracts;

interface EmailServiceInterface
{

    public function send(array $emails);
}