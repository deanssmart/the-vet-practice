@extends("app")

    @section("title")
        - Create
    @endsection

    @section("content")
        @include("_partials/form", ["heading" => "Create"])
    @endsection