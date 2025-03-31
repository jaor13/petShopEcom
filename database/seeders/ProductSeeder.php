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
                'description' => "
* hello
* Made of thick plastic material.
* Detachable food bowl.
* Length: 10.6 inches, Width: 4.9 inches, Height: 2.3 inches.
* Food Bowl Diameter: 4.5 inches x 4.5 inches x 1.5 inches.
* Paw-fectly made!
                ",
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
* 2-in-1 insulated water bottle with detachable bowls.
* Holds both cold and hot water (16oz stainless steel body).
* Ergonomic handle for easy carrying.
* Safety lock for a hands-free experience.
* Wide mouth for easy cleaning and adding ice cubes.
* Detachable pet bowl for convenience.
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
* The first 3-in-1 insulated, stainless-steel water bottle with detachable pet bowls.  
* Holds both cold and hot water (32oz stainless steel body).  
* Includes 2 detachable bowls for pet food and water.  
* Wide-mouth design for easy cleaning.  
* Ergonomic handle for convenient carrying.  
* Security lock to clip the bottle to your bag.  
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
* Secure and comfortable travel carrier for pets.  
* Perfect for home or travel use.  
* Durable construction with reinforced sidewalls.  
* Easy to clean plastic design.  
* Assembles in minutes—no tools required.  
* Flow-through ventilation and safety door locks.  
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
* Secure and comfortable travel carrier for pets.  
* Perfect for home or travel use.  
* Durable construction with reinforced sidewalls.  
* Easy to clean plastic design.  
* Assembles in minutes—no tools required.  
* Flow-through ventilation and safety door locks.  
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
* Secure and comfortable travel carrier for pets.  
* Perfect for home or travel use.  
* Durable construction with reinforced sidewalls.  
* Easy to clean plastic design.  
* Assembles in minutes—no tools required.  
* Flow-through ventilation and safety door locks.  
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
* Color Available: Blue.  
* Perfect for fun and bath time.  
* Easy to fold, set up, and drain.  
* Portable and UV-resistant.  
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
* Color Available: Blue.  
* Perfect for fun and bath time.  
* Easy to fold, set up, and drain.  
* Portable and UV-resistant.  
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
* Made with thick rubber material.  
* Available in Blue and Pink colors.  
* Dimensions: 4 inches (L) x 2 inches (W) x 1 inch (H).  
* Durable and safe for pets.  
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
* Colors Available: White  
* Material: PP Cotton, SQUEAKY TOYS  
* Washable material keeps it safe & clean  
* Made with washable polyester material  
* Not designed for aggressive chewers  
* Encourages playfulness and bonding between you and your pet  
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
* Doggo Tough Twister  
* Bouncing Dog Toy  
* Made of ultra-tough and non-toxic rubber  
* Good for big doggos  
* Size: 7.8 inches  
* Paw-fectly made!  
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
* Doggo Small Wrecking Ball  
* Rubber Toy  
* Good for small-sized dogs  
* Comes in colors Pink and Blue  
* Small: Length 11 inches, Width 2 inches, Height 2 inches  
* Paw-fectly made!  
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
* Doggo Tough Tire Dog Toy  
* Made of thick and non-toxic rubber  
* Large: Length 7 inches, Width 7 inches, Height 1.75 inches  
* Paw-fectly made!  
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
* Doggo Ropey Slipper Dog Toy  
* Made with thick fiber  
* Good for small-sized dogs  
* Comes in colors Blue and Pink  
* Length: 5.5 inches, Width: 2.5 inches, Height: 2 inches  
* Paw-fectly made!  
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
* Doggo Tough Grenade  
* Bouncing Dog Toy  
* Made of ultra-tough and non-toxic rubber  
* Good for big doggos  
* Size: 6.1 inches  
* Paw-fectly made!  
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
* Bouncing Toy  
* Ultra Tough Rubber - Non-Toxic  
* Good for big doggos  
* Paw-fectly made!  
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
* Colors Available: Blue, Pink, Orange  
* Material: Durable Cotton Rope  
* Encourages playfulness and bonding between you and your pet  
* Great for teething, chewing, tossing, fetching, and stress relief  
* Helps redirect bad biting behavior and improve dental health  
* Not for aggressive chewers  
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
* Doggo Double Ball Dog Toy  
* Rubber toy  
* Good for small and big dogs  
* Comes in colors Blue and Pink  
* Length: 6.5 inches, Width: 2 inches, Height: 2 inches  
* Paw-fectly made!  
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
* Doggo Tough Mallows  
* Bouncing Dog Toy  
* Made of ultra-tough and non-toxic rubber  
* Good for big doggos  
* Size: 4 inches  
* Paw-fectly made!  
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
* Doggo Tough Barbell  
* Bouncing Dog Toy  
* Made of ultra-tough and non-toxic rubber  
* Good for big doggos  
* Size: 7.8 inches  
* Paw-fectly made!  
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
* Doggo Tough Football  
* Bouncing Dog Toy  
* Made of ultra-tough and non-toxic rubber  
* Good for big doggos  
* Size: 7 inches  
* Paw-fectly made!  
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
* Doggo Tough Spinner  
* Bouncing Dog Toy  
* Made of ultra-tough and non-toxic rubber  
* Good for big doggos  
* Size: 5.6 inches  
* Paw-fectly made!  
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
* Doggo Spiky Hoop Dog Toy  
* Made with thick rubber material  
* Comes in colors Blue and Pink  
* Length: 3 inches, Width: 3 inches, Height: 1 inch  
* Paw-fectly made!  
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
* Kit Cat Kitty Crunch Chicken Cat Treats  
* Created by nutritionists who are cat lovers  
* Made with carefully selected ingredients  
* Rich in Omega 3 and Omega 6  
* Taurine Added  
* No Pork, No Lard  
* Hairball Control  
* Feed 47g per 2kg of body weight per day  
* Store in a cool, dry place; refrigerate unused portion for up to 2 days  
* For cats over 2 months old, mix with other nutritional food  
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
* Rich in Omega 3 and Omega 6  
* Taurine Added  
* No Pork, No Lard  
* Hairball Control  
* Feed 47g per 2kg of body weight per day  
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
* Reduces risk of urinary issues  
* Helps reduce plaque and tartar  
* Infused with cranberry extract  
* Crunchier texture for effective cleaning  
* Scientifically designed unique shape  
* Suitable for all life stages  
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
* Kit Cat Purr Puree cat treats (4x15g)  
* Created with carefully selected natural ingredients  
* Smooth blend of chicken or tuna  
* No added colors or preservatives  
* Grain-free, delicious, and natural  
* Enriched with Omega 3 and 6, Taurine, Prebiotic, and Vitamin E  
* No Pork, No Lard  
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
* Made with real farm-raised chicken and deep-sea caviar  
* Unique lickable creamy treats  
* No pork, No lard, Grain-free  
* Enriched with fish oil, taurine, and prebiotics  
* Can be hand-fed or used as a bowl topper  
* Suitable for cats 6 months and up  
* Feed 1-3 treats per day  
* Always provide fresh water  
* Store in a cool, dry place (Shelf life: 36 months)  
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
* Semi-moist functional snack  
* Enriched with fennel and kelp for digestion support  
* Complementary cat food  
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
* Functional grain-free snack for silky coat and healthy skin  
* Contains Marigold, Salmon Oil, and Sea Buckthorn  
* Complementary semi-moist cat food  
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
* Kit Cat Purr Puree Chicken and Smoked Fish  
* Created with carefully selected natural ingredients  
* Smooth blend of chicken or tuna  
* No added colors or preservatives  
* Grain-free, delicious, and natural  
* Enriched with Omega 3 and 6, Taurine, Prebiotic, and Vitamin E  
* No Pork, No Lard  
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
* Made with duck and deep-sea caviar  
* Unique lickable creamy treats  
* No pork, No lard, Grain-free  
* Enriched with fish oil, taurine, and prebiotics  
* Can be hand-fed or used as a bowl topper  
* Suitable for cats 6 months and up  
* Feed 1-3 treats per day  
* Always provide fresh water  
* Store in a cool, dry place (Shelf life: 36 months)  
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
* Made with real white meat tuna and crab  
* Soft chewy texture  
* No pork, lard, and grain-free  
* Contains Taurine and prebiotics for immunity and digestion  
* Added catnip to enhance taste  
* Small bite-size snacks, perfect for training  
* Suitable for cats 6 months and up  
* Always provide fresh water  
* Store in a cool, dry place (Shelf life: 36 months)  
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
* Made with real white meat tuna and shrimp  
* Soft chewy texture  
* No pork, lard, and grain-free  
* Contains Taurine and prebiotics for immunity and digestion  
* Added catnip to enhance taste  
* Small bite-size snacks, perfect for training  
* Suitable for cats 6 months and up  
* Always provide fresh water  
* Store in a cool, dry place (Shelf life: 36 months)  
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
* Functional snack for healthy teeth and gums  
* Grain-free  
* Contains Basil, Thyme, Rosemary, and Vitamin C  
* Complementary semi-moist cat food  
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
* Flavor: Beef & Cheese  
* High-quality soft chews for dogs of all ages  
* All-natural, flavorful, chewy treats  
* Bite-sized: Perfect for training rewards  
* Your pup will love it!  
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
* Suitable for puppies  
* Comes in Beef, Chicken, and Milk flavors  
* Rich in Protein and Vitamin B for a healthier and shinier coat  
* Low fat, high protein  
* Premium quality  
* Easy digestion  
* Paw-fectly made!  
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
* Flavor: Beef & Cheese  
* High-quality soft chews for dogs of all ages  
* All-natural, flavorful, chewy treats  
* Bite-sized: Perfect for training rewards  
* Your pup will love it!  
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
* Flavor: Beef & Cheese  
* High-quality soft chews for dogs of all ages  
* All-natural, flavorful, chewy treats  
* Bite-sized: Perfect for training rewards  
* Your pup will love it!  
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
* Suitable for adult dogs  
* Comes in Beef and Chicken flavors  
* Rich in Protein and Vitamin B for a healthier and shinier coat  
* Low fat, high protein  
* Premium quality  
* Easy digestion  
* Paw-fectly made!  
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
* Premium dog snack filled with nutrients and vitamins  
* Tempting strawberry flavor dogs love  
* Stick form, great for all dog breeds  
* Made from real chicken meat  
* Researched and tested for hygiene and safety  
* Provides essential nutrients for a healthy and happy pup  
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
* Premium snack filled with nutrients and vitamins  
* Tempting Meat Stick flavor dogs can’t resist  
* Stick form, great for all dog breeds  
* Made from real chicken meat  
* Researched and tested for hygiene and safety  
* Provides essential nutrients for a healthy and happy pup  
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
* Extremely long-lasting compared to other chews  
* Naturally rich in protein and amino acids  
* Odorless and stainless  
* Made from naturally shed elk and deer antlers (cruelty-free and sustainable)  
* Biodegradable and eco-friendly  
* Size/Cut may vary  
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
* Made from beef tendon and beef lungs, sourced from grass-fed, farm-raised cows  
* Treat and chew in one, suitable for puppies (3+ months) and seniors  
* Small-batch production ensures freshness  
* No antibiotics, hormones, additives, or preservatives  
* **Key Benefits:**  
  * Reduces anxiety by promoting chewing and endorphin release  
  * Supports oral health by reducing tartar and plaque  
  * Contains collagen for skin and joint health  
* **Size Guide:** Approx. 7-inch skewers, sold per piece  
* **Chew Intensity:** Light  
* **Feeding Instructions:**  
  * Introduce slowly, monitor for allergies  
  * Always supervise while chewing  
  * Ensure fresh water availability  
  * Store in a cool, dry place (room temp: 6 months; refrigerate/freeze if half-eaten)  
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
* Acana Heritage Dry Food for adult dogs  
* Suitable for all breeds and life stages  
* Made with free-run chicken, wild-caught flounder, and cage-free eggs  
* Ingredients sourced from trusted farmers and fishers  
* Delivered fresh or raw in WholePrey ratios for optimal nutrition  
* High in meat protein for lean muscle mass and peak physical conditioning  
* Free of grains and gluten  
* Contains 60% meat—up to twice as much as many pet specialty foods  
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
* Acana Heritage Dry Food for adult dogs  
* Suitable for all breeds and life stages  
* Made with free-run chicken, wild-caught flounder, and cage-free eggs  
* Ingredients sourced from trusted farmers and fishers  
* Delivered fresh or raw in WholePrey ratios for optimal nutrition  
* High in meat protein for lean muscle mass and peak physical conditioning  
* Free of grains and gluten  
* Contains 60% meat—up to twice as much as many pet specialty foods  
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
* **Pure natural organic food**  
* Enriched with **Taurine** to support eye and heart health  
* Easy to digest, protects intestines and stomach  
* High-quality fresh meat rich in protein, making it delicious and nutritious  
* Fresh fruits and vegetables for balanced nutrition  
* Select deep-sea fish for protein, fat, and energy  
* Low-allergenic beef for cats with sensitive constitutions  
* **Urinary care formula**: Less salt, less oil, reduced burden on liver and kidneys  
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
* **Goodboy Original 20kg**  
* 100% Healthy Nutrition  
* **Beef Flavor**  
* Suitable for adult dogs of any breed (1 year and up)  
* Formulated to meet **AAFCO** nutritional standards for adult dogs  
* 100% nutritionally complete and balanced  
* **Slogan:** Eat Smart, Eat Healthy  
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
* **Acana Regionals Dry Food - Pacifica**  
* Suitable for all breeds and life stages  
* Loaded with **fresh, regional Canadian fish**  
* Sustainable and **wild-caught off North Vancouver Island**  
* Contains Pacific herring, pilchard, flounder, hake, and rockfish  
* Delivered **fresh or raw**, without long lists of additives  
* **Protein-rich** formula to promote peak physical conditioning  
* **Loaded with 57% fish**  
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
* **Grain-free and Potato-free formula** suitable for adult dogs of all breeds  
* **Salmon** is a highly digestible protein source with anti-inflammatory properties  
* **Rich in Omega-3** for mental development, cardiovascular health, and metabolism  
* Supports **eye health**, **coat shine**, and **skin quality**  
* Contains **70% wild-origin meats** and **30% forest fruits, vegetables, and berries**  
* Inspired by the natural diet of dogs before agriculture, using modern production techniques  
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
* **For Adult Dogs of All Breeds**  
* Unique **hair beautifying formula** with **Omega-3 and Omega-6**  
* **Easy to digest** and supports **joint and bone health**  
* **Low-allergenic beef** for dogs with sensitive constitutions  
* **Prebiotics (FOS) & beet pulp** for improved intestinal health  
* **Supports immunity** with antioxidants (Vitamin C, Vitamin E, Lutein)  
* Contains **nutritious egg and spinach** for essential micronutrients  
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
* **For all breeds and life stages**  
* Features **free-run chicken, turkey, and cage-free eggs**  
* Ingredients sourced from **prairie farms**, delivered **fresh or raw**  
* **Whole Prey ratios** provide balanced nutrition  
* Includes **home-grown steel-cut oats** for stable blood sugar levels  
* **Gluten-free**  
* **50% meat content**, up to twice as much as most pet specialty foods  
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
* **For all breeds and life stages**  
* Made with **sustainable wild-caught fish** from North Vancouver Island  
* **Fresh and whole ingredients** bursting with flavor and nutrients  
* **Rich in Omega-3 fatty acids** for healthy skin, coat, and brain function  
* **50% fish content**, up to twice as much as many pet specialty foods  
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
* **For Cats of All Breeds**  
* Contains **salmon, fresh meat, fruits, and vegetables**  
* **Easy to digest**, protects the **intestine and stomach**  
* **No antibiotics, growth hormones, or synthetic colors**  
* **Low allergenic** - No ingredients that cause skin allergies  
* **Less salt, less oil**, reducing burden on **liver and kidney**  
* **Improves immunity** with antioxidants and prebiotics (FOS)  
* **Healthy skin and glossy fur** with vitamins from fruits & vegetables  
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
* **Odor-neutralizing cleaning pet wipes**  
* Ideal for use **between washes** or after long walks  
* **Perfect for in-between washes** (after walks, after playtime)  
* **Easy alternative to bathing** for pets that dislike water  
* **Gentle and safe formula**  
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
* **Removes dirt and odors**  
* Keeps pet **coat clean and fresh**  
* **Perfect for in-between washes** (after walks, after playtime)  
* Helps with **odor control** for pets that need it  
* **Gentle and safe formula**  
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
* **Washable diaper** for **female dogs**  
* **Size: X-Small**  
  * **Waist:** 25.4cm  
  * **Tail opening:** 13.3cm  
  * **Waist to tail:** 20.3cm  
* **Leak-proof & super absorbent**  
* **Elasticated waist** for a comfortable fit  
* **Machine washable** for easy cleaning  
* **Velcro fastening** for a secure hold  
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
* **Safe for use on pets** (eyes, ears, and body)  
* **Infused with lemongrass and mint** for natural protection  
* **Perfect for in-between washes** (after walks and playtime)  
* **Alcohol-free formula**  
* **Effective against ticks and fleas** while keeping pets clean  
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
* **Purry Dental Set** (90g Dog Toothpaste + 3pcs Toothbrush)  
* **Made of natural ingredients** to promote **dental health & fresh breath**  
* **For Dogs & Puppies / Cats & Kittens**  
* **Set includes:**  
  * 90g **Fresh Mint Flavor Toothpaste**  
  * **2x Dog Finger Brushes**  
  * **1x Dog Toothbrush**  
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
* **100% natural, eco-friendly stain remover**  
* **Hypoallergenic & pH neutral**  
* **Penetrates deep into fabric** to lift and break down embedded stains  
* **Supports pet health and environment-friendly living**  
* **Promotes a cleaner, healthier space for pets**  
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
* **100% leak-proof guarantee**  
* **Made from 65% certified post-consumer recycled plastic**  
* **Extra strong & extra long** (9\" x 13\") to protect hands  
* **Compact & convenient** for on-the-go use  
* **Unscented**  
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
* **Soft cotton surface** for ultimate comfort  
* **Fur-friendly magic tape** prevents discomfort  
* **Quick-dry & super absorbent** for leak-proof protection  
* **Open design for tail** ensuring a snug fit  
* **Versatile use** for females in heat, puppies, excited urination, and incontinence management  
* **Certified Original Bark and Spark Brand** for guaranteed authenticity  
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
* **100% leak-proof guarantee**  
* **Made from 65% certified post-consumer recycled plastic**  
* **Extra strong & extra long** (8\" x 13\") for ultimate protection  
* **Compact & convenient** for on-the-go use  
* **Unscented for those who prefer a neutral option**  
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
* **Gentle & effective paw cleanser** for all pets  
* **Sterilizes & removes bacteria** to promote pet hygiene  
* **Odor-eliminating formula** keeps paws fresh  
* **Moisturizing & prevents drying** for soft, healthy feet  
* **Soft silicone brush** for a comfortable massage experience  
* **Versatile use** for dogs, cats, rabbits, and more  
* **Convenient foam application** for hassle-free cleaning  
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
* **Sharp stainless steel blades** for precise grooming  
* **Rubber handle grip** for comfort and control  
* **Easy to clean & suitable for all fur types**  
* **Non-slip ergonomic design** for stress-free grooming  
* **Compact size:** Length: 5.5 inches | Width: 0.3 inches | Height: 0.3 inches  
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
* **Gentle clean** with plant-based materials  
* **Hypoallergenic & dermatologist tested** for sensitive skin  
* **Durable & soft** for easy grooming  
* **Infused with lavender scent** for a calming effect  
* **Leaping Bunny Cruelty-Free certified**  
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
* **Gentle clean** with plant-based materials  
* **Hypoallergenic & dermatologist tested** for sensitive skin  
* **Durable & soft** for easy grooming  
* **Unscented formula** for pets with fragrance sensitivities  
* **Leaping Bunny Cruelty-Free certified**  
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
* **Gentle clean** with plant-based materials  
* **Hypoallergenic & dermatologist tested** for sensitive skin  
* **Durable & soft** for easy grooming  
* **Infused with lavender scent** for a calming effect  
* **Leaping Bunny Cruelty-Free certified**  
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
* **Eco-friendly 100% natural bamboo** comb  
* **16 rotating stainless steel teeth** for smooth grooming  
* **Ergonomic anti-static handle** for comfortable grip  
* **Reduces shedding & promotes a healthy, shiny coat**  
* **Perfect for detangling, activating blood circulation, and natural oil distribution**  
* **Size:** 5.5 x 21.5cm  
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
* **Eliminates pet odors instantly & permanently**  
* **Infused with sweet orange scent** for a fresh-smelling home  
* **Kills 99.9% of odor-causing microbes**  
* **Safe for pets and humans**  
* **Ideal for homes, pet shops, grooming facilities, vet clinics, and kennels**  
* **Easy to use: spray directly on pets or surfaces**  
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
* **Eco-friendly bamboo construction** (FSC certified)  
* **Perfect for grooming, detangling, and combing all coat types**  
* **Ergonomic anti-static handle for better grip**  
* **Corrosion-resistant stainless steel bristles** with rotating teeth  
* **Promotes a healthy, shiny coat by distributing natural oils**  
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
* **Eco-friendly bamboo brush** (FSC certified)  
* **Ideal for grooming, detangling, and maintaining all coat types**  
* **Anti-static handle for comfortable grip**  
* **Corrosion-resistant stainless steel bristles** with rotating teeth  
* **Helps reduce shedding and maintain coat health**  
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
* **Premium natural pet shampoo** (paraben-free, sulfate-free, pH balanced)  
* **Madre de Cacao:** Fights mites, fleas, and ticks; antibacterial and healing properties  
* **Lavender:** Soothes skin, relieves itching, and reduces dog odor  
* **Neem & Aloe Vera Variant Available:** Anti-fungal, anti-inflammatory, moisturizing, and healing properties  
* **Bamboo & Acapulco Variant Available:** Anti-bacterial, anti-fungal, and coat-conditioning benefits  
* **Tear-free formula, safe for pets**  
* **How to use:** Lather onto wet coat, massage, rinse thoroughly  
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
* **Dual-sided brush for comprehensive grooming**  
* **Pin side detangles dead undercoat, bristle side removes dirt**  
* **Ergonomic anti-static handle for comfort**  
* **Corrosion-resistant stainless steel bristles with rotating teeth**  
* **Made from eco-friendly FSC-certified bamboo**  
* **Perfect for grooming, combing, and detangling**  
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
* **Promotes healthy skin & a shiny, soft coat**  
* **Rich in antioxidants, vitamins, minerals, and Omega fatty acids**  
* **Suitable for both dogs and cats**  
* **Delicious chicken-flavored chews**  
* **Feeding Instructions:**  
  * **Dogs:**  
    * ≤ 25 lbs: 5 chews/day  
    * 25 to 75 lbs: 10 chews/day  
    * ≥ 75 lbs: 15 chews/day  
  * **Cats:**  
    * ≤ 25 lbs: 3 chews/day  
    * 25 to 75 lbs: 5 chews/day  
    * ≥ 75 lbs: 8 chews/day  
* **Storage:** Keep sealed, away from heat, sunlight, and humidity  
* **Caution:** Not for ruminants  
* **Ingredients:** Chicken breast, chicken liver, chicken meal, chicken oil, potato, brown rice, pea, sweet potato, fish oil, sunflower seed oil, vitamin E, and more  
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
* **Promotes healthy skin & a shiny, soft coat**  
* **Rich in antioxidants, vitamins, minerals, and Omega fatty acids**  
* **Delicious beef-flavored chews for both dogs and cats**  
* **Feeding Instructions:**  
  * **Dogs:**  
    * ≤ 25 lbs: 5 chews/day  
    * 25 to 75 lbs: 10 chews/day  
    * ≥ 75 lbs: 15 chews/day  
  * **Cats:**  
    * ≤ 25 lbs: 3 chews/day  
    * 25 to 75 lbs: 5 chews/day  
    * ≥ 75 lbs: 8 chews/day  
* **Storage:** Keep sealed, away from heat, sunlight, and humidity  
* **Caution:** Not for ruminants  
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
* **Supports healthy digestion and nutrient absorption**  
* **Replenishes good bacteria in your pet's gut**  
* **Strengthens the immune system**  
* **Feeding Instructions:**  
  * ≤ 10kg: 2 chews/day  
  * 11-30kg: 4 chews/day  
  * ≥ 30kg: 6 chews/day  
* **Storage:** Keep sealed, away from heat, sunlight, and humidity  
* **Caution:** Not for ruminants  
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
* **Supports healthy digestion and nutrient absorption**  
* **Replenishes good bacteria in your pet's gut**  
* **Strengthens the immune system**  
* **Feeding Instructions:**  
  * ≤ 10kg: 2 chews/day  
  * 11-30kg: 4 chews/day  
  * ≥ 30kg: 6 chews/day  
* **Storage:** Keep sealed, away from heat, sunlight, and humidity  
* **Caution:** Not for ruminants  
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
* **8+ Health Benefits in Every Bite**  
* **Probiotics, Glucosamine, and Vitamins for strong joints and a shiny coat**  
* **Vet-approved and non-GMO**  
* **Feeding Guide:** Start with 1 chew daily, increase to 2 over time  
* **Key Ingredients:**  
  * Glucosamine, MSM, Chondroitin, Coenzyme Q10  
  * Vitamins A, C, D3, E, B1, B2, B5, B6, B12, Folic Acid  
  * Sodium Chloride, Probiotics  
* **Quality Assurance:** 30-day money-back guarantee, fast shipping, and COD available  
* **FAQs:**  
  * **Suitable for all cat breeds?** Yes!  
  * **Will it cause weight gain?** No, it’s formulated for balanced nutrition  
  * **Safe for cats with allergies?** Consult your vet before use  
  * **How soon will I see results?** Typically within a month  
* **Storage:** Keep sealed, away from heat and humidity  
* **Disclaimer:** Introduce gradually and consult a vet if reactions occur  
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
* **Treatment for Fleas, Larvae, Spirocerca lupi, Hookworm, Whipworm, Roundworm, Angiostrongylus, Heartworm, Otodectes, Sarcoptes, Demodex**  
* **Package Size:** 3 Pipettes  
* **Benefits:**  
  * Prevents flea infestation  
  * Treats ear mites, sarcoptic mange, and demodicosis  
  * Prevents heartworm disease  
  * Treats gastrointestinal nematodes  
  * Can be used as part of a treatment strategy for flea allergy dermatitis (FAD)  
* **Not for puppies under 7 weeks of age**  
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
* **Helps promote hip, joint, and connective tissue function**  
* **Promotes mobility and flexibility**  
* **Helps ease aches & discomfort in bones & joints**  
* **Feeding Instructions for Dogs:**  
  * ≤ 25 lbs: 5 chews/day  
  * 25 to 75 lbs: 10 chews/day  
  * ≥ 75 lbs: 15 chews/day  
* **Feeding Instructions for Cats:**  
  * ≤ 25 lbs: 3 chews/day  
  * 25 to 75 lbs: 5 chews/day  
  * ≥ 75 lbs: 8 chews/day  
* **Storage Condition:** Seal Properly. Keep out of heat, sunlight, and humidity.  
* **Caution:** Do not feed ruminants.  
* **Key Ingredients:** Chicken breast, Chicken liver, Chicken meal, Chicken oil, Potato, Brown rice, Pea, Sweet potato, Fish oil, Sunflower seed oil, Lecithin, Zinc methionine, D-Biotin, Vitamin E, Potassium sorbate, Caramel, Rosemary extract.  
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
* **Supports strong bones and joints**  
* **Promotes mobility and flexibility**  
* **Reduces joint pain and discomfort**  
* **Feeding Instructions for Dogs:**  
  * ≤ 25 lbs: 5 chews/day  
  * 25 to 75 lbs: 10 chews/day  
  * ≥ 75 lbs: 15 chews/day  
* **Feeding Instructions for Cats:**  
  * ≤ 25 lbs: 3 chews/day  
  * 25 to 75 lbs: 5 chews/day  
  * ≥ 75 lbs: 8 chews/day  
* **Storage Condition:** Seal Properly. Keep out of heat, sunlight, and humidity.  
* **Caution:** Do not feed ruminants.  
* **Key Ingredients:** Chicken breast, Chicken liver, Chicken meal, Chicken oil, Potato, Brown rice, Pea, Sweet potato, Fish oil, Sunflower seed oil, Lecithin, Zinc methionine, D-Biotin, Vitamin E, Potassium sorbate, Caramel, Rosemary extract.  
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
* **Vet-recommended hip & joint support meal topper**  
* **Enhances joint mobility and flexibility**  
* **100% safe for all dog breeds and ages**  
* **Breakthrough science-based formula for joint pain relief**  
* **Key Ingredients:**  
  * **Glucosamine:** Supports cartilage and joint lubrication  
  * **MSM:** Reduces inflammation and eases joint pain  
  * **Chondroitin:** Helps prevent joint stiffness and discomfort  
* **Benefits:**  
  * Supports healthy joints and ligaments  
  * Reduces pain and swelling  
  * Delicious meal topper alternative to pills and tablets  
* **Recommended Usage:** Add to your dog's food daily for best results.  
* **Storage:** Keep sealed, away from heat and moisture.  
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
* **A delicious meal topper that helps calm your dog and reduce excessive barking**  
* **Formulated by vets with non-drowsy, non-medicated ingredients**  
* **100% safe for all dog breeds and ages**  
* **Vet recommended and trusted by thousands of pet owners worldwide**  
* **Key Ingredients:**  
  * **L-Tryptophan:** Supports serotonin production for mood regulation  
  * **Valerian Root:** Naturally reduces stress and promotes relaxation  
  * **Chamomile Extract:** Soothes nerves, provides antioxidants, and aids digestion  
* **Usage:** Simply sprinkle over your dog's food daily for best results  
* **Storage:** Keep sealed, away from heat and humidity  
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
* **Mild and gentle pet shampoo that cleans and deodorizes your pet's coat**  
* **pH-balanced formula that moisturizes and refreshes**  
* **Vet-approved and paraben-free**  
* **Scent:** Satsuma Peach  
* **Safe for regular use on dogs and cats**  
* **Storage:** Keep in a cool, dry place, away from direct sunlight  
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
* **2-in-1 pet shampoo and conditioner for fluffy and furry pets**  
* **pH-balanced formula, safe for both cats and dogs**  
* **Contains Fluff Complex to improve fur manageability and reduce frizz**  
* **Infused with Keratin for fur restructuring, conditioning, and color protection**  
* **Paraben-free and vet-approved**  
* **Storage:** Keep sealed, away from direct sunlight and moisture  
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
* **Large 1L bottle of 2-in-1 pet shampoo and conditioner**  
* **Perfect for fluffy and furry pets**  
* **pH-balanced formula, safe for both cats and dogs**  
* **Fluff Complex for fur manageability, volume, and frizz control**  
* **Infused with Keratin to strengthen and protect fur**  
* **Paraben-free and safe for regular use**  
* **Storage:** Keep in a cool, dry place, away from heat and direct sunlight  
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
* **Furmagic Pink Dog Shampoo - Proven and tested quality**  
* **Safe and affordable pet care solution**  
* **Infused with Madre de Cacao, Neem Oil, and Aloe Vera extracts**  
* **Madre de Cacao extract helps eliminate mange, hotspots, and skin diseases**  
* **Fast-acting Stem Cell technology for instant magical effects**  
* **Suitable for regular use to maintain a healthy coat**  
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
* **Doggo Shampoo with a refreshing melon scent**  
* **Long-lasting deodorizing effect**  
* **Uses high-quality ingredients for the best care**  
* **Ensures a clean and fresh-smelling coat for your furry friend**  
* **Gentle formula, safe for regular use on dogs**  
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
* **Doggie's Choice Anti Mange Shampoo with Conditioner**  
* **Effective against mange, fungi, and parasitic infections**  
* **Contains Madre de Cacao for natural healing**  
* **Anti-fungal, anti-parasitic, and anti-bacterial properties**  
* **Not recommended for nursing dogs, sick pets, or puppies under 3 months old**  
* **Avoid contamination with water sources due to its strong formulation**  
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
* **Play Pets Pet Shampoo & Conditioner - Lavender Breeze Scent**  
* **Suitable for all dog and cat breeds, ages 6 weeks and up**  
* **Lavender aroma provides calming aromatherapy benefits**  
* **Repels harmful insects while keeping your pet’s coat soft and clean**  
* **Gentle and safe for regular use**  
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
* **Made with 100% neem aqueous extract**  
* **Naturally moisturizes, deodorizes, and detangles fur**  
* **Removes bacteria and repels stubborn ticks and fleas**  
* **Contains Madre de Cacao for skin healing benefits**  
* **Aloe Vera extract for a soft and shiny coat**  
* **Safe for dogs, cats, and even humans**  
* **Non-toxic, paraben-free, and biodegradable**  
* **No artificial colors**  
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
* **Brit Functional Snack - Endurance Lamb Dog Treats**  
* **Semi-moist complementary dog food**  
* **Lamb enriched with banana for added nutrition**  
* **Helps keep active dogs in proper condition**  
* **L-carnitine and taurine for energy and muscle support**  
* **Grain-free and potato-free formula**  
* **Fulvic acids to aid nutrient absorption**  
* **Cantaloupe melon extract for antioxidants**  
* **Collagen peptides for musculoskeletal regeneration**  
* **Lactobacillus acidophilus for intestinal health**  
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
* **Brit Functional Snack - Dental Venison Dog Treats**  
* **Semi-moist complementary dog food**  
* **Venison enriched with rosemary for dental health**  
* **Helps protect teeth and gums against tartar buildup**  
* **Contains kelp, cloves, and sodium hexametaphosphate for oral hygiene**  
* **Grain-free and potato-free**  
* **Fulvic acids aid in nutrient absorption**  
* **Cantaloupe melon extract for antioxidants**  
* **Collagen peptides for musculoskeletal regeneration**  
* **Lactobacillus acidophilus for digestive health**  
* **EU-made quality snacks**  
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
* **Brit Functional Snack - Dental Venison Dog Treats**  
* **Semi-moist complementary dog food**  
* **Venison enriched with rosemary for oral care**  
* **Helps protect teeth and gums against tartar buildup**  
* **Contains kelp, cloves, and sodium hexametaphosphate for oral hygiene**  
* **Grain-free and potato-free**  
* **Fulvic acids support nutrient absorption**  
* **Cantaloupe melon extract for antioxidants**  
* **Collagen peptides regenerate musculoskeletal system**  
* **Lactobacillus acidophilus for gut health**  
* **EU-made premium quality**  
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
* **Brit Care Puppy Crunchy Snack - Insect with Whey**  
* **Enriched with probiotics for digestion**  
* **Supports healthy growth and development**  
* **Insect protein - highly digestible and low allergy risk**  
* **High in fatty acids for healthy skin and a shiny coat**  
* **Recyclable packaging with a low carbon footprint**  
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
* **Brit Functional Snack - Skin and Coat Krill**  
* **Semi-moist dog treat for skin and coat health**  
* **Krill enriched with coconut for hydration**  
* **Zinc and biotin for a healthy, shiny coat**  
* **Grain-free and potato-free formula**  
* **Collagen peptides for musculoskeletal support**  
* **Tyndallized Lactobacillus acidophilus for gut health**  
* **Rich in vitamin E and omega-3 fatty acids**  
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
* **Pack N Pride Ducky Nuggets - Premium Dog Treats**  
* **No by-products, no fillers – just quality ingredients**  
* **Perfect for sensitive stomachs**  
* **Designed for optimal digestion**  
* **Packed with nutrients and moisture through slow cooking**  
* **A delicious and healthy reward for your furry friend**  
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
* **Pack N Pride Rawhide Twist - Duck Dog Treats**  
* **Promotes healthy gums and dental care**  
* **Optimized for easy digestion**  
* **Slow-cooked to retain nutrients and moisture**  
* **Delicious taste while protecting your dog’s gums**  
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
* **Pack N Pride Chicken Nuggets - Premium Dog Treats**  
* **No by-products, no fillers – just quality ingredients**  
* **Perfect for sensitive stomachs**  
* **Designed for optimal digestion**  
* **Packed with nutrients and moisture through slow cooking**  
* **A delicious and healthy reward for your furry friend**  
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
* **Entrée Gourmet Strawberry Smoothie Pet Treats - 70g**  
* **Perfect for both cats and dogs**  
* **High meat content with all-natural fruit flavors**  
* **Great as a treat or positive reinforcement for training**  
* **Not a main food source – should be given in moderation**  
* **Feeding guide based on pet size**  
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
* **Treatos by Joey - Dehydrated Pork Chips - 40g**  
* **Excellent source of amino acids**  
* **Perfect for dog nutrition and snacks**  
* **Thin, crunchy texture - easily breakable by hand**  
* **Highly rated by Taste Testers**  
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
* **Approved Water Feeder Head for Dogs**  
* **Suitable for all breeds and life stages**  
* **Improves posture and reduces joint stress**  
* **Helps prevent water contamination**  
* **Monitors dog's fluid intake**  
* **Keeps dogs hydrated, even while traveling**  
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
* **Approved Water Feeder Head for Dogs**  
* **Suitable for all breeds and life stages**  
* **Improves posture and reduces joint stress**  
* **Prevents water contamination**  
* **Monitors dog's fluid intake**  
* **Keeps dogs hydrated, even while traveling**  
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
* **Safe and Durable**: Made from high-quality, non-toxic, pet-friendly materials.  
* **Ergonomic Design**: Circular handle for a secure grip and easy control.  
* **Multi-Purpose**: Suitable for administering liquid medicine, tablets, or feeding baby animals.  
* **User-Friendly**: Designed for comfortable use without harming pets' teeth, gums, or cheeks.  
* **How to Use**:  
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
* **Certified Original Bark and Spark Brand**  
* **High-Quality SUS 304 Stainless Steel for Durability**  
* **Non-Slip, Non-Spill, and Skid-Proof Design**  
* **Powder-Coated for Easy Cleaning**  
* **Large 64oz Capacity, Ideal for Bigger Dog Breeds**  
* **Diameter: 21cm | Height: 8cm**  
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
* **2-in-1 Pet Carrier & Stroller**  
* **Durable Aluminum Frame with Extra-Large Basket**  
* **Three-Point Fixation for Stability**  
* **Universal & Directional Front Wheels, Quick-Release Rear Wheels**  
* **Folding Design for Easy Storage & Travel**  
* **Available in Grey & Black**  
* **Weight: 6.06 KGS | Dimensions: 42x15x76.5cm**  
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
* **Pet Clothes - Unicorn Tutu Set**  
* **Soft and breathable fabric**  
* **Collared neckline and easy-wear**  
* **Perfect for special occasions**  
* **Available in Small and Medium sizes**  
* **Keeps your dog cool, adorable, and comfortable**  
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
* **Pet Clothes - Unicorn Tutu Set**  
* **Soft and breathable fabric**  
* **Collared neckline and easy-wear**  
* **Perfect for special occasions**  
* **Available in Small and Medium sizes**  
* **Keeps your dog cool, adorable, and comfortable**  
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
* **Sized for small dogs and cats**  
* **Assembles easily with no tools needed**  
* **Lightweight and durable material**  
* **Easy access and ventilated**  
* **Removable shoulder strap**  
* **Includes comfortable and soft wool pad**  
* **Carries cats and dogs less than 10kg**  
* **Made of Polyurethane material**  
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
* **Forest-Inspired Design**  
* **Multiple levels and platforms for climbing and jumping**  
* **Soft and plush materials for comfort**  
* **Cozy hideaway or perch for relaxation**  
* **Ideal for your cat’s play and rest**  
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
* **Liver, Salmon and Liver, Beef and Liver, Chicken and Liver flavors**  
* **For dogs of all breeds and life stages**  
* **Pure natural organic food with no preservatives, artificial flavoring, coloring, or GMO**  
* **Special wet food formula for bone health, dental care, and immunity**  
                ",
                'price' => 885.00,
                'in_stock' => 1,
                'stock_quantity' => 133,
                'is_active' => 1,
                'has_variant' => 1,
                'created_at' => now(),
            ],  
            [
                'id' => 115,
                'product_name' => 'Ronidazole',
                'slug' => 'ronidazole',
                'images' => '["products/01JQEWV2J7E1SQZ1HBN7M315QC.png"]',
                'description' => 'Key Benefits:
            
            Ronidazole is for the prevention and treatment of Trichomoniasis Canker, Hexamitosis, Giardia, Cochlosomosis, in all aviary birds and Pigeons.
            
            Recommended For:
            
            Birds of all species
            
            Directions:
            
            Cure: For large birds, Mix 1 teaspoon into 1 gallon of water for Budgerigars and larger birds and fancy pigeons. Treat for 7 days. Racing pigeons treat for 7 days every other week for a total of two doses.
            
            Cure: For small birds, finches and canaries: Mix 1 teaspoon into 1 quart of water and give for 7 days.
            
            Preventive:  May be given 4 times throughout the year and should always be given to the babies after fledging the nest.
            
            Mix fresh daily, and remove all other source of water.
            
            Can Be Used With:
            
            Amtyl, vitamins, calcium
            
            Side Effects:
            
            Notes:
            
            Ronidazole is safe to use during any stage of the breeding cycle. It is best to treat before setting the birds up for breeding. If you start losing babies in the nest then give the Ronidazole to the parents they will give it to the babies. If you have sick birds we recommend giving Amtyl also mixed with Ronidazole for 7 days.
            
            Always be sure to give a probiotic such as Probiotic Plus for 3 to 4 days to replace the good bacteria in the gut flora.
            
            Active Ingredients:
            
            60mg/g Ronidazole
            
            Manufacture:
            
            Pet Health
            
            Storage:
            
            Store in original sealed container in a cool dry place.
            
            More Information:
            
            Giardia is a parasite that is found in the small intestines of birds. Giardia occurs frequently in budgies, cockatiels, lovebirds, african grays, and gray cheeked parakeets, although other species also can become infected when ingesting the parasite. Birds will often appear without symptoms, but can show signs of loose droppings, weakness, depression, anorexia, yeast infections. Some birds will start itching and tearing out feathers. Canker symptoms to look for are, cheesy growth in the mouth or throat, visible lump in the neck or navel area, slow blinking, ruffled feathers, excessive thirst, loss of appetite, loss of weight. For these protozoal infections for Canker, Giardia, Trichomoniasis, Hexamitosis, Cochlosomosis, the bird must be treated with Ronidazoal in the drinking water for 7 days. Not treating the bird it will soon die. Trichomoniasis is also known as Canker. This parasite is found in the upper digestive tract of many avian species causing accumulation of necrotic material in the mouth and esophagus. It is principally a disease of younger birds and is often fatal. Symptoms to look for are, looks depressed, salivate excessively, looks emaciated, difficulty closing their mouth, display repeated swallowing movements, have watery eyes, have a puffy appearance of the neck, they will soon die from a blockage in the trachea, again don\'t hesitate to treat with the Ronidazole.',
                'price' => 601.93,
                'in_stock' => 1,
                'stock_quantity' => 300,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],               
            [
                'id' => 116,
                'product_name' => 'Calciboost Liquid',
                'slug' => 'calciboost-liquid',
                'images' => '["products/01JQEX9KTGF4E795ED15HZVE8G.png"]',
                'description' => 'Liquid calcium supplement for molting and growing birds.
            
            Calcium deficiencies can lead to egg binding, feather plucking, increased nervousness and death. Calciboost provides the needed calcium, Magnesium and D3 in an easily absorbed form.',
                'price' => 286.33,
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],          
            [
                'id' => 117,
                'product_name' => 'Potent Brew Liquid Probiotic',
                'slug' => 'potent-brew-liquid-probiotic',
                'images' => '["products/01JQEXC96J00JQV8DZ8ZZTY72Y.png"]',
                'description' => 'Potent Brew Restores beneficial bacteria to the gut of sick or stressed birds. Increases of breeding birds and improves chick survival rates. A LIVE, liquid probiotic that goes to work as soon as it hits the crop to improve digestion and discourage slow crop and feather plucking.
                
                Short shelf life product. (4-6 months). Add to foods or drinking water.
                
                Application: Add to fruit, soft food or soaked seed : Finches/canaries - 1 drop per bird, 1ml per 30 birds; Budgies - 2 drops per bird, 1 ml per 15 birds; Cockatiels - 4 drops per bird, 2.5 mls per 10 birds; African Greys - 15 drops per bird, 1 ml per pair. Do not use in the same drinking water as Aviclens (Saniclens).
                
                Add to water 5 ml per litre.
                
                Pack sizes: 50ml, 100ml, 250ml, 500ml.
                
                Shelf life: Normally 4-6 months',
                'price' => 429.79,
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],

            [
                'id' => 118,
                'product_name' => 'Calciboost Powder',
                'slug' => 'calciboost-powder',
                'images' => '["products/01JQEXFQ4P3JKS8SG0W74BKHJ1.png"]',
                'description' => 'Use in drinking water or sprinkle on soft foods, fruits and vegetables. Calciboost powder can also be added to hand rearing foods. 
                
                Calciboost Powder is great for sprinkling on foods. Also keeps hens from getting egg bound, helps in feather plucking, the nervous system, along with helping the muscles and bones.',
                'price' => 457.90,
                'in_stock' => 1,
                'stock_quantity' => 99,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],

            [
                'id' => 119,
                'product_name' => 'EasyBird Super Breeder',
                'slug' => 'easybird-super-breeder',
                'images' => '["products/01JQEXM7WMNH933ASD00TGXQKQ.png"]',
                'description' => 'EasyBird Super Breeder has the most effective supplement system for breeding birds in the world, combining five key products that were previously used separately. 
            
                During the breeding season, EasyBird Super Breeder supplies essential nutrients from Daily Essentials 3, Calcivet-Calciboost, Flourish, ProBoost SuperMax, and BioPlus. It is simply added to commercial soft food, finely chopped fresh fruit and vegetables, sprouted seeds, or soaked/cooked pulses. 
            
                **Note:** Since calcium is best not given daily, we strongly recommend leaving one or two supplement-free days per week.
            
                **Application:**
                - Feed EasyBird Super Breeder **5-6 days a week**.
                - Before the breeding season, add **50-75 grams** per kilogram of soft food, increasing gradually over **6 weeks**.
                - During the breeding season, add **100 grams per kg** of soft food.
                - Or, add **3 grams (1.2 level teaspoon)** per **kg of bird weight**.
            
                **1 kg of birds includes:**
                - 1 Large Macaw
                - 1 Pair of African Greys/Amazons
                - 5 Pairs of Cockatiels
                - 10 Pairs of Canaries
                - 30 Pairs of Small Finches
            
                **Ingredients:**
                - **High-value protein (65%)**
                - Essential Oils
                - Vitamins: A (260,000 IUs), D (26,000 IUs), E (600 mg), C, B1, B2, B6, B12, K, Biotin, Choline, Folic Acid, Niacin, Pantothenic Acid
                - Minerals: Calcium, Cobalt, Copper, Iodine, Iron, Magnesium, Manganese, Selenium, Sodium, Sulfur, Zinc
                - Selected health-supporting herbs & amino acids.',
                'price' => 894.00,
                'in_stock' => 1,
                'stock_quantity' => 159,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
        
            [
                'id' => 120,
                'product_name' => 'Liquid Kelp',
                'slug' => 'liquid-kelp',
                'images' => '["products/01JQEXQB8Q0P05RNCJ4GTW72Q8.png"]',
                'description' => 'Iodine deficiency is a common problem in many caged birds, especially Australian birds, which require more iodine than other pet birds. Iodine is essential for proper thyroid gland function. 
            
                **Deficiencies may cause:**
                - Poor feather condition
                - Difficulty molting
                - Breathing problems
                - Reduced singing
                - Low activity levels
                - Poor breeding success
            
                **Liqui-Kelp provides additional iodine** needed by Australian finches.
            
                **Usage Instructions:**
                - **For feather problems:** Mix **6 drops** in **2 cups of water** for **2 weeks**.
                - **For maintenance:** After 2 weeks, continue with **1 drop** in **2 cups of water** **twice a week**.',
                'price' => 622.02,
                'in_stock' => 1,
                'stock_quantity' => 120,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],

            [
                'id' => 121,
                'product_name' => 'Nekton Biotin',
                'slug' => 'nekton-biotin',
                'images' => '["products/01JQEXSQQ2Y4P0RBGBAP7A5Y3K.png"]',
                'description' => 'A protein-enriched food supplement designed to promote **healthy feather growth** and prevent **plumage defects** in birds.
            
                **Key Benefits:**
                - Supports **smooth and glossy feather growth**
                - Contains **18 free amino acids**, including **arginine, methionine, and lysine**, essential for birds on seed-based diets
                - Enriched with **Vitamins A, E, and Biotin**, which positively affect feather development
                - Provides **13 vitamins, 6 trace elements, and calcium** to aid birds during molting
            
                **NEKTON-BIO is scientifically formulated** to strengthen a bird’s plumage and overall well-being.',
                'price' => 1089.67,
                'in_stock' => 1,
                'stock_quantity' => 58,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],

            [
                'id' => 122,
                'product_name' => 'Easy Bird Rest, Moult & Show',
                'slug' => 'easy-bird-rest-moult-show',
                'images' => '["products/01JQEXW3M7E11YM4Q3H2PMF2HG.png"]',
                'description' => 'EasyBird Rest, Moult & Show is specially designed to support birds **after the breeding season**, providing essential **proteins and nutrients** to prepare them for moulting. This supplement helps birds **moult easily**, maintain peak condition for **showing**, and recover nutrients lost during breeding.
            
                **Key Benefits:**
                - Ensures **healthy and smooth moulting**
                - Helps birds look their best for **exhibitions and shows**
                - Replenishes **nutrients lost during breeding**
                - Easy to use with **clear feeding instructions**
            
                **Application:**
                - Feed **5 to 6 days a week**
                - Add **50g per 1kg of soft food**
                - For individual birds: **1.5g (2/3 level teaspoon) per kg of bird weight**
            
                **Reference Guide (1kg of birds):**
                - 1 **Macaw**
                - 1 **pair of African Greys/Amazons**
                - 5 **pairs of Cockatiels**
                - 10 **pairs of Budgies**
                - 16 **pairs of Canaries**
                - 30 **pairs of small Finches**
            
                **Ingredients (per kg):**
                - **High-value protein (15%)**, Essential oils
                - **Vitamins:** A (170,000 IU), E (500mg), C, B-complex, K, Biotin, Choline, Folic Acid, Niacin, Pantothenic Acid
                - **Minerals:** Calcium, Cobalt, Copper, Iodine, Iron, Magnesium, Manganese, Selenium, Sodium, Sulfur, Zinc
                - **Health-supporting herbs and amino acids** for overall well-being',
                'price' => 688.00,
                'in_stock' => 1,
                'stock_quantity' => 130,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            

            [
                'id' => 123,
                'product_name' => 'HP Healing Cream',
                'slug' => 'hp-healing-cream',
                'images' => '["products/01JQEY0QS4MECVY5D2TVNVZ30Q.png"]',
                'description' => 'HP Healing Cream is a **safe and effective** solution for promoting **rapid healing** of wounds, cuts, bites, burns, and other surface tissue damage in pets. It helps **reduce healing time** for persistent wounds while being **gentle and free from harsh chemicals**.
            
                **Symptoms Treated:**
                - **Infections**
                - **Swelling, pain, and shock** from injury
                - **Non-healing or slow-healing wounds**
                - **Burns, cuts, and bites**
            
                **Key Benefits:**
                - **Supports new skin growth**
                - **Keeps wounds moist** for faster healing
                - **Contains no harsh chemicals**
                - **No known side effects**
                - **Safe for all pets**, including puppies, kittens, pregnant, and nursing animals
                - **Patent pending formula**
            
                **Ideal for pet owners looking for a reliable, pet-friendly healing solution.**',
                'price' => 1606.11,
                'in_stock' => 1,
                'stock_quantity' => 45,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],

            [
                'id' => 124,
                'product_name' => 'Skin and Itch',
                'slug' => 'skin-and-itch',
                'images' => '["products/01JQEY2PHWM59P8FW1D7YG0FY7.png"]',
                'description' => 'Skin and Itch provides **temporary relief from seasonal allergies** while promoting a **healthy skin and coat** in cats, dogs, and other pets. It may help reduce **scratching, itching, chewing, and hair loss**, restoring a **thicker and shinier coat**.
            
                **Symptoms Treated:**
                - **Scratching**
                - **Itching**
                - **Chewing**
                - **Hair loss**
            
                **Key Benefits:**
                - **No harsh chemicals**  
                - **No known side effects**  
                - **Safe for all pets**, including puppies, kittens, pregnant, and nursing animals  
                - **Detoxifies the skin** from within  
                - **Acts as a natural antihistamine**  
                - **Great value—up to 90 doses per bottle** (varies by pet weight)  
                - **Easy-to-use liquid formula**  
            
                **A natural and effective solution for pets suffering from skin irritation.**',
                'price' => 860.15,
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            
            [
                'id' => 125,
                'product_name' => 'Coat Rescue',
                'slug' => 'coat-rescue',
                'images' => '["products/01JQEY4ZSNY05J1AGG2YCWNXHW.png"]',
                'description' => 'Coat Rescue is designed to **support healthy skin** and promote a **shiny, smooth coat** in pets. It may help alleviate **skin and coat issues** such as odor, excessive earwax, and dandruff.
            
                **Symptoms Treated:**
                - **Smelly skin and ears**
                - **Earwax buildup**
                - **Greasy coat**
                - **Dandruff**
                - **Seborrhea (flaky, scaly skin)**
            
                **Key Benefits:**
                - **No harsh chemicals**  
                - **No known side effects**  
                - **Safe for all pets**, including puppies, kittens, pregnant, and nursing animals  
                - **Great value—up to 90 doses per bottle** (varies by pet weight)  
                - **Easy-to-use liquid formula**  
            
                **An excellent choice for maintaining your pet’s skin and coat health naturally.**',
                'price' => 973.19,
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 126,
                'product_name' => 'Rainforest Mist Cockatoo & Macaw Bath Spray',
                'slug' => 'rainforest-mist-cockatoo-macaw-bath-spray',
                'images' => '["products/01JQEY7YYPM4C76V157D3FTWN8.png"]',
'description' => 'Rainforest Mist is specially formulated to **cleanse your bird\'s feathers**, relieve **dry, itchy skin**, and help prevent **feather plucking** and **unnecessary molting**. It also aids in **removing lice and mites** for a healthier plumage.\n\n
**Key Benefits:**\n
- **Gently cleans and hydrates feathers**\n
- **Relieves dry, irritated skin**\n
- **Helps prevent feather plucking & excessive molting**\n
- **Aids in lice & mite removal**\n
- **Alcohol-free & safe for birds**\n
- **Will not discolor plumage**\n
- **Fresh Vanilla Scent**\n
- **Made in the USA**\n
- **Size: 8oz**\n\n
**Directions for Use:**\n
1. **Shake well** before use.\n
2. Spray from **12 inches away** until feathers are visibly wet.\n
3. Avoid spraying near **open food, water, or directly into the bird’s face**.\n
4. Keep birds **out of drafty areas** to prevent chills.\n
5. **Do not use on sick birds** unless advised by a veterinarian.\n\n
**⚠ For external use only. Keep away from children and pets to avoid consumption.**',

                'price' => 630.62,
                'in_stock' => 1,
                'stock_quantity' => 110,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],                                                                                                                                                                                                                                                 
            [
                'id' => 128,
                'product_name' => 'Rainforest Mist Bath Spray for Small Birds',
                'slug' => 'rainforest-mist-bath-spray-for-small-birds',
                'images' => '["products/01JQEYHABQY1ES851S2NRSK3PV.png"]',
                'description' => 'Rainforest Mist Bath Spray is specially formulated to cleanse your bird’s feathers, relieve dry, itchy skin, and help prevent feather plucking and excessive molting. It also assists in removing lice and mites, ensuring healthier plumage. Infused with a refreshing Hawaiian Hibiscus scent, it’s perfect for daily use.
        
        **Recommended For:**  
        - All small birds, including Finches, Canaries, Parakeets, Lovebirds, and Cockatiels.  
        
        **Key Benefits:**  
        - **Gently cleans & hydrates feathers**  
        - **Relieves dry, itchy skin**  
        - **Helps prevent feather plucking & unnecessary molting**  
        - **Aids in lice & mite removal**  
        - **Alcohol-free & safe for birds**  
        - **Will not discolor plumage**  
        - **Pleasant Hawaiian Hibiscus scent**  
        - **Manufactured by King’s**  
        
        **Directions for Use:**  
        1. Shake well before use.  
        2. Spray from 12 inches away until feathers are visibly wet.  
        3. Avoid spraying near open food, water, or directly into the bird’s face.  
        4. Keep birds out of drafty areas to prevent chills.  
        5. Do not use on sick birds unless advised by a veterinarian.  
        
        **Storage & Safety:**  
        ⚠ For external use only. Keep away from children and pets to avoid accidental consumption.  
        ⚠ Store at room temperature, away from direct sunlight.',
                'price' => 630.62,
                'in_stock' => 1,
                'stock_quantity' => 120,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            [
                'id' => 129,
                'product_name' => 'Rainforest Mist Bath Spray for African Grey',
                'slug' => 'rainforest-mist-bath-spray-for-african-grey',
                'images' => '["products/01JQEYSHH91QK7DRHDEAQERW18.png"]',
                'description' => 'Rainforest Mist Bath Spray is specially designed to cleanse your bird’s feathers, relieve dry, itchy skin, and help prevent feather plucking and excessive molting. This product also aids in removing lice and mites, ensuring healthier plumage. Infused with a soothing Baby Powder scent, it’s perfect for daily use.
        
        **Recommended For:**  
        - African Greys and Parrots  
        
        **Key Benefits:**  
        - **Gently cleans & hydrates feathers**  
        - **Relieves dry, itchy skin**  
        - **Helps prevent feather plucking & unnecessary molting**  
        - **Aids in lice & mite removal**  
        - **Alcohol-free & safe for birds**  
        - **Will not discolor plumage**  
        - **Soothing Baby Powder scent**  
        - **Manufactured by King’s**  
        
        **Directions for Use:**  
        1. Shake well before use.  
        2. Spray from 12 inches away until feathers are visibly wet.  
        3. Avoid spraying near open food, water, or directly into the bird’s face.  
        4. Keep birds out of drafty areas to prevent chills.  
        5. Do not use on sick birds unless advised by a veterinarian.  
        
        **Storage & Safety:**  
        ⚠ For external use only. Keep away from children and pets to avoid accidental consumption.  
        ⚠ Store at room temperature, away from direct sunlight.',
                'price' => 630.62,
                'in_stock' => 1,
                'stock_quantity' => 130,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
                [
                    'id' => 130,
                    'product_name' => 'Insecta Pro Insect Mix',
                    'slug' => 'insecta-pro-insect-mix',
                    'images' => '["products/01JQEYW4KCV7SG73SR8E0S8ZTB.png"]',
                    'description' => 'Insecta Pro is ideal for insect-eating birds. Using the technology of food extrusion, Insecta Pro incorporates the best protein from a range of sources to create a high-specification food for birds. The process of extrusion of the food boosts the digestibility and also ensures purity of the product as the high-pressure cooking kills bacteria and destroys toxins. The amino acid profile and the range of vitamins and minerals in Insecta-Pro are able to replace the need for live food while ensuring the best in nutrition for health and breeding. Many insect-eating birds will not even think of raising a clutch if the insects are not there for them to feed the babies.  
            
                    **Feeding:**  
                    - Fed moist or dry, Insecta-Pro is ideal for a range of insect-eating birds.  
            
                    **Ingredients:**  
                    - Select Australian whole grains including: Corn, Wheat, Meat and Fish Meals, Wheat Gluten.  
            
                    **Nutritional Balance:**  
                    - Insectivorous birds require a diet high in protein and fat.  
                    - Insecta-Pro provides a convenient, balanced diet for all species (except Mynas and Toucans).  
                    - Omnivorous birds (Blackbirds, Thrush, Magpies, etc.) benefit from Insecta-Pro and Golden Song mixed 50:50 and fed as a moist blend.  
                    - Insecta-Pro contains extra protein, vitamins, and minerals to support rapid growth and feathering of all insectivorous birds.  
            
                    **Approximate Analysis:**  
                    - Crude Protein 30%, Lysine 1.4%, Crude Fat 14%, Vitamin A 3,000 IU/kg, Crude Fibre 4%, Calcium 2.5%.',
                    'price' => 1376.58,
                    'in_stock' => 1,
                    'stock_quantity' => 23,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                [
                    'id' => 131,
                    'product_name' => 'Insect Patee',
                    'slug' => 'insect-patee',
                    'images' => '["products/01JQEYYSDSVVQEZ53Z4RX5ZAG2.png"]',
                    'description' => 'Complete feed for all insect-eating birds  
                Balanced complete feed with animal protein and minimum 25% insects.  
                
                Is very rich in animal proteins and dried insects: ant eggs, Mexican larvae, dried water flies, and conchas (min 25%).  
                Recommended for breeding of European finches.  
                Brings chaffinches in top condition for singing contests.',
                    'price' => 1253.21,
                    'in_stock' => 1,
                    'stock_quantity' => 39,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 132,
                    'product_name' => "Lory Nectar Blessing's",
                    'slug' => 'lory-nectar-blessings',
                    'images' => '["products/01JQEZ1KV8ZM0RH75Q730G68P9.png"]',
                    'description' => "Complete lory diet made up from all natural ingredients to simulate diets as eaten in the wild.  
                Includes protein, fruits, and vegetables milled, contains low iron, low in vitamins A & C. Served in liquid form.  
                
                **Ingredients:**  
                Brown Rice Flour, Corn flour, Red Whole-Wheat Flour, Dextrose, Fructose, Soy Protein Isolate, Bee Pollen, Spirulina, Calcium, Apple, Xanthan Gum, Carrot, Papaya Enzyme, Spearmint, Bell Pepper, Alfalfa, Coconut, Blueberry, Flower Petals, Eucalyptus, Nutritional Yeast, Milk Thistle, Wheat Grass, Clay, Rosemary.  
                Proprietary Blend of Necessary Vitamins, Trace Minerals, and Essential Amino Acids for Color and Maximum Reproduction.  
                
                **Analysis (Per One Cup Serving):**  
                - **Calories:** 214  
                - **Crude Protein:** 10.99%  
                - **Crude Fat:** 2.19%  
                - **Carbs:** 32.47%  
                - **Ash:** 1.08%  
                - **Vitamin A:** 1694 IU/100g  
                - **Iron:** 41 ppm  
                - **Moisture:** 6.24%",
                    'price' => 1833.34,
                    'in_stock' => 1,
                    'stock_quantity' => 21,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 133,
                    'product_name' => 'Neocare',
                    'slug' => 'neocare',
                    'images' => '["products/01JQEZ4THNP6GGBPMRPHB0MR0K.png"]',
                    'description' => "Hand Rearing Food For Baby Birds  
                NEOCARE follows nature by providing a form of 'crop milk,' essential for the well-being of incubated babies and is a great help in those you pull from the nest to hand rear. NEOCARE is suitable for species commonly hand-reared, including parrots, cockatoos, finches, canaries, pigeons, and doves.  
                
                **Key Benefits:**  
                - Provides essential nutrition to promote healthy growth  
                - Contains probiotics and predigestives for optimal digestion  
                - Ideal for incubated or hand-reared baby birds  
                
                **How to Use NEOCARE:**  
                1. **For Newly Hatched Babies:**  
                   - Start with a very dilute mix and feed a few drops until the baby passes its first dropping.  
                   - Gradually increase thickness over five days.  
                   - By day 5, the mix should be thick enough to fall through the prongs of a fork.  
                   - From day 7 onward, transition by blending with Vetafarm’s Hand Rearing Formula.  
                
                2. **For Babies Pulled from the Nest (5 – 14 days old):**  
                   - Prepare a normal-thickness mix (falls through a fork) and feed as needed.  
                   - After 3 days, begin blending with Vetafarm Hand Rearing Food.  
                
                3. **For Cockatoos, Pigeons, and Doves:**  
                   - Use NEOCARE as the sole food source until weaning.  
                
                4. **For Weak or Undernourished Birds:**  
                   - Maintain brooder temperature and feed only NEOCARE until normal growth resumes.  
                
                5. **For Nest Chicks in Need of Extra Nutrition:**  
                   - Prepare a mix and crop-feed as required to support growth.  
                
                **Ingredients:**  
                Isolated soy protein, oats, corn, vegetable oil, calcium carbonate, vitamins, minerals, probiotics, and predigestives.  
                
                **Guaranteed Analysis:**  
                - **Crude Protein:** Min 21%  
                - **Crude Fat:** Min 17%  
                - **Crude Fibre:** Max 3%  
                - **Salt:** 0.2%  
                
                **Storage:**  
                - Store below 30°C in a dry area.",  
                    'price' => 1950.97,
                    'in_stock' => 1,
                    'stock_quantity' => 33,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                
                [
                    'id' => 134,
                    'product_name' => 'Nektar Plus',
                    'slug' => 'nektar-plus',
                    'images' => '["products/01JQEZDXEHESZFBR3GNTMZSK5T.png"]',
                    'description' => "Nektar Plus is a carefully composed and balanced nectar concentrate designed for hummingbirds and other nectar-feeding birds. It contains essential carbohydrates, proteins, vitamins, and minerals to mimic the natural nectar found in the wild.  
                    \n\nThis nutritious powder, when mixed with lukewarm water, provides a complete diet for species like sunbirds, lorikeets, and butterflies, ensuring optimal health and vitality.  
                    \n\n**Ingredients:**  
                    \nDextrose, fructose, pollen, soy protein isolate, sucrose, sodium chloride, potassium dihydrogen phosphate, calcium gluconate, and essential vitamins and minerals.",
                    'price' => 4113.68,
                    'in_stock' => 1,
                    'stock_quantity' => 12,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 136,
                    'product_name' => 'Aquamaster Color Enhancer Cichlid Food 500g',
                    'slug' => 'aquamaster-color-enhancer-cichlid-food-500g',
                    'images' => '["products/01JQGHFP9PZY6FGRNT7NZD7D6N.png"]',
                    'description' => "Perfect palatable size for cichlid and medium sized fishes.
                    \nBeautiful size and color of fish
                    \nMaintain clear water
                    \nFloating pelletsAquamaster Color Enhancer Cichlid Food 500g is a top quality fish food for your aquatic pets. No cloudy water and bad smell. Maintains healthy and lively fishes.
                    \n\n**Essential Benefits:**
                    \n\nPerfect palatable size for cichlid and medium sized fishes.
                    \nBeautiful size and color of fish\
                    nMaintain clear water\nFloating pellets
                    \n\n**Ingredients:**
                    \nFish Meal, Wheat Flour, Soybean Meal, Fish Oil, Lecithin, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\nCrude Protein: ≥40%\nLysine: ≥1.5%\nCrude Fat: ≥3.0%\nCrude Ash: ≤16%\nCrude Fiber: ≤3.5%\nMoisture: ≤10%\nTotal Phosporus: ≥4.5%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 394.00,
                    'in_stock' => 1,
                    'stock_quantity' => 34,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                
            
                [
                    'id' => 137,
                    'product_name' => 'Aquamaster Goldfish 105g Food',
                    'slug' => 'aquamaster-goldfish-105g-food',
                    'images' => '["products/01JQGHJRQB1NBCMVC6HNK8DNC9.png"]',
                    'description' => "Aquamaster Goldfish 105g Food is a top quality fish food for your aquatic pets. No cloudy water and bad smell. Maintains healthy and lively fishes.\n\n**Essential Benefits:**\n\nPerfect palatable size for goldfish and medium sized fishes\nBeautiful size and color of fish\nMaintain clear water\nFloating pellets\n\n**Ingredients:**\nFish Meal, Wheat Flour, Soybean Meal, Fish Oil, Lecithin, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\nCrude Protein: ≥40%\nLysine: ≥2.2%\nCrude Fat: ≥3.0%\nCrude Ash: ≤13%\nCrude Fiber: ≤5%\nMoisture: ≤10%\nTotal Phosporus: ≥0.8%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 95.00,
                    'in_stock' => 1,
                    'stock_quantity' => 150,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 138,
                    'product_name' => 'Aquamaster Mini 15g Fish Food',
                    'slug' => 'aquamaster-mini-15g-fish-food',
                    'images' => '["products/01JQGHN0T15YJXFGK5VA6SJTAD.png"]',
                    'description' => "Aquamaster Mini 15g Fish Food is a top quality fish food for your aquatic pets. No cloudy water and bad smell. Maintains healthy and lively fishes.\n\n**Essential Benefits:**\n\nPerfect palatable size for mini and small fishes\nBeautiful size and color of fish\nMaintain clear water\nSemi-sinking granules\n\n**Ingredients:**\nFish Meal, Wheat Flour, Soybean Meal, Fish Oil, Lecithin, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\nCrude Protein: ≥40%\nLysine: ≥1.7%\nCrude Fat: ≥3.0%\nCrude Ash: ≤14%\nCrude Fiber: ≤3.5%\nMoisture: ≤10%\nTotal Phosporus: ≥0.8%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 45.00,
                    'in_stock' => 1,
                    'stock_quantity' => 140,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 139,
                    'product_name' => 'Aquamaster Large Pellet Hi Growth Koi Food',
                    'slug' => 'aquamaster-large-pellet-hi-growth-koi-food',
                    'images' => '["products/01JQGHR8YYEA1D9DFT70ZNHB7M.png"]',
                    'description' => "Rapid growth and beautiful shape of Koi fish
                    \nCrystal clear water
                    \nPalatable pellets
                    \nProbiotic-enriched diet
                    \nHealthy Koi and Fishes
                    \nFloating Pellets\n
                    \nAquamaster Small Pellet Hi Growth Koi Food is used by the best Koi breeders and enthusiasts worldwide. Reach your koi's optimum beauty and size by using Aquamaster Koi Food. Made with quality ingredients with probiotics for better digestion and clear water.\n\n**Essential Benefits:**\n\nRapid growth and beautiful shape of Koi fish\nCrystal clear water\nPalatable pellets\nProbiotic-enriched diet\nHealthy Koi and Fishes\nFloating Pellets\n\n**Ingredients:**\nFish Meal, Soybean Meal, Wheat Flour, Soybean Lecithin, Wheat Germ, Spirulina, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\nCrude Protein: ≥42%\nLysine: ≥2.6%\nCrude Fat: ≥4%\nCrude Ash: ≤16%\nCrude Fiber: ≤5%\nMoisture: ≤10%\nTotal Phosporus: ≥0.8%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 520.00,
                    'in_stock' => 1,
                    'stock_quantity' => 72,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                
                [
                    'id' => 140,
                    'product_name' => 'Aquamaster Small Pellet Staple Koi Food',
                    'slug' => 'aquamaster-small-pellet-staple-koi-food',
                    'images' => '["products/01JQGHVH0G4C2M8A3ED2DHNTBF.png"]',
                    'description' => "Maintain size and beautiful body shape of Koi fish
                    \nCrystal clear water
                    \nPalatable pellets
                    \nProbiotic-enriched diet
                    \nHealthy Koi and Fishes
                    \nFloating Pellets\n
                    \nAquamaster Small Pellet Staple Koi Food is used by the best Koi breeders and enthusiasts worldwide. Reach your koi's optimum beauty and size by using Aquamaster Koi Food. Made with quality ingredients with probiotics for better digestion and clear water.\n\n**Essential Benefits:**\n\nMaintain size and beautiful body shape of Koi fish\nCrystal clear water\nPalatable pellets\nProbiotic-enriched diet\nHealthy Koi and Fishes\nFloating Pellets\n\n**Ingredients:**\nFish Meal, Soybean Meal, Wheat Flour, Soybean Lecithin, Wheat Germ, Spirulina, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\nCrude Protein: ≥36%\nLysine: ≥1.7%\nCrude Fat: ≥3%\nCrude Ash: ≤14%\nCrude Fiber: ≤5%\nMoisture: ≤10%\nTotal Phosporus: ≥0.8%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 350.00,
                    'in_stock' => 1,
                    'stock_quantity' => 88,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 141,
                    'product_name' => 'Aquamaster Large Pellet Growth Koi Food',
                    'slug' => 'aquamaster-large-pellet-growth-koi-food',
                    'images' => '["products/01JQGHYEBJP1VNT04CB6FGK0YS.png"]',
                    'description' => "Aquamaster Extra Small Pellet Growth Koi Food is used by the best Koi breeders and enthusiasts worldwide. Reach your koi's optimum beauty and size by using Aquamaster Koi Food. Made with quality ingredients with probiotics for better digestion and clear water.\n\n**Essential Benefits:**\n\n- Rapid growth and beautiful shape of Koi fish\n- Crystal clear water\n- Palatable pellets\n- Probiotic-enriched diet\n- Healthy Koi and Fishes\n- Floating Pellets\n\n**Ingredients:**\nFish Meal, Soybean Meal, Wheat Flour, Soybean Lecithin, Wheat Germ, Spirulina, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\n- **Crude Protein:** ≥40%\n- **Lysine:** ≥2.2%\n- **Crude Fat:** ≥3%\n- **Crude Ash:** ≤13%\n- **Crude Fiber:** ≤5%\n- **Moisture:** ≤10%\n- **Total Phosphorus:** ≥0.8%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 420.00,
                    'in_stock' => 1,
                    'stock_quantity' => 111,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 142,
                    'product_name' => 'Aquamaster Small Pellet Growth Koi Food',
                    'slug' => 'aquamaster-small-pellet-growth-koi-food',
                    'images' => '["products/01JQGJ20YPXBP347P5MMJ2DP6B.png"]',
                    'description' => "Aquamaster Extra Small Pellet Growth Koi Food is used by the best Koi breeders and enthusiasts worldwide. Reach your koi's optimum beauty and size by using Aquamaster Koi Food. Made with quality ingredients with probiotics for better digestion and clear water.\n\n**Essential Benefits:**\n\n- Rapid growth and beautiful shape of Koi fish\n- Crystal clear water\n- Palatable pellets\n- Probiotic-enriched diet\n- Healthy Koi and Fishes\n- Floating Pellets\n\n**Ingredients:**\nFish Meal, Soybean Meal, Wheat Flour, Soybean Lecithin, Wheat Germ, Spirulina, Astaxanthin, Vitamins, Minerals.\n\n**Guaranteed Analysis:**\n- **Crude Protein:** ≥40%\n- **Lysine:** ≥2.2%\n- **Crude Fat:** ≥3%\n- **Crude Ash:** ≤13%\n- **Crude Fiber:** ≤5%\n- **Moisture:** ≤10%\n- **Total Phosphorus:** ≥0.8%\n\n**Feeding Guidelines:**\n2-3 times per day",
                    'price' => 420.00,
                    'in_stock' => 1,
                    'stock_quantity' => 99,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 143,
                    'product_name' => 'Nutrilogic Micro Granules 100ml Fish Food',
                    'slug' => 'nutrilogic-micro-granules-100ml-fish-food',
                    'images' => '["products/01JQGJ54Y8NMWX0QBK9GV08AZP.png"]',
                    'description' => "MADE IN TAIWAN  
                Ideal for small mouths such as bettas, tetras, barbs, mollies, guppy, and shrimp.  
                Contains high concentrations of protein and color enhancers.  
                Sinking granules.  
                Good alternative as first food for your baby fish or fish fry.  
                NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestible carbohydrates to bring out the full potential of your fish. Balanced formulation suitable for feeding all year round.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC.  
                
                Nutrilogic ®️ Sinking Disc Wafers is an opti-mix formula made with premium grade protein and highly digestible carbohydrates, infused with vitamins and minerals.  
                
                **Ingredients:**  
                Fish Meal, Spirulina, Shrimp meat, Chlorella, Oriental cherry shrimp, Squid Oil, Seaweed, Wheat germ flour, Vitamin A, Vitamin B2, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Protein (min):** 36%  
                - **Fat (min):** 6%  
                - **Fiber (min):** 4%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 12%  
                
                **Feeding Guidelines:**  
                Feed twice a day. Take note that all food given is consumed within 2 minutes. Do not overfeed!  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 245.00,
                    'in_stock' => 1,
                    'stock_quantity' => 69,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                
                [
                    'id' => 144,
                    'product_name' => 'Nutrilogic Sinking Disc Wafers 250g Fish Food',
                    'slug' => 'nutrilogic-sinking-disc-wafers-250g-fish-food',
                    'images' => '["products/01JQGJ7VETJXZMSBHYRJA11FSW.png"]',
                    'description' => "NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestible carbohydrates to bring out the full potential of your fish. Balanced formulation suitable for feeding all year round.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC.  
                
                Nutrilogic ®️ Sinking Disc Wafers is an opti-mix formula made with premium grade protein and highly digestible carbohydrates, infused with vitamins and minerals.  
                
                **Ingredients:**  
                Fish Meal, Spirulina, Shrimp meat, Chlorella, Oriental cherry shrimp, Squid Oil, Seaweed, Wheat germ flour, Vitamin A, Vitamin B2, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Protein (min):** 36%  
                - **Fat (min):** 6%  
                - **Fiber (min):** 4%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 12%  
                
                **Feeding Guidelines:**  
                Feed twice a day. Take note that all food given is consumed within 2 minutes. Do not overfeed!  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 645.00,
                    'in_stock' => 1,
                    'stock_quantity' => 32,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 145,
                    'product_name' => 'Nutrilogic Pond 101 4kg Fish Food',
                    'slug' => 'nutrilogic-pond-101-4kg-fish-food',
                    'images' => '["products/01JQGJC0DXWE76G8EVVK2H7PVG.png"]',
                    'description' => "NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestive carbohydrates to bring out the full potential of your pond fish.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC. Vitamins and minerals are added to boost the immune system.  
                
                Made in Taiwan.  
                
                **Ingredients:**  
                Fish meal, wheatgerm, Spirulina, Vitamin A, Vitamin B1, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Crude Protein (min):** 35%  
                - **Crude Fat (min):** 5%  
                - **Crude Fiber (min):** 3%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 10%  
                
                **Feeding Guidelines:**  
                Feed twice a day, taking note that all food given is consumed within 2 minutes. Do not overfeed.  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 1670.00,
                    'in_stock' => 1,
                    'stock_quantity' => 12,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 146,
                    'product_name' => 'Nutrilogic Grand Champion 4kg Fish Food',
                    'slug' => 'nutrilogic-grand-champion-4kg-fish-food',
                    'images' => '["products/01JQGJGN1DC9QKB936ZQZKMRPD.png"]',
                    'description' => "NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestive carbohydrates to bring out the full potential of your koi.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC. Vitamins and minerals are added to boost the immune system.  
                
                Made in Taiwan.  
                
                **Ingredients:**  
                Fish meal, wheatgerm, Spirulina, Astaxanthin, Cantaxanthin, Squid oil, Vitamin A, Vitamin B1, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Crude Protein (min):** 45%  
                - **Crude Fat (min):** 5%  
                - **Crude Fiber (min):** 3%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 10%  
                
                **Feeding Guidelines:**  
                Feed twice a day, taking note that all food given is consumed within 2 minutes. Do not overfeed.  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 2355.00,
                    'in_stock' => 1,
                    'stock_quantity' => 10,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 147,
                    'product_name' => 'Nutrilogic Marine Sinking Pellets 250g Fish Food',
                    'slug' => 'nutrilogic-marine-sinking-pellets-250g-fish-food',
                    'images' => '["products/01JQGPMSZ2YKACBEBEYEXYTPA1.png"]',
                    'description' => "Ideal for saltwater fish: Clown fish, Angels, Tangs, Wrasses, Damsels, Trigger fish.  
                Sinking pellets.  
                Balanced formulation suitable for feeding all year round.  
                Color enhancing ingredients, growth accelerators, and immune-boosting vitamins.  
                
                NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestive carbohydrates to bring out the full potential of your fish.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC. Vitamins and minerals are added to boost the immune system.  
                
                Made in Taiwan.  
                
                **Ingredients:**  
                Fish meal, Spirulina, Shrimp meat, Chlorella, Oriental cherry shrimp, Squid oil, Seaweed, Wheat germ flour, Vitamin A, Vitamin B1, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Protein (min):** 40%  
                - **Fat (min):** 6%  
                - **Fiber (min):** 3%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 12%  
                
                **Feeding Guidelines:**  
                Feed twice a day, taking note that all food given is consumed within 2 minutes. Do not overfeed.  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 580.00,
                    'in_stock' => 1,
                    'stock_quantity' => 49,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 148,
                    'product_name' => 'Nutrilogic Koi Ultra 4kg Fish Food',
                    'slug' => 'nutrilogic-koi-ultra-4kg-fish-food',
                    'images' => '["products/01JQGPQ1H99ST26D21M0BGV284.png"]',
                    'description' => "For Koi fish.  
                Highest Spirulina content.  
                Balanced formulation suitable for feeding all year round.  
                Color enhancing ingredients, growth accelerators, and immune-boosting vitamins.  
                
                NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestive carbohydrates to bring out the full potential of your koi.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC. Vitamins and minerals are added to boost the immune system.  
                
                Made in Taiwan.  
                
                **Ingredients:**  
                Fish meal, wheatgerm, Spirulina, Astaxanthin, Cantaxanthin, Squid oil, Vitamin A, Vitamin B1, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Crude Protein (min):** 45%  
                - **Crude Fat (min):** 5%  
                - **Crude Fiber (min):** 3%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 10%  
                
                **Feeding Guidelines:**  
                Feed twice a day, taking note that all food given is consumed within 2 minutes. Do not overfeed.  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 2940.00,
                    'in_stock' => 1,
                    'stock_quantity' => 9,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 149,
                    'product_name' => 'Nutrilogic Carnivore Feast Floating Sticks 950ml Fish Food',
                    'slug' => 'nutrilogic-carnivore-feast-floating-sticks-950ml-fish-food',
                    'images' => '["products/01JQGPSXGKAEXPMNPVG36ZPNWG.png"]',
                    'description' => "For large carnivore fish such as Arowana, Flowerhorn, Oscar, Catfish, etc.  
                Floating sticks.  
                Balanced formulation suitable for feeding all year round.  
                Color enhancing ingredients, growth accelerators, and immune-boosting vitamins.  
                
                NUTRILOGIC developed a blend of carefully selected premium grade ingredients of protein and highly digestive carbohydrates to bring out the full potential of your fish.  
                
                Only the freshest ingredients are put in each container of NUTRILOGIC. Vitamins and minerals are added to boost the immune system.  
                
                Made in Taiwan.  
                
                **Ingredients:**  
                Fish meal, Spirulina, Shrimp meat, Chlorella, Oriental cherry shrimp, Squid oil, Seaweed, Wheat germ flour, Vitamin A, Vitamin B1, Vitamin B6, Vitamin B12, Stabilized Vitamin C, Vitamin D3, Vitamin E, Vitamin K  
                
                **Guaranteed Analysis:**  
                - **Protein (min):** 48%  
                - **Fat (min):** 7%  
                - **Fiber (min):** 3%  
                - **Moisture (max):** 10%  
                - **Crude Ash (max):** 12%  
                
                **Feeding Guidelines:**  
                Feed twice a day, taking note that all food given is consumed within 2 minutes. Do not overfeed.  
                Minimize feeding when treating sick fish or after cleaning of filtration and water changes.",
                    'price' => 570.00,
                    'in_stock' => 1,
                    'stock_quantity' => 20,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                
            
                [
                    'id' => 150,
                    'product_name' => 'Nutrilogic Vitamin Sea Dried Seaweed Strips 10g Fish Food',
                    'slug' => 'nutrilogic-vitamin-sea-dried-seaweed-strips-10g-fish-food',
                    'images' => '["products/01JQGPWMXSN6NFYSFK1VX78J4H.png"]',
                    'description' => "MADE IN KOREA.  
                Ideal for saltwater fish, shrimp, and other herbivorous, algae-eating fishes.  
                Great for plecostomus, snails, crustaceans, and other aquatic animals.  
                Boosts immunity and vitality.  
                Easily digestible floating strips.  
                
                Nutrilogic®️ Vitamin Sea Dried Seaweed Strips is the natural food for marine and freshwater fishes.  
                
                It is packaged in a resealable bag with desiccant for moisture absorption.  
                Consume within a month after opening.",
                    'price' => 120.00,
                    'in_stock' => 1,
                    'stock_quantity' => 55,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
                
                [
                    'id' => 151,
                    'product_name' => 'Gargeer Complete Gel Diet Bearded Dragon Food, 3-oz bag',
                    'slug' => 'gargeer-complete-gel-diet-bearded-dragon-food-3-oz-bag',
                    'images' => '["products/01JQGTC8KX62HH3TXYNDQXJBCV.png"]',
                    'description' => "Details
                
                This bearded dragon food is specially formulated for both juveniles and adults.  
                Feel good knowing this food is made in the USA with premium ingredients for optimal nutrition.  
                For your convenience, it’s easy to prepare. For your dragon’s well-being, it supports health, growth, and vitality.  
                This food provides a complete diet with no need for live worms, insects, or salad cutting.  
                This gel comes as a concentrated powder that gels when added to boiling water for a moist meal that can trigger natural hunting instincts.  
                
                Treat your bearded dragon to the ultimate gourmet nutrition with Gargeer Complete Gel Diet Bearded Dragon Food. This specially formulated gel diet is perfect for both juvenile and adult dragons, providing them with all the essential nutrients they need for a long and healthy life. Made in the USA with premium ingredients, this balanced and fortified formula is easy to prepare and supports health, growth, and vitality.",
                    'price' => 1084.46,
                    'in_stock' => 1,
                    'stock_quantity' => 30,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 153,
                    'product_name' => 'Fluker\'s Freeze-Dried River Shrimp Reptile Treats, 1-oz jar',
                    'slug' => 'flukers-freeze-dried-river-shrimp-reptile-treats-1-oz-jar',
                    'images' => '["products/01JQGTJGMGB0E8RWV4BGMSNNGT.png"]',
                    'description' => "Details
                
                Packed with essential nutrients and vitamins  
                Live freshwater shrimp are difficult to maintain in captivity and can be expensive, most pet owners do not provide these nutritionally valuable prey items for their pets. These treats are a convenient way to feed reptiles natural prey without the mess & expense of live prey.  
                Healthy snack that is rich in protein & essential amino acids  
                Freeze-dried to preserve flavor and nutrition and make treats easy to handle  
                For turtles, semi-aquatic & terrestrial amphibians, reptiles & tropical fish  
                
                Fluker’s Freeze-dried River Shrimp Reptile Treats are packed with all of the essential nutrients and vitamins your reptile needs to thrive. River shrimp are a favorite food of turtles, semi-aquatic and terrestrial amphibians, reptiles and tropical fish, and are a great way to provide pets with a healthy snack that’s rich in protein and amino acids. The freeze-drying process preserves the river shrimp’s flavor and nutrition, providing reptiles with their natural prey in a convenient and easy-to-handle form. This is also great for use with aquatic turtles, terrestrial turtles, aquatic amphibians, and terrestrial amphibians.",
                    'price' => 249.00,
                    'in_stock' => 1,
                    'stock_quantity' => 54,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 154,
                    'product_name' => 'Fluker\'s Salad Singles Reptile Mix Reptile Food, 3-pack',
                    'slug' => 'flukers-salad-singles-reptile-mix-reptile-food-3-pack',
                    'images' => '["products/01JQGTR3FC8YT4Q5R6WR0EAQCV.png"]',
                    'description' => "All-natural food mix includes turnips, cabbage, dandelion greens, carrots and squash.  
                Easy to prepare and serve in the same bowl—just add water!  
                Each bowl makes two ounces of food.  
                Great for bearded dragons, tortoises, uromastyx, iguanas and other herbivores or omnivores.  
                Add Fluker’s freeze-dried insects or extruded pellets (sold separately) as a salad topper for added variety!
                
                Good nutrition is fast and easy with Fluker’s Salad Singles Reptile Mix Reptile Food! This all-natural food mix features a mix of high-quality vegetables, including turnips, cabbage, dandelion greens, carrots and squash. Each salad is carefully dried to maintain its natural color and nutrients. To prepare, simply add water and stir. Fluker’s Salad Singles are great for bearded dragons, tortoises, uromastyx, iguanas and other herbivores or omnivores. Feed with live insects, Fluker’s dried insects or prepared diets (each sold separately) as part of a balanced diet. This is also great for use with tortoises, terrestrial turtles, and lizards.",
                    'price' => 490.59,
                    'in_stock' => 1,
                    'stock_quantity' => 99,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 155,
                    'product_name' => 'Zoo Med Reptisand Reptile Terrarium Sand, Desert White, 10-lb bag',
                    'slug' => 'zoo-med-reptisand-reptile-terrarium-sand-desert-white-10-lb-bag',
                    'images' => '["products/01JQGTV08EHMVC3D4YBTQKD0S8.png"]',
                    'description' => "Details
                
                Sand substrate for reptiles.  
                Crafted to be easy to set up and easy to use.  
                Utilized to stimulate natural digging and burrowing instincts.  
                Provides a natural and attractive environment for your amigo.  
                Perfect for your bearded dragon, sand boa or soft-shell turtle.  
                
                Give your guy a proper place to lie with Zoo Med Desert White ReptiSand Reptile Sand. This natural sand substrate for reptiles does not contain any dyes or chemicals. Utilize it to stimulate natural digging and burrowing instincts in your cold-blooded compadre. Your bearded dragon, sand boa or soft-shell turtle will love the natural and attractive environment that you can create with this sand substrate.",
                    'price' => 653.55,
                    'in_stock' => 1,
                    'stock_quantity' => 21,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                [
                    'id' => 156,
                    'product_name' => 'Zoo Med ReptiSoil Reptile Soil, 10-qt bag',
                    'slug' => 'zoo-med-reptisoil-reptile-soil-10-qt-bag',
                    'images' => '["products/01JQGTXHKYVWE4N482E0N6QKCQ.png"]',
                    'description' => "Details
                
                Soil substrate for reptiles.  
                Includes added carbon for aeration.  
                Features a special blend of peat moss, soil, sand and carbon.  
                Perfect for creating tropical set-ups, naturalistic terrariums and paludariums.  
                Can be used to add ferns, bromeliads, miniature orchids, succulents or carnivorous plants.  
                
                Keep your refined reptile relaxing in style with Zoo Med ReptiSoil Reptile Soil. Your scaly sidekick will love this special blend of peat moss, soil, sand and carbon. Perfect for creating tropical set-ups, naturalistic terrariums and paludariums, the added carbon helps to aerate the soil. Your buddy will love burrowing, laying eggs and exercising other natural behaviors in her new reptile substrate. It is also ideal for adding in some of her plant pals such as ferns, bromeliads, miniature orchids, succulents or carnivorous plants.",
                    'price' => 515.84,
                    'in_stock' => 1,
                    'stock_quantity' => 32,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
                [
                    'id' => 157,
                    'product_name' => 'Zoo Med Excavator Clay Burrowing Reptile Substrate, 10-lb bag',
                    'slug' => 'zoo-med-excavator-clay-burrowing-reptile-substrate-10-lb-bag',
                    'images' => '["products/01JQGV04V90ZHW7XGWZ4XBD8A5.png"]',
                    'description' => "All-natural and made with zero dyes or chemicals.  
                Helps encourage reptiles to satisfy their natural burrowing and digging instincts.  
                Mimics your reptile’s natural habitat.  
                Allows you to construct mounds and tunnels for your pet’s enjoyment.  
                Holds the shape of tunnels to help prevent them from collapsing.  
                
                Bring your reptile’s natural habitat to his terrarium with Zoo Med’s Excavator Clay Burrowing Substrate. Your little digger will love exploring, burrowing and tunneling in this all-natural clay made without chemicals or dyes. Mimic your sidekick’s natural habitat by using water to mold the clay into tunnels and mounds—the clay is designed to hold the tunnel shape to help prevent it from collapsing as your pet wanders through. With Zoo Med's Excavator Clay Burrowing Substrate, your scaly sidekick will feel like he’s in the great.",
                    'price' => 974.87,
                    'in_stock' => 1,
                    'stock_quantity' => 29,
                    'is_active' => 1,
                    'has_variant' => 0,
                    'created_at' => now(),
                ],
            
                
            
                [
                'id' => 158,
                'product_name' => 'Zoo Med Eco Earth Loose Coconut Fiber Reptile Substrate, 24-qt bag',
                'slug' => 'zoo-med-eco-earth-loose-coconut-fiber-reptile-substrate-24-qt-bag',
                'images' => '["products/01JQGV2G5KT1Z6RWCF4RBZ468D.png"]',
                'description' => "Ideal substrate for naturalistic terrarium type set-ups incorporating reptiles, amphibians, or invertebrates.  
            Use damp for tropical species as it naturally absorbs and breaks down odor and waste products.  
            Made from an eco-friendly renewable resource, it can also be safely composted or recycled.  
            Encourages burrowing, allowing your pet to feel at home in their environment.  
            Mist every day to create and maintain the humidity levels.  
            
            Zoo Med Eco Earth Loose Coconut Fiber Reptile Substrate is an eco-friendly product made from the husks of coconuts. It’s a renewable resource that can be safely composted or recycled into potted plants or gardens. This substrate is ideal for naturalistic terrarium-type setups incorporating reptiles, amphibians or invertebrates. Use it damp for tropical species, as it naturally absorbs and breaks down odor and waste products. Add Eco Earth loose coconut fiber substrate on top of Zoo Med HydroBalls to create an ideal drainage layer for optimum plant growth and humidity in naturalistic terrariums.",
                'price' => 1342.09,
                'in_stock' => 1,
                'stock_quantity' => 9,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            
            
            [
                'id' => 159,
                'product_name' => 'Komodo Repti-Pads Tank Liner Large',
                'slug' => 'komodo-repti-pads-tank-liner-large',
                'images' => '["products/01JQGV4KWF33N81662FGJNXBWZ.png"]',
                'description' => "Made of absorbent materials.  
            Ideal for catching messes like spilled food and water.  
            Helps keep your pal’s home in sanitary conditions.  
            Makes routine cleaning quick and easy.  
            Lines the bottom of long twenty-gallon tanks.  
            
            Maintain your setup’s environment in a quick and easy way with Komodo Repti-Pads Tank Liner. These sanitary liners are made of absorbent materials that effectively protect your setup from messes like spilled food or water. They’re especially helpful for setups that house juvenile reptiles, as they can be messy feeders. Each pad lines the bottom of a long twenty-gallon tank, so pals in many sized homes can enjoy the safety of a clean home. These liners make cleaning easy—simply remove and replace once the liner becomes soiled, or during regular upkeep. This is also great for use with tortoises, terrestrial turtles, invertebrates, lizards, and snakes.",
                'price' => 609.36,
                'in_stock' => 1,
                'stock_quantity' => 45,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            
            
            [
                'id' => 160,
                'product_name' => 'Rep-Cal Calcium with Vitamin D3 Ultrafine Powder Reptile Supplement, 3.3-oz jar',
                'slug' => 'rep-cal-calcium-with-vitamin-d3-ultrafine-powder-reptile-supplement-33-oz-jar',
                'images' => '["products/01JQGV6YKQWBN4QF0N3D6QC8S7.png"]',
                'description' => "Adds calcium to your companion’s diet to help him avoid issues associated with calcium deficiency.  
            Crafted with 100% natural oyster shell calcium carbonate and vitamin D for calcium absorption.  
            Specially formulated for reptiles and amphibians.  
            Easy to use—add the powder to your sidekick’s favorite paste, fruits or vegetables.  
            Made with zero preservatives or phosphorous.  
            
            Vitamin deficiencies are not uncommon in reptiles and amphibians bred in captivity, so Rep-Cal developed this Calcium Ultrafine Powder Reptile Supplement. Not getting enough calcium can result in slower growth, fertility complications and other issues. This formula is made with 100% natural oyster shell phosphorus-free calcium carbonate, plus vitamin D3 for normal calcium absorption. Add it to your buddy’s favorite fruits, vegetables and pastes to give him the calcium boost he needs.",
                'price' => 523.00,
                'in_stock' => 1,
                'stock_quantity' => 31,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],
            
            
            [
                'id' => 161,
                'product_name' => 'Zoo Med Electrolyte Reptile Soak, 8-oz jar',
                'slug' => 'zoo-med-electrolyte-reptile-soak-8-oz-jar',
                'images' => '["products/01JQGVAA98G62KG6GTF91J1EWB.png"]',
                'description' => "Formulated to provide reptiles with electrolytes, B vitamins, vitamin C, beta-carotene, a prebiotic and probiotics.  
            Helps regulate proper hydration and cellular function with electrolytes.  
            Beta-carotene (vitamin A) assists in color pigmentation.  
            B vitamins help support proper metabolism.  
            Antioxidant, vitamin C is important for your pet’s skin and immune health.  
            
            Zoo Med Electrolyte Reptile Soak provides your scaly sidekick with electrolytes, B vitamins, vitamin C, beta-carotene, a prebiotic and probiotics. Electrolytes can help regulate proper hydration and cellular function, beta-carotene can help assist in color pigmentation, B vitamins help promote proper metabolism and vitamin C helps support skin and immune health.",
                'price' => 458.46,
                'in_stock' => 1,
                'stock_quantity' => 33,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
            ],                  
        ]);
    }
}