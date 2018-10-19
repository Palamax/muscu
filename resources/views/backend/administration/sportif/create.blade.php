@extends('backend.layouts.app')

@section('title', __('labels.backend.administration.seance.management') . ' | ' . __('labels.backend.administration.seance.create'))

@section('content')
{{ html()->form('POST', route('admin.administration.seance.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.administration.seance.management')
                        <small class="text-muted">@lang('labels.backend.administration.seance.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

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
                                ->required()
                                ->autofocus() }}
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
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div><!--col-->    
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->    

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.seance.nombre_jours'))
                            ->class('col-md-2 form-control-label')
                            ->for('nb_jours') }}
                        <div class="col-md-10">
                            {{ html()->text('nb_jours')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.seance.nombre_jours'))
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->                     
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.administration.seance.index'), __('buttons.general.cancel')) }}
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