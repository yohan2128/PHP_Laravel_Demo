<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: nicer font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f5f6f8;       /* very light gray */
            --panel: #ffffff;    /* white */
            --muted: #9aa0a6;    /* gray */
            --text: #0b0b0b;     /* black */
            --violet: #6f42c1;   /* violet accent */
            --violet-600: #5b37a8;
            --radius: 10px;
            --shadow: 0 6px 20px rgba(15, 15, 15, 0.06);
        }

        html, body {
            height: 100%;
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Topbar */
        .topbar {
            background: linear-gradient(90deg, rgba(15,15,15,0.92), rgba(28,28,28,0.95));
            color: #fff;
            padding: 12px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.04);
        }

        .brand {
            font-weight: 700;
            color: var(--violet);
            letter-spacing: 0.2px;
        }

        /* Main container */
        .app-container {
            max-width: 1100px;
            margin: 28px auto;
            padding: 22px;
        }

        .panel {
            background: var(--panel);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 20px;
            border: 1px solid rgba(13,13,13,0.04);
        }

        .muted {
            color: var(--muted);
            font-size: 0.95rem;
        }

        /* Form styles */
        .form-control {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 10px 12px;
            transition: box-shadow .15s ease, border-color .15s ease;
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--violet);
            box-shadow: 0 4px 18px rgba(111,66,193,0.12);
        }

        label.form-label {
            font-weight: 600;
            color: rgba(11,11,11,0.85);
        }

        /* Buttons */
        .btn-violet {
            background: linear-gradient(180deg, var(--violet), var(--violet-600));
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 14px;
            box-shadow: 0 6px 18px rgba(111,66,193,0.12);
        }

        .btn-violet:active, .btn-violet:focus {
            transform: translateY(0.5px);
            box-shadow: 0 4px 14px rgba(111,66,193,0.16);
        }

        .card-post {
            border-radius: 10px;
            padding: 16px;
            background: #fbfbfd;
            border: 1px solid rgba(11,11,11,0.04);
            margin-bottom: 12px;
        }

        .post-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
        }

        .post-meta {
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .post-body {
            color: rgba(11,11,11,0.85);
            line-height: 1.45;
        }

        .actions {
            display: flex;
            gap: 8px;
            margin-top: 12px;
        }

        .link-edit {
            color: var(--violet);
            text-decoration: none;
            font-weight: 600;
        }

        .link-edit:hover {
            color: var(--violet-600);
            text-decoration: underline;
        }

        /* Responsive spacing for forms / columns */
        @media (min-width: 992px) {
            .left-col {
                padding-right: 12px;
            }

            .right-col {
                padding-left: 12px;
            }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="brand">TestLaravel</div>
                <div class="muted">A clean demo of CRUD with a modern theme</div>
            </div>
            <div class="text-white small">
                @auth
                    Logged in as {{ auth()->user()->name }}
                @else
                    Guest
                @endauth
            </div>
        </div>
    </header>

    <main class="app-container">
        @auth
            <div class="row g-4">
                <div class="col-lg-4 left-col">
                    <div class="panel">
                        <h5 class="mb-2">Create a Post</h5>
                        <p class="muted mb-3">Share something interesting with the community.</p>

                        <form action="/create-post" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Post</label>
                                <textarea name="body" id="body" cols="30" rows="6" class="form-control" placeholder="Write your post..."></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-violet" type="submit">Submit</button>
                                <!-- Logout form must not be nested inside another form -->
                                <button class="btn btn-outline-secondary" form="logout-form" type="submit">Log out</button>
                            </div>
                        </form>
                        <!-- Separate logout form targeted by the button above -->
                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 right-col">
                    <div class="panel">
                        <h5 class="mb-3">Posts</h5>
                        @if($posts->isEmpty())
                            <div class="muted">No posts yet. Be the first to create one.</div>
                        @endif

                        <div class="mt-3">
                            @foreach ($posts as $post)
                                <div class="card-post">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="post-title">{{ $post['title'] }}</div>
                                            <div class="post-meta">by {{ $post->user->name }}</div>
                                        </div>
                                        <div class="muted small">{{ $post->created_at->diffForHumans() }}</div>
                                    </div>

                                    <div class="post-body mt-2">
                                        {{ $post['body'] }}
                                    </div>

                                    <div class="actions">
                                        <a href="/edit-post/{{ $post->id }}" class="link-edit">Edit</a>

                                        <form action="/delete-post/{{ $post->id }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="panel">
                        <h5 class="mb-2">Register</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" placeholder="Your name" name="name" id="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="you@example.com" name="email" id="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" placeholder="Choose a password" name="password" id="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-violet">Register</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel">
                        <h5 class="mb-2">Log In</h5>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="loginName" class="form-label">Name</label>
                                <input type="text" placeholder="name" name="loginName" id="loginName" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <input type="password" placeholder="password" name="loginPassword" id="loginPassword" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-violet">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </main>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
