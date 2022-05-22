# Web Assignment Project
## Hướng dẫn cài đặt:
1. Thay đổi thư mục web root của XAMPP (hoặc clone git project vào thư mục htdocs của XAMPP).
2. Trong phpmyadmin, tạo user `web_database`, password `web_database_password`. Đăng nhập phpmyadmin bằng tài khoản `web_database` vừa tạo. Tạo db `web_assignment` và import file `web_assignment.sql` tương ứng lên. Hoặc mở file cấu hình database theo đường dẫn system\Database.php và cấu hình lại username, password,...

3. Mở terminal hoặc command line, chạy lệnh `composer install` để tạo file autoload.php
4. Thay đổi môi trường deploy bằng biến hằng ENVIRONMENT trong file ./index.php với 2 giá trị: `development` hoặc `production`

**Lưu ý**: 
- Nếu import thấy lỗi `Unknown collation: 'utf8mb4_0900_ai_ci'` thì mở file db bằng text editor, replace `utf8mb4_0900_ai_ci` thành `utf8mb4_general_ci`.

## Tài khoản admin
```
email: admin@gmail.com
password: 123456
```

## Tài khoản member
```
email: nguyenvana@gmail.com
password: 123456
```

## Rules
### Quy tắc đặt tên
- Đặt tên file, tên class của Controller bằng cách viết hoa chữ cái đầu. Ví dụ `Example.php`.
```php
// Example.php
namespace Controller;
Example extends \Controller\Controller {...}
```
- Đặt tên file, tên class của Model bằng cách viết in hoa kết hợp `_Model`. Ví dụ `EXAMPLE_Model.php`.
```php
// EXAMPLE_Model.php
namespace Model;
EXAMPLE_Model extends \Model\Model {...}
``` 
- Đặt tên file của view bằng cách viết thường toàn bộ. Ví dụ `example.html`

### Commit git
1. Không commit những file, thư mục config/logs/media (như .vs, application/log, Source...).
2. Chỉ commit những file đã **thực sự** chỉnh sửa (file đã code).
3. Commit ghi mô tả về những chỉnh sửa đã làm.

## Một số đường dẫn
Đường dẫn|Chức năng
---|---
**System**
./system/Database.php|Config database
./system/App.php|Config route
./system/Constant.php|File chứa những biến, hàm global
**Controller**
./controller/admin|Controllers của admin
./controller/*.php|Controllers của client
**Model**
./model/*.php|Model tương tác với database
**View**
./view/*|Front end home gốc của project
./assets/*|Thư mục chứa file css/js/image frontend

## Hyperlinks FE
* http://localhost/webAssignment/
* http://localhost/webAssignment/auth/login
* http://localhost/webAssignment/product/list
* http://localhost/webAssignment/admin/auth
* http://localhost/webAssignment/admin/dashboard
* ...

## Web demo (Có thể bị lỗi)

## Lưu ý
* Frontend: Nhóm có tham khảo và chỉnh sửa mã nguồn cho phần giao diện từ https://www.youtube.com/watch?v=_uWHezOxq0U
* Backend: Nhóm tự xây dựng hoàn toàn mã nguồn từ PHP thuần sử dụng mô hình MVC đơn giản dựa trên cấu trúc của CodeIgniter Framework
