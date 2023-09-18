
@extends('back.layouts.master')
@section('title','Contact List')
@section('content')

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title','Admin Panel')</h1>
                        <a href="{{route('admin.personal.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa-solid fa-plus fa-sm text-white-50"></i> Əlavə et</a>
                    </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Müəssisənin adı</th>
                                            <th>Ad, soyad və ata adı</th>
                                            <th>Mobil nömrə </th>
                                            <th>Ofis nömrəsi</th>
                                            <th>E-mail</th>
                                            <th>Faks</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->company_name}}</td>
                                            <td>{{$contact->full_name}}</td>
                                            <td>@foreach ($contact->phoneNumbers as $phoneNumber)
                                             {{ $phoneNumber->phone_number }}
                                                @endforeach</td>
                                            <td>{{$contact->office_number}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->faks}}</td>
                                            <td>
                                                <a href="{{route('admin.personal.edit',$contact->id)}}" title="Redaktə et" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form method="post" action="{{route('admin.personal.destroy',$contact->id)}}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Sil" type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection   

