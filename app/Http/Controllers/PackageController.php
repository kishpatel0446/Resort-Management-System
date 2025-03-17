<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required|string',
            'details' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|in:picnic,room',
        ]);

        Package::create($request->all());
        return redirect()->route('admin.packages.index')->with('success', 'Package added successfully');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'time' => 'required|string',
            'details' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());
        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        Package::findOrFail($id)->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully');
    }
    
    public function showPackages()
{
    $picnicPackages = Package::where('type', 'picnic')->get();
    $roomPrices = Package::where('type', 'room')->get();
    return view('perks', compact('picnicPackages', 'roomPrices'));
}
public function showHome()
{
    $picnicPackages = Package::where('type', 'picnic')->get();
    $roomPrices = Package::where('type', 'room')->get();

    return view('welcome', compact('picnicPackages', 'roomPrices'));
}
}
