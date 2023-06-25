<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inscreva-se</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="success-message">
				<span class="login100-form-title" style="color:green">
					Documento Importado com Sucesso!
				</span>
			</div>
		</div>
	</div>
</div>

<script>
    // Função para redirecionar após o atraso
    function redirectLogin() {
        window.location.href = "{{ route('portal') }}";
    }
    
    // Obtém o tempo de atraso em segundos
    var delay = {{ $delay }} * 1000;

    // Aguarda o tempo de atraso e redireciona
    setTimeout(redirectLogin, delay);
</script>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
