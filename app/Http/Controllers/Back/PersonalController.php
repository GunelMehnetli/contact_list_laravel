<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use App\Models\PhoneNumber;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=PersonalInformation::orderBy('created_at', 'ASC')->get();
        return view('back.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('back.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $contact = new PersonalInformation;
    $contact->company_name = $request->company_name;
    $contact->full_name = $request->full_name;
    $contact->office_number = $request->office_number;
    $contact->email = $request->email;
    $contact->faks = $request->faks;

    $contact->save();

   
    if (is_array($request->phone_numbers)) {
        foreach ($request->phone_numbers as $phoneNumber) {
            $newPhoneNumber = new PhoneNumber;
            $newPhoneNumber->phone_number = $phoneNumber;
            $contact->phoneNumbers()->save($newPhoneNumber);
        }
    }

    return redirect()->route('admin.personal.index')->with('success', 'Məlumat uğurla əlavə edildi.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = PersonalInformation::find($id);
        return view('back.contacts.update',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $contact = PersonalInformation::find($id);
    
        if (!$contact) {
            return redirect()->route('admin.personal.index')->with('error', '');
        }
    
      
        $contact->company_name = $request->company_name;
        $contact->full_name = $request->full_name;
        $contact->office_number = $request->office_number;
        $contact->email = $request->email;
        $contact->faks = $request->faks;
    
        
        foreach ($request->phone_numbers as $phoneNumberId => $newPhoneNumber) {
            $phoneNumber = PhoneNumber::find($phoneNumberId);
            
            if ($phoneNumber) {
                $phoneNumber->phone_number = $newPhoneNumber;
                $phoneNumber->save();
            }
        }
    
        $contact->save();
    
        return redirect()->route('admin.personal.index')->with('success', 'Məlumat uğurla yeniləndi..');
    }
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = PersonalInformation::find($id);
        $contact->delete();
        return redirect()->route('admin.personal.index')->with('success', 'Məlumat uğurla silindi..');
    }
}
