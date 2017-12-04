@extends('layouts.main')

@section('content')
{!! Form::open([ 'action' => 'HomePageController@index', 'method' => 'get']) !!}

    <div class="container">
        <div class="col-xs-2 form-inline">
            {!! Form::label('city_id', trans('quickadmin.companies.fields.city').'', ['class' => 'control-label']) !!}
            {!! Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('city_id'))
                <p class="help-block">
                    {{ $errors->first('city_id') }}
                </p>
            @endif
        </div>
    
        <div class="col-xs-3 form-inline">
            {!! Form::label('categories', trans('quickadmin.companies.fields.categories').'', ['class' => 'control-label']) !!}
            {!! Form::select('categories', $categories, old('categories'), ['class' => 'form-control select2']) !!}
            <p class="help-block"></p>
            @if($errors->has('categories'))
                <p class="help-block">
                    {{ $errors->first('categories') }}
                </p>
            @endif
        </div>
        <div class="col-xs-3 form-inline">
            {!! Form::label('search', trans('quickadmin.companies.fields.name').'', ['class' => 'control-label']) !!}
            {!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Search']) !!}
            <p class="help-block"></p>
            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>
        <div class="form-inline">
            <div class="col-xs-2">
                <button type="submit"
                        class="btn btn-primary">
                        Search
                </button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    
    </div>
    <br>
    @if (count($companies) > 0)
        @foreach ($companies as $company)
        <div class="container">
            <div class="row">
                <div class="col-xs-2">@if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $company->logo) }}"/></a>@endif </div>
                <div class="col-xs-10">
                    {{$company->name}}
                    <br>
                    {{$company->address}}, {{ $company->city->name or '' }}
                    <br>
                    @foreach ($company->categories as $singleCategories)
                        <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                    @endforeach
                    <br>
                    {{$company->description}} 
                    <hr>    
                </div>
            </div>
        </div>
        @endforeach
    @endif
    {{ $companies->links() }}
@endsection