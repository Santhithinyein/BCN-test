@props(['totalQuantity'])
    @if ($totalQuantity)
     <span class="badge bg-danger">
       {{ $totalQuantity }}
    </span>
    @else
        
    @endif
