@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Temperatura Primaria') }}</div>
                    <div class="card-body">
                        <p id="temperatura1"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Temperatura Secundaria') }}</div>
                    <div class="card-body">
                        <p id="temperatura2"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Horno') }}</div>
                    
                    <div>
                        <table class="table justify-content-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserName</th>
                                    <th>Ciclo</th>
                                    <th>Bomba</th>
                                    <th>Temp_Set</th>
                                    <th>Creacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hornoData as $horno)
                                    <tr>
                                        <td>{{ $horno->id }}</td>
                                        <td>{{ $horno->UserName }}</td>
                                        <td>{{ $horno->Ciclo }}</td>
                                        <td>{{ $horno->Bomba }}</td>
                                        <td>{{ $horno->Temp_Set }}</td>
                                        <td>{{ $horno->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function actualizarTemperaturas() {
            $.get('/temperatura', function(data) {
                $('#temperatura1').text(data.temperatura1);
                $('#temperatura2').text(data.temperatura2);
            });
        }

        actualizarTemperaturas();
        setInterval(actualizarTemperaturas, 10000);
    </script>
@endsection
