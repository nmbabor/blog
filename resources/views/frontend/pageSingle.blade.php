@extends('frontend.app')
@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-title">{{$page->title}}</h2>
                <div class="col-md-12">
                    <? echo $page->description; ?>
                </div>
            </div>
            
            <div class="col-md-4" data-sticky_column>
                @include('frontend._partials.sidebar')
            </div>
        </div>
    </div>
</div>
@stop