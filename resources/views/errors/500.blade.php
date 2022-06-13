@extends('layouts.errors.error')

@section('title', __('errors.server error title'))
@section('code', '500')
@section('message', __('errors.server error message'))
