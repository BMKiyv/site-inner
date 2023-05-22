@extends('admin.index')
@section('content')
<table class="zebra">
    {{-- <tr>
      <td>Cell</td> <td>Cell</td> <td>Cell</td>
    </tr>
    <tr>
      <td>Cell</td> <td>Cell</td> <td>Cell</td>
    </tr>
    <tr>
      <td>Cell</td> <td>Cell</td> <td>Cell</td>
    </tr>
  </table>

  <br><br> --}}

  <!-- (B) ZEBRA LIST -->
  <ul class="zebra">
    @foreach ($users as $item)
    
        <li><span> {{$item->name}} </span><span> {{$item->position}} </span><span> {{$item->birthday}} </span> <a href="{{route('user.edit',$item->id)}}" class="">Змінити</a> </li>
    @endforeach
  </ul>
  @endsection