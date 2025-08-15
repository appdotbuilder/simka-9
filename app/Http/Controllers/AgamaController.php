<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgamaRequest;
use App\Http\Requests\UpdateAgamaRequest;
use App\Models\Agama;
use Inertia\Inertia;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agamas = Agama::orderBy('urut', 'asc')->orderBy('nama_agama', 'asc')->paginate(10);
        
        return Inertia::render('agama/index', [
            'agamas' => $agamas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('agama/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgamaRequest $request)
    {
        $agama = Agama::create($request->validated());

        return redirect()->route('agama.index')
            ->with('success', 'Data agama berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agama $agama)
    {
        return Inertia::render('agama/show', [
            'agama' => $agama
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agama $agama)
    {
        return Inertia::render('agama/edit', [
            'agama' => $agama
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgamaRequest $request, Agama $agama)
    {
        $agama->update($request->validated());

        return redirect()->route('agama.index')
            ->with('success', 'Data agama berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        $agama->delete();

        return redirect()->route('agama.index')
            ->with('success', 'Data agama berhasil dihapus.');
    }
}