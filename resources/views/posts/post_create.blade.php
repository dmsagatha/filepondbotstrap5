@extends('layouts.app')

@section('title')
   Lista de Posts
@endsection

@section('content')
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Crear Post</h4>
          </div>
          <div class="card-body">
            @if (session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
              </div>
            @endif
            @if (session()->has('error'))
              <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
              </div>
            @endif

            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="">Título</label>
                <input type="text" name="title" class="form-control">
                @error('title')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="">Subir imagen</label>
                <input type="file" name="image" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary">Guardar Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mt-5">
      @foreach ($posts as $key => $post)
        <div class="col-8 col-sm-4 col-md-3">
          <div class="card">
            <img src="{{ Storage::disk('public')->url('posts/' . $post->image) }}" alt="" title="" />
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
            </div>
          </div>
        </div>
      @endforeach

    </div>

  </div>
@endsection

@push('scripts')
  <script>
    // Register the plugin
    FilePond.registerPlugin(FilePondPluginImagePreview);
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
      server: {
        process: './temp-upload',
        revert: './temp-delete',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
      }
    });
  </script>
@endpush