@extends('layouts.errors.error')

@section('title', __('errors.too many requests title'))
@section('code', '429')
@section('message', __('errors.too many requests message'))
