@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.administration.machine.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.administration.machine.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.administration.machine.create') }}" 
                        class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.backend.administration.machine.create')">
                    <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.administration.machine.nom')</th>
                            <th>@lang('labels.backend.administration.machine.description')</th>
                            <th>@lang('labels.backend.administration.machine.last_updated')</th>
                            <th>@lang('labels.backend.administration.machine.statut')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($machines as $machine)
                            <tr>
                                <td>{{$machine->nom}}</td>
                                <td>{{$machine->description}}</td>
                                <td>{{$machine->updated_at->diffForHumans()}}</td>
                                <td>
                                    @if($machine->active)
                                        <span class='badge badge-success'>@lang('labels.general.active')</span>
                                    @else
                                        <span class='badge badge-danger'>@lang('labels.general.inactive')</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.administration.machine.edit', [$machine->id]) }}" 
                                        class="btn btn-primary">
                                        <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')"></i>
                                    </a>
                                    <a href="{{ route('admin.administration.machine.destroy', [$machine->id]) }}"
                                        data-method="delete"
                                        data-trans-button-cancel="@lang('buttons.general.cancel')"
                                        data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                                        data-trans-title="@lang('strings.backend.general.are_you_sure')"
                                        class="btn btn-danger">
                                        <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')"></i>
                                    </a>                                   
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
