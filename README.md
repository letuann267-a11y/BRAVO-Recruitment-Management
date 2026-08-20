# BRAVO Recruitment Management System

## Giới thiệu

**BRAVO Recruitment Management System** là hệ thống thông tin quản lý tuyển dụng được phân tích và thiết kế trong khuôn khổ khóa luận tốt nghiệp với đề tài:

> **"Phân tích và thiết kế website quản lý tuyển dụng cho Công ty Cổ phần Phần mềm BRAVO."**

Hệ thống mô phỏng quy trình tuyển dụng thực tế của doanh nghiệp, hỗ trợ quản lý xuyên suốt quá trình từ đăng tin tuyển dụng, tiếp nhận hồ sơ ứng viên, đánh giá và cập nhật trạng thái ứng tuyển đến quản lý dữ liệu tuyển dụng.

Website được xây dựng như giao diện của **hệ thống thông tin quản lý tuyển dụng**, phục vụ ba nhóm người dùng chính:

* **Ứng viên (Candidate)**
* **Nhân sự tuyển dụng (Recruiter/HR)**
* **Quản trị viên (Admin)**

---

##  Mục tiêu

Hệ thống được xây dựng nhằm:

* Tin học hóa quy trình tuyển dụng của doanh nghiệp.
* Hỗ trợ ứng viên tìm kiếm và ứng tuyển vào các vị trí phù hợp.
* Hỗ trợ nhân sự quản lý tin tuyển dụng và hồ sơ ứng viên.
* Hỗ trợ theo dõi trạng thái xử lý hồ sơ.
* Quản lý tập trung dữ liệu tuyển dụng.
* Tự động hóa một số nghiệp vụ thông qua **n8n**.
* Làm cơ sở nghiên cứu, phân tích và thiết kế hệ thống thông tin quản lý tuyển dụng.

---

## Đối tượng sử dụng

### 1. Ứng viên (Candidate)

Ứng viên có thể:

* Đăng ký tài khoản.
* Xác thực email.
* Đăng nhập / đăng xuất.
* Quên và đặt lại mật khẩu.
* Quản lý thông tin cá nhân.
* Cập nhật hồ sơ ứng viên.
* Upload ảnh đại diện.
* Upload CV.
* Quản lý chứng chỉ.
* Quản lý ngôn ngữ và trình độ.
* Tìm kiếm việc làm.
* Lọc việc làm theo nhiều tiêu chí.
* Xem thông tin chi tiết tin tuyển dụng.
* Ứng tuyển vào vị trí phù hợp.
* Hủy ứng tuyển.
* Theo dõi danh sách hồ sơ đã ứng tuyển.
* Theo dõi trạng thái hồ sơ.

### 2. Nhân sự tuyển dụng (Recruiter/HR)

Nhân sự tuyển dụng có thể:

* Xem dashboard tổng quan.
* Quản lý thông tin doanh nghiệp/chi nhánh.
* Tạo tin tuyển dụng.
* Cập nhật tin tuyển dụng.
* Quản lý danh sách tin tuyển dụng.
* Thiết lập các tiêu chí ưu tiên cho vị trí tuyển dụng.
* Xem danh sách ứng viên theo từng vị trí.
* Xem chi tiết hồ sơ ứng viên.
* Đánh giá mức độ phù hợp của ứng viên.
* Cập nhật trạng thái hồ sơ.
* Chấp nhận hoặc từ chối ứng viên.
* Gửi email phản hồi cho ứng viên.

### 3. Quản trị viên (Admin)

Quản trị viên có thể:

* Quản lý tài khoản người dùng.
* Quản lý danh mục tuyển dụng.
* Quản lý ngôn ngữ.
* Quản lý tin tuyển dụng.
* Quản lý dữ liệu liên quan đến ứng viên.
* Tìm kiếm dữ liệu trên hệ thống.
* Quản lý thông tin liên hệ.
* Theo dõi ứng viên đạt yêu cầu.

---

## ⚙️ Công nghệ sử dụng

| Thành phần                       | Công nghệ                      |
| -------------------------------- | ------------------------------ |
| Backend                          | PHP / Laravel                  |
| Frontend                         | HTML, CSS, JavaScript, Blade   |
| Database                         | MySQL                          |
| Web Server môi trường phát triển | XAMPP                          |
| Automation                       | n8n                            |
| Version Control                  | Git / GitHub                   |
| AI hỗ trợ                        | ChatGPT, Codex, GitHub Copilot |
| Hosting                          | Hostinger                      |

---

##  Kiến trúc và thành phần hệ thống

Hệ thống được xây dựng trên nền tảng **Laravel Framework**, áp dụng mô hình MVC.

```text
┌──────────────────────────────┐
│          Người dùng          │
│ Candidate / Recruiter / Admin│
└──────────────┬───────────────┘
               │
               ▼
┌──────────────────────────────┐
│        Laravel Website       │
│                              │
│  Routes → Controllers → Views│
│              ↓               │
│            Models            │
└──────────────┬───────────────┘
               │
               ▼
┌──────────────────────────────┐
│           MySQL              │
│        Database Server        │
└──────────────────────────────┘
               │
               ▼
┌──────────────────────────────┐
│             n8n              │
│      Automation Workflows    │
└──────────────────────────────┘
```

---

##  Chức năng nổi bật

### Tìm kiếm và lọc việc làm

Ứng viên có thể tìm kiếm việc làm theo nhiều tiêu chí như:

* Từ khóa.
* Danh mục.
* Mức lương.
* Địa điểm.
* Giới tính.
* Độ tuổi.
* Ngôn ngữ.
* Trình độ ngôn ngữ.
* Chứng chỉ.

### Matching ứng viên

Hệ thống hỗ trợ đánh giá mức độ phù hợp giữa ứng viên và vị trí tuyển dụng dựa trên các tiêu chí ưu tiên như:

* Độ tuổi.
* Giới tính.
* Tỉnh/thành phố.
* Danh mục.
* Ngôn ngữ.
* Chứng chỉ.

Các tiêu chí có thể được thiết lập trọng số để phục vụ việc tính điểm mức độ phù hợp.

###  Gửi email

Hệ thống hỗ trợ gửi email phản hồi đến ứng viên khi trạng thái hồ sơ được cập nhật.

###  Tự động hóa với n8n

n8n được sử dụng để xây dựng các workflow tự động, bao gồm:

* Gửi email khi phát sinh ứng viên mới.
* Tổng hợp báo cáo tuyển dụng định kỳ.
* Nhắc nhở nhân sự xử lý hồ sơ ứng viên.
* Kết nối và xử lý dữ liệu từ MySQL.

---

##  Ứng dụng AI trong quá trình phát triển

Trong quá trình phân tích, thiết kế và xây dựng hệ thống, một số công cụ AI được sử dụng để hỗ trợ:

### ChatGPT

Hỗ trợ:

* Phân tích yêu cầu nghiệp vụ.
* Xây dựng và hoàn thiện ý tưởng hệ thống.
* Phân tích chức năng.
* Viết và kiểm tra SQL.
* Xây dựng UML và sơ đồ hệ thống.
* Giải thích mã nguồn.
* Hỗ trợ xử lý lỗi.
* Soạn thảo tài liệu.

### GitHub Copilot

Hỗ trợ:

* Gợi ý mã nguồn.
* Sinh các đoạn code lặp lại.
* Hoàn thiện Controller, Model và View.
* Hỗ trợ debug.

### Codex

Hỗ trợ:

* Sinh và chỉnh sửa mã nguồn.
* Phân tích cấu trúc project.
* Hỗ trợ triển khai các chức năng theo yêu cầu.

> Các công cụ AI được sử dụng với vai trò hỗ trợ trong quá trình phát triển. Mã nguồn và kết quả đầu ra được kiểm tra, điều chỉnh và tích hợp phù hợp với yêu cầu của hệ thống.

---

##  Automation với n8n

Một số quy trình tự động hóa được xây dựng bằng n8n.

### Workflow 1 — Send Email When New Applicant

```text
Schedule Trigger
       ↓
MySQL
       ↓
Check New Applicant
       ↓
Process Data
       ↓
Send Email
```

Workflow kiểm tra dữ liệu ứng viên mới trong database và gửi email thông báo đến nhân sự tuyển dụng.

### Workflow 2 — Daily Recruitment Report

```text
Schedule Trigger
       ↓
MySQL
       ↓
Query Recruitment Data
       ↓
Generate Report
       ↓
Send Email
```

Workflow tổng hợp dữ liệu tuyển dụng trong khoảng thời gian xác định và gửi báo cáo tự động.

### Workflow 3 — Reminder for HR

```text
Schedule Trigger
       ↓
MySQL
       ↓
Check Pending Applications
       ↓
Identify Applications
       ↓
Send Reminder
```

Workflow hỗ trợ nhắc nhở nhân sự xử lý các hồ sơ chưa được phản hồi.

---

##  Database

Database sử dụng **MySQL**.

Một số bảng chính:

```text
users
jobs
job_requests
categories
languages
provinces
priorities
```

Trong đó:

* `users`: thông tin tài khoản và hồ sơ người dùng.
* `jobs`: thông tin tin tuyển dụng.
* `job_requests`: thông tin ứng tuyển.
* `categories`: danh mục tuyển dụng.
* `languages`: thông tin ngôn ngữ.
* `provinces`: danh sách tỉnh/thành phố.
* `priorities`: trọng số các tiêu chí đánh giá mức độ phù hợp.

File database được lưu tại:

```text
03_Database/recruit.sql
```

---

##  Cấu trúc Repository

```text
BRAVO-Recruitment-Management/
│
├── 01_Source_Code/
│   └── tuyen-dung-Bravo/
│       ├── app/
│       ├── bootstrap/
│       ├── config/
│       ├── database/
│       ├── public/
│       ├── resources/
│       ├── routes/
│       ├── storage/
│       ├── tests/
│       ├── artisan
│       ├── composer.json
│       └── ...
│
├── 02_Thesis/
│   ├── Khoa_luan.docx
│   └── Khoa_luan.pdf
│
├── 03_Database/
│   └── recruit.sql
│
└── 04_Diagrams/
    ├── Use_Case/
    ├── Activity/
    ├── Sequence/
    ├── ERD/
    └── Class_Diagram/
```

---

##  Cài đặt và chạy dự án

### 1. Clone repository

```bash
git clone https://github.com/letuann267-a11y/BRAVO-Recruitment-Management.git
```

### 2. Di chuyển vào source code

```bash
cd BRAVO-Recruitment-Management/01_Source_Code/tuyen-dung-Bravo
```

### 3. Cài đặt PHP dependencies

```bash
composer install
```

### 4. Tạo file môi trường

Copy:

```text
.env.example
```

thành:

```text
.env
```

Sau đó cấu hình database và các biến môi trường cần thiết.

### 5. Tạo Application Key

```bash
php artisan key:generate
```

### 6. Tạo Database

Tạo database MySQL và import file:

```text
03_Database/recruit.sql
```

### 7. Cấu hình Database

Trong `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 8. Chạy Laravel

```bash
php artisan serve
```

Website mặc định có thể truy cập tại:

```text
http://127.0.0.1:8000
```

---

##  Tài liệu khóa luận

Tài liệu khóa luận được lưu tại:

```text
02_Thesis/
```

Bao gồm:

* Bản Word.
* Bản PDF.

Các sơ đồ phân tích và thiết kế hệ thống được lưu tại:

```text
04_Diagrams/
```

##  Demo

Website demo:

**https://tuyendungbravo.site**

---

## 📖 Đề tài khóa luận

**Tên đề tài:**

> Phân tích và thiết kế website quản lý tuyển dụng cho Công ty Cổ phần Phần mềm BRAVO.

**Mục đích:** Phân tích yêu cầu nghiệp vụ, thiết kế hệ thống thông tin và xây dựng prototype website hỗ trợ quy trình quản lý tuyển dụng.

---


##  Repository

GitHub:

https://github.com/letuann267-a11y/BRAVO-Recruitment-Management


