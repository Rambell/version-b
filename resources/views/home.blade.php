@extends('layouts.app')

@section('title', 'ADIPA - VersionB')

@section('content')
    @include('sections.hero')
    @include('sections.course-section', ['courses' => $courses])
    @include('sections.contact-form')
@endsection