<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Novel;

class EditeNovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $novel_id = $this->route('novel');

        return  auth()->check()
                && auth()->user()->can('delete-novel')
                && Novel::where('id', $novel_id)->where('user_id', auth()->id())->exists() ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
          'title' => 'required',
          'description' => 'required'
        ];
    }
}
