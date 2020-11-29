<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('vc_ma')
                    ->autoIncrement()
                    ->nullable(false)
                    ->comment('Mã dịch vụ giao hàng');
            $table->String('vc_ten', 191)
                    ->nullable(false)
                    ->comment('Tên dịch vụ # Tên dịch vụ giao hàng');
            $table->unsignedInteger('vc_chiPhi')
                    ->nullable(false)
                    ->default('0')
                    ->comment('Phí giao hàng # Phí giao hàng');
            $table->Text('vc_dienGiai')
                    ->nullable(false)
                    ->comment('Thông tin # Thông tin về dịch vụ giao hàng');
            $table->TimeStamp('vc_taoMoi')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo dịch vụ giao hàng');
            $table->TimeStamp('vc_capNhat')
                    ->nullable(false)
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Thời điểm cập nhật # Thời điểm cập nhật dịch vụ giao hàng gần nhất');
            $table->unsignedTinyInteger('vc_trangThai')
                    ->nullable(false)
                    ->default('2')
                    ->comment('Trạng thái # Trạng thái dịch vụ giao hàng: 1-khóa, 2-hiển thị');
            //$table->unique('vc_ma','vc_chiPhi','vc_trangThai');
        });
        DB::statement("ALTER TABLE `vanchuyen` comment 'Dịch vụ giao hàng # Dịch vụ giao hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanchuyen');
    }
}
