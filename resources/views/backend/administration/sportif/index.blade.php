@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.administration.seance.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.administration.seance.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.administration.seance.create') }}" 
                        class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.backend.administration.seance.create')">
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
                            <th>@lang('labels.backend.administration.seance.nom')</th>
                            <th>@lang('labels.backend.administration.seance.description')</th>
                            <th>@lang('labels.backend.administration.seance.last_updated')</th>
                            <th>@lang('labels.backend.administration.seance.nombre_jours')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($seances as $seance)
                            <tr>
                                <td>{{$seance->nom}}</td>
                                <td>{{$seance->description}}</td>
                                <td>{{$seance->updated_at->diffForHumans()}}</td>
                                <td>{{$seance->nb_jours}}</td>
                                <td>
                                    <a href="{{ route('admin.administration.seance.edit', [$seance->id]) }}" 
                                        class="btn btn-primary">
                                        <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')"></i>
                                    </a>
                                    <a href="{{ route('admin.administration.seance.destroy', [$seance->id]) }}"
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
