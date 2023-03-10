@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.checklist_groups.update', $checklistGroup)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">{{ __('Edit Checklist Group') }}</div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }}</label>
                                                <input value="{{$checklistGroup->name}}" class="form-control" name="name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
                <form action="{{ route('admin.checklist_groups.destroy', $checklistGroup)}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('{{ __('Are you sure?') }}')" type="submit">{{ __('Delete This Checklist Group ') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
