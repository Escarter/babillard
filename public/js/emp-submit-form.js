(function($) {
$.fn.autoempsubmit = function() {
    this.submit(function(event) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name=csrf-token]').attr('content')}
    });
    _token =  '{{csrf_token()}}'
    var form = $(this);
    var formData = form.serialize()
    $.ajax({
        dataType: 'json',
        type: form.attr('method'),
        url: form.attr('action'),
        data: formData 
    }).done(function(data) {

        sessionStorage.setItem(data.status,data.message);
       
        window.location.href = data.redirect;
    
       
    }).fail(function(data) {
        sessionStorage.setItem('error',"@lang('Something Went wrong Please contact the Administrator')!");
        location.reload();
    });
    });
    return this;
}
})(jQuery)
