<?php
//giả lập app di động
?>

<form action="http://localhost:81/HocLaravel/Shop/public/sanpham" method="GET">
    <input type="submit" value="Lấy tất cả sp">
</form>
<br>


<form action="http://localhost:81/HocLaravel/Shop/public/sanpham" method="POST">
    <input type="text" name="tensp">
    <input type="file" name="hinh">
    <input type="submit" value="Thêm sp mới">
</form>
<br>


<form action="http://localhost:81/HocLaravel/Shop/public/sanpham/1" method="GET">
    <input type="submit" value="show 1 sản phẩm">
</form>
<br>


<form action="http://localhost:81/HocLaravel/Shop/public/sanpham/1" method="POST">
    <input type="hidden" name="_method" value='PUT'>
    <input type="text" name="tensp">
    <input type="submit" value="update sản phẩm">
</form>
<br>


<form action="http://localhost:81/HocLaravel/Shop/public/sanpham/63" method="POST">
    <input type="hidden" name="_method" value='DELETE'>
    <input type="submit" value="delete sản phẩm">
</form>

