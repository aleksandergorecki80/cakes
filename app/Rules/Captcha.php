<?php

namespace App\Rules;

// Using reCaptcha
use GuzzleHttp\Client;

use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if(!empty($value)){
            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/',
                'timeout' => 2.0
                ]);
    
            $response = $client->request('POST', 'siteverify', [
                'query' => [
                'secret' => env('CAPTCHA_SECRET'),
                'response' => $value]]);
    
            $results = json_decode($response->getBody()->getContents());
        if($results->success){
            return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
