@extends('back.layouts.master')
@section('title', 'Yeni məqalə əlavə et')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin.personal.update',$contact->id)}}">
        @method('PUT')
            @csrf
          
            <div class="form-group">
                <label for="company_name">Müəssisənin adı</label>
                <input type="text" class="form-control" id="company_name" value="{{$contact->company_name}}" name="company_name" required>
            </div>
            <div class="form-group">
                <label for="full_name">Ad, soyad və ata adı</label>
                <input type="text" class="form-control" id="full_name" value="{{$contact->full_name}}" name="full_name" required>
            </div>
            @foreach($contact->phoneNumbers as $index => $phoneNumber)
        <div class="form-group">
            <label for="phone_number_{{ $index }}">Mobil nömrə {{ $index + 1 }}</label>
            <input type="text" class="form-control" id="phone_number_{{ $index }}" name="phone_numbers[{{ $phoneNumber->id }}]" value="{{ $phoneNumber->phone_number }}">
        </div>
    @endforeach


            <div class="form-group">
                <label for="office_number">Ofis nömrəsi</label>
                <input type="text" class="form-control" id="office_number" value="{{$contact->office_number}}" name="office_number" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" value="{{$contact->email}}" name="email" required>
            </div>
            <div class="form-group">
                <label for="faks">Faks</label>
                <input type="text" class="form-control" id="faks" value="{{$contact->faks}}" name="faks">
            </div>
            <button type="submit" class="btn btn-primary">Redaktə et</button>
        </form>
    </div>
</div>
@endsection
