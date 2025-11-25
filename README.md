# BE_QUANLYRAPPHIM - Backend Hệ thống Quản lý Rạp phim

Đây là API backend cho Hệ thống Quản lý Rạp phim, được xây dựng bằng Laravel.

## 🛠 Công nghệ sử dụng

- **Framework:** Laravel 12.x
- **Ngôn ngữ:** PHP 8.2+
- **Cơ sở dữ liệu:** MySQL
- **Công cụ Build Frontend:** Vite (cho assets)

## 🚀 Yêu cầu tiên quyết

Trước khi bắt đầu, hãy đảm bảo bạn đã cài đặt các yêu cầu sau:

- **PHP** >= 8.2
- **Composer**
- **Node.js** & **npm**
- **MySQL** server đang chạy

## 📦 Cài đặt

1.  **Clone repository:**

    ```bash
    git clone https://github.com/Tungn111/be_quanlyrapphim.git
    cd BE_CONGCU
    ```

2.  **Cài đặt các thư viện PHP:**

    ```bash
    composer install
    ```

3.  **Cài đặt các thư viện Node.js:**

    ```bash
    npm install
    ```

4.  **Cấu hình môi trường:**

    Copy file môi trường ví dụ và cấu hình cài đặt cơ sở dữ liệu của bạn:

    ```bash
    cp .env.example .env
    ```

    Mở file `.env` và cập nhật thông tin kết nối cơ sở dữ liệu:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=be_congcu  # Đảm bảo database này đã tồn tại
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Tạo Application Key:**

    ```bash
    php artisan key:generate
    ```

6.  **Chạy Migrations và Seeders:**

    Tạo các bảng cơ sở dữ liệu và nạp dữ liệu mẫu:

    ```bash
    php artisan migrate --seed
    ```

## 🏃‍♂️ Chạy ứng dụng

Để khởi động server phát triển local:

```bash
php artisan serve
```

API sẽ có sẵn tại `http://127.0.0.1:8000`.

Để build assets frontend:

```bash
npm run dev
```

## 🔌 Danh sách API

Tất cả các route API đều có tiền tố `/api`.

### 🎬 Phim
- `GET /api/phim/get-data` - Lấy danh sách phim
- `POST /api/phim/add-data` - Thêm phim mới
- `POST /api/phim/update` - Cập nhật thông tin phim
- `POST /api/phim/delete` - Xóa phim
- `POST /api/phim/change-status` - Thay đổi trạng thái phim
- `POST /api/phim/tim-kiem` - Tìm kiếm phim

### 📽 Phong Chieu (Phòng Chiếu)
- `GET /api/phong-chieu/get-data` - Lấy danh sách phòng chiếu
- `POST /api/phong-chieu/add-data` - Thêm phòng chiếu mới
- `POST /api/phong-chieu/update` - Cập nhật thông tin phòng
- `POST /api/phong-chieu/delete` - Xóa phòng chiếu
- `POST /api/phong-chieu/tao-ghe-auto` - Tự động tạo ghế cho phòng

### 🕒 Suat Chieu (Suất Chiếu)
- `GET /api/suat-chieu/get-data` - Lấy danh sách suất chiếu
- `POST /api/suat-chieu/add-data` - Thêm suất chiếu mới
- `POST /api/suat-chieu/tao-ve-auto` - Tự động tạo vé cho suất chiếu

### 🎫 Ve (Vé)
- `GET /api/ve/get-data` - Lấy danh sách vé
- `POST /api/ve/soat-ve` - Soát vé

### 🎁 Voucher
- `GET /api/voucher/get-data` - Lấy danh sách voucher
- `POST /api/voucher/add-data` - Thêm voucher mới

### 👥 Nhan Vien (Nhân viên/Admin)
- `POST /api/admin/dang-nhap` - Đăng nhập Admin
- `GET /api/nhan-vien/get-data` - Lấy danh sách nhân viên
- `POST /api/nhan-vien/add-data` - Thêm nhân viên mới

### 🛒 Don Hang (Đơn hàng)
- `POST /api/dat-ve/thanh-toan` - Thanh toán đơn hàng

## 📂 Cấu trúc dự án

```
BE_CONGCU/
├── app/
│   ├── Http/Controllers/  # API Controllers
│   ├── Models/            # Eloquent Models
├── database/
│   ├── migrations/        # Database Schemas
│   ├── seeders/           # Data Seeders
├── routes/
│   ├── api.php            # Định nghĩa API Routes
├── .env                   # Biến môi trường
└── composer.json          # Các thư viện PHP phụ thuộc
```

## 🤝 Nhóm phát triển
- Nhóm 5 

