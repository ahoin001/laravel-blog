<!DOCTYPE html>
<title> Blog </title>
<link rel="stylesheet" href="/app.css">


<body>

    @yield('content')    

    {{-- place content here --}}
   {{ $slot }}

</body>