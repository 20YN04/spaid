<?php

namespace App\Http\Requests;

use App\Enums\IssueType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreTriageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'issue_type' => ['required', new Enum(IssueType::class)],
            'takes_medication' => ['required', 'boolean'],
            'currently_in_treatment' => ['required', 'boolean'],
        ];
    }

    public function issueType(): IssueType
    {
        return IssueType::from($this->validated('issue_type'));
    }
}
