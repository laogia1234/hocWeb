@extends('Layouts.MasterLayout')

    @section('title')
        Danh sách nhân viên
    @endsection

@section('content')

<h1> Xin chào các bạn! ^^</h1>
<br/>
Tên của bạn là: {{$ten}} <br/>
Bạn {{$tuoi}} tuổi.
<br/>
@if($dangNhap)
    <button> Đăng nhập</button>
@else
    <button> Đăng Xuất</button>
@endif
</br>
<?php 
$i;

?>

<!-- @for($i = 0; $i < 10; $i++)
    Dòng thứ {{$i + 1}}   </br>
@endfor -->

<table border="1" cellspacing="0">
    <thead> 
        <th>id</th>
        <th>Tên</th>
        <th>Họ</th>
        <th>Địa chỉ Email</th>
        <th>Giới tính</th>
        <th>Địa chỉ IP</th>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->first_name}}</td>
            <td>{{$row->last_name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->gender}}</td>
            <td>{{$row->ip_address}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection