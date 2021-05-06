<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gamdum',
                'slug' => 'gamdum1618388986',
                'id_category' => 1,
                'id_producer' => 1,
                'amount' => 12,
                'image' => 'imageProduct/121459708_403251084178097_1329374978001414759_n_1618382964.jpg',
                'image1' => 'imageProduct/121648553_784632542389446_3566435560311680692_n_1618382964.jpg',
                'image2' => 'imageProduct/10_vclub_1618382964.png',
                'price' => 21000,
                'new' => 1,
                'description' => 'Helllo',
                'created_at' => '2021-04-14 06:49:24',
                'updated_at' => '2021-04-25 14:30:29',
                'deleted_at' => '2021-04-25 14:30:29',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bandai Mô Hình Gundam HG Moon HGUC UC',
                'slug' => 'bandai-mo-hinh-gundam-hg-moon-hguc-uc1619539226',
                'id_category' => 2,
                'id_producer' => 2,
                'amount' => 21,
                'image' => 'imageProduct/1231_1619536533.jpg',
                'image1' => 'imageProduct/hguc_moon_gundam_03_1_1619536533.jpg',
                'image2' => 'imageProduct/hguc_moon_gundam_pa_1619536533.jpg',
                'price' => 6400000,
                'new' => 1,
                'description' => 'Tên Sản Phẩm : Bandai Mô Hình Gundam HG Moon 1/144 HGUC UC Đồ Chơi Lắp Ráp Anime Nhật

Thương Hiệu : Bandai – Nhật Bản

Phiên Bản : Hg 

Tỷ Lệ : 1:144

Độ Tuổi : >14

Phân Loại Sp : Lắp Ráp

Sản Phẩm Nhựa Cao Cấp Với Độ Sắc Nét Cao
Sản Xuất Bởi Bandai Namco – Nhật Bản
An Toàn Với Trẻ Em
Phát Triển Trí Não Cho Trẻ Hiệu Quả Đi Đôi Với Niềm Vui Thích Bất Tận
Rèn Luyện Tính Kiên Nhẫn Cho Người Chơi',
                'created_at' => '2021-04-25 14:42:42',
                'updated_at' => '2021-04-27 16:00:26',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Daban Mô Hình Gundam HG Shiranui Akatsuki',
                'slug' => 'daban-mo-hinh-gundam-hg-shiranui-akatsuki1619539253',
                'id_category' => 2,
                'id_producer' => 3,
                'amount' => 20,
                'image' => 'imageProduct/6ed59eeccd5ee8b39d69d3ca88462036_copy_copy_copy_1619361839.jpg',
                'image1' => 'imageProduct/6ed59eeccd5ee8b39d69d3ca88462036_copy_copy_copy_copy_copy_1619361839.jpg',
                'image2' => 'imageProduct/400_1619361839.jpg',
                'price' => 1800000,
                'new' => 1,
                'description' => 'Tỷ Lệ : 1:144

Độ Tuổi : >14

Phân Loại Sp : Lắp Ráp

Sản Phẩm Nhựa Cao Cấp Với Độ Sắc Nét Cao
Sản Xuất Bởi Bandai Namco – Nhật Bản
An Toàn Với Trẻ Em
Phát Triển Trí Não Cho Trẻ Hiệu Quả Đi Đôi Với Niềm Vui Thích Bất Tận
Rèn Luyện Tính Kiên Nhẫn Cho Người Chơi',
                'created_at' => '2021-04-25 14:43:59',
                'updated_at' => '2021-04-27 16:00:53',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Mô Hình Gundam HG X Maoh',
                'slug' => 'mo-hinh-gundam-hg-x-maoh1619539264',
                'id_category' => 2,
                'id_producer' => 3,
                'amount' => 20,
                'image' => 'imageProduct/hg_1619361918.jpg',
                'image1' => 'imageProduct/hg_gundam_marchosias_4_1619361918.jpg',
                'image2' => 'imageProduct/hg_gundam_marchosias_box_art_1619361918.jpg',
                'price' => 1800000,
                'new' => 1,
                'description' => 'Tỷ Lệ : 1:144

Độ Tuổi : >14

Phân Loại Sp : Lắp Ráp

Sản Phẩm Nhựa Cao Cấp Với Độ Sắc Nét Cao
Sản Xuất Bởi Bandai Namco – Nhật Bản
An Toàn Với Trẻ Em
Phát Triển Trí Não Cho Trẻ Hiệu Quả Đi Đôi Với Niềm Vui Thích Bất Tận
Rèn Luyện Tính Kiên Nhẫn Cho Người Chơi',
                'created_at' => '2021-04-25 14:45:18',
                'updated_at' => '2021-04-27 16:01:04',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Daban 6619S Mô Hình Gundam MG Nu Ver Ka Titanium Finish',
                'slug' => 'daban-6619s-mo-hinh-gundam-mg-nu-ver-ka-titanium-finish1619539246',
                'id_category' => 3,
                'id_producer' => 3,
                'amount' => 21,
                'image' => 'imageProduct/20201229215019_800x800_1619417328.jpg',
                'image1' => 'imageProduct/20201229215100_800x800_1619361993.jpg',
                'image2' => 'imageProduct/20201229215052_800x800_1619417328.jpg',
                'price' => 9500000,
                'new' => 1,
                'description' => 'Tỷ Lệ : 1:100

Độ Tuổi : >14

Phân Loại Sp : Lắp Ráp

Sản Phẩm Nhựa Cao Cấp Với Độ Sắc Nét Cao
Sản Xuất Bởi Bandai Namco – Nhật Bản
An Toàn Với Trẻ Em
Phát Triển Trí Não Cho Trẻ Hiệu Quả Đi Đôi Với Niềm Vui Thích Bất Tận
Rèn Luyện Tính Kiên Nhẫn Cho Người Chơi',
                'created_at' => '2021-04-25 14:46:33',
                'updated_at' => '2021-04-27 16:00:46',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Gundam Bandai PG RX-78-2 2020',
                'slug' => 'gundam-bandai-pg-rx-78-2-20201619362558',
                'id_category' => 4,
                'id_producer' => 2,
                'amount' => 21,
                'image' => 'imageProduct/10729406b_1619362558.jpg',
                'image1' => 'imageProduct/10729406b2_1619362558.jpg',
                'image2' => 'imageProduct/rx78_1619362558.jpg',
                'price' => 6000000,
                'new' => 1,
                'description' => 'Sản phẩm PG mới nhất sẽ có các đặc điểm sau :
SP là thành quả kết tinh của các công nghệ sản xuất mô hình mới nhất của Bandai
Frame ( khung xương ) có kích thước chiều dài chân tới 18cm
Hơn 90 góc cử động ( số lượng cao nhất trong lịch sử thiết kế Gundam Bandai ), đi kèm khả năng khóa khớp.
Nhiều chi tiết có màu kim loại ( tổng cộng 4 mã màu kim loại )
Sử dụng nhiều chất màu trong sản phẩm : bạc, mờ, chrome bóng, metal part, 1 số chi tiết kim loại ốp lên frame.
Là mô hình có nhiều chi tiết open-hatch , gimmick nhất trong lịch sử Gundam.
Trang bị đèn LED có khả năng thay đổi màu, đèn led được thiết kế để vừa tăng độ thẩm mỹ nhưng vẫn đảm bảo biên độ cử động là tốt nhất.
Kèm đèn LED trong Beam saber ( kiếm năng lượng )',
                'created_at' => '2021-04-25 14:55:58',
                'updated_at' => '2021-04-25 14:55:58',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Bandai Mô Hình Gundam RG Unicorn Perfectibility The Gundam Base Limited',
                'slug' => 'bandai-mo-hinh-gundam-rg-unicorn-perfectibility-the-gundam-base-limited1619538688',
                'id_category' => 5,
                'id_producer' => 2,
                'amount' => 21,
                'image' => 'imageProduct/156_4029_s_n2bvwozdkh12k07orift4bt83yqz_1200x1200_1619362688.jpg',
                'image1' => 'imageProduct/n2519706001001_004_1619362688.jpg',
                'image2' => 'imageProduct/54ff9092f9618d00d858100a0907a199_1619362688.jpg',
                'price' => 2300000,
                'new' => 1,
                'description' => 'Tên Sản Phẩm : Tên Sản Phẩm : Bandai Mô Hình Gundam RG Unicorn Perfectibility The Gundam Base Limited 1/144 Đồ Chơi Lắp Ráp Anime Nhật

Thương Hiệu : Bandai – Nhật Bản

Phiên Bản : Rg

Tỷ Lệ : 1:144

Độ Tuổi : >14

Phân Loại Sp : Lắp Ráp

Sản Phẩm Nhựa Cao Cấp Với Độ Sắc Nét Cao
Sản Xuất Bởi Bandai Namco – Nhật Bản
An Toàn Với Trẻ Em
Phát Triển Trí Não Cho Trẻ Hiệu Quả Đi Đôi Với Niềm Vui Thích Bất Tận
Rèn Luyện Tính Kiên Nhẫn Cho Người Chơi',
                'created_at' => '2021-04-25 14:58:08',
                'updated_at' => '2021-04-27 15:51:28',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Bandai Mô Hình Gundam SD Hello Kitty MS-06S Char’s Zaku Ⅱ SDCS Cross Silhouette',
                'slug' => 'bandai-mo-hinh-gundam-sd-hello-kitty-ms-06s-chars-zaku-sdcs-cross-silhouette1619539236',
                'id_category' => 6,
                'id_producer' => 2,
                'amount' => 21,
                'image' => 'imageProduct/10721927a4_1619362919.jpg',
                'image1' => 'imageProduct/10721927a10_1619362919.jpg',
                'image2' => 'imageProduct/10721927p_1619362919.jpg',
                'price' => 5800000,
                'new' => 1,
                'description' => 'Sản Phẩm Nhựa Cao Cấp Với Độ Sắc Nét Cao
Sản Xuất Bởi Bandai Namco – Nhật Bản
An Toàn Với Trẻ Em
Phát Triển Trí Não Cho Trẻ Hiệu Quả Đi Đôi Với Niềm Vui Thích Bất Tận
Rèn Luyện Tính Kiên Nhẫn Cho Người Chơi',
                'created_at' => '2021-04-25 15:01:59',
                'updated_at' => '2021-04-27 16:00:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}