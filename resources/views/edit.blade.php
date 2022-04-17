<h1>Update User</h1>
<form action="/updateRecord" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}"><br><br>
    <input type="text" name="username" value="{{$data['username']}}"><br><br>
    <input type="text" name="userPassword" value="{{$data['password']}}"><br><br>
    <button type="submit">Update</button>
</form>