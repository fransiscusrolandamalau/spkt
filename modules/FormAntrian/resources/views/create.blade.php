@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::form-antrian.index') }}"></x-backlink>

    <x-panel title="Tambah FormAntrian">
        {!! form()->post(route('modules::form-antrian.store'))->horizontal()->multipart() !!}
        @include('form-antrian::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
