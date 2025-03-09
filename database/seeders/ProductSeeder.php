<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'product_name' => 'Doggo Quad 2-in-1 Bowl',
                'slug' => 'doggo-quad-2-in-1-bowl',
                'images' => '["products\\/01JNVC0CH008FPCS7B3Y6GM9ZA.png"]',
                'description' => '
                - Made of thick plastic material.
                - Detachable food bowl.
                - Length: 10.6 inches, Width: 4.9 inches, Height: 2.3 inches.
                - Food Bowl Diameter: 4.5 inches x 4.5 inches x 1.5 inches.
                - Paw-fectly made!
                ',
                'price' => 419.00,
                'in_stock' => 1,
                'stock_quantity' => 110,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'product_name' => 'Porta Water Bottle with Detachable Pet Bowl Pet Feeder 16oz',
                'slug' => 'porta-water-bottle-with-detachable-pet-bowl-pet-feeder-16oz',
                'images' => '["products\\/01JNVBWQA4P14AS2XX5Z14DRHK.png"]',
                'description' => '
                - 2-in-1 insulated water bottle with detachable bowls.
                - Holds both cold and hot water (16oz stainless steel body).
                - Ergonomic handle for easy carrying.
                - Safety lock for a hands-free experience.
                - Wide mouth for easy cleaning and adding ice cubes.
                - Detachable pet bowl for convenience.
                ',
                'price' => 1199.00,
                'in_stock' => 1,
                'stock_quantity' => 259,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'product_name' => 'Porta Water Bottle with Detachable Pet Bowls Pet Feeder 32oz',
                'slug' => 'porta-water-bottle-with-detachable-pet-bowls-pet-feeder-32oz',
                'images' => '["products\\/01JNVC9D2XE4QG32FBKJFM296N.png"]',
                'description' => "  
                - The first 3-in-1 insulated, stainless-steel water bottle with detachable pet bowls.  
                - Holds both cold and hot water (32oz stainless steel body).  
                - Includes 2 detachable bowls for pet food and water.  
                - Wide-mouth design for easy cleaning.  
                - Ergonomic handle for convenient carrying.  
                - Security lock to clip the bottle to your bag.  
                ",
                'price' => 1499.00,
                'in_stock' => 1,
                'stock_quantity' => 357,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'product_name' => 'Kennel Pro Pet Carrier Small KN207 50x34x32cm',
                'slug' => 'kennel-pro-pet-carrier-small-kn207-50x34x32cm',
                'images' => '["products\\/01JNVD4FF9HQ0NZ4P9YFEGF2P4.png"]',
                'description' => "  
                - Secure and comfortable travel carrier for pets.  
                - Perfect for home or travel use.  
                - Durable construction with reinforced sidewalls.  
                - Easy to clean plastic design.  
                - Assembles in minutes—no tools required.  
                - Flow-through ventilation and safety door locks.  
                ",
                'price' => 849.00,
                'in_stock' => 1,
                'stock_quantity' => 896,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'product_name' => 'Kennel Pro Pet Carrier Medium KN307 61x40x39cm',
                'slug' => 'kennel-pro-pet-carrier-medium-kn307-61x40x39cm',
                'images' => '["products\\/01JNVDD1ECE3QHEDB1XZ3ZK1ZT.png"]',
                'description' => "  
                - Secure and comfortable travel carrier for pets.  
                - Perfect for home or travel use.  
                - Durable construction with reinforced sidewalls.  
                - Easy to clean plastic design.  
                - Assembles in minutes—no tools required.  
                - Flow-through ventilation and safety door locks.  
                ",
                'price' => 1599.00,
                'in_stock' => 1,
                'stock_quantity' => 463,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'product_name' => 'Kennel Pro Pet Carrier Large KN301 68x51x47cm',
                'slug' => 'kennel-pro-pet-carrier-large-kn301-68x51x47cm',
                'images' => '["products\\/01JNVDH7G1R9GGGNT7GHSHE9KZ.png"]',
                'description' => "  
                - Secure and comfortable travel carrier for pets.  
                - Perfect for home or travel use.  
                - Durable construction with reinforced sidewalls.  
                - Easy to clean plastic design.  
                - Assembles in minutes—no tools required.  
                - Flow-through ventilation and safety door locks.  
                ",
                'price' => 2499.00,
                'in_stock' => 1,
                'stock_quantity' => 490,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'product_name' => 'M-Pets Pluf Swimming Pool',
                'slug' => 'm-pets-pluf-swimming-pool-medium',
                'images' => '["products\\/01JNVE4K0B16Z6J79V38G707V9.png"]',
                'description' => "  
                - Color Available: Blue.  
                - Perfect for fun and bath time.  
                - Easy to fold, set up, and drain.  
                - Portable and UV-resistant.  
                ",
                'price' => 2499.00,
                'in_stock' => 1,
                'stock_quantity' => 547,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 8,
                'product_name' => 'M-Pets Pluf Swimming Pool (Large)',
                'slug' => 'm-pets-pluf-swimming-pool-large',
                'images' => '["products\\/01JNVE4K0B16Z6J79V38G707V9.png"]',
                'description' => "  
                - Color Available: Blue.  
                - Perfect for fun and bath time.  
                - Easy to fold, set up, and drain.  
                - Portable and UV-resistant.  
                ",
                'price' => 2999.00,
                'in_stock' => 1,
                'stock_quantity' => 320,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 9,
                'product_name' => 'Doggo Doggie Dog Toy',
                'slug' => 'doggo-doggie-dog-toy',
                'images' => '["products\\/01JNVEZ0Z8XJYAFEYD35FD8HK4.png"]',
                'description' => "  
                - Made with thick rubber material.  
                - Available in Blue and Pink colors.  
                - Dimensions: 4 inches (L) x 2 inches (W) x 1 inch (H).  
                - Durable and safe for pets.  
                ",
                'price' => 169.00,
                'in_stock' => 1,
                'stock_quantity' => 961,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 10,
                'product_name' => 'Approved Plush Dog Toy White',
                'slug' => 'approved-plush-dog-toy-white',
                'images' => '["products\\/01JNVF50Q6234MHTR9TC7GMDG4.png"]',
                'description' => "
                - Colors Available: White  
                - Material: PP Cotton, SQUEAKY TOYS  
                - Washable material keeps it safe & clean  
                - Made with washable polyester material  
                - Not designed for aggressive chewers  
                - Encourages playfulness and bonding between you and your pet  
                ",
                'price' => 269.75,
                'in_stock' => 1,
                'stock_quantity' => 638,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 11,
                'product_name' => 'Doggo Tough Twister Dog Toy',
                'slug' => 'doggo-tough-twister-dog-toy',
                'images' => '["products\\/01JNVFVVXG4T2VTBKFYYBQJ6EZ.png"]',
                'description' => "
                - Doggo Tough Twister  
                - Bouncing Dog Toy  
                - Made of ultra-tough and non-toxic rubber  
                - Good for big doggos  
                - Size: 7.8 inches  
                - Paw-fectly made!  
                ",
                'price' => 479.00,
                'in_stock' => 1,
                'stock_quantity' => 257,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 12,
                'product_name' => 'Doggo Wrecking Ball Dog Toy',
                'slug' => 'doggo-wrecking-ball-dog-toy',
                'images' => '["products\\/01JNVG9V6DNDZHHN7VGV82NW2K.png"]',
                'description' => "
                - Doggo Small Wrecking Ball  
                - Rubber Toy  
                - Good for small-sized dogs  
                - Comes in colors Pink and Blue  
                - Small: Length 11 inches, Width 2 inches, Height 2 inches  
                - Paw-fectly made!  
                ",
                'price' => 169.00,
                'in_stock' => 1,
                'stock_quantity' => 596,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 13,
                'product_name' => 'Doggo Tough Tire Dog Toy',
                'slug' => 'doggo-tough-tire-dog-toy',
                'images' => '["products\\/01JNVGT5QRSPEN5V5SZ1SBP3BK.png"]',
                'description' => "
                - Doggo Tough Tire Dog Toy  
                - Made of thick and non-toxic rubber  
                - Large: Length 7 inches, Width 7 inches, Height 1.75 inches  
                - Paw-fectly made!  
                ",
                'price' => 919.00,
                'in_stock' => 1,
                'stock_quantity' => 356,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 14,
                'product_name' => 'Doggo Ropey Slipper Dog Toy',
                'slug' => 'doggo-ropey-slipper-dog-toy',
                'images' => '["products\\/01JNVH0SSC1JHCD35SB1B29EC0.png"]',
                'description' => "
                - Doggo Ropey Slipper Dog Toy  
                - Made with thick fiber  
                - Good for small-sized dogs  
                - Comes in colors Blue and Pink  
                - Length: 5.5 inches, Width: 2.5 inches, Height: 2 inches  
                - Paw-fectly made!  
                ",
                'price' => 159.00,
                'in_stock' => 1,
                'stock_quantity' => 530,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 15,
                'product_name' => 'Doggo Tough Grenade Dog Toy 6.1in',
                'slug' => 'doggo-tough-grenade-dog-toy-61in',
                'images' => '["products\\/01JNVH7VE9YNN1KQGKEKG5MBR5.png"]',
                'description' => "
                - Doggo Tough Grenade  
                - Bouncing Dog Toy  
                - Made of ultra-tough and non-toxic rubber  
                - Good for big doggos  
                - Size: 6.1 inches  
                - Paw-fectly made!  
                ",
                'price' => 429.00,
                'in_stock' => 1,
                'stock_quantity' => 245,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 16,
                'product_name' => 'Doggo Tough Floater Dog Toy',
                'slug' => 'doggo-tough-floater-dog-toy',
                'images' => '["products\\/01JNVHDDNFS621P4AE6X35DWE3.png"]',
                'description' => "
                - Bouncing Toy  
                - Ultra Tough Rubber - Non-Toxic  
                - Good for big doggos  
                - Paw-fectly made!  
                ",
                'price' => 479.00,
                'in_stock' => 1,
                'stock_quantity' => 134,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 17,
                'product_name' => 'Approved Rope Slipper Dog Toy',
                'slug' => 'approved-rope-slipper-dog-toy',
                'images' => '["products\\/01JNVHPWDM6HBVQN376D5EV8RF.png"]',
                'description' => "
                - Colors Available: Blue, Pink, Orange  
                - Material: Durable Cotton Rope  
                - Encourages playfulness and bonding between you and your pet  
                - Great for teething, chewing, tossing, fetching, and stress relief  
                - Helps redirect bad biting behavior and improve dental health  
                - Not for aggressive chewers  
                ",
                'price' => 79.75,
                'in_stock' => 1,
                'stock_quantity' => 862,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 18,
                'product_name' => 'Doggo Double Ball Dog Toy',
                'slug' => 'doggo-double-ball-dog-toy',
                'images' => '["products\\/01JNVHZHCWZNEA1GQ08QB1SP72.png"]',
                'description' => "
                - Doggo Double Ball Dog Toy  
                - Rubber toy  
                - Good for small and big dogs  
                - Comes in colors Blue and Pink  
                - Length: 6.5 inches, Width: 2 inches, Height: 2 inches  
                - Paw-fectly made!  
                ",
                'price' => 169.00,
                'in_stock' => 1,
                'stock_quantity' => 905,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 19,
                'product_name' => 'Doggo Tough Mallows Dog Toy',
                'slug' => 'doggo-tough-mallows-dog-toy',
                'images' => '["products\\/01JNVJ50AD33QCQZ2KYQW1V51W.png"]',
                'description' => "
                - Doggo Tough Mallows  
                - Bouncing Dog Toy  
                - Made of ultra-tough and non-toxic rubber  
                - Good for big doggos  
                - Size: 4 inches  
                - Paw-fectly made!  
                ",
                'price' => 419.00,
                'in_stock' => 1,
                'stock_quantity' => 234,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 20,
                'product_name' => 'Doggo Tough Barbell Dog Toy',
                'slug' => 'doggo-tough-barbell-dog-toy',
                'images' => '["products\\/01JNVJFGGVCA6J8WAQD1H171KZ.png"]',
                'description' => "
                - Doggo Tough Barbell  
                - Bouncing Dog Toy  
                - Made of ultra-tough and non-toxic rubber  
                - Good for big doggos  
                - Size: 7.8 inches  
                - Paw-fectly made!  
                ",
                'price' => 469.00,
                'in_stock' => 1,
                'stock_quantity' => 644,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 21,
                'product_name' => 'Doggo Tough Football Dog Toy',
                'slug' => 'doggo-tough-football-dog-toy',
                'images' => '["products\\/01JNVJJ0X1Q0G4E5WK5R3DDK40.png"]',
                'description' => "
                - Doggo Tough Football  
                - Bouncing Dog Toy  
                - Made of ultra-tough and non-toxic rubber  
                - Good for big doggos  
                - Size: 7 inches  
                - Paw-fectly made!  
                ",
                'price' => 419.00,
                'in_stock' => 1,
                'stock_quantity' => 357,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 22,
                'product_name' => 'Doggo Tough Spinner Dog Toy',
                'slug' => 'doggo-tough-spinner-dog-toy',
                'images' => '["products\\/01JNVJKXGABPG89V33XEF00J0R.png"]',
                'description' => "
                - Doggo Tough Spinner  
                - Bouncing Dog Toy  
                - Made of ultra-tough and non-toxic rubber  
                - Good for big doggos  
                - Size: 5.6 inches  
                - Paw-fectly made!  
                ",
                'price' => 419.00,
                'in_stock' => 1,
                'stock_quantity' => 435,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 23,
                'product_name' => 'Doggo Spiky Hoop Dog Toy',
                'slug' => 'doggo-spiky-hoop-dog-toy',
                'images' => '["products\\/01JNVJPZYEXDHCX7ET4G1HYW9X.png"]',
                'description' => "
                - Doggo Spiky Hoop Dog Toy  
                - Made with thick rubber material  
                - Comes in colors Blue and Pink  
                - Length: 3 inches, Width: 3 inches, Height: 1 inch  
                - Paw-fectly made!  
                ",
                'price' => 199.00,
                'in_stock' => 1,
                'stock_quantity' => 831,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 24,
                'product_name' => 'Kit Cat Kitty Crunch Chicken Cat Treats',
                'slug' => 'kit-cat-kitty-crunch-chicken-cat-treats',
                'images' => '["products\\/01JNW5EJXAREHKWEBYXG13Y2KA.png"]',
                'description' => "
                - Kit Cat Kitty Crunch Chicken Cat Treats  
                - Created by nutritionists who are cat lovers  
                - Made with carefully selected ingredients  
                - Rich in Omega 3 and Omega 6  
                - Taurine Added  
                - No Pork, No Lard  
                - Hairball Control  
                - Feed 47g per 2kg of body weight per day  
                - Store in a cool, dry place; refrigerate unused portion for up to 2 days  
                - For cats over 2 months old, mix with other nutritional food  
                ",
                'price' => 89.00,
                'in_stock' => 1,
                'stock_quantity' => 47,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 25,
                'product_name' => 'Kit Cat Kitty Crunch Tuna Cat Treats',
                'slug' => 'kit-cat-kitty-crunch-tuna-cat-treats',
                'images' => '["products\\/01JNW5H8ZETZW8N2KYZ5H5KZT8.png"]',
                'description' => "
                - Rich in Omega 3 and Omega 6  
                - Taurine Added  
                - No Pork, No Lard  
                - Hairball Control  
                - Feed 47g per 2kg of body weight per day  
                ",
                'price' => 89.00,
                'in_stock' => 1,
                'stock_quantity' => 327,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 26,
                'product_name' => 'Kit Cat Cranberry Crisps Lamb Cat Treats 20g',
                'slug' => 'kit-cat-kitty-crunch-tuna-cat-treats-20g',
                'images' => '["products\\/01JNW5RBZ9BHWFTWVVN9PF3CRJ.png"]',
                'description' => "
                - Reduces risk of urinary issues  
                - Helps reduce plaque and tartar  
                - Infused with cranberry extract  
                - Crunchier texture for effective cleaning  
                - Scientifically designed unique shape  
                - Suitable for all life stages  
                ",
                'price' => 35.00,
                'in_stock' => 1,
                'stock_quantity' => 659,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 27,
                'product_name' => 'Kit Cat Purr Puree Tuna and Smoked Fish Cat Treats 60g',
                'slug' => 'kit-cat-purr-puree-tuna-and-smoked-fish-cat-treats-60g',
                'images' => '["products\\/01JNW6S5SFXK49YE6B83K0MXND.png"]',
                'description' => "
                - Kit Cat Purr Puree cat treats (4x15g)  
                - Created with carefully selected natural ingredients  
                - Smooth blend of chicken or tuna  
                - No added colors or preservatives  
                - Grain-free, delicious, and natural  
                - Enriched with Omega 3 and 6, Taurine, Prebiotic, and Vitamin E  
                - No Pork, No Lard  
                ",
                'price' => 129.00,
                'in_stock' => 1,
                'stock_quantity' => 358,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 28,
                'product_name' => 'Dentalight Caviar+ Creamy Chicken Cat Treats 50g',
                'slug' => 'dentalight-caviar-creamy-chicken-cat-treats-50g',
                'images' => '["products\\/01JNW71WYTHZ5FVK48E9JCA0TS.png"]',
                'description' => "
                - Made with real farm-raised chicken and deep-sea caviar  
                - Unique lickable creamy treats  
                - No pork, No lard, Grain-free  
                - Enriched with fish oil, taurine, and prebiotics  
                - Can be hand-fed or used as a bowl topper  
                - Suitable for cats 6 months and up  
                - Feed 1-3 treats per day  
                - Always provide fresh water  
                - Store in a cool, dry place (Shelf life: 36 months)  
                ",
                'price' => 89.00,
                'in_stock' => 1,
                'stock_quantity' => 9534,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 29,
                'product_name' => 'Brit Care Digestion Cat Treats 50g',
                'slug' => 'brit-care-digestion-cat-treats-50g',
                'images' => '["products\\/01JNW79RZ81ND2K3M1VAH5PPY1.png", "products\\/01JNW7AWRH83EPYDH813DMCHCZ.png"]',
                'description' => "
                - Semi-moist functional snack  
                - Enriched with fennel and kelp for digestion support  
                - Complementary cat food  
                ",
                'price' => 119.00,
                'in_stock' => 1,
                'stock_quantity' => 803,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 30,
                'product_name' => 'Brit Care Shiny Hair Cat Treats 50g',
                'slug' => 'brit-care-shiny-hair-cat-treats-50g',
                'images' => '["products\\/01JNW7H03GD6RXXK49KVFHBTPK.png"]',
                'description' => "
                - Functional grain-free snack for silky coat and healthy skin  
                - Contains Marigold, Salmon Oil, and Sea Buckthorn  
                - Complementary semi-moist cat food  
                ",
                'price' => 119.00,
                'in_stock' => 1,
                'stock_quantity' => 842,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 31,
                'product_name' => 'Kit Cat Purr Puree Chicken and Smoked Fish Cat Treats 60g',
                'slug' => 'kit-cat-purr-puree-chicken-and-smoke-fish-cat-treats-60g',
                'images' => '["products\\/01JNW7RE8Y68GY51VS9PSVD0WW.png"]',
                'description' => "
                - Kit Cat Purr Puree Chicken and Smoked Fish  
                - Created with carefully selected natural ingredients  
                - Smooth blend of chicken or tuna  
                - No added colors or preservatives  
                - Grain-free, delicious, and natural  
                - Enriched with Omega 3 and 6, Taurine, Prebiotic, and Vitamin E  
                - No Pork, No Lard  
                ",
                'price' => 129.00,
                'in_stock' => 1,
                'stock_quantity' => 490,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 32,
                'product_name' => 'Dentalight Caviar+ Creamy Duck Cat Treats',
                'slug' => 'dentalight-caviar-creamy-duck-cat-treats',
                'images' => '["products\\/01JNW7XM0DCM7SPZ4CAC1NWMCT.png"]',
                'description' => "
                - Made with duck and deep-sea caviar  
                - Unique lickable creamy treats  
                - No pork, No lard, Grain-free  
                - Enriched with fish oil, taurine, and prebiotics  
                - Can be hand-fed or used as a bowl topper  
                - Suitable for cats 6 months and up  
                - Feed 1-3 treats per day  
                - Always provide fresh water  
                - Store in a cool, dry place (Shelf life: 36 months)  
                ",
                'price' => 89.00,
                'in_stock' => 1,
                'stock_quantity' => 924,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 33,
                'product_name' => 'Dentalight Catnip+ Delicious Crab Cat Treats 50g',
                'slug' => 'dentalight-catnip-delicious-crab-cat-treats-50g',
                'images' => '["products\\/01JNW81ADH0KGCMHH0PNX67T9T.png"]',
                'description' => "
                - Made with real white meat tuna and crab  
                - Soft chewy texture  
                - No pork, lard, and grain-free  
                - Contains Taurine and prebiotics for immunity and digestion  
                - Added catnip to enhance taste  
                - Small bite-size snacks, perfect for training  
                - Suitable for cats 6 months and up  
                - Always provide fresh water  
                - Store in a cool, dry place (Shelf life: 36 months)  
                ",
                'price' => 119.00,
                'in_stock' => 1,
                'stock_quantity' => 429,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 34,
                'product_name' => 'Dentalight Catnip+ Delicious Shrimp Cat Treats',
                'slug' => 'dentalight-catnip-delicious-shrimp-cat-treats',
                'images' => '["products\\/01JNW84PG7N1ET193FMEF1W315.png"]',
                'description' => "
                - Made with real white meat tuna and shrimp  
                - Soft chewy texture  
                - No pork, lard, and grain-free  
                - Contains Taurine and prebiotics for immunity and digestion  
                - Added catnip to enhance taste  
                - Small bite-size snacks, perfect for training  
                - Suitable for cats 6 months and up  
                - Always provide fresh water  
                - Store in a cool, dry place (Shelf life: 36 months)  
                ",
                'price' => 119.00,
                'in_stock' => 1,
                'stock_quantity' => 583,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 35,
                'product_name' => 'Brit Care Dental Cat Treats 50g',
                'slug' => 'brit-care-dental-cat-treats-50g',
                'images' => '["products\\/01JNW8840G329XBAY56T9M0FRS.png"]',
                'description' => "
                - Functional snack for healthy teeth and gums  
                - Grain-free  
                - Contains Basil, Thyme, Rosemary, and Vitamin C  
                - Complementary semi-moist cat food  
                ",
                'price' => 119.00,
                'in_stock' => 1,
                'stock_quantity' => 523,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 36,
                'product_name' => 'Lucky Dog Training Treats Beef and Cheese (Cube Marble) Dog Treats 110g',
                'slug' => 'lucky-dog-training-treats-beef-and-cheese-cube-marble-dog-treats-110g',
                'images' => '["products\\/01JNW8ENPZJAWWW9TR5X19TXXA.png"]',
                'description' => "
                - Flavor: Beef & Cheese  
                - High-quality soft chews for dogs of all ages  
                - All-natural, flavorful, chewy treats  
                - Bite-sized: Perfect for training rewards  
                - Your pup will love it!  
                ",
                'price' => 129.00,
                'in_stock' => 1,
                'stock_quantity' => 540,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 37,
                'product_name' => 'Doggo Brushie Dog Treats',
                'slug' => 'doggo-brushie-dog-treats',
                'images' => '["products\\/01JNW8SMB4SZTV6M05Q06QD79A.png"]',
                'description' => "
                - Suitable for puppies  
                - Comes in Beef, Chicken, and Milk flavors  
                - Rich in Protein and Vitamin B for a healthier and shinier coat  
                - Low fat, high protein  
                - Premium quality  
                - Easy digestion  
                - Paw-fectly made!  
                ",
                'price' => 209.00,
                'in_stock' => 1,
                'stock_quantity' => 1052,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 38,
                'product_name' => 'Lucky Dog Training Treats Beef and Cheese 110g',
                'slug' => 'lucky-dog-training-treats-beef-and-cheese-110g',
                'images' => '["products\\/01JNWCXSVAMAPQWBP3RJP13VB8.png"]',
                'description' => "
                - Flavor: Beef & Cheese  
                - High-quality soft chews for dogs of all ages  
                - All-natural, flavorful, chewy treats  
                - Bite-sized: Perfect for training rewards  
                - Your pup will love it!  
                ",
                'price' => 129.00,
                'in_stock' => 1,
                'stock_quantity' => 327,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 39,
                'product_name' => 'Lucky Dog Training Treats Beef and Cheese (Rectangular) Dog Treats 110g',
                'slug' => 'lucky-dog-training-treats-beef-and-cheese-rectangular-dog-treats-110g',
                'images' => '["products\\/01JNWD0VCBQQ1620KG31ZAAQVN.png"]',
                'description' => "
                - Flavor: Beef & Cheese  
                - High-quality soft chews for dogs of all ages  
                - All-natural, flavorful, chewy treats  
                - Bite-sized: Perfect for training rewards  
                - Your pup will love it!  
                ",
                'price' => 129.00,
                'in_stock' => 1,
                'stock_quantity' => 347,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 40,
                'product_name' => 'Doggo Huge Bone Dog Treats',
                'slug' => 'doggo-huge-bone-dog-treats',
                'images' => '["products\\/01JNWH6XGQ5DASZTZCR2RKX4Q7.png"]',
                'description' => "
                - Suitable for adult dogs  
                - Comes in Beef and Chicken flavors  
                - Rich in Protein and Vitamin B for a healthier and shinier coat  
                - Low fat, high protein  
                - Premium quality  
                - Easy digestion  
                - Paw-fectly made!  
                ",
                'price' => 109.00,
                'in_stock' => 1,
                'stock_quantity' => 530,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 41,
                'product_name' => 'JerHigh Strawberry Stick Dog Treats 70g',
                'slug' => 'jerhigh-strawberry-stick-dog-treats-70g',
                'images' => '["products\\/01JNWHAY8HEQQ6GWJNYYRBHPFG.png"]',
                'description' => "
                - Premium dog snack filled with nutrients and vitamins  
                - Tempting strawberry flavor dogs love  
                - Stick form, great for all dog breeds  
                - Made from real chicken meat  
                - Researched and tested for hygiene and safety  
                - Provides essential nutrients for a healthy and happy pup  
                ",
                'price' => 100.00,
                'in_stock' => 1,
                'stock_quantity' => 530,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 42,
                'product_name' => 'JerHigh Meat Stick Dog Treats 70g',
                'slug' => 'jerhigh-meat-stick-dog-treats-70g',
                'images' => '["products\\/01JNWHF4678N38XY1NH4DHZ6Q9.png"]',
                'description' => "
                - Premium snack filled with nutrients and vitamins  
                - Tempting Meat Stick flavor dogs can’t resist  
                - Stick form, great for all dog breeds  
                - Made from real chicken meat  
                - Researched and tested for hygiene and safety  
                - Provides essential nutrients for a healthy and happy pup  
                ",
                'price' => 100.00,
                'in_stock' => 1,
                'stock_quantity' => 284,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 43,
                'product_name' => 'Antlerz Chew Dog Treats Small Green',
                'slug' => 'antlerz-chew-dog-treats-small-green',
                'images' => '["products\\/01JNWHHRYTZE8YJPFX6CP6DP4H.png"]',
                'description' => "
                - Extremely long-lasting compared to other chews  
                - Naturally rich in protein and amino acids  
                - Odorless and stainless  
                - Made from naturally shed elk and deer antlers (cruelty-free and sustainable)  
                - Biodegradable and eco-friendly  
                - Size/Cut may vary  
                ",
                'price' => 379.00,
                'in_stock' => 1,
                'stock_quantity' => 332,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 44,
                'product_name' => "Harley's Dehydrated Beef Skewer Dog Treats",
                'slug' => 'harleys-dehydrated-beef-skewer-dog-treats',
                'images' => '["products\\/01JNWHN1RZ62BS1S236ZD66MGS.png"]',
                'description' => "
                - Made from beef tendon and beef lungs, sourced from grass-fed, farm-raised cows  
                - Treat and chew in one, suitable for puppies (3+ months) and seniors  
                - Small-batch production ensures freshness  
                - No antibiotics, hormones, additives, or preservatives  
                - **Key Benefits:**  
                  - Reduces anxiety by promoting chewing and endorphin release  
                  - Supports oral health by reducing tartar and plaque  
                  - Contains collagen for skin and joint health  
                - **Size Guide:** Approx. 7-inch skewers, sold per piece  
                - **Chew Intensity:** Light  
                - **Feeding Instructions:**  
                  - Introduce slowly, monitor for allergies  
                  - Always supervise while chewing  
                  - Ensure fresh water availability  
                  - Store in a cool, dry place (room temp: 6 months; refrigerate/freeze if half-eaten)  
                ",
                'price' => 169.00,
                'in_stock' => 1,
                'stock_quantity' => 830,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 45,
                'product_name' => 'Acana Adult Dry Dog Food 2kg',
                'slug' => 'acana-adult-dry-dog-food-2kg',
                'images' => '["products\\/01JNWJ1F0STPQAVYEB1VYQZJSJ.png"]',
                'description' => "
                - Acana Heritage Dry Food for adult dogs  
                - Suitable for all breeds and life stages  
                - Made with free-run chicken, wild-caught flounder, and cage-free eggs  
                - Ingredients sourced from trusted farmers and fishers  
                - Delivered fresh or raw in WholePrey ratios for optimal nutrition  
                - High in meat protein for lean muscle mass and peak physical conditioning  
                - Free of grains and gluten  
                - Contains 60% meat—up to twice as much as many pet specialty foods  
                ",
                'price' => 1161.00,
                'in_stock' => 1,
                'stock_quantity' => 500,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 46,
                'product_name' => 'Acana Adult Dry Dog Food 11.4 kg',
                'slug' => 'acana-adult-dry-dog-food-114-kg',
                'images' => '["products\\/01JNWJ5936WAVMRWWMS8KXQ8HG.png"]',
                'description' => "
                - Acana Heritage Dry Food for adult dogs  
                - Suitable for all breeds and life stages  
                - Made with free-run chicken, wild-caught flounder, and cage-free eggs  
                - Ingredients sourced from trusted farmers and fishers  
                - Delivered fresh or raw in WholePrey ratios for optimal nutrition  
                - High in meat protein for lean muscle mass and peak physical conditioning  
                - Free of grains and gluten  
                - Contains 60% meat—up to twice as much as many pet specialty foods  
                ",
                'price' => 4155.00,
                'in_stock' => 1,
                'stock_quantity' => 430,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 47,
                'product_name' => 'Aozi Kitten Dry Cat Food 2.5 kg',
                'slug' => 'aozi-kitten-dry-cat-food-25-kg',
                'images' => '["products\\/01JNWJ9AH51R6BHTGYNG0MXV8R.png"]',
                'description' => "
                - **Pure natural organic food**  
                - Enriched with **Taurine** to support eye and heart health  
                - Easy to digest, protects intestines and stomach  
                - High-quality fresh meat rich in protein, making it delicious and nutritious  
                - Fresh fruits and vegetables for balanced nutrition  
                - Select deep-sea fish for protein, fat, and energy  
                - Low-allergenic beef for cats with sensitive constitutions  
                - **Urinary care formula**: Less salt, less oil, reduced burden on liver and kidneys  
                ",
                'price' => 879.00,
                'in_stock' => 1,
                'stock_quantity' => 500,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 48,
                'product_name' => 'Goodboy Adult Dry Dog Food 20 kg',
                'slug' => 'goodboy-adult-dry-dog-food-20-kg',
                'images' => '["products\\/01JNWJC8FCQQ5XMDJCGZ72ZYTK.png"]',
                'description' => "
                - **Goodboy Original 20kg**  
                - 100% Healthy Nutrition  
                - **Beef Flavor**  
                - Suitable for adult dogs of any breed (1 year and up)  
                - Formulated to meet **AAFCO** nutritional standards for adult dogs  
                - 100% nutritionally complete and balanced  
                - **Slogan:** Eat Smart, Eat Healthy  
                ",
                'price' => 1659.00,
                'in_stock' => 1,
                'stock_quantity' => 539,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 49,
                'product_name' => 'Acana Pacifica Dry Dog Food 2kg',
                'slug' => 'acana-pacifica-dry-dog-food-2kg',
                'images' => '["products\\/01JNWJGBQQR3ZRJ50RZDEMRYWN.png"]',
                'description' => "
                - **Acana Regionals Dry Food - Pacifica**  
                - Suitable for all breeds and life stages  
                - Loaded with **fresh, regional Canadian fish**  
                - Sustainable and **wild-caught off North Vancouver Island**  
                - Contains Pacific herring, pilchard, flounder, hake, and rockfish  
                - Delivered **fresh or raw**, without long lists of additives  
                - **Protein-rich** formula to promote peak physical conditioning  
                - **Loaded with 57% fish**  
                ",
                'price' => 1282.50,
                'in_stock' => 1,
                'stock_quantity' => 300,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 50,
                'product_name' => 'Carnilove Adult Salmon Dry Dog Food 12 kg',
                'slug' => 'carnilove-adult-salmon-dry-dog-food-12-kg',
                'images' => '["products\\/01JNWJK3FD4C9PW77NJP8WH1D0.png"]',
                'description' => "
                - **Grain-free and Potato-free formula** suitable for adult dogs of all breeds  
                - **Salmon** is a highly digestible protein source with anti-inflammatory properties  
                - **Rich in Omega-3** for mental development, cardiovascular health, and metabolism  
                - Supports **eye health**, **coat shine**, and **skin quality**  
                - Contains **70% wild-origin meats** and **30% forest fruits, vegetables, and berries**  
                - Inspired by the natural diet of dogs before agriculture, using modern production techniques  
                ",
                'price' => 4199.00,
                'in_stock' => 1,
                'stock_quantity' => 488,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 51,
                'product_name' => 'Aozi Adult Gold Dry Dog Food 2kg',
                'slug' => 'aozi-adult-gold-dry-dog-food',
                'images' => '["products\\/01JNWJRA6SNVX1G1T1XX3RSR3Y.png"]',
                'description' => "
                - **For Adult Dogs of All Breeds**  
                - Unique **hair beautifying formula** with **Omega-3 and Omega-6**  
                - **Easy to digest** and supports **joint and bone health**  
                - **Low-allergenic beef** for dogs with sensitive constitutions  
                - **Prebiotics (FOS) & beet pulp** for improved intestinal health  
                - **Supports immunity** with antioxidants (Vitamin C, Vitamin E, Lutein)  
                - Contains **nutritious egg and spinach** for essential micronutrients  
                ",
                'price' => 829.00,
                'in_stock' => 1,
                'stock_quantity' => 427,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 52,
                'product_name' => 'Acana Prairie Poultry Dry Dog Food 2 kg',
                'slug' => 'acana-prairie-poultry-dry-dog-food-2-kg',
                'images' => '["products\\/01JNWJXJ42HEFZR76WZ2JC1YTX.png"]',
                'description' => "
                - **For all breeds and life stages**  
                - Features **free-run chicken, turkey, and cage-free eggs**  
                - Ingredients sourced from **prairie farms**, delivered **fresh or raw**  
                - **Whole Prey ratios** provide balanced nutrition  
                - Includes **home-grown steel-cut oats** for stable blood sugar levels  
                - **Gluten-free**  
                - **50% meat content**, up to twice as much as most pet specialty foods  
                ",
                'price' => 1058.00,
                'in_stock' => 1,
                'stock_quantity' => 436,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 53,
                'product_name' => 'Acana Wild Coast Dry Dog Food 2 kg',
                'slug' => 'acana-wild-coast-dry-dog-food-2-kg',
                'images' => '["products\\/01JNWK2E658V209DH7T0TV6B6T.png"]',
                'description' => "
                - **For all breeds and life stages**  
                - Made with **sustainable wild-caught fish** from North Vancouver Island  
                - **Fresh and whole ingredients** bursting with flavor and nutrients  
                - **Rich in Omega-3 fatty acids** for healthy skin, coat, and brain function  
                - **50% fish content**, up to twice as much as many pet specialty foods  
                ",
                'price' => 1102.00,
                'in_stock' => 1,
                'stock_quantity' => 300,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 54,
                'product_name' => 'Aozi Adult Pink Dry Cat Food 2.5kg',
                'slug' => 'aozi-adult-pink-dry-cat-food-25kg',
                'images' => '["products\\/01JNWK5NJ8HNEG0WV59A6AQP3C.png"]',
                'description' => "
                - **For Cats of All Breeds**  
                - Contains **salmon, fresh meat, fruits, and vegetables**  
                - **Easy to digest**, protects the **intestine and stomach**  
                - **No antibiotics, growth hormones, or synthetic colors**  
                - **Low allergenic** - No ingredients that cause skin allergies  
                - **Less salt, less oil**, reducing burden on **liver and kidney**  
                - **Improves immunity** with antioxidants and prebiotics (FOS)  
                - **Healthy skin and glossy fur** with vitamins from fruits & vegetables  
                ",
                'price' => 879.00,
                'in_stock' => 1,
                'stock_quantity' => 492,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 55,
                'product_name' => 'The Fur Life Odor Off Pet Wipes 80s',
                'slug' => 'the-fur-life-odor-off-pet-wipes-80s',
                'images' => '["products\\/01JNWKAVJQA5K7HNM9JF2R5JQ9.png"]',
                'description' => "
                - **Odor-neutralizing cleaning pet wipes**  
                - Ideal for use **between washes** or after long walks  
                - **Perfect for in-between washes** (after walks, after playtime)  
                - **Easy alternative to bathing** for pets that dislike water  
                - **Gentle and safe formula**  
                ",
                'price' => 349.00,
                'in_stock' => 1,
                'stock_quantity' => 700,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 56,
                'product_name' => 'The Fur Life Bath Refresh Pet Wipes 80s',
                'slug' => 'the-fur-life-bath-refresh-pet-wipes-80s',
                'images' => '["products\\/01JNWKD54TZ54104HDFXJYP4D9.png"]',
                'description' => "
                - **Removes dirt and odors**  
                - Keeps pet **coat clean and fresh**  
                - **Perfect for in-between washes** (after walks, after playtime)  
                - Helps with **odor control** for pets that need it  
                - **Gentle and safe formula**  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 500,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 57,
                'product_name' => 'M-Pets Female Washable Pet Diaper (XS)',
                'slug' => 'm-pets-female-washable-pet-diaper',
                'images' => '["products\\/01JNWKGPFGC56W8CQXY192WJHK.png"]',
                'description' => "
                - **Washable diaper** for **female dogs**  
                - **Size: X-Small**  
                  - **Waist:** 25.4cm  
                  - **Tail opening:** 13.3cm  
                  - **Waist to tail:** 20.3cm  
                - **Leak-proof & super absorbent**  
                - **Elasticated waist** for a comfortable fit  
                - **Machine washable** for easy cleaning  
                - **Velcro fastening** for a secure hold  
                ",
                'price' => 289.00,
                'in_stock' => 1,
                'stock_quantity' => 400,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 58,
                'product_name' => 'The Fur Life Anti Tick and Flea Pet Wipes 80s',
                'slug' => 'the-fur-life-anti-tick-and-flea-pet-wipes-80s',
                'images' => '["products\\/01JNWKKF4VV4S7HYBX765BF4ZP.png"]',
                'description' => "
                - **Safe for use on pets** (eyes, ears, and body)  
                - **Infused with lemongrass and mint** for natural protection  
                - **Perfect for in-between washes** (after walks and playtime)  
                - **Alcohol-free formula**  
                - **Effective against ticks and fleas** while keeping pets clean  
                ",
                'price' => 359.00,
                'in_stock' => 1,
                'stock_quantity' => 390,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 59,
                'product_name' => 'Purry Mint Dental Care Kit (Toothpaste and Toothbrush) 90g',
                'slug' => 'purry-mint-dental-care-kit-toothpaste-and-toothbrush-90g',
                'images' => '["products\\/01JNWKP6R8KSG0SYKBTPGNCFXS.png"]',
                'description' => "
                - **Purry Dental Set** (90g Dog Toothpaste + 3pcs Toothbrush)  
                - **Made of natural ingredients** to promote **dental health & fresh breath**  
                - **For Dogs & Puppies / Cats & Kittens**  
                - **Set includes:**  
                  - 90g **Fresh Mint Flavor Toothpaste**  
                  - **2x Dog Finger Brushes**  
                  - **1x Dog Toothbrush**  
                ",
                'price' => 279.00,
                'in_stock' => 1,
                'stock_quantity' => 274,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 60,
                'product_name' => 'Nutriscience Pet Stain Remover Organic Cleaner 500ml',
                'slug' => 'nutriscience-pet-stain-remover-organic-cleaner-500ml',
                'images' => '["products\\/01JNWKS4Q5YZCVYDDGZP87ZT55.png"]',
                'description' => "
                - **100% natural, eco-friendly stain remover**  
                - **Hypoallergenic & pH neutral**  
                - **Penetrates deep into fabric** to lift and break down embedded stains  
                - **Supports pet health and environment-friendly living**  
                - **Promotes a cleaner, healthier space for pets**  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 560,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 61,
                'product_name' => 'Earth Rated Poop Bags Refill Rolls Unscented 315s 9"x13"',
                'slug' => 'earth-rated-poop-bags-refill-rolls-unscented-315s-9x13',
                'images' => '["products\\/01JNWMR5FG53XD6XRSRPZT34PF.png"]',
                'description' => "
                - **100% leak-proof guarantee**  
                - **Made from 65% certified post-consumer recycled plastic**  
                - **Extra strong & extra long** (9\" x 13\") to protect hands  
                - **Compact & convenient** for on-the-go use  
                - **Unscented**  
                ",
                'price' => 1399.00,
                'in_stock' => 1,
                'stock_quantity' => 429,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 62,
                'product_name' => 'Bark and Spark Female Diaper 12s (Large)',
                'slug' => 'bark-and-spark-female-diaper-12s-large',
                'images' => '["products\\/01JNWM0SDAS18ZPMRTZXGMT1FP.png"]',
                'description' => "
                - **Soft cotton surface** for ultimate comfort  
                - **Fur-friendly magic tape** prevents discomfort  
                - **Quick-dry & super absorbent** for leak-proof protection  
                - **Open design for tail** ensuring a snug fit  
                - **Versatile use** for females in heat, puppies, excited urination, and incontinence management  
                - **Certified Original Bark and Spark Brand** for guaranteed authenticity  
                ",
                'price' => 199.00,
                'in_stock' => 1,
                'stock_quantity' => 800,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 63,
                'product_name' => 'Earth Rated Poop Bags Large Single Roll Unscented 8x13',
                'slug' => 'earth-rated-poop-bags-large-single-roll-unscented-8x13',
                'images' => '["products\\/01JNWMN24CC4709FNAXA8X859W.png"]',
                'description' => "
                - **100% leak-proof guarantee**  
                - **Made from 65% certified post-consumer recycled plastic**  
                - **Extra strong & extra long** (8\" x 13\") for ultimate protection  
                - **Compact & convenient** for on-the-go use  
                - **Unscented for those who prefer a neutral option**  
                ",
                'price' => 999.00,
                'in_stock' => 1,
                'stock_quantity' => 200,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 64,
                'product_name' => 'PurPaws Milky Moo Clean My Paws Pet Foam 150 ml',
                'slug' => 'purpaws-milky-moo-clean-my-paws-pet-foam-150-ml',
                'images' => '["products\\/01JNWMV76JF1V0BB0W2MRD1N2B.png"]',
                'description' => "
                - **Gentle & effective paw cleanser** for all pets  
                - **Sterilizes & removes bacteria** to promote pet hygiene  
                - **Odor-eliminating formula** keeps paws fresh  
                - **Moisturizing & prevents drying** for soft, healthy feet  
                - **Soft silicone brush** for a comfortable massage experience  
                - **Versatile use** for dogs, cats, rabbits, and more  
                - **Convenient foam application** for hassle-free cleaning  
                ",
                'price' => 189.00,
                'in_stock' => 1,
                'stock_quantity' => 900,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 65,
                'product_name' => 'Doggo Sharp Grooming Scissor',
                'slug' => 'doggo-sharp-grooming-scissor',
                'images' => '["products\\/01JNWN15YQ7YQ6ACCXYT3HAEEH.png"]',
                'description' => "
                - **Sharp stainless steel blades** for precise grooming  
                - **Rubber handle grip** for comfort and control  
                - **Easy to clean & suitable for all fur types**  
                - **Non-slip ergonomic design** for stress-free grooming  
                - **Compact size:** Length: 5.5 inches | Width: 0.3 inches | Height: 0.3 inches  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 679,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 66,
                'product_name' => 'Earth Rated Plant-Based Dog Grooming Lavender Pet Wipes 60s',
                'slug' => 'earth-rated-plant-based-dog-grooming-lavender-pet-wipes-60s',
                'images' => '["products\\/01JNWN4CRGH2C48NFPQM2DH3VV.png"]',
                'description' => "
                - **Gentle clean** with plant-based materials  
                - **Hypoallergenic & dermatologist tested** for sensitive skin  
                - **Durable & soft** for easy grooming  
                - **Infused with lavender scent** for a calming effect  
                - **Leaping Bunny Cruelty-Free certified**  
                ",
                'price' => 449.00,
                'in_stock' => 1,
                'stock_quantity' => 428,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 67,
                'product_name' => 'Earth Rated Plant-Based Dog Grooming Unscented Pet Wipes 100s',
                'slug' => 'earth-rated-plant-based-dog-grooming-unscented-pet-wipes-100s',
                'images' => '["products\\/01JNWN7A1B49WCNPYNA03A75JF.png"]',
                'description' => "
                - **Gentle clean** with plant-based materials  
                - **Hypoallergenic & dermatologist tested** for sensitive skin  
                - **Durable & soft** for easy grooming  
                - **Unscented formula** for pets with fragrance sensitivities  
                - **Leaping Bunny Cruelty-Free certified**  
                ",
                'price' => 649.00,
                'in_stock' => 1,
                'stock_quantity' => 333,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 68,
                'product_name' => 'Earth Rated Plant-Based Dog Grooming Lavender Pet Wipes 100s',
                'slug' => 'earth-rated-plant-based-dog-grooming-lavender-pet-wipes-100s',
                'images' => '["products\\/01JNWNAVTZJDTRDJQP33STBJFR.png"]',
                'description' => "
                - **Gentle clean** with plant-based materials  
                - **Hypoallergenic & dermatologist tested** for sensitive skin  
                - **Durable & soft** for easy grooming  
                - **Infused with lavender scent** for a calming effect  
                - **Leaping Bunny Cruelty-Free certified**  
                ",
                'price' => 629.00,
                'in_stock' => 1,
                'stock_quantity' => 359,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 69,
                'product_name' => 'Bamboo Regular Comb with 16 Rotating Teeth',
                'slug' => 'bamboo-regular-comb-with-16-rotating-teeth',
                'images' => '["products\\/01JNWND96G6WGX5G81C5H2RZ5T.png"]',
                'description' => "
                - **Eco-friendly 100% natural bamboo** comb  
                - **16 rotating stainless steel teeth** for smooth grooming  
                - **Ergonomic anti-static handle** for comfortable grip  
                - **Reduces shedding & promotes a healthy, shiny coat**  
                - **Perfect for detangling, activating blood circulation, and natural oil distribution**  
                - **Size:** 5.5 x 21.5cm  
                ",
                'price' => 349.00,
                'in_stock' => 1,
                'stock_quantity' => 649,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 70,
                'product_name' => 'Purry Sweet Orange Scent Pet Odor Eliminator 309 ml',
                'slug' => 'purry-sweet-orange-scent-pet-odor-eliminator-309-ml',
                'images' => '["products\\/01JNWPHBSC4VNAGBPCZ1YRT0X8.png"]',
                'description' => "
                - **Eliminates pet odors instantly & permanently**  
                - **Infused with sweet orange scent** for a fresh-smelling home  
                - **Kills 99.9% of odor-causing microbes**  
                - **Safe for pets and humans**  
                - **Ideal for homes, pet shops, grooming facilities, vet clinics, and kennels**  
                - **Easy to use: spray directly on pets or surfaces**  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 179,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 71,
                'product_name' => 'Bamboo Slicker Brush Large',
                'slug' => 'bamboo-slicker-brush-large',
                'images' => '["products\\/01JNWQ3BPTQR9AD2WFR46VCT8A.png"]',
                'description' => "
                - **Eco-friendly bamboo construction** (FSC certified)  
                - **Perfect for grooming, detangling, and combing all coat types**  
                - **Ergonomic anti-static handle for better grip**  
                - **Corrosion-resistant stainless steel bristles** with rotating teeth  
                - **Promotes a healthy, shiny coat by distributing natural oils**  
                ",
                'price' => 319.00,
                'in_stock' => 1,
                'stock_quantity' => 498,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 72,
                'product_name' => 'Bamboo Slicker Brush Medium',
                'slug' => 'bamboo-slicker-brush-medium',
                'images' => '["products\\/01JNWPZDPCKN9HW02S6Z6CTE8T.png"]',
                'description' => "
                - **Eco-friendly bamboo brush** (FSC certified)  
                - **Ideal for grooming, detangling, and maintaining all coat types**  
                - **Anti-static handle for comfortable grip**  
                - **Corrosion-resistant stainless steel bristles** with rotating teeth  
                - **Helps reduce shedding and maintain coat health**  
                ",
                'price' => 269.00,
                'in_stock' => 1,
                'stock_quantity' => 284,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 73,
                'product_name' => 'Safe House Madre de Cacao and Lavender Pet Shampoo 250 ml',
                'slug' => 'safe-house-madre-de-cacao-and-lavender-pet-shampoo-250-ml',
                'images' => '["products\\/01JNWQ5V9BZY7P8M56K4PDJ120.png"]',
                'description' => "
                - **Premium natural pet shampoo** (paraben-free, sulfate-free, pH balanced)  
                - **Madre de Cacao:** Fights mites, fleas, and ticks; antibacterial and healing properties  
                - **Lavender:** Soothes skin, relieves itching, and reduces dog odor  
                - **Neem & Aloe Vera Variant Available:** Anti-fungal, anti-inflammatory, moisturizing, and healing properties  
                - **Bamboo & Acapulco Variant Available:** Anti-bacterial, anti-fungal, and coat-conditioning benefits  
                - **Tear-free formula, safe for pets**  
                - **How to use:** Lather onto wet coat, massage, rinse thoroughly  
                ",
                'price' => 199.00,
                'in_stock' => 1,
                'stock_quantity' => 329,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 74,
                'product_name' => 'Bamboo Double-Sided Pin Brush',
                'slug' => 'bamboo-double-sided-pin-brush',
                'images' => '["products\\/01JNWQ8FWDW3186S6KBE177EHB.png"]',
                'description' => "
                - **Dual-sided brush for comprehensive grooming**  
                - **Pin side detangles dead undercoat, bristle side removes dirt**  
                - **Ergonomic anti-static handle for comfort**  
                - **Corrosion-resistant stainless steel bristles with rotating teeth**  
                - **Made from eco-friendly FSC-certified bamboo**  
                - **Perfect for grooming, combing, and detangling**  
                ",
                'price' => 349.00,
                'in_stock' => 1,
                'stock_quantity' => 300,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 75,
                'product_name' => 'Pet Logic Skin and Coat Health Chicken Pet Supplement 120g',
                'slug' => 'pet-logic-skin-and-coat-health-chicken-pet-supplement-120g',
                'images' => '["products\\/01JNWQCE0Y4QFQFCXKMVA3M8SA.png"]',
                'description' => "
                - **Promotes healthy skin & a shiny, soft coat**  
                - **Rich in antioxidants, vitamins, minerals, and Omega fatty acids**  
                - **Suitable for both dogs and cats**  
                - **Delicious chicken-flavored chews**  
                - **Feeding Instructions:**  
                  - **Dogs:**  
                    - ≤ 25 lbs: 5 chews/day  
                    - 25 to 75 lbs: 10 chews/day  
                    - ≥ 75 lbs: 15 chews/day  
                  - **Cats:**  
                    - ≤ 25 lbs: 3 chews/day  
                    - 25 to 75 lbs: 5 chews/day  
                    - ≥ 75 lbs: 8 chews/day  
                - **Storage:** Keep sealed, away from heat, sunlight, and humidity  
                - **Caution:** Not for ruminants  
                - **Ingredients:** Chicken breast, chicken liver, chicken meal, chicken oil, potato, brown rice, pea, sweet potato, fish oil, sunflower seed oil, vitamin E, and more  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 239,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 76,
                'product_name' => 'Pet Logic Skin and Coat Health Beef Pet Supplement 120g',
                'slug' => 'pet-logic-skin-and-coat-health-beef-pet-supplement-120g',
                'images' => '["products\\/01JNWQFZ400VEHY27MD327HQEE.png"]',
                'description' => "
                - **Promotes healthy skin & a shiny, soft coat**  
                - **Rich in antioxidants, vitamins, minerals, and Omega fatty acids**  
                - **Delicious beef-flavored chews for both dogs and cats**  
                - **Feeding Instructions:**  
                  - **Dogs:**  
                    - ≤ 25 lbs: 5 chews/day  
                    - 25 to 75 lbs: 10 chews/day  
                    - ≥ 75 lbs: 15 chews/day  
                  - **Cats:**  
                    - ≤ 25 lbs: 3 chews/day  
                    - 25 to 75 lbs: 5 chews/day  
                    - ≥ 75 lbs: 8 chews/day  
                - **Storage:** Keep sealed, away from heat, sunlight, and humidity  
                - **Caution:** Not for ruminants  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 393,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 77,
                'product_name' => 'Pet Logic Probiotic Digestive Health Chicken Pet Supplement 120g',
                'slug' => 'pet-logic-probiotic-digestive-health-chicken-pet-120g',
                'images' => '["products\\/01JNWQJGG2XQJJE8MBK0CS547Q.png"]',
                'description' => "
                - **Supports healthy digestion and nutrient absorption**  
                - **Replenishes good bacteria in your pet's gut**  
                - **Strengthens the immune system**  
                - **Feeding Instructions:**  
                  - ≤ 10kg: 2 chews/day  
                  - 11-30kg: 4 chews/day  
                  - ≥ 30kg: 6 chews/day  
                - **Storage:** Keep sealed, away from heat, sunlight, and humidity  
                - **Caution:** Not for ruminants  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 329,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 78,
                'product_name' => 'Pet Logic Probiotic Digestive Health Beef Pet Supplement 120g',
                'slug' => 'pet-logic-probiotic-digestive-health-beef-pet-supplement-120g',
                'images' => '["products\\/01JNWQMK4TWHH9AQ8ZX42D5MQ1.png"]',
                'description' => "
                - **Supports healthy digestion and nutrient absorption**  
                - **Replenishes good bacteria in your pet's gut**  
                - **Strengthens the immune system**  
                - **Feeding Instructions:**  
                  - ≤ 10kg: 2 chews/day  
                  - 11-30kg: 4 chews/day  
                  - ≥ 30kg: 6 chews/day  
                - **Storage:** Keep sealed, away from heat, sunlight, and humidity  
                - **Caution:** Not for ruminants  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 231,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 79,
                'product_name' => 'Floof Pets 8-in-1 Probiotic and Multivitamins Cat Supplement 30s',
                'slug' => 'floof-pets-8-in-1-probiotic-and-multivitamins-cat-supplement-30s',
                'images' => '["products\\/01JNWQP7P4DWQ07D7EM41K1Y77.png"]',
                'description' => "
                - **8+ Health Benefits in Every Bite**  
                - **Probiotics, Glucosamine, and Vitamins for strong joints and a shiny coat**  
                - **Vet-approved and non-GMO**  
                - **Feeding Guide:** Start with 1 chew daily, increase to 2 over time  
                - **Key Ingredients:**  
                  - Glucosamine, MSM, Chondroitin, Coenzyme Q10  
                  - Vitamins A, C, D3, E, B1, B2, B5, B6, B12, Folic Acid  
                  - Sodium Chloride, Probiotics  
                - **Quality Assurance:** 30-day money-back guarantee, fast shipping, and COD available  
                - **FAQs:**  
                  - **Suitable for all cat breeds?** Yes!  
                  - **Will it cause weight gain?** No, it’s formulated for balanced nutrition  
                  - **Safe for cats with allergies?** Consult your vet before use  
                  - **How soon will I see results?** Typically within a month  
                - **Storage:** Keep sealed, away from heat and humidity  
                - **Disclaimer:** Introduce gradually and consult a vet if reactions occur  
                ",
                'price' => 112.50,
                'in_stock' => 1,
                'stock_quantity' => 503,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 80,
                'product_name' => 'Advocate Spot On for Large Breed Dogs 10-25kg (3 pipets)',
                'slug' => 'advocate-spot-on-for-large-breed-dogs-10-25kg-3-pipets',
                'images' => '["products\\/01JNWQXMNFKEE6ZXXWDHBHXFS2.png"]',
                'description' => "
                - **Treatment for Fleas, Larvae, Spirocerca lupi, Hookworm, Whipworm, Roundworm, Angiostrongylus, Heartworm, Otodectes, Sarcoptes, Demodex**  
                - **Package Size:** 3 Pipettes  
                - **Benefits:**  
                  - Prevents flea infestation  
                  - Treats ear mites, sarcoptic mange, and demodicosis  
                  - Prevents heartworm disease  
                  - Treats gastrointestinal nematodes  
                  - Can be used as part of a treatment strategy for flea allergy dermatitis (FAD)  
                - **Not for puppies under 7 weeks of age**  
                ",
                'price' => 2097.00,
                'in_stock' => 1,
                'stock_quantity' => 342,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 81,
                'product_name' => 'Pet Logic Strong Bones and Joints Chicken Pet Supplement 120g',
                'slug' => 'pet-logic-strong-bones-and-joints-chicken-pet-supplement-120g',
                'images' => '["products\\/01JNWR22YQC8EYAT99EWDRADMX.png"]',
                'description' => "
                - **Helps promote hip, joint, and connective tissue function**  
                - **Promotes mobility and flexibility**  
                - **Helps ease aches & discomfort in bones & joints**  
                - **Feeding Instructions for Dogs:**  
                  - ≤ 25 lbs: 5 chews/day  
                  - 25 to 75 lbs: 10 chews/day  
                  - ≥ 75 lbs: 15 chews/day  
                - **Feeding Instructions for Cats:**  
                  - ≤ 25 lbs: 3 chews/day  
                  - 25 to 75 lbs: 5 chews/day  
                  - ≥ 75 lbs: 8 chews/day  
                - **Storage Condition:** Seal Properly. Keep out of heat, sunlight, and humidity.  
                - **Caution:** Do not feed ruminants.  
                - **Key Ingredients:** Chicken breast, Chicken liver, Chicken meal, Chicken oil, Potato, Brown rice, Pea, Sweet potato, Fish oil, Sunflower seed oil, Lecithin, Zinc methionine, D-Biotin, Vitamin E, Potassium sorbate, Caramel, Rosemary extract.  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 490,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 82,
                'product_name' => 'Pet Logic Strong Bones and Joints Beef Pet Supplement',
                'slug' => 'pet-logic-strong-bones-and-joints-beef-pet-supplement',
                'images' => '["products\\/01JNWR46Z89809QYCR5VBSPXKH.png"]',
                'description' => "
                - **Supports strong bones and joints**  
                - **Promotes mobility and flexibility**  
                - **Reduces joint pain and discomfort**  
                - **Feeding Instructions for Dogs:**  
                  - ≤ 25 lbs: 5 chews/day  
                  - 25 to 75 lbs: 10 chews/day  
                  - ≥ 75 lbs: 15 chews/day  
                - **Feeding Instructions for Cats:**  
                  - ≤ 25 lbs: 3 chews/day  
                  - 25 to 75 lbs: 5 chews/day  
                  - ≥ 75 lbs: 8 chews/day  
                - **Storage Condition:** Seal Properly. Keep out of heat, sunlight, and humidity.  
                - **Caution:** Do not feed ruminants.  
                - **Key Ingredients:** Chicken breast, Chicken liver, Chicken meal, Chicken oil, Potato, Brown rice, Pea, Sweet potato, Fish oil, Sunflower seed oil, Lecithin, Zinc methionine, D-Biotin, Vitamin E, Potassium sorbate, Caramel, Rosemary extract.  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 423,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 83,
                'product_name' => 'Canine Science Hip and Joint Meal Topper Dog Supplement 30g',
                'slug' => 'canine-science-hip-and-joint-meal-topper-dog-supplement-30g',
                'images' => '["products\\/01JNWR6MMBH8S3JDKXW6XS7TWA.png"]',
                'description' => "
                - **Vet-recommended hip & joint support meal topper**  
                - **Enhances joint mobility and flexibility**  
                - **100% safe for all dog breeds and ages**  
                - **Breakthrough science-based formula for joint pain relief**  
                - **Key Ingredients:**  
                  - **Glucosamine:** Supports cartilage and joint lubrication  
                  - **MSM:** Reduces inflammation and eases joint pain  
                  - **Chondroitin:** Helps prevent joint stiffness and discomfort  
                - **Benefits:**  
                  - Supports healthy joints and ligaments  
                  - Reduces pain and swelling  
                  - Delicious meal topper alternative to pills and tablets  
                - **Recommended Usage:** Add to your dog's food daily for best results.  
                - **Storage:** Keep sealed, away from heat and moisture.  
                ",
                'price' => 499.00,
                'in_stock' => 1,
                'stock_quantity' => 219,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 84,
                'product_name' => 'Canine Science Natural Calm Meal Topper Dog Supplement 30g',
                'slug' => 'canine-science-natural-calm-meal-topper-dog-supplement-30g',
                'images' => '["products\\/01JNWRARQRDHZXSK0BJ8X9YJND.png"]',
                'description' => "
                - **A delicious meal topper that helps calm your dog and reduce excessive barking**  
                - **Formulated by vets with non-drowsy, non-medicated ingredients**  
                - **100% safe for all dog breeds and ages**  
                - **Vet recommended and trusted by thousands of pet owners worldwide**  
                - **Key Ingredients:**  
                  - **L-Tryptophan:** Supports serotonin production for mood regulation  
                  - **Valerian Root:** Naturally reduces stress and promotes relaxation  
                  - **Chamomile Extract:** Soothes nerves, provides antioxidants, and aids digestion  
                - **Usage:** Simply sprinkle over your dog's food daily for best results  
                - **Storage:** Keep sealed, away from heat and humidity  
                ",
                'price' => 499.00,
                'in_stock' => 1,
                'stock_quantity' => 103,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 85,
                'product_name' => 'The Fur Life Fresh Pet Shampoo 250ml',
                'slug' => 'the-fur-life-fresh-pet-shampoo-250ml',
                'images' => '["products\\/01JNWYGNVBED30JERG52TH8BX0.png"]',
                'description' => "
                - **Mild and gentle pet shampoo that cleans and deodorizes your pet's coat**  
                - **pH-balanced formula that moisturizes and refreshes**  
                - **Vet-approved and paraben-free**  
                - **Scent:** Satsuma Peach  
                - **Safe for regular use on dogs and cats**  
                - **Storage:** Keep in a cool, dry place, away from direct sunlight  
                ",
                'price' => 129.00,
                'in_stock' => 1,
                'stock_quantity' => 428,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 86,
                'product_name' => 'The Fur Life Fluff Machine Pet Shampoo and Conditioner 250ml',
                'slug' => 'the-fur-life-fluff-machine-pet-shampoo-and-conditioner-250ml',
                'images' => '["products\\/01JNWYSBR7NCVWHRR6N8GEKHM4.png"]',
                'description' => "
                - **2-in-1 pet shampoo and conditioner for fluffy and furry pets**  
                - **pH-balanced formula, safe for both cats and dogs**  
                - **Contains Fluff Complex to improve fur manageability and reduce frizz**  
                - **Infused with Keratin for fur restructuring, conditioning, and color protection**  
                - **Paraben-free and vet-approved**  
                - **Storage:** Keep sealed, away from direct sunlight and moisture  
                ",
                'price' => 179.00,
                'in_stock' => 1,
                'stock_quantity' => 200,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 87,
                'product_name' => 'The Fur Life Fluff Machine Pet Shampoo and Conditioner 1L',
                'slug' => 'the-fur-life-fluff-machine-pet-shampoo-and-conditioner-1l',
                'images' => '["products\\/01JNWYV502GDD6PGTTCQXM4WED.png"]',
                'description' => "
                - **Large 1L bottle of 2-in-1 pet shampoo and conditioner**  
                - **Perfect for fluffy and furry pets**  
                - **pH-balanced formula, safe for both cats and dogs**  
                - **Fluff Complex for fur manageability, volume, and frizz control**  
                - **Infused with Keratin to strengthen and protect fur**  
                - **Paraben-free and safe for regular use**  
                - **Storage:** Keep in a cool, dry place, away from heat and direct sunlight  
                ",
                'price' => 459.00,
                'in_stock' => 1,
                'stock_quantity' => 241,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 88,
                'product_name' => 'Furmagic Pink Dog Shampoo 1000ml',
                'slug' => 'furmagic-pink-dog-shampoo-1000ml',
                'images' => '["products\\/01JNWYYCTT3ED6HZH7N33WKKW5.png"]',
                'description' => "
                - **Furmagic Pink Dog Shampoo - Proven and tested quality**  
                - **Safe and affordable pet care solution**  
                - **Infused with Madre de Cacao, Neem Oil, and Aloe Vera extracts**  
                - **Madre de Cacao extract helps eliminate mange, hotspots, and skin diseases**  
                - **Fast-acting Stem Cell technology for instant magical effects**  
                - **Suitable for regular use to maintain a healthy coat**  
                ",
                'price' => 519.00,
                'in_stock' => 1,
                'stock_quantity' => 120,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 89,
                'product_name' => 'Doggo Dog Shampoo Melon Scent 250ml',
                'slug' => 'doggo-dog-shampoo-melon-scent-250ml',
                'images' => '["products\\/01JNWZ0SNZBG2B6W1DT8ZHTC2A.png"]',
                'description' => "
                - **Doggo Shampoo with a refreshing melon scent**  
                - **Long-lasting deodorizing effect**  
                - **Uses high-quality ingredients for the best care**  
                - **Ensures a clean and fresh-smelling coat for your furry friend**  
                - **Gentle formula, safe for regular use on dogs**  
                ",
                'price' => 119.00,
                'in_stock' => 1,
                'stock_quantity' => 329,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 90,
                'product_name' => 'Doggie\'s Choice Anti Mange Dog Shampoo 1L',
                'slug' => 'doggies-choice-anti-mange-dog-shampoo-1l',
                'images' => '["products\\/01JNWZ3FZCKCW6HHHCB9XJCGH8.png"]',
                'description' => "
                - **Doggie's Choice Anti Mange Shampoo with Conditioner**  
                - **Effective against mange, fungi, and parasitic infections**  
                - **Contains Madre de Cacao for natural healing**  
                - **Anti-fungal, anti-parasitic, and anti-bacterial properties**  
                - **Not recommended for nursing dogs, sick pets, or puppies under 3 months old**  
                - **Avoid contamination with water sources due to its strong formulation**  
                ",
                'price' => 599.00,
                'in_stock' => 1,
                'stock_quantity' => 125,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 91,
                'product_name' => 'Play Pets Lavender Dog Shampoo and Conditioner 1L',
                'slug' => 'play-pets-lavender-dog-shampoo-and-conditioner-1l',
                'images' => '["products\\/01JNWZ5811SPWZ03B2XBQP7RVT.png"]',
                'description' => "
                - **Play Pets Pet Shampoo & Conditioner - Lavender Breeze Scent**  
                - **Suitable for all dog and cat breeds, ages 6 weeks and up**  
                - **Lavender aroma provides calming aromatherapy benefits**  
                - **Repels harmful insects while keeping your pet’s coat soft and clean**  
                - **Gentle and safe for regular use**  
                ",
                'price' => 250.00,
                'in_stock' => 1,
                'stock_quantity' => 245,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 92,
                'product_name' => 'Fetch Neem with Aloe Vera Dog Shampoo 250ml',
                'slug' => 'fetch-neem-with-aloe-vera-dog-shampoo-250-ml',
                'images' => '["products\\/01JNWZAGSSR5RP6EN9AV58GA8H.png"]',
                'description' => "
                - **Made with 100% neem aqueous extract**  
                - **Naturally moisturizes, deodorizes, and detangles fur**  
                - **Removes bacteria and repels stubborn ticks and fleas**  
                - **Contains Madre de Cacao for skin healing benefits**  
                - **Aloe Vera extract for a soft and shiny coat**  
                - **Safe for dogs, cats, and even humans**  
                - **Non-toxic, paraben-free, and biodegradable**  
                - **No artificial colors**  
                ",
                'price' => 289.00,
                'in_stock' => 1,
                'stock_quantity' => 130,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 93,
                'product_name' => 'Brit Functional Snack Adult Endurance Lamb Dog Treats 150g',
                'slug' => 'brit-functional-snack-adult-endurance-lamb-dog-treats-150g',
                'images' => '["products\\/01JNWZG250XBNBDEXF8B5SK188.png"]',
                'description' => "
                - **Brit Functional Snack - Endurance Lamb Dog Treats**  
                - **Semi-moist complementary dog food**  
                - **Lamb enriched with banana for added nutrition**  
                - **Helps keep active dogs in proper condition**  
                - **L-carnitine and taurine for energy and muscle support**  
                - **Grain-free and potato-free formula**  
                - **Fulvic acids to aid nutrient absorption**  
                - **Cantaloupe melon extract for antioxidants**  
                - **Collagen peptides for musculoskeletal regeneration**  
                - **Lactobacillus acidophilus for intestinal health**  
                ",
                'price' => 239.00,
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 95,
                'product_name' => 'Brit Functional Snack Adult Dental Venison Dog Treats 150g',
                'slug' => 'brit-functional-snack-adult-dental-venison-dog-treats-150g',
                'images' => '["products\\/01JNWZXKMRWRR26H14STWJS9ZA.png"]',
                'description' => "
                - **Brit Functional Snack - Dental Venison Dog Treats**  
                - **Semi-moist complementary dog food**  
                - **Venison enriched with rosemary for dental health**  
                - **Helps protect teeth and gums against tartar buildup**  
                - **Contains kelp, cloves, and sodium hexametaphosphate for oral hygiene**  
                - **Grain-free and potato-free**  
                - **Fulvic acids aid in nutrient absorption**  
                - **Cantaloupe melon extract for antioxidants**  
                - **Collagen peptides for musculoskeletal regeneration**  
                - **Lactobacillus acidophilus for digestive health**  
                - **EU-made quality snacks**  
                ",
                'price' => 239.00,
                'in_stock' => 1,
                'stock_quantity' => 139,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 96,
                'product_name' => 'Brit Functional Snack Adult Dental Venison 150g',
                'slug' => 'brit-functional-snack-adult-dental-venison-150g',
                'images' => '["products\\/01JNX07MMYH88RBQ36GD8Z3Z9Q.png"]',
                'description' => "
                - **Brit Functional Snack - Dental Venison Dog Treats**  
                - **Semi-moist complementary dog food**  
                - **Venison enriched with rosemary for oral care**  
                - **Helps protect teeth and gums against tartar buildup**  
                - **Contains kelp, cloves, and sodium hexametaphosphate for oral hygiene**  
                - **Grain-free and potato-free**  
                - **Fulvic acids support nutrient absorption**  
                - **Cantaloupe melon extract for antioxidants**  
                - **Collagen peptides regenerate musculoskeletal system**  
                - **Lactobacillus acidophilus for gut health**  
                - **EU-made premium quality**  
                ",
                'price' => 239.00,
                'in_stock' => 1,
                'stock_quantity' => 121,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 98,
                'product_name' => 'Brit Care Puppy Crunchy Snack Insect with Whey 200g',
                'slug' => 'brit-care-puppy-crunchy-snack-insect-with-whey-200g',
                'images' => '["products\\/01JNX0EBVBFBXHPMFKBAEJPJPS.png"]',
                'description' => "
                - **Brit Care Puppy Crunchy Snack - Insect with Whey**  
                - **Enriched with probiotics for digestion**  
                - **Supports healthy growth and development**  
                - **Insect protein - highly digestible and low allergy risk**  
                - **High in fatty acids for healthy skin and a shiny coat**  
                - **Recyclable packaging with a low carbon footprint**  
                ",
                'price' => 210.00,
                'in_stock' => 1,
                'stock_quantity' => 200,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 99,
                'product_name' => 'Brit Functional Snack Adult Skin and Coat Krill Dog Treats 150g',
                'slug' => 'brit-functional-snack-adult-skin-and-coat-krill-dog-treats-150g',
                'images' => '["products\\/01JNX0M58M235VY39ME64RNET8.png"]',
                'description' => "
                - **Brit Functional Snack - Skin and Coat Krill**  
                - **Semi-moist dog treat for skin and coat health**  
                - **Krill enriched with coconut for hydration**  
                - **Zinc and biotin for a healthy, shiny coat**  
                - **Grain-free and potato-free formula**  
                - **Collagen peptides for musculoskeletal support**  
                - **Tyndallized Lactobacillus acidophilus for gut health**  
                - **Rich in vitamin E and omega-3 fatty acids**  
                ",
                'price' => 239.00,
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 100,
                'product_name' => 'Pack N Pride Ducky Nuggets Dog Treats 3.5oz',
                'slug' => 'pack-n-pride-ducky-nuggets-dog-treats-35oz',
                'images' => '["products\\/01JNX0NXKC0DM6NEACKJFAT6SE.png"]',
                'description' => "
                - **Pack N Pride Ducky Nuggets - Premium Dog Treats**  
                - **No by-products, no fillers – just quality ingredients**  
                - **Perfect for sensitive stomachs**  
                - **Designed for optimal digestion**  
                - **Packed with nutrients and moisture through slow cooking**  
                - **A delicious and healthy reward for your furry friend**  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 139,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 101,
                'product_name' => 'Pack N Pride Rawhide Twist Duck Dog Treats 90g',
                'slug' => 'pack-n-pride-rawhide-twist-duck-dog-treats-90g',
                'images' => '["products\\/01JNX0W31EQMGVCNXSAQ7SHPJX.png"]',
                'description' => "
                - **Pack N Pride Rawhide Twist - Duck Dog Treats**  
                - **Promotes healthy gums and dental care**  
                - **Optimized for easy digestion**  
                - **Slow-cooked to retain nutrients and moisture**  
                - **Delicious taste while protecting your dog’s gums**  
                ",
                'price' => 219.00,
                'in_stock' => 1,
                'stock_quantity' => 210,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 102,
                'product_name' => 'Pack N Pride Chicken Nuggets Dog Treats 3.50z',
                'slug' => 'pack-n-pride-chicken-nuggets-dog-treats-350z',
                'images' => '["products\\/01JNX0YJAYNEM16QCSTY30FNJD.png"]',
                'description' => "
                - **Pack N Pride Chicken Nuggets - Premium Dog Treats**  
                - **No by-products, no fillers – just quality ingredients**  
                - **Perfect for sensitive stomachs**  
                - **Designed for optimal digestion**  
                - **Packed with nutrients and moisture through slow cooking**  
                - **A delicious and healthy reward for your furry friend**  
                ",
                'price' => 229.00,
                'in_stock' => 1,
                'stock_quantity' => 99,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 103,
                'product_name' => 'Entrée Gourmet Strawberry Smoothie Pet Treats 70g',
                'slug' => 'entree-gourmet-strawberry-smoothie-pet-treats-70g',
                'images' => '["products\\/01JNX124CATEPKR69HY9V2JHHH.png"]',
                'description' => "
                - **Entrée Gourmet Strawberry Smoothie Pet Treats - 70g**  
                - **Perfect for both cats and dogs**  
                - **High meat content with all-natural fruit flavors**  
                - **Great as a treat or positive reinforcement for training**  
                - **Not a main food source – should be given in moderation**  
                - **Feeding guide based on pet size**  
                ",
                'price' => 89.10,
                'in_stock' => 1,
                'stock_quantity' => 370,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 104,
                'product_name' => 'Treatos by Joey Dehydrated Pork Chips Dog Treats 40g',
                'slug' => 'treatos-by-joey-dehydrated-pork-chips-dog-treats-40g',
                'images' => '["products\\/01JNX1BQHSK837WR5PRG8TC55R.png"]',
                'description' => "
                - **Treatos by Joey - Dehydrated Pork Chips - 40g**  
                - **Excellent source of amino acids**  
                - **Perfect for dog nutrition and snacks**  
                - **Thin, crunchy texture - easily breakable by hand**  
                - **Highly rated by Taste Testers**  
                ",
                'price' => 265.00,
                'in_stock' => 1,
                'stock_quantity' => 450,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 105,
                'product_name' => 'Approved Water Feeder Head Find Aqua Brown',
                'slug' => 'approved-water-feeder-head-find-aqua-brown',
                'images' => '["products\\/01JNX2R7SME97JZ4EWGVSXAN3M.png"]',
                'description' => "
                - **Approved Water Feeder Head for Dogs**  
                - **Suitable for all breeds and life stages**  
                - **Improves posture and reduces joint stress**  
                - **Helps prevent water contamination**  
                - **Monitors dog's fluid intake**  
                - **Keeps dogs hydrated, even while traveling**  
                ",
                'price' => 164.75,
                'in_stock' => 1,
                'stock_quantity' => 80,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 106,
                'product_name' => 'Approved Water Feeder Head Find Aqua Pink',
                'slug' => 'approved-water-feeder-head-find-aqua-pink',
                'images' => '["products\\/01JNX2WFCMW6RT9SZA36PS3DCJ.png"]',
                'description' => "
                - **Approved Water Feeder Head for Dogs**  
                - **Suitable for all breeds and life stages**  
                - **Improves posture and reduces joint stress**  
                - **Prevents water contamination**  
                - **Monitors dog's fluid intake**  
                - **Keeps dogs hydrated, even while traveling**  
                ",
                'price' => 164.75,
                'in_stock' => 1,
                'stock_quantity' => 21,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 107,
                'product_name' => 'Approved Syringe (Scissor Type) Feeding Kit 5195',
                'slug' => 'approved-syringe-scissor-type-feeding-kit-5195',
                'images' => '["products\\/01JNX2ZDMYZMTKQ6GXYEKAY86P.png"]',
                'description' => "
                - **Safe and Durable**: Made from high-quality, non-toxic, pet-friendly materials.  
                - **Ergonomic Design**: Circular handle for a secure grip and easy control.  
                - **Multi-Purpose**: Suitable for administering liquid medicine, tablets, or feeding baby animals.  
                - **User-Friendly**: Designed for comfortable use without harming pets' teeth, gums, or cheeks.  
                - **How to Use**:  
                  1. Load the pill or liquid into the syringe.  
                  2. Open pet’s mouth and insert toward the back of the throat.  
                  3. Push the piston quickly for easy administration.  
                ",
                'price' => 174.75,
                'in_stock' => 1,
                'stock_quantity' => 199,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 108,
                'product_name' => 'Bark and Spark Ordinary Stainless Steel Dog Bowl 64oz',
                'slug' => 'bark-and-spark-ordinary-stainless-steel-dog-bowl-64oz',
                'images' => '["products\\/01JNX474RTQ2YTKX1DRY2K834P.png"]',
                'description' => "
                - **Certified Original Bark and Spark Brand**  
                - **High-Quality SUS 304 Stainless Steel for Durability**  
                - **Non-Slip, Non-Spill, and Skid-Proof Design**  
                - **Powder-Coated for Easy Cleaning**  
                - **Large 64oz Capacity, Ideal for Bigger Dog Breeds**  
                - **Diameter: 21cm | Height: 8cm**  
                ",
                'price' => 549.00,
                'in_stock' => 1,
                'stock_quantity' => 703,
                'is_active' => 1,
                'has_variant' => 1, // Possible variants for different sizes
                'created_at' => now(),
            ],
            [
                'id' => 109,
                'product_name' => 'Pet Pals Separated Basket Pet Stroller Grey',
                'slug' => 'pet-pals-separated-basket-pet-stroller-grey',
                'images' => '["products\\/01JNX4G2XHX3TKZZSDDTZC2RH3.png"]',
                'description' => "
                - **2-in-1 Pet Carrier & Stroller**  
                - **Durable Aluminum Frame with Extra-Large Basket**  
                - **Three-Point Fixation for Stability**  
                - **Universal & Directional Front Wheels, Quick-Release Rear Wheels**  
                - **Folding Design for Easy Storage & Travel**  
                - **Available in Grey & Black**  
                - **Weight: 6.06 KGS | Dimensions: 42x15x76.5cm**  
                ",
                'price' => 3999.00,
                'in_stock' => 1,
                'stock_quantity' => 150,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 110,
                'product_name' => 'Pet Pals Rainbow Unicorn Tutu Set Dog Costume Small',
                'slug' => 'pet-pals-rainbow-unicorn-tutu-set-dog-costume-small',
                'images' => '["products\\/01JNX4RFQ1KZFHSVZDDMM1D7NH.png"]',
                'description' => "
                - **Pet Clothes - Unicorn Tutu Set**  
                - **Soft and breathable fabric**  
                - **Collared neckline and easy-wear**  
                - **Perfect for special occasions**  
                - **Available in Small and Medium sizes**  
                - **Keeps your dog cool, adorable, and comfortable**  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 25,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 111,
                'product_name' => 'Pet Pals Rainbow Unicorn Tutu Set Dog Costume Medium',
                'slug' => 'pet-pals-rainbow-unicorn-tutu-set-dog-costume-medium',
                'images' => '["products\\/01JNX4TJCPDH73FNQEB4KG68X7.png"]',
                'description' => "
                - **Pet Clothes - Unicorn Tutu Set**  
                - **Soft and breathable fabric**  
                - **Collared neckline and easy-wear**  
                - **Perfect for special occasions**  
                - **Available in Small and Medium sizes**  
                - **Keeps your dog cool, adorable, and comfortable**  
                ",
                'price' => 299.00,
                'in_stock' => 1,
                'stock_quantity' => 59,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 112,
                'product_name' => 'Approved Hand Carrier Rectangular Happy Pink',
                'slug' => 'approved-hand-carrier-rectangular-happy-pink',
                'images' => '["products\\/01JNX4Y8N30HQEMAF3YT211PG4.png"]',
                'description' => "
                - **Sized for small dogs and cats**  
                - **Assembles easily with no tools needed**  
                - **Lightweight and durable material**  
                - **Easy access and ventilated**  
                - **Removable shoulder strap**  
                - **Includes comfortable and soft wool pad**  
                - **Carries cats and dogs less than 10kg**  
                - **Made of Polyurethane material**  
                ",
                'price' => 2199.00,
                'in_stock' => 1,
                'stock_quantity' => 150,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 113,
                'product_name' => 'Approved Cat Scratch Post Blue',
                'slug' => 'approved-cat-scratch-post-blue',
                'images' => '["products\\/01JNX5YK9PQJ1GGCS78EY61YYK.png"]',
                'description' => "
                - **Forest-Inspired Design**  
                - **Multiple levels and platforms for climbing and jumping**  
                - **Soft and plush materials for comfort**  
                - **Cozy hideaway or perch for relaxation**  
                - **Ideal for your cat’s play and rest**  
                ",
                'price' => 1749.00,
                'in_stock' => 1,
                'stock_quantity' => 43,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 114,
                'product_name' => 'Aozi Wet Dog Food 15 pouches 100g',
                'slug' => 'aozi-wet-dog-food-15-pouches-100g',
                'images' => '["products\\/01JNX6PFHXCC5XSA4A2HQYYEGY.png"]',
                'description' => "
                - **Liver, Salmon and Liver, Beef and Liver, Chicken and Liver flavors**  
                - **For dogs of all breeds and life stages**  
                - **Pure natural organic food with no preservatives, artificial flavoring, coloring, or GMO**  
                - **Special wet food formula for bone health, dental care, and immunity**  
                ",
                'price' => 885.00,
                'in_stock' => 1,
                'stock_quantity' => 133,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],                                                                                                                                                                                                                                                                            
        ]);
    }
}
