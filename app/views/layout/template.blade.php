<!DOCTYPE html>
<html lang="en" data-ng-app="app">
<head>
  <meta charset="utf-8" />
  <title>{{ (strlen($page->title) >= 1 ? $page->title : 'CMS') }}</title>
  
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">		
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="/css/font.css" type="text/css" />
  <link rel="stylesheet" href="/css/app.css" type="text/css" />
</head>
<body>
  @yield('content')
</body>
</html>