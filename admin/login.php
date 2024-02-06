<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa; /* Màu nền */
            font-family: Arial, sans-serif; /* Font chữ */
        }

        .row {
            margin: 0 auto; /* Căn giữa */
            max-width: 400px; /* Độ rộng tối đa */
            padding: 20px;
            background-color: #ffffff; /* Màu nền form */
            border-radius: 8px; /* Góc bo tròn */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        }

        h2 {
            color: #28a745; /* Màu văn bản */
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333333; /* Màu văn bản */
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da; /* Màu viền input */
            border-radius: 4px; /* Góc bo tròn input */
        }

        .form-check-label {
            color: #333333; /* Màu văn bản checkbox */
        }

        a {
            color: #007bff; /* Màu liên kết */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background-color: #007bff; /* Màu nút */
            color: #ffffff; /* Màu văn bản nút */
            padding: 10px 20px;
            border: none;
            border-radius: 4px; /* Góc bo tròn nút */
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Màu khi hover nút */
        }
    </style>
</head>
<body>
    <div class="row">
        <h2>dang nhap</h2>
        <form action="doLogin.php" method="post" id="formLogin">
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Enter email" class="form-control" name="email" value=""/>
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" id="pwd" placeholder="Enter password" class="form-control" name="pswd" value="" autocomplete="new-password"/>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input type="checkbox" id="remember" class="form-check-input" name="remember"/>Remember
                </label>
            </div>
            <p><a href="#">Quên mật khẩu</a></p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
