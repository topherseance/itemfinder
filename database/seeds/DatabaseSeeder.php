<?php

require_once( base_path() . '\vendor\fzaninotto\faker\src\autoload.php' );

use App\User;
use App\Shop;
use App\Item;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
		$admin = new User;
		$admin->username = 'admin';
		$admin->password = Hash::make('admin');
		$admin->save();
		
		$this->command->info('Admin user created');
		
		
		// Configs
		$itemNames = [ 'Obeng', 'Tang', 'Monitor', 'Sekop', 'Palu', 'Papan', 'Laptop', 'Kursi', 'Meja' ];
		$minimumItemPerShop = 3;
		$centerLatitude = -7.9578542;
		$centerLongitude = 112.5890962;
		$shopCount = 50;
		
		$itemsCount = count($itemNames);
		$faker = Faker\Factory::create();
		
		$itemNum = 0;
		for ($i=0; $i<$shopCount; $i++)
		{
			$shop = new Shop;
			$shop->name = $faker->company . ' ' . $faker->companySuffix;
			$shop->owner = $faker->name;
			$shop->address = $faker->address;
			$shop->latitude = $centerLatitude + $faker->randomFloat(6, -0.002, 0.002);
			$shop->longitude = $centerLongitude + $faker->randomFloat(6, -0.002, 0.002);
			$shop->save();
			
			$itemsSoldCount = $faker->numberBetween($minimumItemPerShop, $itemsCount);
			$itemsSold = $faker->randomElements($itemNames, $itemsSoldCount);
			
			$this->command->info('Shop ' . $i . ' only sells items: ' . implode(' ', $itemsSold));
			
			for ($j=0; $j<$itemsSoldCount; $j++)
			{
				$itemNum++;
				$item = new Item;
				$item->shop_id = $shop->id;
				$item->name = $itemsSold[$j];
				$item->description = $faker->text;
				$item->price = $faker->numberBetween($min = 1000, $max = 9000000);
				$item->save();
			}
		}
		
		$this->command->info('Seeded with dummy data: ' . $shopCount . ' shops and ' . $itemNum . ' items total');

        Model::reguard();
    }
}
