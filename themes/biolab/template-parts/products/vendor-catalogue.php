<form class="bg-white rounded-3 p-4 row justify-content-center gy-1 col-lg-4 col-11" action="#" method="post" enctype="multipart/form-data">
    <!-- Name Input -->
    <label for="name">نام کاتالوگ:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <!-- Pages Input -->
    <label for="pages">تعداد صقخات:</label>
    <input type="number" id="pages" name="pages" required>
    <br>
    <!-- Cover Input -->
    <label for="cover">کاور:</label>
    <input type="file" id="cover" name="cover" accept="image/*">
    <br>
    <!-- Catalogue Input -->
    <label for="catalogue">فایل کاتالوگ:</label>
    <input type="file" id="catalogue" name="catalogue" accept=".pdf, .doc, .docx">
    <br>
    <!-- Submit Button -->
    <input class="btn btn-success" type="submit" value="ثبت">
</form>