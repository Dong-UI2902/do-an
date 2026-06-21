<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" value="{{ old('description', $blog->title ?? '') }}" name="title">
</div>
<div class="form-group">
    <label for="example-email">Image </label>
    <input type="file" accept="image/*" class="form-control" name="image"
        value="{{ old('description', $blog->image ?? '') }}" onchange="previewBlogImage(this)">
    <script>
        function previewBlogImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('blog-image-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</div>
<div class="form-group">
    @if (!empty($blog->image))
        <p class="text-muted mb-1"><small>Current Image:</small></p>
        <img src="{{ asset($blog->image) }}" id="blog-image-preview" class="img-thumbnail"
            style="max-width: 200px; max-height: 200px; object-fit: cover;">
    @else
        <p class="text-muted mb-1"><small>No image uploaded yet.</small></p>
        <img src="{{ asset('admin/assets/images/no-image.jpg') }}" id="blog-image-preview" class="img-thumbnail"
            style="max-width: 200px; max-height: 200px; object-fit: cover;">
    @endif
</div>
<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="5" name="description">
        {{ old('description', $blog->description ?? '') }}
    </textarea>
</div>
<div class="form-group">
    <label>Content</label>
    <textarea class="form-control" rows="5" id="demo" name="content">
        {{ old('description', $blog->content ?? '') }}
    </textarea>
</div>


@include('layouts.status')
<div class="row align-items-center">
    <div class="col-md-12 text-left text-end">
        <button type="submit" class="btn btn-success text-white">
            <i class="mdi mdi-plus-circle"></i> {{ $button }}
        </button>
    </div>
</div>
