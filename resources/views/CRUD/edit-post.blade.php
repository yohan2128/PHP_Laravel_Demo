<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Match styling used on index (Bootstrap CDN used commonly on index pages) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">My Blog</a>
        <div class="ms-auto">
            <a class="btn btn-outline-light btn-sm" href="/posts">Back to Posts</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Edit Post</h4>
                </div>

                <div class="card-body">
                    <form action="/edit-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                value="{{ old('title', $post->title) }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Post</label>
                            <textarea
                                name="body"
                                id="body"
                                class="form-control"
                                rows="8"
                                required
                            >{{ old('body', $post->body) }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/cancel-edit" class="btn btn-secondary">Cancel Edit</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Optional: Bootstrap JS (if index uses any interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>