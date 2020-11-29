<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')
                    ->nullable(false)
                    ->autoIncrement()
                    ->primarykey()
                    ->comment('Mã phương thức thanh toán');
            $table->string('tt_ten',191)
                    ->nullable(false)
                    ->comment('Tên phương thức # Tên phương thức thanh toán');
            $table->text('tt_dienGiai')
                    ->nullable(false)
                    ->comment('Thông tin # Thông tin về phương thức thanh toán');
            $table->timestamp('tt_taoMoi')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán');
            $table->timestamp('tt_capNhat')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán gần nhất');
            $table->unsignedTinyInteger('tt_trangThai')
                    ->nullable(false)
                    ->default('2')
                    ->comment('Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-hiển thị');

                //$table->unique('tt_ma','tt_trangThai');  
        });
        DB::statement("ALTER TABLE `thanhtoan` comment 'Phương thức thanh toán # Phương thức thanh toán'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoan');
    }
}
