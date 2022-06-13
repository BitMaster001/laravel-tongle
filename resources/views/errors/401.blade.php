@extends('layouts.errors.error')

@section('title', __('errors.unauthorized title'))
@section('code', '401')
@section('message', __('errors.unauthorized message'))
