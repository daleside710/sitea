var Msg = {
    DataTable_Language : {
        "searchPlaceholder": "검색...",
        "lengthMenu": "_MENU_",
        "search": "_INPUT_",
        "paginate": {
            "previous": '<i class="fa fa-chevron-left"></i>',
            "next": '<i class="fa fa-chevron-right"></i>'
        },
        "info": "_TOTAL_건의 자료가 검색되였습니다.", // "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoFiltered": "(총 _MAX_건중)", // "(filtered from _MAX_ total entries)"
        "emptyTable": "검색된 자료가 없습니다.", // "No data available in table"
        "infoEmpty": "_TOTAL_건의 자료가 검색되였습니다.", // "No entries to show"
        "zeroRecords": "검색된 자료가 없습니다.", // "No matching records found"
    }
};

function isEmpty( str ){

    if( str === null || str === undefined || str === '' )
        return true;
    else
        return false;

    return true;
}

$(document).ready(function () {
    'use strict';

    /*
        Laravel Ajax Token Setup
     */

    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
        }
    });*/

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    PNotify.defaults.styling = 'bootstrap4';
});