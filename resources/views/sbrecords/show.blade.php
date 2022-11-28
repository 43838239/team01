@extends('app')

@section('title',$sbrecord->student->name. '的資料')

@section('dormitorysystem_theme',$sbrecord->student->name.'的詳細資料')

@section('dormitorysystem_contents')
        編號：{{ $sbrecord->id }}<br>
        學年：{{ $sbrecord->school_year }}<br>
        學期：{{ $sbrecord->semester }}<br>
        學生姓名：{{ $sbrecord->student->name }}<br>
        床位：{{ $sbrecord->bed->bedcode }}<br>
        樓長：{{ $sbrecord->is_chief }}<br>
        負責的樓層：{{ $sbrecord->responsible_floor }}<br>

@endsection