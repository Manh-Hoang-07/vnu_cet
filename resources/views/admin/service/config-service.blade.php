@extends('admin.layout')

@section('content')

{{--<h3 class="card-title">Tạo yêu cầu cho dịch vụ {{$service->name}}</h3>--}}
<form class="mt-5" action="{{ route('service.save') }}" method="post">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-8 col-lg-6">
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
    </div>

    <div class="form-group row">
        <label for="fee" class="col-sm-2 col-form-label">Fee</label>
        <div class="col-sm-8 col-lg-6">
            <input type="number" class="form-control" id="fee" placeholder="Fee" name="fee">
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Field 1</h5>
                <i class="fa fa-trash-alt"></i>
            </div>
            <div class="form-group row">
                <label for="name1" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" id="name1" placeholder="Name" name="fields[0][name]">
                </div>
            </div>
            <div class="form-group row">
                <label for="type1" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-8 col-lg-6">
                    <select class="form-control" id="type1" name="fields[0][type]">
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="radio">Radio</option>
                        <option value="select">Select</option>
                        <option value="file">File</option>
                        <option value="date">Date</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Validate</label>
                <div class="col-sm-8 col-lg-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fields[0][validate]" id="validate1" value="required">
                        <label class="form-check-label" for="validate1">
                            Required
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fields[0][validate]" id="validate2" value="option">
                        <label class="form-check-label" for="validate2">
                            Option
                        </label>
                    </div>
                </div>
            </div>

{{--                    if type == 'checkbox' || 'radio' || 'select'--}}
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Values</h6>
                    <div>
                        <div class="form-group row">
                            <label for="value10" class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" class="form-control" id="value10" placeholder="Value" name="fields[0][values][]">
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute delete-center">
                                    <div class="fa fa-minus-circle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="value11" class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" class="form-control" id="value11" placeholder="Value" name="fields[0][values][]">
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute delete-center">
                                    <div class="fa fa-minus-circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="fa fa-plus-circle"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Field 2</h5>
                <i class="fa fa-trash-alt"></i>
            </div>
            <div class="form-group row">
                <label for="name1" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" id="name1" placeholder="Name" name="fields[1][name]">
                </div>
            </div>
            <div class="form-group row">
                <label for="type1" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-8 col-lg-6">
                    <select class="form-control" id="type1" name="fields[1][type]">
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="radio">Radio</option>
                        <option value="select">Select</option>
                        <option value="file">File</option>
                        <option value="date">Date</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Validate</label>
                <div class="col-sm-8 col-lg-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fields[1][validate]" id="validate1" value="required">
                        <label class="form-check-label" for="validate1">
                            Required
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fields[1][validate]" id="validate2" value="option">
                        <label class="form-check-label" for="validate2">
                            Option
                        </label>
                    </div>
                </div>
            </div>

{{--                    if type == 'checkbox' || 'radio' || 'select'--}}
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Values</h6>
                    <div>
                        <div class="form-group row">
                            <label for="value20" class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" class="form-control" id="value20" placeholder="Value" name="fields[1][values][]">
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute delete-center">
                                    <div class="fa fa-minus-circle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="value21" class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" class="form-control" id="value21" placeholder="Value" name="fields[1][values][]">
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute delete-center">
                                    <div class="fa fa-minus-circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="fa fa-plus-circle"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <div class="fa fa-plus-circle"></div>
    </div>


    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
{{--        <form id="form-data">--}}
{{--            @csrf--}}
{{--            tên <input type="text" name="name">--}}

{{--            kểu dữ liệu<select name="type">--}}
{{--                <option value="text">text</option>--}}
{{--                <option value="number">number</option>--}}
{{--                <option value="date">date</option>--}}
{{--                <option value="file">file</option>--}}
{{--                <option value="checkbox">checkbox</option>--}}
{{--                <option value="radio">radio</option>--}}
{{--            </select>--}}

{{--            nhóm <select name="group">--}}
{{--                <option value= "">không thuộc nhóm nào</option>--}}
{{--                @foreach($listFields as $fields)--}}
{{--                    @if($fields->group != null)--}}
{{--                        <option value="{{$fields->group}}">{{$fields->group}}</option>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            tạo nhóm <input type="text" name="createGroup"><br>--}}
{{--            <button class="submit" type="submit" id="submit-data" data-id ="{{$service->id}}">tạo</button>--}}
{{--        </form>--}}
{{--        <h3>yêu cầu dịch vụ</h3>--}}
{{--        <div id="content">--}}
{{--            @foreach($listFields as $fields)--}}
{{--                <h5>{{$fields->name}}</h5><input type="{{$fields->type}}" name="{{$fields->group}}"  value="{{$fields->name}}"><br>--}}
{{--            @endforeach--}}
{{--        </div>--}}
@endsection
@section('script')
    <script>

        $(document).ready(function () {
           let idService =$('.submit').data('id');
            function getFields(){
                $.ajax({
                    type: 'GET',
                    url:"/admin/print/fields/"+idService,
                    success:function (data) {
                        $('#content').html(data);
                    }
                });
            };
            $('#submit-data').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:'/admin/save/config/service/'+idService,
                    data:$("#form-data").serialize(),
                   success:function () {
                       getFields();
                   }
                });
            });

        });
    </script>

    <div>

        <h3>Tạo yêu cầu</h3>
        <form>
            tên <input type="text">
            kểu dữ liệu<select>
                <option value="">text</option>
                <option value="">number</option>
                <option value="">date</option>
                <option value="">checkbox</option>
            </select>
            <button type="submit">tạo</button>
        </form>
    </div>

@endsection
