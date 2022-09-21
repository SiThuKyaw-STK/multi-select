@extends('layout')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Multi Dropdown</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <select name="country" id="country" class="form-control">
                        <option selected="false">
                            Country
                        </option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="state" id="state" class="form-control">
                        <option selected="false">
                            State
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="country"]').on('change',function () {
                let countryID = $(this).val();
                if (countryID){
                    $.ajax({
                        url:'/getStates/' + countryID,
                        type: "GET",
                        dataType : "json",
                        success : function (data) {
                            $('select[name="state"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                }else {
                    $('select[name="state"]').empty();
                }

            })
        })
    </script>
@endpush
