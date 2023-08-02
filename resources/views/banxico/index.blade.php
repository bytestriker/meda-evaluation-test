@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Series Banxico</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="content px-3">


        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Reading resource https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP68257
                </div>
            </div>
            <code>
                <pre>

                    <hr>
                    @php print_r($response) @endphp
                </pre>
            </code>

        </div>
    </div>

@endsection
