
<?php
    $from = $pagination['current_page'] - 3;
    if($from < 1) {
        $from = 1;
    }
    $to = $pagination['current_page'] + 3;
    if($to > $pagination['last_page']) {
        $to = $pagination['last_page'];
    }
    $pre = $pagination['current_page'] - 1;
    if($pre < 1) {
        $pre = null;
    }
    $next = $pagination['current_page'] + 1;
    if($next > $to) {
        $next = null;
    }
?>

<nav aria-label="Page navigation" class="wp-pagination mt-15">
    <ul class="pagination">
        <li class="page-item prev">
            <a class="page-link" href="{{$pre?($pagination['path'].'?page='.$pre.($paginate_query?'&'.$paginate_query:'')):'javascript:void(0)'}}" aria-label="Previous">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        @for($i = $from; $i <= $to;$i++)
        <li class="page-item {{$i == $pagination['current_page']?'active':''}}">
            <a class="page-link" href="{{$pagination['path']}}?page={{$i}}{{$paginate_query?'&'.$paginate_query:''}}">{{$i}}</a>
        </li>
        @endfor
        <li class="page-item next">
            <a class="page-link" href="{{$next?($pagination['path'].'?page='.$next.($paginate_query?'&'.$paginate_query:'')):'javascript:void(0)'}}" aria-label="Next">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    </ul>
</nav>
