@extends('layouts.app')

@section('title', 'ADIPA - versionB')

@section('content')
    @include('sections.hero')
    @include('sections.course-section', ['courses' => $courses])
    @include('sections.contact-form')
@endsection