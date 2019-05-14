@extends('layouts.master')
@section('title', 'Customer create')

@section('content')
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      {{ __('contact.add') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/contact/create') }}">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('contact.name') }}:</label>
                <input type="text" class="form-control" name="contact_name"/>
            </div>
            <div class="form-group">
                <label for="price">{{ __('contact.email') }}:</label>
                <input type="text" class="form-control" name="contact_email"/>
            </div>
            <div class="form-group">
                <label for="quantity">{{ __('contact.address') }}:</label>
                <input type="text" class="form-control" name="contact_address"/>
            </div>
            <div class="form-group">
                <label for="quantity">{{ __('contact.content') }}:</label>
                <input type="text" class="form-control" name="contact_content"/>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('contact.add') }}</button>
        </form>
    </div>
  </div>
@endsection