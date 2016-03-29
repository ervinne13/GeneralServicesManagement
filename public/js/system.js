
$(document).ready(function () {
    var hash = document.location.hash;
    if (hash) {
        $('.nav-tabs a[href="' + hash + '"]').tab('show');
    }
    
    console.log(hash);
});
