<div class="row px-5">
    <h2 class="text-success">ĐIỀN THÔN GITN LIÊN HỆ</h2>
    <form action="<?= PATH ?>page=doLogin" method="post" id="formLogin">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <!-- <imput type="text" class="form-control" id="masv" placeholder="Ma kh" name="userid"> -->
        <input type="email" id="email" placeholder="Enter email" class="form-control" 
     name="email" value=""/>
</div>
<div class="mb-3">
        <label for="pwd" class="form-label">Password:</label>
        <!-- <imput type="text" class="form-control" id="masv" placeholder="Ma kh" name="userid"> -->
        <input type="password" id="pwd" placeholder="Enter email" class="form-control" 
        placeholder="Enter Passwoed" name="pswd" value="" autocomplete="new-password"/>
</div>
<div class="form-check mb-3">
        <label class="form-check-label">
        <!-- <imput type="text" class="form-control" id="masv" placeholder="Ma kh" name="userid"> -->
        <input type="checkbox" id="email"  class="form-check-input"  name="remember" />Remember
</label>
</div>
<p><a href="<?= PATH ?>page=forgotPassword">Quen mat khau</a></p>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>