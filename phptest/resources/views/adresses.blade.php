@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordion-adesses">

                @foreach ($adresses as $item)
                    <div class="card adress">
                        <div class="card-header" id="heading-{{ $item->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse-{{ $item->id }}" aria-expanded="true"
                                    aria-controls="collapse-{{ $item->id }}">
                                    {{ $item->zip_code }}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse-{{ $item->id }}" class="collapse"
                            aria-labelledby="collapse-{{ $item->id }}" data-parent="#accordion-adesses">
                            <div class="card-body">
                                @if ($item->adress != '')
                                    <h5 class="card-title">
                                        {{ $item->adress . ', ' . $item->neighborhood . ' - ' . $item->complement }}
                                    </h5>
                                @endif
                                <p class="card-text">
                                    {{ $item->city . ' - ' . $item->state }}
                                    <br />
                                <ul>
                                    <li>DDD: {{ $item->ddd }}</li>
                                    <li>ibge: {{ $item->ibge }}</li>
                                    <li>gia: {{ $item->gia }}</li>
                                    <li>siafi: {{ $item->siafi }}</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
