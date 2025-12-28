# Hướng dẫn tạo Database trong PostgreSQL

## Cách 1: Sử dụng lệnh psql (Command Line)

### Bước 1: Kết nối vào PostgreSQL
```bash
psql -U postgres -h localhost
```

### Bước 2: Tạo database
Sau khi kết nối, chạy lệnh SQL:
```sql
CREATE DATABASE todolist;
```

### Bước 3: Kiểm tra database đã được tạo
```sql
\l
```
hoặc
```sql
\list
```

### Bước 4: Thoát khỏi psql
```sql
\q
```

---

## Cách 2: Tạo database trực tiếp từ command line (không cần vào psql)

```bash
psql -U postgres -h localhost -c "CREATE DATABASE todolist;"
```

Nếu database đã tồn tại và bạn muốn xóa rồi tạo lại:
```bash
psql -U postgres -h localhost -c "DROP DATABASE IF EXISTS todolist;"
psql -U postgres -h localhost -c "CREATE DATABASE todolist;"
```

---

## Cách 3: Sử dụng Laravel Artisan (Tự động tạo khi cần)

Laravel có thể tự động tạo database nếu bạn cấu hình đúng. Tuy nhiên, thông thường bạn cần tạo database trước.

### Kiểm tra kết nối sau khi tạo database:
```bash
php artisan db:show
```

---

## Cách 4: Sử dụng pgAdmin (GUI Tool)

1. Mở pgAdmin
2. Kết nối với PostgreSQL server
3. Click chuột phải vào "Databases"
4. Chọn "Create" → "Database..."
5. Nhập tên database: `todolist`
6. Click "Save"

---

## Cách 5: Tạo database với encoding và owner cụ thể

```sql
CREATE DATABASE todolist
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'en_US.UTF-8'
    LC_CTYPE = 'en_US.UTF-8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;
```

---

## Kiểm tra database đã tồn tại

### Xem danh sách tất cả databases:
```bash
psql -U postgres -h localhost -l
```

### Kiểm tra database cụ thể:
```bash
psql -U postgres -h localhost -lqt | grep todolist
```

---

## Xóa database (nếu cần)

```bash
psql -U postgres -h localhost -c "DROP DATABASE todolist;"
```

Hoặc trong psql:
```sql
DROP DATABASE todolist;
```

---

## Lưu ý quan trọng:

1. **Quyền truy cập**: Đảm bảo user `postgres` có quyền tạo database
2. **Kết nối**: Đảm bảo PostgreSQL server đang chạy
3. **Cấu hình Laravel**: Sau khi tạo database, kiểm tra file `.env` có đúng thông tin kết nối không

