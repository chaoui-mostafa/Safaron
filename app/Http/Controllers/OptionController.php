<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Requests\OptionRequest;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::paginate(5); // Adjust the number as needed
        return view('options.index', compact('options'));
    }

    public function create()
    {
        return view('options.create');
    }

    public function store(OptionRequest $request)
    {
        Option::create($request->validated());

        return redirect()->route('options.index')->with('success', 'Option created successfully.');
    }

    public function edit(Option $option)
    {
        return view('options.edit', compact('option'));
    }

    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('options.index')->with('success', 'Option updated successfully.');
    }

    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('options.index')->with('success', 'Option deleted successfully.');
    }
}
