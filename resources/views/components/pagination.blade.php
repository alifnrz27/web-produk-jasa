@php
    $search = request()->input('q', '');
    $ref = request()->input('ref', '');
    $order = request()->input('order', '');
    $start = request()->input('start', '');
    $end = request()->input('end', '');
    $queryParams = [
        'q' => $search,
        'ref' => $ref,
        'order' => $order,
        'start' => $start,
        'end' => $end,
    ];
    $label = 'Order By';
    $baseUrl = str_replace('/filter', '', url()->current());
    $is_filtered = $search || $order;
    $is_advance_filtered = ($search || $order) && ($ref || $start || $end);
    switch ($order) {
        case 'ASC':
            $label = 'Ascending';
            break;
        case 'DESC':
            $label = 'Descending';
            break;
        default:
            break;
    }
@endphp

<div class="w-full">
    <div class="flex items-center max-lg:flex-col max-lg:gap-4 max-lg:justify-start justify-between">
        <form id="pagination-form" class="no-alert flex-none flex gap-2 items-center mr-2">
            <span>Menuju Page :</span>
            @foreach ($queryParams as $name => $value)
                @if ($value)
                    <input type="hidden" value="{{ $value }}" name="{{ $name }}">
                @endif
            @endforeach
            <input type="text" name="page" onkeyup="checkEnter(event)" value="{{ $item->currentPage() }}"
                class="pagination-link py-3 px-4 h-full border">
        </form>
        <div class="flex">
            <a href="{{ $item->url(1) . '?' . buildQueryParams($queryParams) }}"
                class="pagination-link py-2 px-4 border">
                << </a>
                    @if ($item->currentPage() > 1)
                        <a href="{{ $item->url($item->currentPage() - 1) . '&' . buildQueryParams($queryParams) }}"
                            class="pagination-link py-2 px-4 border">
                            < </a>
                    @endif
                    <div class="flex w-full lg:max-w-[500px] overflow-x-auto">
                        @for ($i = $item->currentPage() - 3 > 0 ? $item->currentPage() - 3 : 1; $i <= ($item->currentPage() + 3 > $item->lastPage() ? $item->lastPage() : $item->currentPage() + 3); $i++)
                            <a href="{{ $item->url($i) . '&' . buildQueryParams($queryParams) }}"
                                class="pagination-link py-2 px-4 border {{ $i == $item->currentPage() ? 'active text-blue-500' : '' }}">
                                {{ $i }}
                            </a>
                        @endfor
                    </div>
                    @if ($item->currentPage() < $item->lastPage())
                        <a href="{{ $item->url($item->currentPage() + 1) . '&' . buildQueryParams($queryParams) }}"
                            class="pagination-link py-2 px-4 border">
                            >
                        </a>
                    @endif
                    <a href="{{ $item->url($item->lastPage()) . '&' . buildQueryParams($queryParams) }}"
                        class="pagination-link py-2 px-4 border">
                        >>
                    </a>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function checkEnter(event) {
            if (event.keyCode === 13) { // 13 is the key code for Enter
                document.getElementById('pagination-form').submit();
            }
        }
    </script>
@endpush
