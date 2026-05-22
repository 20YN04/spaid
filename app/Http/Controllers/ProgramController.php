<?php

namespace App\Http\Controllers;

use App\Enums\IssueType;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProgramController extends Controller
{
    public function show(Request $request, string $programSlug): View
    {
        $issue = $this->resolveIssue($programSlug);

        $availabilities = Availability::query()
            ->open()
            ->whereHas('psychologist', function ($q) use ($issue): void {
                $q->whereJsonContains('specialties', $issue->value);
            })
            ->with('psychologist')
            ->orderBy('start_time')
            ->get();

        return view('programs.dashboard', [
            'issue' => $issue,
            'availabilities' => $availabilities,
        ]);
    }

    protected function resolveIssue(string $slug): IssueType
    {
        return match ($slug) {
            'adhd' => IssueType::Adhd,
            'autisme' => IssueType::Autisme,
            'angst' => IssueType::AngstStress,
            'dyslexie' => IssueType::Dyslexie,
            'dyscalculie' => IssueType::Dyscalculie,
            default => throw new NotFoundHttpException("Unknown program: {$slug}"),
        };
    }
}
