@extends('layouts.master')
@section('title', 'Customer show')

@section('content')
<div class="card">
  <div class="card-header">
    {{ __('contact.info') }}
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <h3>{{ $contact->name }}</h3>
      <p>{{ $contact->content }}</p>
      <footer class="blockquote-footer">{{ __('contact.address') }}: <cite title="Source Title">{{ $contact->address }}</cite></footer>
      <footer class="blockquote-footer">{{ __('contact.email') }}: <cite title="Source Title">{{ $contact->email }}</cite></footer>
      <footer class="blockquote-footer">{{ __('contact.create_by') }}: <cite title="Source Title">{{ $contact->user->name }}</cite></footer>
    </blockquote>
  </div>
</div>

<hr>
@guest
@else
@if ($contact->create_by === Auth::user()->id )
  <a href="{{ route('contact.edit', $contact->id) }}"><button class="btn btn-primary">{{ __('contact.edit') }}</button></a>
  <a href="{{ route('contact.delete', $contact->id) }}"><button class="btn btn-warning">{{ __('contact.delete') }}</button></a>
@endif
@endguest

<style>
  .fa-thumbs-up.active {
    color: blue;
  }

  .like-btn {
    background: transparent;
    border: none;
    outline: none;
  }
  .like-btn:hover {
    cursor: pointer;
    color: blue;
  }
  .like-btn:focus {
    outline: none;
  }
</style>
@endsection