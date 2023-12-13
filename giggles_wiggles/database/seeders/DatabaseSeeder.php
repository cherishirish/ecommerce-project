<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ SeedCategories::class ]);
        $this->call([ SeedTaxRates::class ]);

        // Create Admin 
        \App\Models\User::factory()->create([
            'last_name' => 'User',
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => Hash::make('mypass')
        ]);
        // Create 10 users
        \App\Models\User::factory(10)->create();

        // For now, we have 11 users, let generate billing address for each user
        for($i=1; $i<=11; $i++){
            \App\Models\Address::factory()->create([
                'user_id' => $i,
                'address' => fake()->streetAddress(), 
                'postal_code' => fake()->postcode(), 
                'province' => fake()->state(), 
                'city' => fake()->city(), 
                'address_type' => 'billing'
            ]);
        }

        // Create products
        $products = [
            ['Baby Onesie', 1, 19.99, 'A baby onesie is a must-have for your little one. Our onesie is not only cute but also comfortable, making it perfect for everyday wear. Made with soft and breathable fabric, it ensures your baby stays cozy all day long.', 1, 100, 'G', 'product-1.jpg', null, null],
            ['Toddler Romper', 1, 24.99, 'Dress your toddler in style with our adorable romper. Crafted with attention to detail, it offers both fashion and comfort. Your little one will look charming and feel comfortable whether theyre playing or napping.', 1, 75, 'G', 'product-2.jpg', null, null],
            ['Baby Girl Dress', 1, 29.99, 'Make your baby girl look like a princess with our beautiful dress. This dress is designed to be both elegant and comfy, perfect for special occasions or everyday wear. Your little one will steal the spotlight wherever she goes.', 1, 60, 'F', 'product-3.jpg', null, null],
            ['Baby Boy T-Shirt', 1, 14.99, 'Keep your baby boy cool and stylish in our trendy t-shirt. Made with high-quality materials, its not only fashionable but also durable. Your little man will love wearing it for playtime or outings.', 1, 80, 'M', 'product-4.jpg', null, null],
            ['Newborn Hat and Socks Set', 1, 9.99, 'Ensure your newborn stays warm and cozy with our hat and socks set. Crafted with soft and gentle fabric, it provides comfort and protection for your precious bundle of joy.', 1, 120, 'G', 'product-5.jpg', null, null],
            ['Baby Pajama Set', 1, 21.99, 'Give your baby the gift of a good nights sleep with our comfortable pajama set. Designed for ease and comfort, its perfect for bedtime cuddles and sweet dreams.', 1, 90, 'G', 'product-6.jpg', null, null],
            ['Baby Sun Hat', 1, 12.99, 'Protect your baby from the suns rays with our adorable sun hat. Made with sun-safe materials, its both practical and cute. Your little one will enjoy outdoor adventures while staying shaded.', 1, 70, 'G', 'product-7.jpg', null, null],
            ['Baby Leggings', 1, 16.99, 'Dress your baby in style with our stretchy and stylish leggings. They provide ease of movement and keep your little one looking fashionable. Perfect for any occasion.', 1, 85, 'G', 'product-8.jpg', null, null],
            ['Baby Bodysuit Set', 1, 32.99, 'Our colorful and soft bodysuit set is a must-have for your babys wardrobe. Made with care, these bodysuits offer comfort and convenience for both you and your baby.', 1, 50, 'G', 'product-9.jpg', null, null],
            ['Baby Winter Jacket', 1, 39.99, 'Keep your baby warm and cozy during the winter season with our winter jacket. Designed to provide insulation and protection from the cold, its the perfect outerwear for your little one.', 1, 45, 'G', 'product-10.jpg', null, null],
            ['Baby Crib', 2, 199.99, 'Ensure your babys safety and comfort with our high-quality crib. Made with the utmost care, it provides a secure and peaceful sleeping environment for your precious one.', 1, 30, 'G', 'product-11.jpg', null, null],
            ['Changing Table', 2, 89.99, 'Make diaper changes a breeze with our convenient changing table. Its designed for efficiency and safety, ensuring your baby is comfortable during every diaper change.', 1, 40, 'G', 'product-12.jpg', null, null],
            ['Rocking Chair', 2, 149.99, 'Soothe your baby with our comfortable rocking chair. Its the perfect addition to your nursery, providing a cozy spot for you and your baby to bond.', 1, 25, 'G', 'product-13.jpg', null, null],
            ['Baby Dresser', 2, 129.99, 'Organize your babys clothes and essentials with our spacious dresser. Its designed to keep everything neat and tidy, making it easier for you to care for your baby.', 1, 35, 'G', 'product-14.jpg', null, null],
            ['Baby High Chair', 2, 79.99, 'Enjoy mealtime with your baby using our adjustable high chair. Its designed to provide a safe and comfortable eating experience for your little one.', 1, 50, 'G', 'product-15.jpg', null, null],
            
            
            ['Baby Bassinet', 2, 69.99, 'Keep your newborn close and cozy with our portable bassinet. Its perfect for naptime and nighttime sleep, ensuring your baby feels secure.', 1, 20, 'G', 'product-16.jpg', null, null],
            ['Baby Swing', 2, 59.99, 'Entertain and soothe your baby with our fun and soothing swing. Its designed to provide comfort and relaxation for your little one.', 1, 30, 'G', 'product-17.jpg', null, null],
            ['Baby Playpen', 2, 99.99, 'Create a safe space for your baby to explore and play with our secure playpen. Its perfect for keeping your baby engaged and protected.', 1, 15, 'G', 'product-18.jpg', null, null],
            ['Baby Rocking Bassinet', 2, 79.99, 'Soothe your baby with our rocking bassinet featuring music and lights. Its designed to create a calming atmosphere for your little one.', 1, 25, 'G', 'product-19.jpg', null, null],
            ['Baby Wardrobe', 2, 119.99, 'Stay organized with our spacious wardrobe for baby clothes. It offers plenty of storage space for all your babys outfits and accessories.', 1, 20, 'G', 'product-20.jpg', null, null],
            ['Plush Stuffed Animal', 3, 12.99, 'Give your baby a cuddly companion with our soft and lovable stuffed animal toy. Its perfect for snuggles and playtime, providing comfort and companionship.', 1, 100, 'G', 'product-21.jpg', null, null],
            ['Baby Rattle Set', 3, 9.99, 'Stimulate your babys senses with our colorful and noisy rattle set. Its designed to encourage sensory development and provide hours of entertainment.', 1, 80, 'G', 'product-22.jpg', null, null],
            
            
            ['Baby Activity Gym', 3, 29.99, 'Promote motor skills development with our interactive play gym. It offers a fun and engaging way for your baby to explore and learn.', 1, 60, 'G', 'product-23.jpg', null, null],
            ['Musical Mobile', 3, 19.99, 'Enhance your babys crib with our musical mobile. It plays soothing melodies and provides visual stimulation for your baby.', 1, 75, 'G', 'product-24.jpg', null, null],
            ['Baby Teething Toy', 3, 7.99, 'Ease your babys teething discomfort with our teething toy. Its designed to provide relief and comfort during this important developmental stage.', 1, 90, 'G', 'product-25.jpg', null, null],
            ['Baby Play Mat', 3, 24.99, 'Encourage tummy time and play with our soft and padded play mat. Its perfect for early developmental activities and exploration.', 1, 70, 'G', 'product-26.jpg', null, null],
            ['Baby Shape Sorter', 3, 14.99, 'Support your babys cognitive development with our educational shape sorter toy. It helps improve problem-solving skills and hand-eye coordination.', 1, 85, 'G', 'product-27.jpg', null, null],
            ['Baby Bath Toys', 3, 8.99, 'Make bath time fun with our floating bath toys. They provide entertainment and stimulation for your baby during their bath.', 1, 120, 'G', 'product-28.jpg', null, null],
            ['Baby Stacking Rings', 3, 10.99, 'Enhance your babys fine motor skills with our stacking rings toy. Its designed to help your baby develop their hand-eye coordination.', 1, 60, 'G', 'product-29.jpg', null, null],
            ['Baby Push Walker', 3, 29.99, 'Assist your baby in taking their first steps with our push walker. It offers support and stability as your baby learns to walk.', 1, 40, 'G', 'product-30.jpg', null, null],
            ['Baby Crib Bedding Set', 4, 49.99, 'Create a cozy and inviting crib environment with our bedding set. It includes everything you need for a comfortable nights sleep for your baby.', 1, 50, 'G', 'product-31.jpg', null, null],
            ['Baby Swaddle Blankets', 4, 19.99, 'Swaddle your newborn in softness with our breathable swaddle blankets. Theyre designed to provide comfort and security for your baby.', 1, 80, 'G', 'product-32.jpg', null, null],
            ['Baby Quilt', 4, 39.99, 'Add warmth and comfort to your babys crib with our quilted blanket. Its perfect for keeping your little one snug during naptime and bedtime.', 1, 45, 'G', 'product-33.jpg', null, null],
            ['Baby Fitted Sheets', 4, 12.99, 'Ensure a secure fit for your babys crib mattress with our fitted sheets. Theyre designed for convenience and safety.', 1, 70, 'G', 'product-34.jpg', null, null],
            ['Baby Sleep Sack', 4, 17.99, 'Provide a safe and cozy sleep environment for your baby with our wearable sleep sack. Its designed to keep your baby comfortable throughout the night.', 1, 65, 'G', 'product-35.jpg', null, null],
            ['Baby Pillow', 4, 9.99, 'Support your infants head and neck with our soft and supportive baby pillow. Its designed for optimal comfort during sleep.', 1, 100, 'G', 'product-36.jpg', null, null],
            ['Baby Bumper Pad', 4, 14.99, 'Protect your baby from crib rails with our bumper pad. It adds a layer of safety to your babys crib.', 1, 60, 'G', 'product-37.jpg', null, null],
            ['Baby Crib Mobile', 4, 19.99, 'Add visual and auditory stimulation to your babys crib with our colorful and stimulating mobile. Its designed to captivate your babys attention.', 1, 75, 'G', 'product-38.jpg', null, null],
            ['Baby Bed Canopy', 4, 24.99, 'Create a dreamy atmosphere in your babys nursery with our bed canopy. It adds a touch of magic to the room.', 1, 40, 'G', 'product-39.jpg', null, null],
            ['Baby Nursery Bedding Set', 4, 69.99, 'Complete your nursery decor with our comprehensive bedding set. It includes crib sheets, blankets, and more to create a cozy and coordinated look.', 1, 35, 'G', 'product-40.jpg', null, null],
            ['Baby Bath Tub', 5, 29.99, 'Make bath time safe and enjoyable with our ergonomic baby bath tub. Its designed to provide a comfortable and secure bathing experience for your baby.', 1, 50, 'G', 'product-41.jpg', null, null],
            ['Baby Hooded Towels', 5, 12.99, 'Wrap your baby in warmth and softness with our absorbent hooded towels. Theyre perfect for post-bath cuddles and keeping your baby cozy.', 1, 80, 'G', 'product-42.jpg', null, null],
            
            
            ['Baby Bathrobe', 5, 16.99, 'Keep your baby warm and cozy after bath time with our soft bathrobe. Its designed for comfort and convenience.', 1, 65, 'G', 'product-43.jpg', null, null],
            ['Baby Bath Thermometer', 5, 9.99, 'Ensure your babys bath water is at the perfect temperature with our floating thermometer. It provides peace of mind during bath time.', 1, 90, 'G', 'product-44.jpg', null, null],
            ['Baby Shampoo and Body Wash', 5, 7.99, 'Gently cleanse your babys delicate skin and hair with our tear-free shampoo and body wash. Its designed for the utmost care and gentleness.', 1, 120, 'G', 'product-45.jpg', null, null],
            ['Baby Bath Mat', 5, 14.99, 'Add safety to bath time with our non-slip bath mat. It ensures your babys stability while bathing.', 1, 70, 'G', 'product-46.jpg', null, null],
            ['Baby Bath Seat', 5, 19.99, 'Support your baby during bath time with our bath seat. Its designed to help your baby sit securely.', 1, 55, 'G', 'product-47.jpg', null, null],
            ['Baby Bath Toys Organizer', 5, 8.99, 'Keep bath toys organized and tidy with our mesh organizer. Its perfect for maintaining a clutter-free bath space.', 1, 100, 'G', 'product-48.jpg', null, null],
            ['Baby Bath Spout Cover', 5, 6.99, 'Prevent bumps and bruises during bath time with our soft spout cover. It adds a layer of safety to your babys bath.', 1, 75, 'G', 'product-49.jpg', null, null],
            ['Baby Bath Mittens', 5, 5.99, 'Make bath time gentle and fun with our cute animal-shaped bath mittens. Theyre designed for gentle cleaning.', 1, 90, 'G', 'product-50.jpg', null, null],
            ['Baby Stroller', 6, 149.99, 'Stay on the move with your baby using our lightweight and easy-to-fold stroller. It offers convenience and comfort for both you and your little one.', 1, 40, 'G', 'product-51.jpg', null, null],
            ['Baby Diaper Bag', 6, 49.99, 'Stay organized and stylish with our spacious diaper bag. It features multiple compartments for all your babys essentials.', 1, 60, 'G', 'product-52.jpg', null, null],
            ['Baby Car Seat', 6, 99.99, 'Ensure your babys safety during car rides with our comfortable and secure car seat. Its designed for infants and provides peace of mind.', 1, 35, 'G', 'product-53.jpg', null, null],
            ['Baby Carrier', 6, 39.99, 'Experience hands-free mobility with our ergonomic baby carrier. Its designed for comfort and convenience, allowing you to keep your baby close.', 1, 50, 'G', 'product-54.jpg', null, null],
            ['Baby Playpen', 6, 69.99, 'Create a safe space for your baby to explore and play with our secure playpen. Its perfect for keeping your baby engaged and protected.', 1, 30, 'G', 'product-55.jpg', null, null],
            ['Baby Monitor', 6, 79.99, 'Keep an eye on your baby with our video baby monitor. It provides real-time monitoring and peace of mind.', 1, 45, 'G', 'product-56.jpg', null, null],
            ['Baby Bouncer', 6, 29.99, 'Keep your baby entertained and comfortable with our bouncing seat. Its perfect for playtime and relaxation.', 1, 55, 'G', 'product-57.jpg', null, null],
            ['Baby Travel Cot', 6, 59.99, 'Ensure your baby has a comfortable sleeping arrangement while traveling with our portable travel cot. Its designed for on-the-go parents.', 1, 25, 'G', 'product-58.jpg', null, null],
            ['Baby High Chair', 6, 49.99, 'Enjoy mealtime with your baby using our adjustable high chair. Its designed to provide a safe and comfortable eating experience for your little one.', 1, 40, 'G', 'product-59.jpg', null, null],
            ['Baby Backpack', 6, 34.99, 'Stay on the move with our backpack-style diaper bag designed for parents who are always on the go. It combines style and functionality for busy families.', 1, 70, 'G', 'product-60.jpg', null, null],
        ];

        foreach($products as $product){
           
           \App\Models\Product::factory()->create([
               'product_name' => $product[0],
               'category_id' => $product[1],
               'price' => $product[2],
               'description' => $product[3],
               'availability' => $product[4],
               'quantity' => $product[5],
               'gender' => $product[6],
               'image' => $product[7]
           ]);
       }

        // // Create 36 products
        // \App\Models\Product::factory(36)->create();

        // // Generate 5 images for each product
        // for($i=1; $i<=36; $i++){
        //     // image name for each product. Example: product_1_image_01.png 
        //     $image_name1 = 'product_' . $i . '_image_01.png';
        //     $image_name2 = 'product_' . $i . '_image_02.png';
        //     $image_name3 = 'product_' . $i . '_image_03.png';
        //     $image_name4 = 'product_' . $i . '_image_04.png';
        //     $image_name5 = 'product_' . $i . '_image_05.png';
          
           
        //     // On Linux platform, let's update the image file name to a specific file name
        //     if(PHP_OS === 'Linux'){

        //         // Generate random image locally, the image file name could be like: a1b439cbb6f2b71dbb669bf07614bee5.png. 
        //     // This function is not working on Windows Platform due to permission constraints
        //     $image_file1 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
        //     $image_file2 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
        //     $image_file3 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
        //     $image_file4 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
        //     $image_file5 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));

        //         Storage::disk('images')->move($image_file1, $image_name1);
        //         Storage::disk('images')->move($image_file2, $image_name2);
        //         Storage::disk('images')->move($image_file3, $image_name3);
        //         Storage::disk('images')->move($image_file4, $image_name4);
        //         Storage::disk('images')->move($image_file5, $image_name5);
        //     }
        //     \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name1 ]);
        //     \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name2 ]);
        //     \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name3 ]);
        //     \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name4 ]);
        //     \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name5 ]);
        // }
    }
}
