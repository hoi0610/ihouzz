<form method="get" action="{{route('agents.index')}}">
    <div class="form-group">
        <label for="">Tỉnh/ Thành phố</label>
        <select name="province_id" id="province_id" class="form-control " data-destination="#district_id" data-id="{{@$params['province_id']}}">
        </select>
    </div>
    <div class="form-group">
        <label for="">Quận/ Huyện</label>
        <select name="district_id" id="district_id" class="form-control " data-id="{{@$params['district_id']}}">
        </select>
    </div>
    </span>
    <button class="btn btn-search btn-secondary"><i class="fas fa-search"></i> Tìm kiếm</button>
</form>
