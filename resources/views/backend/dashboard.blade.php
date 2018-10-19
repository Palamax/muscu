@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))
@push('after-styles')
    @include('log-viewer::_template.style')
@endpush
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Administration de ma salle</strong>
                </div><!--card-header-->
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                               <div class="col-md-2 col-sm-1 mb-1">
                                    <div class="card level-card level-info">
                                        <div class="card-header">

                                            <a href="{{ route('admin.administration.machine.index') }}" class="color_white">
                                                <span class="level-icon"><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i></span> @lang('labels.backend.administration.machine.machines')
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            {{ $nbMachines }} machine(s) enregistrée(s) dont {{ $nbMachinesActives}} active(s)
                                        </div>
                                    </div>
                                </div>

                               <div class="col-md-2 col-sm-1 mb-1">
                                    <div class="card level-card level-warning">
                                        <div class="card-header">

                                            <a href="{{ route('admin.administration.exercice.index') }}" class="color_white">
                                                <span class="level-icon"><i class="phpdebugbar-fa phpdebugbar-fa-bolt"></i></span> Exercices
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            {{ $nbExercices }} Exercice(s) enregistré(s)
                                        </div>
                                    </div>
                                </div>

                               <div class="col-md-2 col-sm-1 mb-1">
                                    <div class="card level-card level-error">
                                        <div class="card-header">

                                            <a href="{{ route('admin.administration.machine.index') }}" class="color_white">
                                                <span class="level-icon"><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i></span> Séances
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            {{ $nbSeances }} Séance(s) enregistrée(s)
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-md-2 col-sm-1 mb-1">
                                    <div class="card level-card level-critical">
                                        <div class="card-header">
                                            <a href="{{ route('admin.administration.machine.index') }}" class="color_white">
                                                <span class="level-icon"><i class="fa fa-heartbeat"></i></span> Programmes sportifs
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            2 programmes sportifs enregistrés
                                        </div>
                                    </div>
                                </div>   

                                <div class="col-md-2 col-sm-1 mb-1">
                                    <div class="card level-card level-notice">
                                        <div class="card-header">
                                            <a href="{{ route('admin.administration.machine.index') }}" class="color_white">
                                                <span class="level-icon"><i class="phpdebugbar-fa phpdebugbar-fa-cutlery"></i></span> Programmes diététiques
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            0 programmes diététiques enregistrés
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>                      
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Groupes musculaires</strong>
                </div><!--card-header-->
                <div class="card-body">
                   <div class="row">
                        <div>
                            <div class="row">
                                @foreach ($groupes_musculaires as $groupe_musculaire => $value)
                                <div class="col-sm-1 mb-3" style="flex:10%;max-width:10%">
                                    <div class="card">
                                        <div class="card-header">
                                            {{$value["nom"]}}
                                        </div>
                                        <div class="card-body">
                                            <img class="img-avatar" src="{{$value["image"]}}">
                                             
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>                      
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->   
@endsection
