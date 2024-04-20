<!-- resources/views/pdf_form.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('pdf.generateFromForm') }}" method="post" >
        @csrf
        <label for="text" accept-charset="UTF-8">Enter Text:</label><br>
        <textarea id="text" name="text" rows="4" cols="50"></textarea><br><br>
        <button type="submit">Generate PDF</button>
        hello
    </form> 
    
</body>
</html>