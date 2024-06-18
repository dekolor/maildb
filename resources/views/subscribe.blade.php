<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="mt-12 md:mt-32 lg:mt-12 w-full lg:w-2/5 m-auto flex flex-col items-center bg-white p-10">
    <h3 class="text-blue-900 font-semibold text-center text-3xl">{{ $project->name }}</h3>
    <p class="mt-6 text-gray-600 text-lg text-center leading-normal font-light">Subscribe to our newsletters
    </p>

    @if(session('status'))
        <div
            class="p-4 my-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <span class="font-medium">{{ session('status') }}</span>
        </div>
    @endif
    <form method="post" class="w-full">
        @csrf
        <div class="mt-6 flex flex-col md:flex-row w-full md:px-8">
            <input type="email" name="email" class="flex flex-grow px-4 py-2 rounded text-gray-500 border border-gray-500" placeholder="Email Address" required>
            <button class="mt-2 md:mt-0 md:ml-2 bg-blue-500 shadow-lg rounded text-white px-4 py-3">Get Started</button>
        </div>
        @if ($errors->any())
            <div class="p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <p class="mt-6 text-gray-500">Powered by MailDB<a class="ml-2 text-blue-500" href="#">Privacy policy</a></p>
</div>
</body>
</html>
