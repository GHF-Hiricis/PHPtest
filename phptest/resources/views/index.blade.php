@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="card home">
                <h5 class="card-header">Olá quer consultar algum endereço?</h5>
                <div class="card-body">
                    <h5 class="card-title">Este é um web site para consulta de endereços</h5>
                    <p class="card-text">
                        Digite o CEP que deseja consultar, e retornaremos o endereço
                    </p>
                    <a href="/adress" class="btn btn-1">Veja os CEPs já Consultados</a>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-lg-5">

            <div class="form-container">
                <form action="/adress" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control cep" name="zip_code" id="inputCEP"
                                placeholder="Digite o CEP que deseja consultar"
                                aria-label="Digite o CEP que deseja consultar" aria-describedby="button-addon">
                            <div class="input-group-append">
                                <button class="btn btn-1" type="submit" id="button-addon">Consultar</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            @if (session()->has('adress'))
                <div class="card adress">
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

        </div>
    </div>
@endsection
