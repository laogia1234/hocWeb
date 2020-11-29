<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('l_ma')
                    ->nullable(false)
                    ->autoIncrement()
                    ->primarykey()
                    ->comment('Mã loại sản phẩm');
            $table->string('l_ten',50)
                    ->nullable(false)
                    ->comment('Tên loại # Tên loại sản phẩm');
            $table->timestamp('l_taoMoi')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm');
            $table->timestamp('l_capNhat')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm cập nhật # Thời điểm cập nhật loại sản phẩm gần nhất');
            $table->unsignedTinyInteger('l_trangThai')
                    ->nullable(false)
                    ->default('2')
                    ->comment('Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-hiển thị');
                //$table->unique('l_ma');
        });
        DB::statement("ALTER TABLE `loai` comment 'Loại sản phẩm # Loại sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
