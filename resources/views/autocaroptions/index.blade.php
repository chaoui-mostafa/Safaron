@extends('admin.Layout.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center fw-bold">Liste des Options des Autocars</h3>
                </div>
                <div class="card-body p-4">

                    <!-- Show Flash Messages -->
                    @if(session('success'))
                        <script>
                            window.onload = function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Succès!',
                                    text: '{{ session("success") }}',
                                    confirmButtonText: 'OK',
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            };
                        </script>
                    @endif

                    @if(session('error'))
                        <script>
                            window.onload = function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur!',
                                    text: '{{ session("error") }}',
                                    confirmButtonText: 'OK',
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            };
                        </script>
                    @endif

                    <!-- Button to Add Autocar Option -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('autocaroptions.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle me-2"></i> Associer une Option à un Autocar
                        </a>
                    </div>

                    <!-- Autocar Options Table -->
                    @if($autocaroptions->isEmpty())
                        <p class="text-muted text-center">Aucune option associée trouvée.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>Autocar</th>
                                        <th>Option</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($autocaroptions as $autocar_option)
                                        <tr>
                                            <td>{{ $autocar_option->autocar->matricule }}</td>
                                            <td>{{ $autocar_option->option->option }}</td>
                                            <td class="text-end">
                                                <form action="{{ route('autocaroptions.destroy', $autocar_option->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 CDN -->

@endsection
