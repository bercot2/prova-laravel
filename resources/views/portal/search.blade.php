<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Documents</title>
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
            <div class="search-results" style="width: 680px;">
                <h2>Pesquisa de Documentos</h2>
                <br>
                <br>
                <form action="{{ route('search.document') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Digite um termo de pesquisa" style="width: 310px;">
                    <button type="submit">Pesquisar</button>
                </form>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome Proprietário</th>
                            <th>Email Proprietário</th>
                            <th>Arquivo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $file['name_user'] }}</td>
                            <td>{{ $file['email_user'] }}</td>
                            <td>{{ $file['filename'] }}</td>
                            @foreach ($file['acoes'] as $acao)
                                <td>
                                    @if ($acao == 'Download')
                                        <a href="{{ route('download', $file['id']) }}">Download</a>
                                    @elseif ($acao == 'Excluir')
                                        <a href="{{ route('delete', $file['id']) }}" onclick="return confirmDelete();">Excluir</a>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if ($files instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $files->links() }}
                @endif
                <a href="{{ route('portal') }}" class="btn-back">Voltar</a>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <script>
        function confirmDelete() {
            return confirm('Tem certeza que deseja excluir o arquivo?');
        }
    </script>

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
