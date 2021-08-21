<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/assets/template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/template/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Administrator Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <form id="formLogin" action="{{ url("administrator/auth/login") }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="btnLogin"> <div class="spinner-border align-middle mr-1 d-none" id="iconLoading" style="width: 15px; height: 15px;" role="status"><span class="sr-only"></span></div> <i class="fa fa-sign-in-alt mr-1" id="iconSignIn"></i> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/assets/template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/assets/template/dist/js/adminlte.min.js') }}"></script>

<script>
    $(() => {
        $("#formLogin").submit((e) => {
            e.preventDefault();
            $("#iconSignIn").addClass("d-none");
            $("#iconLoading").removeClass("d-none");
            $("#btnLogin").attr("disabled", true);
            $.ajax({
                type: "post",
                url: "",
                data:  $("#formLogin").serialize(),
                success: function (response) {

                    console.log(response);
                    if (response.status == "SUCCESS") {
                        alert("Login Successfully");
                        window.location.href = "{{ url('administrator/dashboard') }}";
                    }else{

                        $("#iconSignIn").removeClass("d-none");
                        $("#iconLoading").addClass("d-none");
                        $("#btnLogin").attr("disabled", false);
                        alert(response.respMessage);
                    }
                },
                error: function(request, status, error) {

                  $("#iconSignIn").removeClass("d-none");
                  $("#iconLoading").addClass("d-none");
                  $("#btnLogin").attr("disabled", false);
                  
                }
            });

        });
    });
</script>
</body>
</html>