@extends('layouts.errors.error')

@section('title', __('errors.service unavailable title'))
@section('code', '503')
@section('message', __('errors.service unavailable message'))
