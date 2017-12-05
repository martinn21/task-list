<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface TaskRepositoryInterface
{

    public function save(Request $request);

    public function getTasks();

    public function delete($id);

}