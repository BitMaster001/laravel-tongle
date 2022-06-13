@extends('layouts.errors.error')

@section('title', __('errors.forbidden title'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'errors.forbidden message'))
