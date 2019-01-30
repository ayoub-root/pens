<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Chapter;
use App\Novel;

class EditChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $chapter_id = $this->route('chapter');
      $chapter = Chapter::find($chapter_id);
      return  auth()->check()
              && auth()->user()->can('update-chapter')
              && Novel::where('novel_id', $chapter->novel_id)->where('user_id', auth()->id());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'title' => 'required',
          'content' => 'required'
        ];
    }
}
