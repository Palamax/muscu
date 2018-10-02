@extends('backend.layouts.app')

@section('title', __('labels.backend.administration.exercice.management') . ' | ' . __('labels.backend.administration.exercice.create'))

@section('content')
{{ html()->form('POST', route('admin.administration.exercice.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.administration.exercice.management')
                        <small class="text-muted">@lang('labels.backend.administration.exercice.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.exercice.nom'))
                            ->class('col-md-2 form-control-label')
                            ->for('nom') }}

                        <div class="col-md-10">
                            {{ html()->text('nom')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.exercice.nom'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.exercice.description'))
                            ->class('col-md-2 form-control-label')
                            ->for('description') }}
                        <div class="col-md-10">
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div><!--col-->       
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->       

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.exercice.nombre_series'))
                            ->class('col-md-2 form-control-label')
                            ->for('nombre_series') }}

                        <div class="col-md-10">
                            {{ html()->text('nombre_series')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.exercice.nombre_series'))
                                ->required()}}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.exercice.recuperation'))
                            ->class('col-md-2 form-control-label')
                            ->for('recuperation') }}

                        <div class="col-md-10">
                            {{ html()->text('recuperation')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.exercice.recuperation'))
                                ->required()}}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->          

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.exercice.machine'))
                            ->class('col-md-2 form-control-label')
                            ->for('machine') }}
                        <div class="col-md-10">
                          <select class="form-control" name="id_machines">
                              <option value="null"></option>
                            @foreach($machines as $machine)
                              <option value="{{$machine->id}}">{{$machine->nom}}</option>
                            @endforeach
                          </select>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->    

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.exercice.groupe_musculaire'))
                            ->class('col-md-2 form-control-label')
                            ->for('groupe_musculaire') }}
                        <div class="col-md-10">
                          <select class="form-control" name="id_groupes_musculaires">
                              <option value="null"></option>
                           @foreach ($groupes_musculaires as $groupe_musculaire => $value)
                              <option value="{{$value["id"]}}">{{$value["nom"]}}</option>
                            @endforeach
                          </select>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->              

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.administration.exercice.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection

@push('after-scripts')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endpush