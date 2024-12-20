@extends('layouts.admins')
@section('title')
    ADMIN
@endsection
@section('css')
    {{-- CSS --}}
    <style>
        .modal-dialog {
            max-width: 700px !important;
        }
        .modal-content {
            max-width: 700px !important;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            width: 100%;
            height: 100%;
            align-content: center;
        }
        #image_san_pham {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            max-height: 248px;
            object-fit: cover;
        }
        .radio-pas {
            width: 15px;
            height: 15px;
        }
        #password {
            display: flex;
            align-items: center;
        }
        .header {
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Thêm tài khoản</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                        <li class="breadcrumb-item active">Thêm tài khoản</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 p-3" id="alert">
                @if (session('success'))
                    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('success')}}</div>
                    </div>
                @elseif (session('warning'))
                    <div id="warningAlert" class="alert alert-warning alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-alert-circle-o"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('warning')}}</div>
                    </div>
                @elseif (session('error'))
                    <div id="warningAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-alert-triangle"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('error')}}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="main-content container-fluid">
            <form action="{{ route('wp-admin.user.store') }}" id="user-project" onsubmit="return false || validate()" enctype="multipart/form-data" method="post">
                @csrf
                <div class="header mb-3">
                    <button onclick="return window.history.back()" class="btn btn-secondary btn-sm">Quay lại</button>
                    <button id="btn-submit" class="btn btn-success btn-sm">Thêm mới <i class="icon mdi mdi-plus-circle-o"></i></button>
                </div>
                <div class="user-profile">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="user-info-list card">
                                <div class="card-header card-header-divider">
                                    <h3 class="m-0 p-0"><strong>Thông tin tài khoản</strong> <span class="icon mdi mdi-bookmark-outline"></span></h3>
                                    <span class="card-subtitle">
                                        Thông tin người dùng sẽ sử dụng tài khoản này.
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Tên tài khoản <span class="text-danger">*</span></label> <span class="text-danger" id="name_validate"></span>
                                                <input class="form-control form-control-sm" type="text" name="name" id="name" placeholder="Họ & tên">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="email">Địa chỉ email <span class="text-danger">*</span></label> <span class="text-danger" id="email_validate"></span>
                                                <input class="form-control form-control-sm" type="text" name="email" id="email" placeholder="abc@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="phone">Số điện thoại <span class="text-danger">*</span></label> <span class="text-danger" id="phone_validate"></span>
                                                <input class="form-control form-control-sm" type="tel" name="phone_number" id="phone" placeholder="+(000)-000-000">
                                            </div>
                                        </div>
                                        <div class="col-4" style="margin: 5px 0px !important">
                                            <label for="image" class="custom-file-upload p-0 m-0">
                                                <span class="text-img"><i class="mdi mdi-collection-image-o"></i> Avata</span>
                                                <img id="image_san_pham" src="" alt="Hình ảnh sản phầm" style="display: none">
                                            </label>
                                            <input type="file" id="image" name="image" style="display: none;" onchange="showImage(event)" accept="image/*"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label" for="birthday">Ngày sinh</label>
                                            <input class="form-control form-control-sm" type="date" name="birthday" id="birthday">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="gender">Giới tính <span class="text-danger">*</span></label> <span class="text-danger" id="gender_validate"></span>
                                            <select class="form-control form-control-sm" name="gender" id="gender">
                                                <option value="" disabled selected>--- Chọn giới tính ---</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <div id="password">
                                            <input onclick="formPassword(false)" class="radio-pas" type="radio" checked value="true" name="password-type" id="type-1">{{--- Điền sau ---}}
                                            <label class="form-label m-0 mr-3 p-0" for="type-1">Tự độn tạo</label>
                                            <input onclick="formPassword(true)" class="radio-pas" type="radio" value="false" name="password-type" id="type-2">{{--- Điền tại đây ---}}
                                            <label class="form-label m-0 mr-3 p-0" for="type-2">Tạo thủ công</label>
                                        </div>
                                    </div>
                                    <div class="form-pass" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Mật khẩu <span class="text-danger">*</span></label> <span class="text-danger" id="password_validate"></span>
                                            <input disabled onchange="confixPassword()" class="form-control form-control-sm" type="password" name="password" id="password-1" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password-2">Xác nhận mật khẩu <span class="text-danger">*</span></label> <span id="confixP" class="text-danger"></span>
                                            <input disabled onchange="confixPassword()" class="form-control form-control-sm" type="password" name="password_confix" id="password-2" placeholder="Nhập lại mật khẩu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="widget widget-fullwidth widget-small">
                                <div class="widget-head pb-6">
                                    <div class="tools">
                                        <button type="button" class="btn btn-space btn-outline-danger" id="Location_d">Xóa tất cả</button>
                                        <button type="button" class="btn btn-space btn-outline-info btn-space" data-toggle="modal" data-target="#md-location" type="button">
                                            Thêm địa chỉ
                                        </button>
                                    </div>
                                    <div class="title"><strong>Địa chỉ</strong></div>
                                </div>
                                <div class="widget-chart-container">
                                    <div class="accordion" id="accordion">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="md-location" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="formLocation">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h2 class="text-center mt-0 mb-5">Thêm địa chỉ</h2>
                            <div class="form-group">
                                <label class="form-label" for="location_name">Tên địa chỉ <span class="text-danger">*</span></label> <span id="location_name-validate" class="text-danger"></span>
                                <input class="form-control form-control-sm" type="text" name="location_name" id="location_name" placeholder="Tên địa chỉ" value="">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="user_name">Tên người nhận <span class="text-danger">*</span></label> <span id="user_name-validate" class="text-danger"></span>
                                <input class="form-control form-control-sm" type="text" name="user_name" id="user_name" placeholder="Họ & tên">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Số điện thoại <span class="text-danger">*</span></label> <span class="text-danger"></span>
                                <input class="form-control form-control-sm" type="text" name="phone" id="phone" placeholder="+(00)-0000-0000">
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label" for="city">Tỉnh <span class="text-danger">*</span></label> <span id="city_province-validate" class="text-danger"></span>
                                    <select class="form-control form-control-sm" name="city_province" id="city">
                                        <option value="" selected>Chọn tỉnh thành</option>           
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="district">Huyện <span class="text-danger">*</span></label> <span id="district-validate" class="text-danger"></span>
                                    <select class="form-control form-control-sm" name="district" id="district">
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="ward">Xã <span class="text-danger">*</span></label> <span id="commune-validate" class="text-danger"></span>
                                    <select class="form-control form-control-sm" name="commune" id="ward">
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="location_detail">Địa chỉ chi tiết <span class="text-danger">*</span></label> <span id="location_detail-validate" class="text-danger"></span>
                                <textarea class="form-control form-control-sm" name="location_detail" id="location_detail" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" id="exit">Hủy</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JAVASCRIPT-LINK --}}
        <script type="text/javascript">
          $(document).ready(function(){
              //-initialize the javascript
              App.init();
              App.dashboard();
          });
        </script>
    {{-- JS --}}
        <script>
            window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alert = document.querySelector('#alert');
                alert.style.display = "none";
            }, 5000);
            });
        </script>
        <script>
            function showImage(event) {
                const image_san_pham = document.getElementById('image_san_pham');

                const file = event.target.files[0];

                const reader = new FileReader();

                reader.onload = function () {
                    image_san_pham.src = reader.result;
                    image_san_pham.style.display = 'block';
                    document.querySelector('.text-img').style.display = 'none';
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
        <script>
            const selectElement = document.getElementById('gender');
            selectElement.addEventListener('change', function() {
                this.options[0].style.display = 'none';
            });
        </script>
        <script>
            function formPassword(check) {
                const formElements = document.querySelector('.form-pass');
                const password_One = document.querySelector('#password-1');
                const password_Tow = document.querySelector('#password-2');
                if(check) {//check = true
                    formElements.style.display = "block";
                    password_One.disabled = false;
                    password_Tow.disabled = false;
                }
                else {
                    formElements.style.display = "none";
                    password_One.disabled = true;
                    password_Tow.disabled = true;
                }
            }
            function confixPassword() {
                const password_One = document.querySelector('#password-1');
                const password_Tow = document.querySelector('#password-2');

                if(password_One.value !== password_Tow.value) {
                    document.querySelector('#confixP').innerText = "Mật khẩu không khớp!";
                }   
                else {
                    document.querySelector('#confixP').innerText = "";
                }
            }
        </script>
    {{-- JS Chọn Quận huyện xã --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>
            const host = "https://provinces.open-api.vn/api/";
            var callAPI = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data, "city");
                    });
            }
            callAPI('https://provinces.open-api.vn/api/?depth=1');
            var callApiDistrict = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.districts, "district");
                    });
            }
            var callApiWard = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.wards, "ward");
                    });
            }
            
            var renderData = (array, select) => {
                let row = ' <option disable value="">Chọn</option>';
                array.forEach(element => {
                    row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
                });
                document.querySelector("#" + select).innerHTML = row
            }
            
            $("#city").change(() => {
                callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
                printResult();
            });
            $("#district").change(() => {
                callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
                printResult();
            });
            $("#ward").change(() => {
                printResult();
            })
            
            var printResult = () => {
                if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                    $("#ward").find(':selected').data('id') != "") {
                    let result = $("#city option:selected").text() +
                        " | " + $("#district option:selected").text() + " | " +
                        $("#ward option:selected").text();
                    $("#result").text(result)
                }
            
            }
        </script>
    {{-- Validate create location --}}
        <script>
            const Location_d = document.querySelector('#Location_d');
            Location_d.addEventListener('click', ()=> {
                sessionStorage.clear();
                showLocation();
            });
            const formData = {};
            const formLocation = document.querySelector('#formLocation');
            formLocation.addEventListener('submit', (event) => {
            event.preventDefault();
            let check = true;
            // Validate 
            for (const element of formLocation.elements) {
                if (element.value === "") {
                if (document.querySelector(`#${element.name}-validate`)) {
                    document.querySelector(`#${element.name}-validate`).innerHTML = `Không thể bỏ trống!`;
                    check = false;
                }
                } else {
                formData[element.name] = element.value;
                }
            }
            if (check) {
                let storedData = sessionStorage.getItem('locations');
                let data = storedData ? JSON.parse(storedData) : [];
                data.push(formData);
                sessionStorage.setItem('locations', JSON.stringify(data));
                showLocation()
                document.querySelector('#exit').click();
                formData = {};
            }
            });
            const birthdayInput = document.getElementById('birthday');
            const today = new Date().toISOString().split('T')[0];
            birthdayInput.max = today;
        </script>
    {{-- HIển thị địa chỉ --}}
        <script>
            const accordion = document.querySelector('#accordion');
            showLocation();
            function showLocation() {
                const storedData = sessionStorage.getItem('locations');
                const locations = JSON.parse(storedData);
                if(locations == null) {
                    accordion.innerHTML = "";
                }
                else {
                    const formEm = locations.map((item, index) => {
                    return `
                        <div class="card">
                            <div class="card-header" id="heading${index}" role="tab">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
                                    <i class="icon mdi mdi-chevron-right"></i>${item.location_name}<input type="hidden" name="locations[${index}][location_name]" value="${item.location_name}">
                                </button>
                            </div>
                            <div class="collapse mt-3" id="collapse${index}" aria-labelledby="heading${index}" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="locations[${index}][user_name]">Tên người nhận <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-sm" type="text" name="locations[${index}][user_name]" id="locations[${index}][user_name]" value="${item.user_name}" placeholder="Họ & tên">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="locations[${index}][phone_number]">Số điện thoại <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-sm" type="text" name="locations[${index}][phone_number]" id="locations[${index}][phone_number]" value="${item.phone}" placeholder="+(000)-000-000">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label" for="locations[${index}][city_province]">Tỉnh <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="locations[${index}][city_province]" id="locations[${index}][city_province]" value="${item.city_province}" placeholder="Tỉnh">
                                        </div>
                                        <div class="form-group col">
                                            <label class="form-label" for="locations[${index}][district]">Huyện <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="locations[${index}][district]" id="locations[${index}][district]" value="${item.district}" placeholder="Tỉnh">
                                        </div>
                                        <div class="form-group col">
                                            <label class="form-label" for="locations[${index}][commune]">Xã <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="locations[${index}][commune]" id="locations[${index}][commune]" value="${item.commune}" placeholder="Tỉnh">
                                        </div>
                                        <div class="form-group col">
                                            <label class="form-label" for="locations[${index}][location_detail]">Chi tiết <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="locations[${index}][location_detail]" id="locations[${index}][location_detail]" value="${item.location_detail}" placeholder="Tỉnh">
                                        </div>
                                    </div>
                                    <div style="text-align: end;">
                                        <button type="button" class="btn btn-space btn-outline-danger">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    }).join('');
                    accordion.innerHTML = formEm;
                }
            }
        </script>
    {{-- Validate form user --}}
        <script>
            const form = document.querySelector('#user-project');
            function validate() {
                var check = true;
                // Tên validate
                    if(form.elements.name.value == "") {
                        document.querySelector('#name_validate').innerText = "Vui lòng không bỏ trống tên!";
                        check = false;
                    }
                    else if(form.elements.name.value.length >= 255) {
                        document.querySelector('#name_validate').innerText = "Tên quá dài!";
                        check = false;
                    }
                    else {
                        document.querySelector('#name_validate').innerText = "";
                        check = true;

                    }
                // Email validate
                    if(form.elements.email.value == "") {
                        document.querySelector('#email_validate').innerText = "Không thể bỏ trống email!";
                        check = false;
                    }
                    else if(!form.elements.email.value.match(/@|\./)) {
                        document.querySelector('#email_validate').innerText = "Email không hợp lệ!";
                        check = false;
                    }
                    else if(form.elements.email.value.length>=255) {
                        document.querySelector('#email_validate').innerText = "Email quá dài!";
                        check = false;
                    }
                    else {
                        document.querySelector('#email_validate').innerText = "";
                        check = true;
                    }
                // SĐT validate
                    var phone = form.elements.phone.value;
                    if(form.elements.phone.value == "") {
                        document.querySelector('#phone_validate').innerText = "Không thể bỏ trống số điện thoại!";
                        check = false;
                    }
                    else if(isNaN(phone)) {
                        document.querySelector('#phone_validate').innerText = "Số điện thoại không hợp lệ!";
                        check = false;
                    }
                    else if(form.elements.phone.value.length>12) {
                        document.querySelector('#phone_validate').innerText = "Số điện thoại quá dài!"
                        check = false;
                    }
                    else {
                        document.querySelector('#phone_validate').innerText = "";
                        check = true;
                    }
                // Giới tính validate
                    if(form.elements.gender.value == "") {
                        document.querySelector('#gender_validate').innerText = "Không thể bỏ trống giới tính!"
                        check = false;
                    }
                    else {
                        document.querySelector('#gender_validate').innerText = ""
                        check = true;
                    }
                // Password validate
                    const formEl = document.querySelector('.form-pass');
                    if(formEl.style.display == "block") {
                        if(form.elements.password.value == "") {
                            document.querySelector('#password_validate').innerText = "Không thể bỏ trống mật khẩu!"
                            check = false;
                        }
                        const checkP =  document.querySelector('#confixP').innerText;
                        if(checkP == "") {
                            check = true;
                        }
                        else {
                            check = false;
                        }
                    }
                if(check) {
                    return true;
                }
                return false;
            }
            
        </script>
@endsection
