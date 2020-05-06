var user = window.nama;
var tim = window.tim;
var app = angular.module('chatApp', ['firebase']);

app.controller('ChatController', function($scope, $firebaseArray) {
    var ref = firebase.database().ref().child('messages').child(tim);
    $scope.messages = $firebaseArray(ref);

    $scope.send = function() {
        $scope.messages.$add({
          user: user,
          message: $scope.messageText,
          date: Date.now()
        });
    }
});

var input = document.getElementById("fieldInput");
input.addEventListener("keyup", function(event) {
  event.preventDefault();
  if (event.keyCode === 13) {
    document.getElementById("sendButton").click();
  }
});

function refresh() {
  document.getElementById('fieldInput').value = "";
}
