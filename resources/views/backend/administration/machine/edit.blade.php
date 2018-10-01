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
                            <textarea class="form-control" id="description" name="description">{{ $machine->description }}</textarea>
                        </div><!--col-->        

                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->            

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.active'))
                        ->class('col-md-2 form-control-label')
                        ->for('active') }}

                        <div class="col-md-10">
                              <label class="switch switch-label switch-pill switch-primary">
                                    {{ html()->checkbox('active', false, 0)->class('switch-input') }}
                                    <span class="switch-slider" data-checked="1" data-unchecked="0"></span>
                                </label>
                        </div>       
                    </div>
                </div>
            </div>             
        </div>

<!--         <div class="row mt-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('labels.backend.administration.machine.image'))
                        ->class('col-md-2 form-control-label')
                        ->for('image') }}

                    <div class="col-md-10">
                        <div id="image">
                            {{ html()->file('image')}}
                        </div>                        
                    </div>  {{ $machine->image }}
                </div>
            </div>
        </div>
        <img class="card-img-top" src="{{ $machine->image }}" alt="Avatar"> -->
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



@push('after-scripts')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endpush
