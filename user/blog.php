
  <form  action="<?= PATH ?>page=imablog" method="post" id="formLogin">
<label for="name" class="form-label">Tiêu đề:<span class="text-danger">(*)</label>
<input type="text" id="masv" class="form-control" placeholder="Trần Văn Tài" name="title" value="" style="height: 40px;" />

<label for="content" class="form-label">Nội dung:<span class="text-danger">(*)</label>
<input type="text" id="masv" class="form-control" placeholder="Trần Văn Tài" name="content" value="" style="height: 100px;" />
<label for="add" class="form-label">Image</label>
        <!-- <imput type="text" class="form-control" id="lop" placeholder="Dia chi" name="address"> -->
        <input type="file"  class="form-control" placeholder="Dia chi" 
        name="image" />
        <button type="submit" class="btn btn-primary" name ="submit">Lấy thông tin</button>
        </form>
       