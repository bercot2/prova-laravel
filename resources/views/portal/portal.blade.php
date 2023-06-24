<!DOCTYPE html>
<html lang="en">
<head>
	<title>Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="portal-options" style="display: flex;justify-content: center;flex-direction: column;">
                    <div class="container-login100-form-btn">
                        <a href="{{ route('upload.document') }}" class="login100-form-btn" style="gap:6px;background: #333333; border-radius: 10px; cursor: pointer">
                            <span class="portal-option-icon">
                                <i class="zmdi zmdi-upload"></i>
                            </span>
                            <span class="portal-option-label">
                                Upload de Documento
                            </span>
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <a href="{{ route('share.document') }}" class="login100-form-btn" style="gap:6px;background: #333333; border-radius: 10px; cursor: pointer">
                            <span class="portal-option-icon">
                                <i class="zmdi zmdi-share"></i>
                            </span>
                            <span class="portal-option-label">
                                Compartilhar Documento
                            </span>
                        </a>
                    </div>

					<div class="container-login100-form-btn">
                        <a href="{{ route('search.document') }}" class="login100-form-btn" style="gap:6px;background: #333333; border-radius: 10px; cursor: pointer">
                            <span class="portal-option-icon">
                                <i class="zmdi zmdi-search"></i>
                            </span>
                            <span class="portal-option-label">
                                Buscar Documento
                            </span>
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <a href="{{ route('logout') }}" class="login100-form-btn" style="gap:6px;background: #274274; border-radius: 10px; cursor: pointer">
                            <span class="portal-option-icon">
                                <i class="zmdi zmdi-power"></i>
                            </span>
                            <span class="portal-option-label">
                                Sair
                            </span>
                        </a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body> 
</html>
