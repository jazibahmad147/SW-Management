<h1>User Sign up</h1>

<form action="/userReg" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Enter your username"><br>
    <small>@error('username'){{$message}}@enderror </small><br><br>
    <input type="text" name="fullName" placeholder="Enter your full name"><br>
    <small>@error('fullName'){{$message}}@enderror </small><br><br>
    <input type="email" name="email" placeholder="Enter your email"><br>
    <small>@error('email'){{$message}}@enderror </small><br><br>
    <input type="password" name="password" placeholder="Enter your password"><br>
    <small>@error('password'){{$message}}@enderror </small><br><br>
    <button type="submit">Register</button>
</form>