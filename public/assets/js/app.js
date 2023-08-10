function gen_slug(val) {
    var slug = $(val).val();
    slug = slug.trim();
    slug = slug.toLowerCase();
    slug = slug.replace(/ /g, "-");
    //xoá tất cả các ký tự đặc biệt
    slug = removeAccents(slug);
    slug = slug.replace(/[`~!@#$%^&*()_|+=?;:'",.<>\{\}\[\]\\\/]/gi, "");
    //thêm số ngẫu nhiên vào cuối chuỗi
    var random = Math.floor(Math.random() * 100);
    slug = slug + "-" + random;
    $("#slug").val(slug);
}
//hàm xoá dấu tiếng việt
function removeAccents(str) {
    return str
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/đ/g, "d")
        .replace(/Đ/g, "D");
}
