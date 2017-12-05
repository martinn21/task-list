<?php
namespace App\Validators\Task;

use App\Validators\Contracts\ValidatorInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskValidator implements ValidatorInterface
{

    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

    }
}