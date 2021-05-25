$(document).ready(function () {
  $(".preloader").fadeOut();
})


$(function () {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });

  var status = $('#alert').data('status');
  var msg = $('#alert').data('msg');
  if (msg) {
    Toast.fire({
      icon: status,
      title: msg
    })
  }
});

$('.delete').on('click', function (e) {

  e.preventDefault();
  var href = $(this).attr('href');
  var items = $(this).data('items');

  Swal.fire({
    title: 'Are you sure?',
    text: "You want to delete data " + items,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  })

});