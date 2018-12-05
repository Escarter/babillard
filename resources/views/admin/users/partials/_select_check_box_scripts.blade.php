// Handle click on "Select all" control
$('#select-all').on('click', function(){

    //removeAttr();
            
    // Get all rows with search applied
    var rows = oTable.rows({ 'search': 'applied' }).nodes();
    // Check/uncheck checkboxes for all rows in the table
    $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    // Handle click on checkbox to set state of "Select all" control
    $('#trb-table tbody').on('change', 'input[type="checkbox"]', function(){

    // If checkbox is not checked
    if(!this.checked){
        var el = $('#select-all').get(0);
        // If "Select all" control is checked and has 'indeterminate' property
        if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
        }
    }
    });

    var download_all_zip = document.getElementById('download_all_zip');
//   var approve_all = document.getElementById('approve_all');
//   var accept_all = document.getElementById('accept_all');


    function removeAttr() {
        if(download_all_zip){
            download_all_zip.removeAttribute("disabled");
        }
    //   if(approve_all){
    // 	  approve_all.removeAttribute("disabled");
    //   }
    //   if (accept_all) {
    // 	  accept_all.removeAttribute("disabled");
    //   }
        
    }


    function numberOfCheckboxesSelected() {
        return document.querySelectorAll('input[type=checkbox][name="id[]"]:checked').length;
    }

    function onChange() {
        if(download_all_zip){
            download_all_zip.disabled = numberOfCheckboxesSelected() < 2;
        }
    //   if(approve_all){
    // 	  approve_all.disabled = numberOfCheckboxesSelected() < 2;
    // 	 }
    //    if (accept_all) {
    // 	  accept_all.disabled = numberOfCheckboxesSelected() < 2;
    //   }

    }

    document.getElementById('user-table').addEventListener('change', onChange, false);
    if(document.getElementById('select-all')){
        document.getElementById('select-all').addEventListener('change', onChange, false);
    }
  