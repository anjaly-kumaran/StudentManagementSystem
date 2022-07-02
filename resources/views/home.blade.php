@extends('layouts.master')
@extends('layouts.sidemenu')

@section('title') Home @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h6>Hello <b>{{ Auth::user()->name }}</b>,</h6>
                    <h2>{{ __('You are logged in! Welcome') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
