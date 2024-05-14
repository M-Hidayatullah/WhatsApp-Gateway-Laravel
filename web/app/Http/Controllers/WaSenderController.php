<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ListContact;
use App\Models\Messages;


use DB;

class WaSenderController extends Controller
{
    // fungsi index 
    public function index()
    {
        // $get_contacts = ListContact::select('progdi','number')->distinct('progdi')->get();
        $get_contacts = DB::table('list_contacts')
        ->select('progdi', DB::raw('MAX(number) as number'))
        ->groupBy('progdi')
        ->get();

        
        return view('wa_sender', compact('get_contacts'));
    }

    // fungsi uploadImage 
    public function uploadImage(Request $request)
    {
        if ($request->ajax()) {

            $prodi = $request->input('prodi_type');
            $numbers = DB::table('list_contacts')->where('progdi', $prodi)->pluck('number');

            $imageName = time() . '.' . $request->media_image->extension();
            $request->media_image->storeAs('public/upload', $imageName);
            
            // update jumlah send mmsg
           $msg =  Messages::find(1);
           $msg->count++;
           $msg->save();


            return response()->json([
                'success' => $imageName, 
                'ext' => $request->media_image->extension(),
                'numbers' => $numbers]);
        }
    }

    // fungsi uploadDocument
    public function uploadDocument(Request $request)
    {
        if ($request->ajax()) {

            $prodi = $request->input('prodi_type');
            $numbers = DB::table('list_contacts')->where('progdi', $prodi)->pluck('number');

            $documentName = time() . '.' . $request->media_document->extension();
            $request->media_document->storeAs('public/upload', $documentName);

            $msg =  Messages::find(1);
            $msg->count++;
            $msg->save();

            return response()->json([
                'success' => $documentName, 
                'ext' => $request->media_document->extension(),
                'numbers' => $numbers]);
        }
    }

    // fungsi getNomerByProdi
    public function getNomerByProdi(Request $request)
    {
        $prodi = $request->json('data');
        $numbers = DB::table('list_contacts')->where('progdi', $prodi)->pluck('number');

        $msg =  Messages::find(1);
        $msg->count++;
        $msg->save();

        return response()->json($numbers);

    }

    
    
}
