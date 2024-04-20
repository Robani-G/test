<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;
use Carbon\Carbon;


class testcontroller extends Controller
{

    public function index(){
        $tests=test::all();
        return view('tests.index',['tests' => $tests]
    );
    }
    public function create()
    {
        return view('tests.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create and store the user
         test::create($validatedData);

        // Redirect to a success page or wherever you want
        return redirect()->route('tests.index')->with('success', 'User created successfully.');
    }
    public function destroy(test $tests)
{
    // Delete the user
    $tests->delete();

    // Redirect back with a success message
    return redirect()->route('tests.index')->with('success', 'User deleted successfully.');
}
    function gregorianToAmharic($date)
    {
        $gregorianDate = Carbon::parse($date);
    
        $year = $gregorianDate->year;
        $month = $gregorianDate->month;
        $day = $gregorianDate->day;
    
        // Calculate Amharic year
        $amharicYear = $year - 8;
        
        // Calculate Amharic month and day
        $amharicMonth = ($month + 4) % 13 + 1;
        $amharicDay = $day + 10;
    
        // Adjust Amharic month and day
        if ($amharicDay > 30) {
            $amharicDay -= 30;
            $amharicMonth++;
        }
    
        // Amharic month names
        $amharicMonths = [
            1 => 'Meskerem', 2 => 'Tikimt', 3 => 'Hidar', 4 => 'Tahsas',
            5 => 'Tir', 6 => 'Yekatit', 7 => 'Megabit', 8 => 'Miazia',
            9 => 'Genbot', 10 => 'Sene', 11 => 'Hamle', 12 => 'Nehase',
            13 => 'Pagumaini'
        ];
    
        // Return Amharic date string
        return $amharicMonths[$amharicMonth] . ' ' . $amharicDay . ', ' . $amharicYear;
    }
    
}
