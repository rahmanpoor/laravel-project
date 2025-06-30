<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = Route::current();
        if ($route->getName() == 'admin.user.role.store') {

            return [

                'name' => 'required|max:120|min:1',
                'description' => 'required|max:200|min:1',
                'permissions.*' => ['exists:permissions,id']
            ];
        }
    }

    public function attributes() {
        return [
            'name' => 'عنوان نقش',
            'permissions.*' => 'دسترسی ها'
        ];
    }
}
