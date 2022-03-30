@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Olá quer consultar algum endereço?</h5>
                <div class="card-body">
                    <h5 class="card-title">Este é um web site para consulta de endereços</h5>
                    <p class="card-text">
                        Digite o CEP que deseja consultar, e retornaremos o endereço
                    </p>
                    <a href="/adress" class="btn btn-primary">Veja os CEPs já Consultados</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            @if (session()->has('adress'))
                <div class="card">
                    <div class="card-header" id="heading-{{ session()->get('adress')->id }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse-{{ session()->get('adress')->id }}" aria-expanded="true"
                                aria-controls="collapse-{{ session()->get('adress')->id }}">
                                {{ session()->get('adress')->zip_code }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapse-{{ session()->get('adress')->id }}" class="collapse show"
                        aria-labelledby="collapse-{{ session()->get('adress')->id }}" data-parent="#accordion-adesses">
                        <div class="card-body">
                            @if (session()->get('adress')->adress != '')
                                <h5 class="card-title">
                                    {{ session()->get('adress')->adress .', ' .session()->get('adress')->neighborhood .' - ' .session()->get('adress')->complement }}
                                </h5>
                            @endif
                            <p class="card-text">
                                {{ session()->get('adress')->city . ' - ' . session()->get('adress')->state }}
                                <br />
                            <ul>
                                <li>DDD: {{ session()->get('adress')->ddd }}</li>
                                <li>ibge: {{ session()->get('adress')->ibge }}</li>
                                <li>gia: {{ session()->get('adress')->gia }}</li>
                                <li>siafi: {{ session()->get('adress')->siafi }}</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error') && session()->get('error') != '')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ session()->get('error') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="/adress" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputCEP">Digite o CEP que deseja consultar</label>
                    <input type="text" class="form-control cep" name="zip_code" id="inputCEP" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>

        </div>
    </div>
@endsection
