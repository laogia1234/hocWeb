<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
                $table->bigIncrements('kh_ma')
                        ->nullable(false)
                        ->comment('Mã khách hàng');
                $table->string('kh_taiKhoan',50)
                        ->nullable(false)
                        ->comment('Tài khoản # Tài khoản');
                $table->string('kh_matkhau',256)
                        ->nullable(false)
                        ->comment('Mật khẩu # Mật khẩu');
                $table->string('kh_hoTen',100)
                        ->nullable(false)
                        ->comment('Họ tên # Họ tên');
                $table->unsignedTinyInteger('kh_gioiTinh')
                        ->nullable(false)
                        ->default('1')
                        ->comment('Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác');
                $table->string('kh_email',100)
                        ->nullable(false)
                        ->comment('Email # Email');
                $table->dateTime('kh_ngaySinh')
                        ->nullable(false)
                        ->default(DB::raw('CURRENT_TIMESTAMP'))
                        ->comment('Ngày sinh # Ngày sinh');
                $table->string('kh_diaChi',250)
                        ->default(NULL)
                        ->comment('Địa chỉ # Địa chỉ');
                $table->string('kh_dienThoai',11)
                        ->default(NULL)
                        ->comment('Điện thoại # Điện thoại');
                $table->timeStamp('kh_taoMoi')
                        ->nullable(false)
                        ->default(DB::raw('CURRENT_TIMESTAMP'))
                        ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng');
                $table->timeStamp('kh_capNhat')
                        ->nullable(false)
                        ->default(DB::raw('CURRENT_TIMESTAMP'))
                        ->comment('Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất');
                $table->unsignedTinyInteger('kh_trangThai')
                        ->nullable(false)
                        ->default('3')
                        ->comment('Trạng thái # Trạng thái khách hàng: 1-khóa, 2-khả dụng, 3-chưa kích hoạt');
                //$table->unique('kh_ma','kh_gioiTinh','kh_trangThai');

        });
        DB::statement("ALTER TABLE `khachhang` comment 'Khách hàng # Khách hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
