<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WithWithout</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gray: '#333',
                        green: '#008d64'
                    },
                    fontSize: {
                        '96': '6rem'
                    }
                }
            }
            }
        </script>
    </head>
    <body class="antialiased bg-gray">
        <div class="flex items-center justify-center h-full">
            <p class="text-white text-96 font-bold">w<span class="text-green">/</span>w</p>
        </div>
    </body>
</html>
