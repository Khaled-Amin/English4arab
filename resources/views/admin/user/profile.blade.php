
@extends('layouts.admin')


@section('content')

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                تعديل البيانات الشخصية
            </h3>
        </div>
        <div class="card-toolbar">
           
        </div>
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>!</strong> الاخطاء <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            {!! Form::model(auth()->user(), ['method' => 'POST','route' => ['updateProfile'] , 'files' => true]) !!}
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الاسم:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'الاسم','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>البريد:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'البريد الالكترونى','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 my-3">

                <label>   الصوره :</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input form-control"/>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>كلمة المرور :</strong>
                    {!! Form::password('password', array('placeholder' => 'كلمة المرور','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>تاكيد كلمة المرور:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'تاكيد كلمة المرور','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-5">
                <button type="submit" class="btn btn-primary">ارسال </button>
            </div>
        </div>
        {!! Form::close() !!}


    </div>
</div>

@endsection
