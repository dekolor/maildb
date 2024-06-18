<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="mt-12 md:mt-32 lg:mt-12 w-full lg:w-2/5 m-auto flex flex-col items-center bg-white p-10">
    <h3 class="text-blue-900 font-semibold text-center text-3xl">Get started with Help Scout</h3>
    <p class="mt-6 text-gray-600 text-lg text-center leading-normal font-light">A better experience for your customers,
        fewer headaches for your team.
        <br>You'll be set up in minutes.
    </p>
    <form class="w-full">
        @csrf
        <div class="mt-6 flex flex-col md:flex-row w-full md:px-8">
            <input class="flex flex-grow px-4 py-2 rounded text-gray-500 border border-gray-500" placeholder="Email Address">
            <button class="mt-2 md:mt-0 md:ml-2 bg-blue-500 shadow-lg rounded text-white px-4 py-3">Get Started</button>
        </div>
    </form>
    <p class="mt-6 text-gray-500">See Help Scout in action.<a class="ml-2 text-blue-500" href="#">Get a Demo</a></p>
</div>
</body>
</html>
