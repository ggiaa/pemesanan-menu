<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Login</title>
</head>

<body>
    <div class="w-screen h-screen image-cover flex flex-col justify-center items-center">
        @if (session('error'))
        <div class="mb-4 bg-accent py-1 px-4 text-white rounded-md">
            {{ session('error') }}
        </div>
        @endif
        <div class="bg-primary text-white px-6 pt-6 pb-8 rounded-lg relative w-full max-w-sm shadow-xl border border-gray-400">
            <div>
                <h1 class="text-3xl text-center font-medium pb-8">Login</h1>

                <form method="POST">
                    @csrf

                    <div class="flex flex-wrap justify-center gap-y-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" name="username" autocomplete="off" class="ml-4 text-left form-control bg-transparent border border-slate-100 rounded-full focus:outline-none px-2 py-1" type="text" name="username">
                            @error('username')
                            <div class="text-accent w-full text-right text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" class="ml-4 text-left form-control bg-transparent border border-slate-100 rounded-full focus:outline-none px-2 py-1" type="password" name="password">
                            @error('password')
                            <div class="text-accent w-full text-right text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="flex justify-end w-full">
                            <button type="submit" class="btn btn-primary bg-accent py-1 px-8 rounded-full mr-6">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>