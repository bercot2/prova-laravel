<!DOCTYPE html>
<html lang="en">
<head>
    <title>Meus Documentos</title>
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
    
    <style>
        .btn-back {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #333333;
            border-radius: 10px;
            padding: 10px 20px;
            color: #ffffff;
            cursor: pointer;
            z-index: 9999;
        }
    </style>

</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-upload">
                <div class="container">        
                    <h3>Compartilhar Documentos</h3>
                    
                    <br>
                    <br>

                    <!-- Formulário de compartilhamento -->
                    <form action="{{ route('share.document') }}" method="POST">
                        @csrf

                        <label for="action">Selecione a Ação:</label><br>
                        <label for="checkbox-visualizar">
                            <input type="checkbox" id="checkbox-visualizar" name="action[]" value="visualizar">
                            Visualizar
                        </label>

                        <label for="checkbox-excluir">
                            <input type="checkbox" id="checkbox-excluir" name="action[]" value="excluir">
                            Excluir
                        </label>

                        <br>
                        <br>

                        <label for="document">Selecione o Documento:</label>
                        <select name="document" id="document">
                            @foreach ($documents as $document)
                                <option value="{{ $document->id }}">{{ $document->filename }}</option>
                            @endforeach
                        </select>

                        <br>
                        <br>
                        
                        <label for="user">Selecione o Usuário:</label>
                        <select name="user" id="user">
                            @foreach ($otherUsers as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                        
                        <br>
                        <br>

                        <input type="submit" value="Compartilhar" class="login100-form-btn " style="gap:6px;background: #333333; border-radius: 10px; cursor: pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('portal') }}" class="btn-back">Voltar</a>

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
