@extends('backend.layouts.app')

@section('title', __('labels.backend.administration.seance.management') . ' | ' . __('labels.backend.administration.seance.edit'))

@section('content')
{{ html()->modelForm($seance, 'PATCH', route('admin.administration.seance.update', $seance))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.administration.seance.management')
                        <small class="text-muted">@lang('labels.backend.administration.seance.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.seance.nom'))
                            ->class('col-md-2 form-control-label')
                            ->for('nom') }}

                        <div class="col-md-10">
                            {{ html()->text('nom')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.seance.nom'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.seance.description'))
                            ->class('col-md-2 form-control-label')
                            ->for('description') }}

                        <div class="col-md-10">
                            <textarea class="form-control" id="description" name="description">{{ $seance->description }}</textarea>
                        </div><!--col-->        

                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->            

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Exercices</strong>                       
                        </div><!--card-header-->
                        <div class="card-body">
                            <div class="row mt-4 col-sm-12 mb-1">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>@lang('labels.backend.administration.exercice.nom')</th>
                                                <th>@lang('labels.backend.administration.exercice.machine')</th>
                                                <th>@lang('labels.backend.administration.exercice.groupe_musculaire')</th>
                                                <th>@lang('labels.backend.administration.exercice.nombre_series')</th>
                                                <th>@lang('labels.backend.administration.exercice.recuperation')</th>
                                                <th>@lang('labels.general.actions')</th>                                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($exercicesSeance as $exerciceSeance)
                                                <tr>
                                                    <td>{{$exerciceSeance->nom}}</td>
                                                    <td>{{$exerciceSeance->machine->nom}}</td>
                                                    <td>{{$exerciceSeance->nomGroupeMusculaire()}} <img style="max-width: 5%" src="{{$exerciceSeance->imageGroupeMusculaire()}}"></td>
                                                    <td>{{$exerciceSeance->nombre_series}}</td>
                                                    <td>{{$exerciceSeance->recuperation}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.administration.exercice.destroy', [$exerciceSeance->id]) }}"
                                                            data-method="delete"
                                                            data-trans-button-cancel="@lang('buttons.general.cancel')"
                                                            data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                                                            data-trans-title="@lang('strings.backend.general.are_you_sure')"
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="@lang('labels.backend.administration.seance.delete_exercice')"></i>
                                                        </a>                                   
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--col-->
                            </div><!--row--> 
                            <div class="row mt-4 col-sm-4 mb-1">
                                <div class="col">
                                    <select class="form-control" name="id_exercices">
                                        <option value="null"></option>
                                        @foreach($exercices as $exercice)
                                            <option value="{{$exercice->id}}">{{$exercice->nom}}</option>
                                        @endforeach
                                    </select>
                                </div><!--col-->
                                <div class="col">
                                    <a href="{{ route('admin.administration.seance.ajouterExercice', [$seance]) }}" 
                                        class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.backend.administration.seance.add_exercice')">
                                        <i class="fas fa-plus-circle"></i>
                                    </a> 
                                </div><!--col--> 
                            </div><!--row-->                         
                        </div>                    
                    </div><!--card-->
                </div><!--col-->
            </div><!--row-->                       
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.administration.seance.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection



@push('after-scripts')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endpush
