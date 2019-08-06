<head>
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="Phoenixcoded">
      <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="Phoenixcoded">
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('/admin/assets/images/favicon.ico')}}" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/bower_components/bootstrap/css/bootstrap.min.css')}}">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/icon/themify-icons/themify-icons.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/icon/icofont/css/icofont.css')}}">
      
      <!-- Menu-Search css -->
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/pages/menu-search/css/component.css')}}">
      
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/style.css')}}">
      <!--color css-->


      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/linearicons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/simple-line-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/ionicons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/jquery.mCustomScrollbar.css')}}">
      <script src="{{asset('/admin/bower_components/jquery/js/jquery.min.js')}}"></script>

  </head>