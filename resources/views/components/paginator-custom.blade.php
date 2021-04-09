<div>
    {{-- paginator--}}
    <nav aria-label="Page navigation" class="wp-pagination mt-15">
        <ul class="pagination">
            @foreach ($data['links'] as $key => $link)
                @if($key == 0)
                    @if(count($data['links']) > 3 && $data['current_page'] != 1)
                        <li class="page-item prev">
                            <a class="page-link" href="{{ url()->current() == url()->full() ? url()->full() . '?' : url()->full() . '&' }}page={{ $data['current_page'] - 1 }}" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                    @else
                        <li class="disabled prev"><span>«</span></li>
                    @endif
                @elseif($key > 0 && $key < count($data['links']) - 1 && !is_null($link['url']))
                    <li class=" {{ $link['active'] ? 'active' : '' }} page-item"><a class="page-link"
                        href="{{ url()->current() == url()->full() ? url()->full() . '?' : url()->full() . '&' }}page={{ $link['label'] }}">{!! $link['label'] !!}</a></li>
                @else
                    @if(count($data['links']) > 3 && $data['current_page'] != $data['last_page'])
                        <li class="page-item next">
                            <a class="page-link" href="{{ url()->current() == url()->full() ? url()->full() . '?' : url()->full() . '&' }}page={{ $data['current_page'] + 1 }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    @else
                        <li class="disabled next"><span>»</span></li>
                    @endif
                @endif
            @endforeach
        </ul>
    </nav>
</div>
