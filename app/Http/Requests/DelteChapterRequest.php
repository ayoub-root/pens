<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Chapter;
class DelteChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->can('delete-chapter') && Chapter::where('id', $this->route('chapter'))->where('user_id', auth()->id());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
