<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>

<body>
    <div class="w-screen h-screen bg-cover bg-center flex flex-row justify-center items-center">
        <div class="bg-primary p-6 rounded-lg text-white">
            <h1 class="text-3xl text-center font-medium pb-8">Lorem Cafe</h1>
            <p class="text-center pb-3">Silahkan masukkan nomor meja kamu :</p>
            <div class="flex gap-x-3 pb-1">
                <form action="/home" method="POST">
                    @csrf
                    <input type="text" name="nomer_meja" class="flex-1 rounded-lg text-slate-800 px-1 font-medium shadow-lg focus:outline-none focus:ring-2 focus:ring-secondary">
                    <button class="bg-accent px-6 py-1 font-medium rounded-full shadow-lg hover:bg-secondary hover:text-slate-700" type="submit">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>