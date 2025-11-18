<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Job Application PDF</title>
    <style>
        body { font-family: sans-serif; }
        h2 { color: #3490dc; }
    </style>
</head>
<body>
    <h2>Job Application Summary</h2>
    <p><strong>Name:</strong> {{ $application->name }}</p>
    <p><strong>Email:</strong> {{ $application->email }}</p>
    <p><strong>Position:</strong> {{ $application->position }}</p>
    <p><strong>Cover Letter:</strong></p>
    <p>{{ $application->cover_letter }}</p>
</body>
</html>
