<?php

namespace App\Http\Controllers;

use App\Exports\ContactsExport;
use App\Imports\ContactsImport;
use Illuminate\Http\Request;
use App\Models\ListContact;
use Maatwebsite\Excel\Facades\Excel;

class ListContactController extends Controller
{
    public function index()
    {
        $get_contacts = ListContact::orderBy('id', 'DESC')->get();
        return view('list_contacts', compact('get_contacts'));
    }

    public function addContact(Request $request)
    {
        $data = $request->validate([
            'nama_contact' => 'required',
            'nim_contact' => 'required|unique:list_contacts,nim|',
            'progdi_contact' => 'required',
            'number_contact' => 'required|unique:list_contacts,number|starts_with:62'
        ]);

        ListContact::create([
            'name' => $data['nama_contact'],
            'nim' => $data['nim_contact'],
            'progdi' => $data['progdi_contact'],
            'number' => $data['number_contact'],
        ]);

        return back()->with('success', 'Contact berhasil ditambahkan!');
    }

    public function editContact(Request $request)
    {
        
        $id = $request->edit_contact_id;
        $name = $request->edit_contact_name;
        $nim = $request->edit_contact_nim;
        $progdi = $request->edit_contact_progdi;
        $number = $request->edit_contact_number;

        ListContact::where('id', $id)->update(['name' => $name, 'nim' => $nim, 'progdi' => $progdi, 'number' => $number]);

        return back()->with('success', 'Data berhasil di ubah');
    }

    public function deleteContact(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            ListContact::where('id', $id)->delete();
        }

        return response()->json(['success' => 'Data berhasil di hapus']);
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            ListContact::truncate();
            return response()->json(['success' => 'Semua data berhasil di hapus']);
        }
    }

    public function fileImport(Request $request)
    {
        try {
            $request->validate([
                'file_import_contact' => 'mimes:xlsx,xls'
            ]);
            Excel::import(new ContactsImport, $request->file('file_import_contact'));
            return back()->with('success', 'Data berhasil di import');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $err = [];
            foreach ($failures as $failure) {
                $err[] = $failure->errors();
            }
            return back()->withErrors($err[0]);
        }
    }

    public function fileExport()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    public function saveContact(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->name;
            $pushname = $request->pushname;
            $number = $request->number;

            if (isset($name)) {
                $cek_contact = ListContact::where('number', $number);
                $cek_contact = ListContact::where('nim', $nim);
                if ($cek_contact->count() === 0) {
                    ListContact::create([
                        'name' => $name,
                        'nim' => $nim,
                        'progdi' => $progdi,
                        'number' => $number
                    ]);
                    return response()->json(['success' => 'Contact is save!']);
                } else {
                    return response()->json(['success' => 'Contact is already!']);
                }
            } else {
                if (isset($pushname)) {
                    ListContact::create([
                        'name' => $pushname,
                        'number' => $number,
                        'progdi' => $progdi
                    ]);
                    return response()->json(['success' => 'Contact is save!']);
                } else {
                    ListContact::create([
                        'name' => $number,
                        'number' => $number
                    ]);
                    return response()->json(['success' => 'Contact is save!']);
                }
            }
        }
    }
}
