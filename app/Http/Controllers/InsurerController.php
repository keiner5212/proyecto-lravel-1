<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insurer;

class InsurerController extends Controller
{
    // Show insurers panel
    public function adminInsurersPanel()
    {
        $insurers = Insurer::all();
        return view('admin.insurers.adminInsurersPanel', compact('insurers'));
    }

    // New insurer

    // Show new form for insurer
    public function adminNewInsurerForm()
    {
        return view('admin.insurers.adminInsurersForm');
    }

    // Save of new form for insurer
    public function adminSaveInsurerForm(Request $request)
    {
        $insurer = new Insurer;
        $insurer->name = $request->input('name');
        $insurer->cif = $request->input('cif');
        $insurer->address = $request->input('address');
        $insurer->tax = $request->input('tax');
        $insurer->save();
        return redirect(route("adminInsurersPanel"));
    }

    // Edit insurer

    // Show form for existent insurer
    public function adminShowEditInsurerForm($id)
    {
        try {
            $aux = Insurer::where('id', intval($id))->get();
            $insurer = $aux[0];
        } catch (\Throwable $th) {
            $insurer = "x";
        }
        return view('admin.insurers.adminInsurersEditForm', compact('insurer'));
    }

    // Save on existent insurer
    public function adminSaveEditInsurerForm($id,Request $request)
    {
        Insurer::where('id', $id)->update(
            [
            'name' => $request->input('name'),
            'cif' => $request->input('cif'),
            'address' => $request->input('address'),
            'tax' => $request->input('tax')
            ]
        );
        return redirect(route("adminInsurersPanel"));
    }

    // Put active or inactive

    // Set active on insurer
    public function isActive($id)
    {
        Insurer::where('id', $id)->update(['active' => 1]);
        return redirect(route("adminInsurersPanel"));
    }

    // Set inactive on insurer
    public function isInactive($id)
    {
        Insurer::where('id', $id)->update(['active' => 0]);
        return redirect(route("adminInsurersPanel"));
    }
}
