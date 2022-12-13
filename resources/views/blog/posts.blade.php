<!-- page to view all posts -->
<!-- extends post controller -->

<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>

<body class="bg-gray-200">
    @include('layouts.navBar')  
    @include('layouts.posts')
   

</body>

</html>