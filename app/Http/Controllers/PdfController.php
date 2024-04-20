<?php
// TranslationController.php

// app/Http/Controllers/PdfController.php

// app/Http/Controllers/PdfController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Mpdf\Mpdf;


class PdfController extends Controller
{
    public function showForm()
    {
        return view('pdf.generate-pdf-form');
    }

    public function generateFromForm(Request $request)
    {
        $text = $request->input('text'); // Get the text from the request

        // Create new MPDF instance
        $mpdf = new Mpdf();

        // Set document properties
        $mpdf->SetTitle('Your Title');
        $mpdf->SetAuthor('Your Author');
        $mpdf->SetSubject('Your Subject');
        $mpdf->SetKeywords('Your Keywords');

        // Add a page
        $mpdf->AddPage();

        // Set font
        $mpdf->SetFont('Arial', 'B', 16);

        // Add content
        $mpdf->WriteHTML($text);

        // Output the PDF as a download
        $mpdf->Output('your-pdf-file.pdf', 'D');

        return response()->json(['message' => 'PDF generated successfully']);
    }
}


