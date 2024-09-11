document.querySelectorAll(".delete-btn").forEach((button) => {
  button.addEventListener("click", function () {
    const userId = this.getAttribute("data-id"); // Get user ID from button data attribute

    // Show SweetAlert2 confirmation dialog
    Swal.fire({
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        // If confirmed, submit the delete request using a POST request
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "/users/delete";

        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "id";
        input.value = userId; // Set user ID in hidden input

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit(); // Submit the form to delete the user
      }
    });
  });
});
