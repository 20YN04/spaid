<?php

namespace App\Http\Controllers;

use App\Enums\IssueType;
use App\Http\Requests\StoreTriageRequest;
use App\Models\TriageResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TriageController extends Controller
{
    public function show(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if ($user->triage_completed) {
            return redirect($this->programRouteForUser($user) ?? '/dashboard');
        }

        return view('triage.show', [
            'issueTypes' => IssueType::cases(),
        ]);
    }

    public function store(StoreTriageRequest $request): RedirectResponse
    {
        $user = $request->user();
        $issue = $request->issueType();

        TriageResult::updateOrCreate(
            ['user_id' => $user->id],
            [
                'issue_type' => $issue,
                'takes_medication' => (bool) $request->validated('takes_medication'),
                'currently_in_treatment' => (bool) $request->validated('currently_in_treatment'),
            ],
        );

        $user->forceFill(['triage_completed' => true])->save();

        return redirect($issue->programRoute());
    }

    protected function programRouteForUser($user): ?string
    {
        $result = $user->triageResult()->first();

        return $result?->issue_type?->programRoute();
    }
}
