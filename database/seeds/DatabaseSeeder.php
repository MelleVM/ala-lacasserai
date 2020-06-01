<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $useritems = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$akHCvTRpvma2eB8VOqUEoOtpWEelS2/e2TZK3LJyfLxuvw8MrQxVq', 'role_id' => 3, 'remember_token' => '', 'address' => '', 'residence' => '', 'postal_code' => ''],

        ];

        $roomitems = [
            
            ['id' => 1, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 50, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 2, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 100, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 3, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 80, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 4, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 80, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 5, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 35, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 6, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 50, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 7, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 50, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 8, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 40, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 9, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 50, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 10, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 100, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 11, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 80, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 12, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 50, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],
            ['id' => 13, 'room_number' => 1, 'clean' => true, 'floor' => 1, 'description' => 'This is a room description, you can update it in the admin panel', 'price' => 50, 'disc' => 5, 'state' => 'available', 'type' => 'single', 'title' => 'Fancy room title', 'rating' => 5, 'cover_image' => 'room-1.jpg'],

        ];

        $bookingitems = [
            
            ['id' => 1, 'nights' => 2, 'additional_information' => 'None', 'payed' => 0, 'payment_method' => 'amex', 'price' => 45, 'state' => 'confirmed', 'room_number' => 1, 'user_id' => 1, 'room_id' => 1 ],

        ];

        foreach ($useritems as $useritem) {
            \App\User::create($useritem);
        }

        foreach ($roomitems as $roomitem) {
            \App\Room::create($roomitem);
        }

        foreach ($bookingitems as $bookingitem) {
            \App\Booking::create($bookingitem);
        }
    }
}
