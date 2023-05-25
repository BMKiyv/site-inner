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
    
        <li class="admin-user">
          <div class="admin-user-block">
          <span class="admin-user-content"> {{$item->name}} </span>
          <span class="admin-user-content"> {{$item->position}} </span>
          <span class="admin-user-content"> {{$departments[$item->department_id-1]->name}} </span>
          <span class="admin-user-content"> {{$item->birthday}} </span> 
          </div>
          <div class="admin-user-buttons">
          <a href="{{route('user.edit',$item->id)}}" class="change-button">Змінити</a>
          
          <form action="{{route('user.destroy', $item->id)}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Видалити</button>
          </form>

          <a href="{{route('user.show',$item->id)}}" class="change-button">Заблокувати</a>
        </div> 
        </li>
    @endforeach
  </ul>
  @endsection