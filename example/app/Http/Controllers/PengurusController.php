<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::all();
        return view('pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        return view('pengurus.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengurus|max:255',
            'telepon' => 'required|string|max:20',
        ]);

        Pengurus::create($validatedData);

        return redirect()->route('pengurus.index')->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function edit(Pengurus $pengurus)
    {
        return view('pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pengurus,email,'.$pengurus->id,
            'telepon' => 'required|string|max:20',
        ]);

        $pengurus->update($validatedData);

        return redirect()->route('pengurus.index')->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();
        return redirect()->route('pengurus.index')->with('success', 'Pengurus berhasil dihapus.');
    }
}
