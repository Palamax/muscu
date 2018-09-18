@extends('backend.layouts.app')

@section('title', __('labels.backend.administration.machine.management') . ' | ' . __('labels.backend.administration.machine.edit'))

@section('content')
{{ html()->modelForm($machine, 'PATCH', route('admin.administration.machine.update', $machine))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.administration.machine.management')
                        <small class="text-muted">@lang('labels.backend.administration.machine.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.machine.nom'))
                            ->class('col-md-2 form-control-label')
                            ->for('nom') }}

                        <div class="col-md-10">
                            {{ html()->text('nom')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.machine.nom'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('labels.backend.administration.machine.description'))
                            ->class('col-md-2 form-control-label')
                            ->for('description') }}

                        <div class="col-md-10">
                            {{ html()->text('description')
                                ->class('form-control')
                                ->placeholder(__('labels.backend.administration.machine.description'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->        

                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->            

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
   
                        <div class="checkbox">
                            <label>
                                <input id="active" name="active" type="checkbox" {{ $machine->active ? 'checked' : '' }}>  Active
                            </label>
                        </div>
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->    
        </div><!--card-body-->



        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.administration.machine.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection