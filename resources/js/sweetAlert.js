Swal.fire({
    title: 'Estas seguro de borrar?',
    text: "No podrás recuperarlo",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borrarlo'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Borrado',
        'El Usuario ha sido borrado',
        'Correcto'
      )
    }
  })