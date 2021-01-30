@extends('layouts.app')
@section('content') 
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">{{ __('Profile') }}</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">{{__('Your Profile')}}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h2>{{Auth::user()->name}}</h2>
                            <p>
                                {{Auth::user()->role->name}}
                            </p>
                            <h6>{{Auth::user()->email}}</h6>
                            <p>
                               {{__('Date Of Joining')}}: {{Auth::user()->created_at->diffForHumans()}}
                            </p>
                        </div>
                        
                    </div>
                    <!--/row-->
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection

<!------ Include the above in your HEAD tag ---------->

                
