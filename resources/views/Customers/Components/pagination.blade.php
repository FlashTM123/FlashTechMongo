@if ($paginator->hasPages())
<nav class="pagination-nav" role="navigation" aria-label="Pagination Navigation">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link prev-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    <span class="page-text">Trước</span>
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link prev-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    <span class="page-text">Trước</span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link dots">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link next-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span class="page-text">Sau</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link next-link">
                    <span class="page-text">Sau</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </span>
            </li>
        @endif
    </ul>
</nav>

<style>
.pagination-nav {
    display: flex;
    justify-content: center;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 0.375rem;
}

.page-item {
    display: flex;
}

.page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 0.75rem;
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--gray-700);
    background: white;
    border: 1px solid var(--gray-200);
    text-decoration: none;
    transition: all 0.2s ease;
    cursor: pointer;
}

.page-link:hover {
    background: var(--gray-100);
    border-color: var(--gray-300);
    color: var(--gray-800);
}

.page-item.active .page-link {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-color: transparent;
    color: white;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.page-item.disabled .page-link {
    color: var(--gray-400);
    background: var(--gray-100);
    cursor: not-allowed;
    border-color: var(--gray-200);
}

.prev-link,
.next-link {
    gap: 0.375rem;
    padding: 0 1rem;
}

.page-link.dots {
    border: none;
    background: transparent;
    cursor: default;
}

.page-link.dots:hover {
    background: transparent;
}

.page-text {
    display: inline;
}

@media (max-width: 640px) {
    .page-link {
        min-width: 36px;
        height: 36px;
        padding: 0 0.5rem;
        font-size: 0.8125rem;
    }

    .page-text {
        display: none;
    }

    .prev-link,
    .next-link {
        padding: 0 0.75rem;
    }
}
</style>
@endif
