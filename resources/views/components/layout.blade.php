@props([
    'title' => 'hemalsri',
])

<!doctype html>
<html lang="en" data-theme="synthwave">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }

        .card {
            background: rgb(231, 125, 125);
            padding: 1rem;
            text-align: center;
        }

        nav>a {
            color: blue;
        }
    </style>
</head>

<body>

    <div class="navbar bg-base-200 shadow-sm">

        <div class="navbar-start">

            <div class="dropdown">

                <div
                    tabindex="0"
                    role="button"
                    class="btn btn-ghost"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16"
                        />
                    </svg>
                </div>

                <ul
                    tabindex="-1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow"
                >
                    <li><a href="/">Home</a></li>
                    <li><a href="/ideas">Ideas</a></li>
                    <li><a href="/ideas/create">New Idea</a></li>
                    <li><a href="/users">Users</a></li>

                    @can('view-admin')
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    @endcan
                </ul>

            </div>

            <a href="/" class="btn btn-ghost text-xl">
                IdeaUI
            </a>

        </div>

        <div class="navbar-center hidden lg:flex">

            <ul class="menu menu-horizontal px-1">

                <li><a href="/">Home</a></li>
                <li><a href="/ideas">Ideas</a></li>
                <li><a href="/ideas/create">New Idea</a></li>
                <li><a href="/users">Users</a></li>
                <li><a href="/music">Music</a></li>
                <li><a href="/movie">Movie</a></li>

                @can('view-admin')
                    <li>
                        <a href="/admin">Admin</a>
                    </li>
                @endcan

            </ul>

        </div>

        <div class="navbar-end">

            @guest
                <a class="btn btn-ghost" href="/login">
                    Login
                </a>

                <a class="btn" href="/register">
                    Register
                </a>
            @endguest

            @auth
                <form method="POST" action="/logout">
                    @csrf

                    <button class="btn btn-ghost">
                        Log Out
                    </button>
                </form>
            @endauth

        </div>

    </div>

    <main class="max-w-3xl mx-auto">
        {{ $slot }}
    </main>

</body>

</html>