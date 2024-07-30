function showLogin() {
    var Login = document.getElementById('login');
    var Signup = document.getElementById('signup');
    var Logout = document.getElementById('logout');
  
      Login.style.visibility= visible;
      Signup.style.visibility= visible;
      Logout.style.visibility= hidden;
  }
  function showLogout() {
      var Login = document.getElementById('login');
      var Signup = document.getElementById('signup');
      var Logout = document.getElementById('logout');
  
      Login.style.visibility= hidden;
      Signup.style.visibility= hidden;
      Logout.style.visibility= visible;
  }

