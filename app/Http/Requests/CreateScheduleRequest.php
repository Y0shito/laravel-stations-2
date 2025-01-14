<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
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
        return [
            'movie_id' => ['required'],
            'start_time_date' => ['required', 'date_format:Y-m-d', 'is_same_datetime', 'is_starttime_after_endtime', 'before_or_equal:end_time_date'],
            'start_time_time' => ['required', 'is_same_datetime', 'is_starttime_after_endtime', 'is_less_than_five_minutes', 'date_format:H:i'],
            'end_time_date' => ['required', 'is_same_datetime', 'is_starttime_after_endtime', 'after_or_equal:start_time_date', 'date_format:Y-m-d'],
            'end_time_time' => ['required', 'is_same_datetime', 'is_starttime_after_endtime', 'is_less_than_five_minutes', 'date_format:H:i'],
        ];
    }

    public function messages()
    {
        return [
            'movie_id.required' => 'IDに値がありません',
            'start_time_date.required' => '日付を入力してください',
            'start_time_date.before_or_equal' => '公開終了時間より前の日付で入力してください',
            'start_time_time.required' => '時間を入力してください',
            'end_time_date.required' => '日付を入力してください',
            'end_time_date.after_or_equal' => '公開開始時間より後の日付で入力してください',
            'end_time_time.required' => '時間を入力してください',
        ];
    }
}
