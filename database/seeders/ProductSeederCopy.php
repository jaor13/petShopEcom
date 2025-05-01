<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeederCopy extends Seeder
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
