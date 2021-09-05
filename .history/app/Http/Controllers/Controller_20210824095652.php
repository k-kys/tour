<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected const TYPE_SUCCESS = 'success';
    protected const TYPE_ERROR = 'error';

    public function sweetAlert()
    {
        alert()->success('Message for title', 'warning');
        return view('test.sweetalert');
    }

    public function changeLanguage(Request $request, $language)
    {
        $request->session()->put('website_language', $language);

        return redirect()->back();
    }

    public function generateCode($length = 10)
    {
        $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomChar = $permittedChars[mt_rand(0, strlen($permittedChars) - 1)];
            $randomString .= $randomChar;
        }
        return $randomString;
    }
}
