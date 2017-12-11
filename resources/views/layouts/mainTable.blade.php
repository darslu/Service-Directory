<!DOCTYPE html>
<html lang="en">
<head>

@include('partialsMainTable.head')

</head>

<body class="body-wrapper">


@include('partialsMainTable.topbar')

@yield('content')


<!--============================
=            Footer            =
=============================-->

@include('partialsMainTable.footer')


@include('partialsMainTable.javascripts')

</body>

</html>


