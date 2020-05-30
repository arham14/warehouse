<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Warehouse Management System | Login</title>
	<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.easyui.min.js"></script>
    <style>
        body{
            background-image: url('images/bg.jpg');
        }
        .center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .form-border {
            background-color: #ffffff;
            opacity: 0.9;
            width: 100%;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #95B8E7;
        }
        .title{
            color: azure;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    
    <div style="width:100%;min-height:550px">
        
        <div class="wrap-form" style="width: 100%;">
            <div class="center">
                <h2 style="text-align:center;" class="title">Warehouse Management System</h2>
                <form class="form-border" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div style="margin-bottom:20px">
                        <input class="easyui-textbox" name="username" id="username" prompt="Username" iconWidth="28" style="width:100%;height:34px;padding:10px;" autofocus>
    
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div style="margin-bottom:20px">
                        <input id="pass" name="password" class="easyui-passwordbox" prompt="Password" iconWidth="28" style="width:100%;height:34px;padding:10px">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div style="margin-bottom:20px">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
    
                    <div style="margin-bottom:20px">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
    
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div id="viewer"></div>
        </div>
    </div>

	<script type="text/javascript">
		$('#pass').passwordbox({
			inputEvents: $.extend({}, $.fn.passwordbox.defaults.inputEvents, {
				keypress: function(e){
					var char = String.fromCharCode(e.which);
					$('#viewer').html(char).fadeIn(200, function(){
						$(this).fadeOut();
					});
				}
			})
		})
	</script>
	<style>
		#viewer{
			position: relative;
			padding: 0 60px;
			top: -70px;
			font-size: 54px;
			line-height: 60px;
		}
	</style>
</body>
</html>
