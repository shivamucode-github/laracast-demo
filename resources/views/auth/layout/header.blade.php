<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laracast | posts</title>
    @vite('resources/css/app.css')
    </title>
</head>

<body class="px-12 m-auto">
    <header class="py-4 flex items-center justify-between border-b border-gray-500">
        <h1 class="text-5xl">Blog<span class="font-bold">Post</span></h1>
        <nav>
            <ul class="flex items-center gap-4">
                <li><a href="/login"
                        class="px-6 py-3 rounded-full bg-blue-400 hover:bg-blue-500 text-white outline-none shadow">Login</a>
                </li>
                <li><a href="/register"
                        class="px-6 py-3 rounded-full bg-blue-400 hover:bg-blue-500 text-white outline-none shadow">Signup</a>
                </li>
            </ul>
        </nav>
        <x-flash />
    </header>
