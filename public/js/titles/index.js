$('#titles').dataTable({
    "bProcessing" : true,
    "bServerSide" : true,
    "sAjaxSource" : "titles/searchAjax",
    "aaSorting" : [[ 3, "desc" ]],
    "aoColumns" : [
        {"sWidth" : "100px"},
        {"sWidth" : "100px"},
        {"sWidth" : "100px"}
    ],
    "sPaginationType" : "bootstrap"
});