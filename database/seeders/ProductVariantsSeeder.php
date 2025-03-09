<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variants')->insert([
            ['id' => 1, 'product_id' => 1, 'name' => 'Blue', 'price' => 419.00, 'stock_quantity' => 42, 'created_at' => now(), 'image' => 'products/01JNVB7PPVGQPYSP2RH56MFDNR.png'],
            ['id' => 2, 'product_id' => 1, 'name' => 'Pink', 'price' => 419.00, 'stock_quantity' => 68, 'created_at' => now(), 'image' => 'products/01JNVB7PPZKA197G35J3YEJYV7.png'],
            ['id' => 3, 'product_id' => 2, 'name' => 'Lemon Yellow', 'price' => 1199.00, 'stock_quantity' => 129, 'created_at' => now(), 'image' => 'products/01JNVBPY4YWNF382K3K8426947.png'],
            ['id' => 4, 'product_id' => 2, 'name' => 'Lilac', 'price' => 1199.00, 'stock_quantity' => 130, 'created_at' => now(), 'image' => 'products/01JNVBPY4V5BRHDNR61K3PXCN0.png'],
            ['id' => 5, 'product_id' => 3, 'name' => 'Creamsicle', 'price' => 1499.00, 'stock_quantity' => 219, 'created_at' => now(), 'image' => 'products/01JNVC9D32AZHQ4J3V47STVK2W.png'],
            ['id' => 6, 'product_id' => 3, 'name' => 'Seafoam', 'price' => 1499.00, 'stock_quantity' => 138, 'created_at' => now(), 'image' => 'products/01JNVC9D350BVG5VR0YB5F24DM.png'],
            ['id' => 7, 'product_id' => 4, 'name' => 'Pink', 'price' => 849.00, 'stock_quantity' => 100, 'created_at' => now(), 'image' => 'products/01JNVD4FFEJVT702FNYG24J3B2.png'],
            ['id' => 8, 'product_id' => 4, 'name' => 'Dark Blue', 'price' => 849.00, 'stock_quantity' => 128, 'created_at' => now(), 'image' => 'products/01JNVD4FFK2S16HYXN4GVKP8T2.png'],
            ['id' => 9, 'product_id' => 4, 'name' => 'Navy Blue', 'price' => 849.00, 'stock_quantity' => 120, 'created_at' => now(), 'image' => 'products/01JNVD4FFSQB99WJY070DBVN7Y.png'],
            ['id' => 10, 'product_id' => 4, 'name' => 'Green', 'price' => 849.00, 'stock_quantity' => 238, 'created_at' => now(), 'image' => 'products/01JNVD4FFXSBNWQNA5J418JX99.png'],
            ['id' => 11, 'product_id' => 4, 'name' => 'Orange', 'price' => 849.00, 'stock_quantity' => 310, 'created_at' => now(), 'image' => 'products/01JNVD4FG2TB4KKGX3HGR16WW8.png'],
            ['id' => 12, 'product_id' => 5, 'name' => 'Pink', 'price' => 1599.00, 'stock_quantity' => 219, 'created_at' => now(), 'image' => 'products/01JNVDD1EJQYSEQ4X061VXKJ0X.png'],
            ['id' => 13, 'product_id' => 5, 'name' => 'Light Blue', 'price' => 1599.00, 'stock_quantity' => 244, 'created_at' => now(), 'image' => 'products/01JNVDD1EQVXY075BWYQMJZTYR.png'],
            ['id' => 14, 'product_id' => 7, 'name' => 'Small', 'price' => 2499.00, 'stock_quantity' => 219, 'created_at' => now(), 'image' => 'products/01JNVE4K0GX4JDKT3AQE63C81B.png'],
            ['id' => 15, 'product_id' => 7, 'name' => 'Medium', 'price' => 3499.00, 'stock_quantity' => 328, 'created_at' => now(), 'image' => 'products/01JNVE4K0M7D1P0TCRPXS4DT4K.png'],
            ['id' => 16, 'product_id' => 9, 'name' => 'Blue', 'price' => 169.00, 'stock_quantity' => 532, 'created_at' => now(), 'image' => 'products/01JNVEZ0ZFGRHF56XW99HWZJFG.png'],
            ['id' => 17, 'product_id' => 9, 'name' => 'Pink', 'price' => 169.00, 'stock_quantity' => 429, 'created_at' => now(), 'image' => 'products/01JNVEZ0ZMRV3TX3QVYZQZNX4C.png'],
            ['id' => 18, 'product_id' => 12, 'name' => 'Pink', 'price' => 169.00, 'stock_quantity' => 254, 'created_at' => now(), 'image' => 'products/variants/01JNVG9V6KEKSS3A9N3VX3TTZF.png'],
            ['id' => 19, 'product_id' => 12, 'name' => 'Blue', 'price' => 169.00, 'stock_quantity' => 342, 'created_at' => now(), 'image' => 'products/variants/01JNVG9V6Q2YJGJJMC2T4VRWFC.png'],
            ['id' => 20, 'product_id' => 14, 'name' => 'Blue', 'price' => 159.00, 'stock_quantity' => 282, 'created_at' => now(), 'image' => 'products/variants/01JNVH0SSH0XCSB3K61H8D1XZT.png'],
            ['id' => 21, 'product_id' => 14, 'name' => 'Pink', 'price' => 159.00, 'stock_quantity' => 248, 'created_at' => now(), 'image' => 'products/variants/01JNVH0SSPH8S0SRM9JP6K3HKB.png'],
            ['id' => 22, 'product_id' => 17, 'name' => 'Blue', 'price' => 79.75, 'stock_quantity' => 274, 'created_at' => now(), 'image' => 'products/variants/01JNVHPWDSD8E1EF0Y3YKQW09X.png'],
            ['id' => 23, 'product_id' => 17, 'name' => 'Pink', 'price' => 79.75, 'stock_quantity' => 246, 'created_at' => now(), 'image' => 'products/variants/01JNVHPWDXHS04QKEKHY1GMKSG.png'],
            ['id' => 24, 'product_id' => 17, 'name' => 'Orange', 'price' => 79.75, 'stock_quantity' => 342, 'created_at' => now(), 'image' => 'products/variants/01JNVHPWE2WWZ4BH8YR200ZF94.png'],
            ['id' => 25, 'product_id' => 18, 'name' => 'Pink', 'price' => 169.00, 'stock_quantity' => 452, 'created_at' => now(), 'image' => 'products/variants/01JNVHZHD14BMAWAGWD05ACTRR.png'],
            ['id' => 26, 'product_id' => 18, 'name' => 'Blue', 'price' => 169.00, 'stock_quantity' => 453, 'created_at' => now(), 'image' => 'products/variants/01JNVHZHD59AE3ZMCQ3FRSBYKG.png'],
            ['id' => 27, 'product_id' => 23, 'name' => 'Pink', 'price' => 199.00, 'stock_quantity' => 348, 'created_at' => now(), 'image' => 'products/variants/01JNVJPZYMK8KQGKD4H6Z0XBJM.png'],
            ['id' => 28, 'product_id' => 23, 'name' => 'Blue', 'price' => 199.00, 'stock_quantity' => 483, 'created_at' => now(), 'image' => 'products/variants/01JNVJPZYRGGCDC1XNVS043EEH.png'],
            ['id' => 29, 'product_id' => 37, 'name' => 'Beef Flavor', 'price' => 209.00, 'stock_quantity' => 298, 'created_at' => now(), 'image' => 'products/variants/01JNW8SMBBKSAMNC5KX4KSJHB0.png'],
            ['id' => 30, 'product_id' => 37, 'name' => 'Chicken Flavor', 'price' => 209.00, 'stock_quantity' => 317, 'created_at' => now(), 'image' => 'products/variants/01JNW8SMBHQTF9M0TTFAA6GY59.png'],
            ['id' => 31, 'product_id' => 37, 'name' => 'Milk Flavor', 'price' => 209.00, 'stock_quantity' => 437, 'created_at' => now(), 'image' => 'products/variants/01JNW8SMBP3FYQGYAMDVX9XGSS.png'],
            ['id' => 32, 'product_id' => 40, 'name' => 'Beef Flavor', 'price' => 109.00, 'stock_quantity' => 392, 'created_at' => now(), 'image' => 'products/variants/01JNWH6XGZJDTSX20M1H4YRX7V.png'],
            ['id' => 33, 'product_id' => 40, 'name' => 'Chicken Flavor', 'price' => 109.00, 'stock_quantity' => 138, 'created_at' => now(), 'image' => 'products/variants/01JNWH6XH5NDN66BT80YT9B80B.png'],
            ['id' => 34, 'product_id' => 108, 'name' => 'Pink', 'price' => 549.00, 'stock_quantity' => 199, 'created_at' => now(), 'image' => 'products/variants/01JNX474S36SGEXGEKGH7R1J0A.png'],
            ['id' => 35, 'product_id' => 108, 'name' => 'Powder', 'price' => 549.00, 'stock_quantity' => 101, 'created_at' => now(), 'image' => 'products/variants/01JNX474S9CY2A48Y4KR3YKYER.png'],
            ['id' => 36, 'product_id' => 108, 'name' => 'Lilac', 'price' => 549.00, 'stock_quantity' => 99, 'created_at' => now(), 'image' => 'products/variants/01JNX474SDB6H51JCRQE230R2A.png'],
            ['id' => 37, 'product_id' => 108, 'name' => 'Black', 'price' => 549.00, 'stock_quantity' => 87, 'created_at' => now(), 'image' => 'products/variants/01JNX474SJG4T73PWPP39Y6PZ8.png'],
            ['id' => 38, 'product_id' => 108, 'name' => 'Gray', 'price' => 549.00, 'stock_quantity' => 88, 'created_at' => now(), 'image' => 'products/variants/01JNX474SQQ2J4W612CS7RD6ZM.png'],
            ['id' => 39, 'product_id' => 108, 'name' => 'Orange', 'price' => 549.00, 'stock_quantity' => 129, 'created_at' => now(), 'image' => 'products/variants/01JNX474SXKD55PN35MMKGXHV5.png'],
            ['id' => 40, 'product_id' => 114, 'name' => 'Salmon and Liver', 'price' => 885.00, 'stock_quantity' => 43, 'created_at' => now(), 'image' => 'products/variants/01JNX6PFJ3Y933VWVP4QSS2KVT.png'],
            ['id' => 41, 'product_id' => 114, 'name' => 'Liver', 'price' => 885.00, 'stock_quantity' => 22, 'created_at' => now(), 'image' => 'products/variants/01JNX6PFJ78G7R3TBXFDQ4WMFY.png'],
            ['id' => 42, 'product_id' => 114, 'name' => 'Beef and Liver', 'price' => 885.00, 'stock_quantity' => 39, 'created_at' => now(), 'image' => 'products/variants/01JNX6PFJB1V3W3006XA5T8CFT.png'],
            ['id' => 43, 'product_id' => 114, 'name' => 'Chicken and Liver', 'price' => 885.00, 'stock_quantity' => 29, 'created_at' => now(), 'image' => 'products/variants/01JNX6PFJG90MZ57XY2V9F8X0J.png'],
        ]);
    }
}

