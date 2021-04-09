<div class="box box-tab">
    @if(session('error_message'))
        <ul class="alert alert-danger">
            @foreach(session('error_message') as $message)
                <li>{{ $message[0] }}</li>
            @endforeach
        </ul>
    @endif
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab1" role="tablist">
            <a class="nav-item nav-link active" id="nav-tab-{{ $blockId }}" data-toggle="tab" href="#advisory-{{ $blockId }}" role="tab" aria-controls="nav-3" aria-selected="true">Yêu cầu tư vấn</a>
            <a class="nav-item nav-link" id="nav-tab-{{ $blockId }}" data-toggle="tab" href="#homeview-{{ $blockId }}" role="tab" aria-controls="nav-4" aria-selected="false">Đăng ký xem @if($productId) nhà @elseif($projectId) dự án @endif</a>
        </div>
    </nav>
    <div class="tab-content px-3 px-sm-0" id="nav-tabContent1">
        <div class="tab-pane fade show active" id="advisory-{{ $blockId }}" role="tabpanel" aria-labelledby="nav-tab-3">
            <form action="{{ route('register.advisory') }}" method="post">
                @csrf
                <div class="form-group">
                    <input
                        type="text"
                        name="name_{{ $blockId }}"
                        class="form-control"
                        placeholder="Họ và tên"
                        value="{{ old('name') ?? '' }}"
                    >
                    @error('name_'.$blockId)
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        type="text"
                        name="phone_{{ $blockId }}"
                        class="form-control"
                        placeholder="Điện thoại"
                        value="{{ old('phone') }}"
                    >
                    @error('phone_'.$blockId)
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        type="text"
                        name="email_{{ $blockId }}"
                        class="form-control"
                        placeholder="Địa chỉ email"
                        value="{{ old('email') ?? '' }}"
                    >
                    @error('email_'.$blockId)
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    Đăng ký tư vấn
                </button>
                @if($productId)
                    <input type="hidden" name="product_id" value="{{ $productId }}">
                @endif
                @if($projectId)
                    <input type="hidden" name="project_id" value="{{ $projectId }}">
                @endif
                <input type="hidden" name="blockId" value="{{ $blockId }}">
            </form>
        </div>
        <div class="tab-pane fade" id="homeview-{{ $blockId }}" role="tabpanel" aria-labelledby="nav-tab-4">
            <form action="{{ route('register.home-view') }}" method="post">
                @csrf
                <div class="form-group">
                    <input
                        type="text"
                        name="customer_name_{{ $blockId }}"
                        class="form-control"
                        placeholder="Họ và tên"
                        value="{{ old('customer_name') ?? '' }}"
                    >
                    @error('customer_name_'.$blockId)
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        type="text"
                        name="customer_phone_{{ $blockId }}"
                        class="form-control"
                        placeholder="Điện thoại"
                        value="{{ old('customer_phone') }}"
                    >
                    @error('customer_phone_'.$blockId)
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        type="text"
                        name="customer_email_{{ $blockId }}"
                        class="form-control"
                        placeholder="Địa chỉ email"
                        value="{{ old('customer_email') ?? '' }}"
                    >
                    @error('customer_email_'.$blockId)
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="ip-date-gr">
                        <input
                            type="text"
                            name="time_start_{{ $blockId }}"
                            class="form-control DatePicker"
                            placeholder="Thời gian xem nhà"
                            value="{{ old('time_start') ?? '' }}"
                        >
                        @error('time_start_'.$blockId)
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                        <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Đăng ký xem @if($productId) nhà @elseif($projectId) dự án @endif
                </button>
                @if($productId)
                    <input type="hidden" name="product_id" value="{{ $productId }}">
                @endif
                @if($projectId)
                    <input type="hidden" name="project_id" value="{{ $projectId }}">
                @endif
                <input type="hidden" name="blockId" value="{{ $blockId }}">
            </form>
        </div>
    </div>
</div>


