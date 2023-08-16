$(function() {
    var permissionsElement = $('#permissions');
    var route = permissionsElement.data('route');

    $('#permissions').select2({
        ajax: {
            url: route,
            type: 'get',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchItem: params.term,
                    page: params.page,
                };
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data.data,
                    pagination: {
                        more: data.last_page !== params.page
                    }
                };
            },
            cache: true
        },
        templateResult: templateResult,
        templateSelection: templateSelection,
    });

    for (var i = 0; i < selectedPermissions.length; i++) {
        var option = new Option(selectedPermissions[i].name, selectedPermissions[i].id, true, true);
        $('#permissions').append(option).trigger('change');
    }
});

function templateResult(data) {
    if (data.loading) {
        return data.text;
    }
    return data.name;
}

function templateSelection(data) {
    return data.name || data.text;
}
