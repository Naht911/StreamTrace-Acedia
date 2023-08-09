# Cách Cài Đặt

### Clone dự án về

Copy file tạo file .env > copy nội dung file .evn.example qua

### Chạy các lệnh sau theo thứ tự:

```
composer install
php artisan key:generate
```

### Tạo database tên ```streamtrace_acedia``` và chạy lệnh sau:

```
php artisan migrate
```

### Mở 2 cửa số console mới (Ctrl + j ) và chạy tiếp 2 lệnh sau: 

```
php artisan serve
```


