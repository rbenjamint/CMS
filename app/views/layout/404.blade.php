@extends('layout.template')

@section('content')

  <div class="container w-xxl w-auto-xs" ng-init="app.settings.container = false;">
    <div class="text-center m-b-lg">
      <h1 class="text-shadow text-white">404</h1>
    </div>
    <div class="list-group bg-info auto m-b-sm m-b-lg">
      <a href="/" class="list-group-item">
        <i class="fa fa-chevron-right text-muted"></i>
        <i class="fa fa-fw fa-mail-forward m-r-xs"></i> Terug naar home pagina
      </a>
    </div>
    <div class="text-center" ng-include="'tpl/blocks/page_footer.html'"></div>
  </div>

@stop