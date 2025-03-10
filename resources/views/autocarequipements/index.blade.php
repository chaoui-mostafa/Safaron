@extends('admin.Layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des Équipements des Autocars</h1>

        <!-- Display Flash Messages for Success/Error -->
        @if(session('success'))
            <script>
                window.onload = function() {
                    showToast('success', '{{ session("success") }}');
                };
            </script>
        @endif

        @if(session('error'))
            <script>
                window.onload = function() {
                    showToast('error', '{{ session("error") }}');
                };
            </script>
        @endif

        <!-- Button to Add Equipment -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('autocarequipements.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Associer un Équipement à un Autocar
            </a>
        </div>

        <!-- Equipment Table -->
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Autocar</th>
                            <th>Équipement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($autocarequipements as $autocar_equipement)
                            <tr>
                                <td>{{ $autocar_equipement->autocar->matricule }}</td>
                                <td>{{ $autocar_equipement->equipement->equipement }}</td>
                                <td class="d-flex justify-content-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('autocarequipements.edit', $autocar_equipement->id) }}" class="btn btn-warning btn-sm me-2 shadow-sm">
                                        <i class="bi bi-pencil-square"></i> Modifier
                                    </a>
                                    <!-- Delete Button with Confirmation -->
                                    <form action="{{ route('autocarequipements.destroy', $autocar_equipement->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Toast Notifications -->
    <div id="toastContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;"></div>

    <!-- <script>
        // Function to show toast notifications
        function showToast(type, message) {
            const toastContainer = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.classList.add('toast', 'fade', 'show', 'align-items-center', 'text-white', type === 'success' ? 'bg-success' : 'bg-danger');
            toast.style.width = '300px';

            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;

            toastContainer.appendChild(toast);

            // Remove toast after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                toast.addEventListener('transitionend', () => {
                    toast.remove();
                });
            }, 5000);
        }
    </script> -->

@endsection
