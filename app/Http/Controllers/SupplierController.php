<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(): View
    {
        return view('inventory.supplier.index', [
            'suppliers' => Supplier::orderBy('name')->get(),
            'type' => 'show'
        ]);
    }

    public function create(): View
    {
        return view('inventory.supplier.form', [
            'type' => 'create'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name',
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'email',
            'description' => ''
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('status', 'Supplier berhasil ditambahkan');
    }

    public function edit(Supplier $supplier): View
    {
        return view('inventory.supplier.form', [
            'supplier' => $supplier,
            'type' => 'edit'
        ]);
    }

    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name,' . $supplier->id,
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'email',
            'description' => ''
        ]);

        $supplier->update([
            'name' => $request->name
        ]);

        return redirect()->route('supplier.index')->with('status', 'Supplier berhasil diubah');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();

        return redirect()->route('supplier.index')->with('status', 'Supplier berhasil dihapus');
    }
}
