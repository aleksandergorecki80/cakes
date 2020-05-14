<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class SendContactForm extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        // Validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        $details = [
            'title' => 'Wiadomość z bloga.',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content')
        ];

        $token = $request->recaptchaToken;

        if($token){
        
            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/',
                'timeout' => 2.0
                ]);
    
            $response = $client->request('POST', 'siteverify', [
                'query' => [
                'secret' => env('CAPTCHA_SECRET'),
                'response' => $token]]);
    
            $results = json_decode($response->getBody()->getContents());

            if($results->success){
                \Mail::to('a.gorecki1980@gmail.com')->send(new \App\Mail\SendMail($details));

                return response()
                ->json(['message' => 'Success'], 200);



            } else {
                
                return redirect('/contact')->with('error', 'Spróbuj ponownie');
            }

        } else {
            dd($token);
            return redirect('/contact');
        }
    }
}
