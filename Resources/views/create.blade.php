@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">اسلایدر ها</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb" dir="ltr">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sliders</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">افزودن اسلایدر</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{ old('title') }}">
                                <div class="invalid-feedback">لطفا عنوان را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="sub_title" class="form-label">زیر عنوان</label>
                                <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{ old('sub_title') }}">
                                <div class="invalid-feedback">لطفا زیر عنوان را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="background" class="form-label">بک گراند</label>
                                <input type="file" name="background" class="form-control" aria-label="بک گراند" id="background" accept="image/*" required>
                                <div class="invalid-feedback">لطفا یک تصویر برای بک گراند انتخاب کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">تصویر</label>
                                <input type="file" name="image" class="form-control" aria-label="تصویر" id="image" accept="image/*">
                                <div class="invalid-feedback">لطفا یک تصویر انتخاب کنید</div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->


    </div>
@endsection
