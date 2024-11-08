<?php
namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::get()
            ->orderBy('name', 'asc')
            ->paginate()
            ->withQueryString();

        return Inertia::render('Faculty/Index');
    }

    public function create()
    {

    }

    public function store(FacultyRequest $request)
    {
        Faculty::create(['name' => $request->get('name')]);

        return redirect()->route('faculty.index');
    }

    public function edit()
    {

    }

}
