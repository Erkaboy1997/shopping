<?php
$category = \Illuminate\Support\Facades\DB::table('category')->where('parent_id',0)->orderByDesc('id')->get()
?>
@foreach($category as $value)
    <li><a href="{{ url('category',$value->id)  }}">{{ $value->name  }}</a></li>
@endforeach
