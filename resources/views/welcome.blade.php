@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    @guest
                        <div class="text-center">
                            <h1>Non sei loggato</h1>
                        </div>
                    @else
                        <div class="text-center">
                            <h1>Bentornato Andrea</h1>
                        </div>
                    @endguest
                    <h2>Contenuto pubblico</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
