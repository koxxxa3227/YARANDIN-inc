<?php

namespace App\Http\Controllers;

use App\Models\ProjectTaskFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    public function setLocale($locale)
    {
        $locales = config("app.locales");

        if (!in_array($locale, $locales)) {
            $locale = config("app.locale");
        }
        Session::put("locale", $locale);
        return back();
    }

    public function getFile($id){
        $file = ProjectTaskFile::findOrFail($id);

        return response()->download(storage_path('app/' . $file->path));
    }
}
