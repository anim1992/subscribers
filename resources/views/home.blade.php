@extends('layouts.app')

@section('content')
<style>
    .error{
        color: red;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="post" action="{{route('upload')}}"  enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        @if($errors->has('file'))
                        <div class="error">
                          {{ $errors->first('file') }}
                        </div>
                      @endif
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
