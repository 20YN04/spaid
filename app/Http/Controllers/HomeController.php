<?php

namespace App\Http\Controllers;

use App\Enums\IssueType;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'issueTypes' => IssueType::cases(),
        ]);
    }

    public function programmas(): View
    {
        return view('programmas.index', [
            'issueTypes' => IssueType::cases(),
        ]);
    }
}
