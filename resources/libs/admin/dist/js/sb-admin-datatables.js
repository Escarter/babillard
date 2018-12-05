// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('.dataTables').DataTable({
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
  });
});
