<?php

namespace App\Http\Controllers;

use App\Models\MailtoAuriga;
use Illuminate\Http\Request;

class MailtoAurigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailto = MailtoAuriga::all();
        return view('mailto.index',compact('mailto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //sa
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|max:255'
        ]);

        MailtoAuriga::create([
            'email' => $request->email
        ]);
        toast()->success('Data have been succesfully saved!');
        return redirect('mailtoauriga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailtoAuriga  $mailtoAuriga
     * @return \Illuminate\Http\Response
     */
    public function show(MailtoAuriga $mailtoAuriga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailtoAuriga  $mailtoAuriga
     * @return \Illuminate\Http\Response
     */
    public function edit($mailtoAuriga)
    {
        $mail = MailtoAuriga::find($mailtoAuriga);
        return view('mailto.edit',compact('mail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailtoAuriga  $mailtoAuriga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mailtoAuriga)
    {
        $this->validate($request,[
            'email' => 'required|max:255'
        ]);
        $mail = MailtoAuriga::find($mailtoAuriga);
        $mail->update($request->all());
        return redirect('mailtoauriga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailtoAuriga  $mailtoAuriga
     * @return \Illuminate\Http\Response
     */
    public function destroy($mailtoAuriga)
    {
        $mail = MailtoAuriga::find($mailtoAuriga);
        $mail->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your mail has been deleted!'
                ));
    }
}
