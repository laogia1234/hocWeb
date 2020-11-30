<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->unsignedTinyInteger('cd_ma')
                    ->autoIncrement()
                    ->nullable(false)
                    ->comment('Mã chủ đề');
            $table->string('cd_ten',50)
                    ->nullable(false)
                    ->comment('Tên chủ đề # Tên chủ đề');
            $table->timeStamp('cd_taoMoi')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo chủ đề');
            $table->timeStamp('cd_capNhat')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm cập nhật # Thời điểm cập nhật chủ đề gần nhất');
            $table->tinyInteger('cd_trangThai')
                    ->nullable(false)
                    ->default('2')
                    ->comment('Trạng thái # Trạng thái chủ đề: 1-khóa, 2-khả dụng');
        });
        DB::statement("ALTER TABLE `chude` comment 'Chủ đề # Chủ đề: cưới, sinh nhật, chúc mừng, chia buồn...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
