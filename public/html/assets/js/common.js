function requestApi(url, params, isAuth=false, token='') {
    let result = [];
    let header = {
        'Content-Type': 'application/json',
    };
    if(isAuth && token !== '') {
        header = {
            'Authorization' : 'Bearer ' + token,
            'Content-Type' : 'application/json'
        }
    }
    $.ajax({
        url: _path + url,
        headers: header,
        method: 'GET',
        dataType: 'json',
        data: params,
        async:false,
        success: function(data){
            result = data;
            return result;
        }
    }).done(function (result) {
        return result;
    });

    return result;
}
