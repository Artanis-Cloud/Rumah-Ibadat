{{-- @extends('errors::errors-layout') --}}
@extends('errors::layout')


@section('title', __('Dilarang'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Dilarang'))
