


  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCIO7dQTTZpYWdsN3qWps74iHfPIMv3Enw",
    authDomain: "suritag-213423.firebaseapp.com",
    databaseURL: "https://suritag-213423.firebaseio.com",
    projectId: "suritag-213423",
    storageBucket: "suritag-213423.appspot.com",
    messagingSenderId: "963368810593"
  };
  firebase.initializeApp(config);
  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
