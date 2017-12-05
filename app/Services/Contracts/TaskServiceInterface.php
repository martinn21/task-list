<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface TaskServiceInterface
{

    public function validate(Request $request);

    public function save(Request $request);

    public function getTasks();

    public function delete($id);
}