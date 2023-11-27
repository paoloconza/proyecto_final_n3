<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83c3cfe2d7.js" crossorigin="anonymous"></script>
    <link href="/public/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-[#fff5d2]">
    <div class="flex flex-col items-center ">
        <img class="w-72" src="/assets/logo.jpg" alt="logo">
        <div class="bg-white p-5 w-72">
            <p class="text-xs text-center mb-4 font-semibold text-[#888b91]">Bienvenido ingresa con tu cuenta</p>
            <form class="flex flex-col" action="/login" method="post">
                <div class="flex flex-row-reverse">
                    <i class="fa-solid fa-envelope absolute mt-1.5 mr-2.5 text-xs" style="color: #828282;"></i>
                    <input class="text-xs border-2 w-full px-2 py-1 rounded" type="email" name="email" placeholder="Email">
                </div>
                <div class="my-2.5 flex flex-row-reverse">
                    <i class="fa-solid fa-lock absolute mt-1.5 mr-2.5 text-xs" style="color: #828282;"></i>
                    <input class="text-xs border-2 w-full px-2 py-1 rounded" type="password" name="password" placeholder="Password">
                </div>
                <button class="bg-[#007aff] py-2 px-4 rounded text-xs text-white self-end" type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</body>

</html>