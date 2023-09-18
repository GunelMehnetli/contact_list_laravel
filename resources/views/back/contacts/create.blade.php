@extends('back.layouts.master')
@section('title', 'Yeni Contact List əlavə et')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.personal.store') }}">
            @csrf
            <div class="form-group">
                <label for="company_name">Müəssisənin adı</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required>
            </div>
            <div class="form-group">
                <label for="full_name">Ad, soyad və ata adı</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="phone_numbers">Mobil nömrələr</label>
                <div id="phone_numbers_container">
                    <input type="text" class="form-control" name="phone_numbers[]" required>
                </div>
                <button type="button" class="btn btn-primary" id="add_phone_number">Əlavə telefon nömrəsi əlavə et</button>
            </div>
           
            <div class="form-group">
                <label for="office_number">Ofis nömrəsi</label>
                <input type="text" class="form-control" id="office_number" name="office_number" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="faks">Faks</label>
                <input type="text" class="form-control" id="faks" name="faks">
            </div>

            <button type="submit" class="btn btn-primary">Əlavə et</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function () {
    $("#add_phone_number").click(function () {
        $("#phone_numbers_container").append('<input type="text" class="form-control" name="phone_numbers[]">');
    });
});

</script>
@endsection
