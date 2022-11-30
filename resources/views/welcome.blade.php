<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    </head>
    <body class="antialiased flex justify-center items-center">

            <table class="flex" id="card"></table>



    </body>
    <script>
        // api url
        const api_url =
            "http://127.0.0.1:8000/api/cours";

        // Defining async function
        async function getapi(url) {

            // Storing response
            const response = await fetch(url);

            // Storing data in form of JSON
            var data = await response.json();
            console.log(data);

            show(data);
        }
        // Calling that async function
        getapi(api_url);

        // Function to define innerHTML for HTML table
        function show(data) {
            let tab = ``;

            // Loop to access all rows
            for (let r of data) {

                tab +=
                    `<div class="flex flex-col w-[300px] mx-8" id="container">
                        <img class="h-[175px]" src="${r.image_url}"</img>
                        <div class="bd mt-4">
                            <h1 class="text-xl font-bold px-8 pb-3">Cours: ${r.name}</h1>
                            <p class="flex justify-center mx-8 font-medium mb-4">${r.description}</p>
                        </div>
                        <p class="px-8 py-3.5 font-medium bd">Programme : ${r.programme}</p>
                        <p class="px-8 py-3.5 font-medium bd">Année : ${r.year}</p>
                        <p class="px-8 py-3.5 font-medium">${r.date_debut} - ${r.date_fin}</p>
                    </div>`;
            }
            // Setting innerHTML as tab variable
            document.getElementById("card").innerHTML = tab;
        }

    </script>

</html>
