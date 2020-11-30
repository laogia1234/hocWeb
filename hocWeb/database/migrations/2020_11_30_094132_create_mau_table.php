<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau', function (Blueprint $table) {
            $table->unsignedTinyInteger('m_ma')
                    ->autoIncrement()
                    ->nullable(false)
                    ->comment('Mã màu sản phẩm, 1-Phối màu (đỏ, vàng,...)');
            $table->string('m_ten',50)
                    ->nullable(false)
                    ->comment('Tên màu # Tên màu sản phẩm');
            $table->timeStamp('m_taoMoi')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo màu');
            $table->timeStamp('m_capNhat')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm cập nhật # Thời điểm cập nhật màu gần nhất');
            $table->tinyInteger('m_trangThai')
                    ->nullable(false)
                    ->default('2')
                    ->comment('Trạng thái # Trạng thái màu sản phẩm: 1-khóa, 2-khả dụng');
        });
        DB::statement("ALTER TABLE `mau` comment 'Màu sắc # Màu sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau');
    }
}
