<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salesman;

class SalesmanController extends Controller
{
    // Menampilkan semua salesman
    public function index()
    {
        $salesmen = Salesman::paginate(10);
        return view('admin.salesmans.index', compact('salesmen'));
    }


    // Menampilkan form tambah salesman
    public function create()
    {
        return view('admin.salesmans.create');
    }

    // Menyimpan salesman baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);


        Salesman::create($request->all());

        return redirect()->route('admin.salesmans')->with('success', 'Salesman added successfully.');
    }

    // Menampilkan detail salesman
    public function show($id)
    {
        $salesman = Salesman::findOrFail($id);
        return view('admin.salesmans.show', compact('salesman'));
    }

    // Menampilkan form edit salesman
    public function edit($id)
    {
        $salesman = Salesman::findOrFail($id);
        return view('admin.salesmans.edit', compact('salesman'));
    }

    // Menyimpan perubahan pada salesman
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);

        $salesman = Salesman::findOrFail($id);
        $salesman->update($request->all());

        return redirect()->route('admin.salesmans.index')->with('success', 'Salesman updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan dan hapus salesman
        $salesman = Salesman::findOrFail($id);
        $salesman->delete();

        return redirect()->route('admin.salesmans.index')->with('success', 'Salesman deleted successfully.');
    }
}
