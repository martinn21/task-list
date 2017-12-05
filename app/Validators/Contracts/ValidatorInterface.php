<?php
namespace App\Validators\Contracts;


use Illuminate\Http\Request;

interface ValidatorInterface
{

    public function validate(Request $request);
}