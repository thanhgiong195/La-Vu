@extends('layouts.master')
@section('title', 'Customer update')

@section('content')
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      {{ __('base.update') }}
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="POST" action="{{ route('contact.update', $contact->id) }}">
          @csrf
		        <input type="hidden" id="id" name="id" value="{{ $contact->id }}" />
            <div class="form-group">
                <label for="name">{{ __('contact.name') }}:</label>
                <input type="text" class="form-control" name="contact_name" value="{{ $contact->name }}"/>
            </div>
            <div class="form-group">
                <label for="price">{{ __('contact.email') }}:</label>
                <input type="text" class="form-control" name="contact_email" value="{{ $contact->email }}"/>
            </div>
            <div class="form-group">
                <label for="quantity">{{ __('contact.address') }}:</label>
                <input type="text" class="form-control" name="contact_address" value="{{ $contact->address }}"/>
            </div>
            <div class="form-group">
                <label for="quantity">{{ __('contact.content') }}:</label>
                <input type="text" class="form-control" name="contact_content" value="{{ $contact->content }}"/>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('base.update') }}</button>
        </form>
    </div>
  </div>
@endsection