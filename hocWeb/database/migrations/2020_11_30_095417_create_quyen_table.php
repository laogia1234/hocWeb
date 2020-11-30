<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->unsignedTinyInteger('q_ma')
                    ->autoIncrement()
                    ->nullable(false)
                    ->comment('Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng');
            $table->string('q_ten',30)
                    ->nullable(false)
                    ->comment('Tên quyền # Tên quyền');
            $table->string('q_dienGiai',250)
                    ->nullable(false)
                    ->comment('Diễn giải # Diễn giải về quyền');
            $table->timeStamp('q_taoMoi')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo quyền');
            $table->timeStamp('q_capNhat')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm cập nhật # Thời điểm cập nhật quyền gần nhất');
            $table->tinyInteger('q_trangThai')
                    ->nullable(false)
                    ->default('2')
                    ->comment('Trạng thái # Trạng thái quyền: 1-khóa, 2-khả dụng');
        });
        DB::statement("ALTER TABLE `quyen` comment 'Quyền # Các quyền quản lý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
