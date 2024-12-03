<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'message' => 'required|string|max:1000',
    ]);

    // Simpan data ke database (sesuaikan dengan model Anda)
    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->save();

    // Toastr success notification
    toastr()->timeOut(10000)->closeButton()->addSuccess('Pesan Anda Berhasil Dikirim!');

    return redirect()->back();
}

}



