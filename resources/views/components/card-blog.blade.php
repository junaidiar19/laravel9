<div class="card mb-4">
  <div class="card-body">
    <img src="{{ $blog->image }}" class="img-fluid rounded mb-2" alt="">
    <a href="{{ route('users.detail', $blog->user_id) }}" class="text-primary fs-6 text-decoration-none">By. {{ $blog->author->name }}</a>
    <h6 class="mt-1">
      <a href="{{ route('blog.detail', $blog->slug) }}" class="text-dark text-decoration-none">{{ $blog->title }}</a>
    </h6>
    @foreach ($blog->categories as $category)
      <a href="{{ route('blog.category', $category->slug) }}">
        <span class="badge rounded-pill bg-primary fw-normal">{{ $category->name }}</span>
      </a>
    @endforeach
    <p class="text-muted">{{ str()->limit($blog->body, 40) }}</p>
    <p>Komentar ({{ $blog->comments_count }})</p>
  </div>
</div>