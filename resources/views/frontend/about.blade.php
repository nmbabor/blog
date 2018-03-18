@extends('frontend.app')
@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-title">About us</h2>
                <div class="col-md-12">
                    <? echo $info->description; ?>
                </div>
            </div>
            
            <div class="col-md-4" data-sticky_column>
                @include('frontend._partials.sidebar')
            </div>
        </div>
    </div>
</div>
@stop