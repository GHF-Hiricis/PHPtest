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
                    <a href="/adresses" class="btn btn-primary">Veja os CEPs já Consultados</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form>
                <div class="form-group">
                    <label for="inputCEP">Digite o CEP que deseja consultar</label>
                    <input type="text" class="form-control" id="inputCEP" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>

        </div>
    </div>
@endsection