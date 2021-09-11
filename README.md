# Web Assignment Project
## Hướng dẫn cài đặt:
1. Thay đổi thư mục web root của XAMPP (hoặc clone git project vào thư mục htdocs của XAMPP).
2. Trong phpmyadmin, tạo user `web_database`, password `web_database_password`.
3. Đăng nhập phpmyadmin bằng tài khoản `web_database` vừa tạo. Tạo db `web_assignment` và import file `web_assignment.sql` tương ứng lên.
4. Mở terminal hoặc command line, chạy lệnh ```composer install``` để tạo file autoload.php

**Lưu ý**: 
- Nếu import thấy lỗi `Unknown collation: 'utf8mb4_0900_ai_ci'` thì mở file db bằng text editor, replace `utf8mb4_0900_ai_ci` thành `utf8mb4_general_ci`.

## Tài khoản admin
- Username: admin@letrungsgon.tk
- Password: 123456

## Tài khoản member
- Username: nguyenvana@letrungsgon.tk
- Password: 123456

## Rules
### Commit git
1. Không commit những file, thư mục config/logs/media (như .vs, application/log, Source...).
2. Chỉ commit những file đã **thực sự** chỉnh sửa (file đã code).
3. Commit ghi mô tả về những chỉnh sửa đã làm.

## Một số đường dẫn
Đường dẫn|Chức năng
---|---
**System**|
./system/Database.php|Config database
./system/App.php|Config route
./system/Constant.php|File chứa những biến, hàm global
**Controller**|
./controller/admin|Controllers của admin
./controller/*.php|Controllers của client
**Model**|
./model/*.php|Model tương tác với database
**View**|
./view/*|Front end home gốc của project
./assets/*|Thư mục chứa file css/js/image frontend

## Hyperlinks FE
* http://localhost/webAssignment/
* http://localhost/webAssignment/home/get_city
* http://localhost/webAssignment/home/get_district
* http://localhost/webAssignment/admin/dashboard