@extends('layouts.app')

@section('content')

@if (strtolower(auth()->user()->type) === 'employee')
    
<div class="container-fluid">
    <h1 class="text-black-50">Bienvenido, {{ auth()->user()->name }}!</h1>
    <hr>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Editar Perfil
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model(auth()->user(), ['route' => ['employees.update', auth()->user()->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) !!}
                    </div>

                    <!-- Email Verified At Field -->
                    <div class="form-group col-sm-6 d-none">
                        {!! Form::label('email_verified_at', 'Email Verified At:') !!}
                        {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
                    </div>

                    @push('page_scripts')
                        <script type="text/javascript">
                            $('#email_verified_at').datepicker()
                        </script>
                    @endpush

                    <!-- password Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'maxlength' => 255]) !!}
                    </div>

                    <!-- Type Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('type', 'Type:') !!}
                        <select name="type" id="type" class="form-control">
                            <option value="employee" selected>Empleado</option>
                        </select>
                    </div>

                    <!-- Remember Token Field -->
                    <div class="form-group col-sm-6 d-none">
                        {!! Form::label('remember_token', 'Remember Token:') !!}
                        {!! Form::text('remember_token', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100, 'maxlength' => 100]) !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('employees.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

</div>


@endif

@endsection
