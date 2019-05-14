@extends('layouts.master')
@section('title', 'Customer index')

@section('content')
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">{{ __('contact.name')}}</th>
        <th scope="col">{{ __('contact.email')}}</th>
        <th scope="col">{{ __('contact.address')}}</th>
        <th scope="col">{{ __('contact.content')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contacts as $contact)
        <tr>
          <th scope="row">{{ $contact->id }}</th>
          <td><a href="{{ route('contact.show', $contact->id) }}">{{ $contact->name }}</a></td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->address }}</td>
          <td>{{ $contact->content }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $contacts->links() }}
@endsection