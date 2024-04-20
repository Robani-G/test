<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class DateController extends Controller
{
    public function showConvertForm()
    {
        return view('convert-date');
    }

    public function convertToAmharic(Request $request)
    {
        $gregorianDate = $request->input('date');

        $date = new Date($gregorianDate);
        $date->setLocale('am');

        $amharicDate = $date->format('l j F Y');
        // $ethiopianDate = $this->convertToEthiopianCalendar($gregorianDate);

        return response()->json(['amharic_date' => $amharicDate]);
    }

}
