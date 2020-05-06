@extends('Dashboard.Dinas.relawan')
@section('content-crud')

 <br />
 @if (\Session::has('success'))
   <div class="alert alert-success">
     <p>{{ \Session::get('success') }}</p>
   </div><br/>
  @endif
  @include('sweet::alert')
 <table class="table table-striped">
 <thead>
   <tr>
     <th>Nama Relawan</th>
     <th>Keahlian</th>
     <th>Alamat Lengkap</th>
     <th>Status</th>
     <th colspan="4">Action</th>
   </tr>
 </thead>
 <tbody>

   @foreach($relawan as $relawan)
   <tr>
     <td>{{$relawan['nama_relawan']}}</td>
     <td>{{$relawan['keahlian']}}</td>
     <td>{{$relawan['alamat_lengkap_relawan']}}</td>
     <td>{{$relawan['status_relawan']}}</td>
     <td><a href="{{URL::to('relawan/'.$relawan['id_relawan'])}}" class="btn btn-success">Detil</a></td>
     <!-- <td><input id="toggle-trigger" type="checkbox" data-toggle="toggle"></td> -->
     <td><a href="{{URL::to('relawan/'.$relawan['id_relawan'].'/edit')}}" class="btn btn-info">Edit</a></td>
     <!-- <td><a href="{{URL::to('relawan/'.$relawan['id_relawan'].'/verif')}}" class="btn btn-info">Verifikasi</a></td> -->
     <td>
       <form action="{{URL::to('relawan/'.$relawan['id_relawan'])}}" method="post">
         @csrf
         <input name="_method" type="hidden" value="DELETE">
         <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
       </form>
     </td>
   </tr>
   @endforeach
 </tbody>
 </table>

 </div>
 <script>
 function tes() {
   $('input[name="verif"]:checked').each(function() {
     alert(this.value);
    });
 }
</script>
@endsection
