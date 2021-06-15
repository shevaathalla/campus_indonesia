# Kampus Indonesia Backend Internship Test

## Penjelasan Aplikasi
Aplikasi ini dibuat menggunakan framework laravel dan bootstrap 4 scaffolding. Tujuan pembuatan aplikasi ini adalah untuk mengikuti seleksi internship di Kampus Indonesia. Aplikasi ini memiliki 4 model

- User (pengguna)
  User berfungsi untuk menyimpan data pengguna yang telah mendaftar aplikasi.
- Faculty (fakultas)
  Sebelum menambahkan jurusan harap menambahkan fakultas terlebih dahulu
- Major (jurusan)
- News (berita)

### Autentikasi
Aplikasi ini support 2 autentikasi yaitu autentikasi biasa dan google.

*agar autentikasi menggunakan google dan reset password bekerja harap atur setting Mail dan Google client server pada env anda

Aplikasi ini memiliki 2 level access yaitu admin dan user biasa

- Admin
  Admin memiliki hak untuk melihat, membuat, mengedit, dan menghapus model Faculty (fakultas), Major (jurusan), News(berita)
- User
  hak akses yang dimiliki User sama dengan guest (tidak memiliki account) yaitu hanya bisa melihat data yang sudah dibuat oleh admin

  ## ERD Database
  ![erd](public/image/erd.png)

  ## Screenshot Aplikasi
  - Landing Page
    ![landing_page](public/screenshot/landing_page.png)

  - Register Page
    ![register_page](public/screenshot/register.png)

  - Login Page
    ![login_page](public/screenshot/login.png)

  - Forgot Password Email Notification
    ![forgot_password_email](public/screenshot/forgot_password_email.png)

  - Google Authentication
    ![google_authentication](public/screenshot/google_authentication.png)

  - Faculty Create Page
    ![faculty_page](public/screenshot/faculty_create.png)

  - Faculty Index Page
    ![faculty_index_page](public/screenshot/faculty_index.png)

  - Faculty Edit Page
    ![faculty_edit_page](public/screenshot/faculty_edit.png)

  - Major Create Page
    ![major_create_page](public/screenshot/major_create.png)
    
  - Major Index Page
    ![major_index_page](public/screenshot/major_index.png)

  - Major Edit Page
    ![major_edit_page](public/screenshot/major_edit.png)

  - Faculty Show Page
    ![faculty_show_page](public/screenshot/faculty_show.png)

  -  News Create Page
    ![news_create_page](public/screenshot/news_create.png)

  -  News Index Page
    ![news_index_page](public/screenshot/news_index.png)

  -  News Show Page
    ![news_show_page](public/screenshot/news_show.png)

  -  News Edit Page
    ![news_edit_page](public/screenshot/news_edit.png)    