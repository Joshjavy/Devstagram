@extends('layouts.app')
@section('titulo','Principal')
@section('contenido')

<x-listar-post :posts="$posts"/>

@endsection

