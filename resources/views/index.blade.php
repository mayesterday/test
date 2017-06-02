<!DOCTYPE html>
<html ng-app='myApp'>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="container">
      <div class="" ng-view>

      </div>
    </div>


    <script src="{{ asset("bower_components/angular/angular.min.js") }}" charset=""></script>
    <script src="{{ asset("bower_components/angular-route/angular-route.js") }}" charset=""></script>

    <script src="{{ asset("Routes/route.js") }}" charset=""></script>
    <script src="{{ asset("js/controllers.js") }}" charset=""></script>


  </body>
</html>
