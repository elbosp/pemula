@extends('Dashboard.Dinas.tim')
@section('content-crud')
<!DOCTYPE html>
<html lang="en" ng-app="chatApp">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.4/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
		apiKey: "AIzaSyBriISG7eXdkagC2QmbXbKzYCvsqRXF1gQ",
		authDomain: "banana-latte.firebaseapp.com",
		databaseURL: "https://banana-latte.firebaseio.com",
		projectId: "banana-latte",
		storageBucket: "banana-latte.appspot.com",
		messagingSenderId: "780753542461"
	  };
	  firebase.initializeApp(config);
	</script>
  <script src="https://cdn.firebase.com/libs/angularfire/2.2.0/angularfire.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body ng-controller="ChatController">
  @include('footer')
    <br>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Web Based Firebase Chat Application</div>
            <div class="panel-body">
                <p ng-repeat="m in messages">@{{m.user}} - @{{m.message}} - @{{m.date | date:'medium'}}</p>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Message here..." ng-model="messageText" id="fieldInput">
                </div>
                <button type="submit" class="btn btn-default" ng-click="send()" onclick="refresh()" id="sendButton">Send</button>
            </div>
        </div>
    </div>
<script src="{{asset('js/pesan.js')}}"></script>
</body>
</html>
@endsection
