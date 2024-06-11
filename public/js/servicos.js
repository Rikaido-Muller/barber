function deletar (id) {
    Swal.fire({
        title: "Você tem certeza??",
        text: "Você não poderá reertr isso!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, deletar!",
        cancelButtonText: "Cancelar!"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Deletado!",
            text: "Seu arquivo foi deletado.",
            icon: "success"
          });
          document.getElementById('form-' + id).submit();
        }
      });
    }