<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulk Upload</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Your existing styles here */
        /* Additional styles for form container */
        body {
            background-color: blueviolet;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 34px rgba(0, 0, 0, 0.06);
            max-width: 400px; /* Adjust width as needed */
            width: 100%;
            text-align: center;
        }
        .form-container h1 {
            color: #FF2D20; /* Change color to match your design */
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-container p {
            color: #555; /* Adjust color as needed */
            font-size: 1rem;
            margin-bottom: 30px;
        }
        .form-container input[type=file] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc; /* Adjust border color */
            border-radius: 5px;
            outline: none;
        }
        .form-container button[type=submit] {
            margin-top: 20px;
            background-color: #FF2D20; /* Change button color */
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container button[type=submit]:hover {
            background-color: #D62017; /* Change hover color */
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="container">
            <div class="form-container">
                <h1>Bulk Upload</h1>
                <p>Please select a .CSV file to upload:</p>
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="fileUpload" id="fileUpload" >
                    <br>
                    <br>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
