    // Modern Toast Function
    function showToast(type, message) {
        const toastContainer = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.classList.add('toast', 'fade', 'show', `bg-${type}`);
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        toast.style.maxWidth = '400px'; // Ensure the toast is not too wide

        // Modern Toast Design with Modern Colors
        const typeIcon = type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';
        const bgColor = type === 'success' ? 'bg-success' : 'bg-warning';
        const textColor = 'text-white';

        toast.innerHTML = `
            <div class="toast-header d-flex justify-content-between align-items-center ${bgColor} ${textColor} border-0">
                <div class="d-flex align-items-center">
                    <i class="bi ${typeIcon} me-2"></i>
                    <strong class="me-auto">${type.charAt(0).toUpperCase() + type.slice(1)}!</strong>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        `;

        toastContainer.appendChild(toast);

        // Automatically hide the toast after 5 seconds
        setTimeout(() => {
            toast.classList.remove('show');
            toast.remove(); // Remove the toast from the DOM
        }, 5000);
    }
    // SweetAlert2 Delete Confirmation with Modern UI and Fixed Button Spacing
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Modern SweetAlert2 Confirmation Dialog
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Cette action est irréversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Non, annuler',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-danger me-3', // Add margin to the right of the confirm button
                    cancelButton: 'btn btn-secondary me-3' // Add margin to the right of the cancel button
                },
                buttonsStyling: false, // Disable default SweetAlert2 button styling
                backdrop: 'rgba(0, 0, 0, 0.5)', // Darken the background
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    form.submit();
                }
            });
        });
    });
