<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Product ;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // Create Category

      DB::table('catalog_category_entity')->delete();
      for ($i=0; $i < 5; $i++) {
        $category = array(
          'name' => 'category'.$i,
          'is_active' => 1,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        DB::table('catalog_category_entity')->insert($category);
      }

      // Create Product

      DB::table('catalog_product_entity')->delete();

      for ($i=1; $i <= 5; $i++) {
        $product = array(
          'name' => 'Test'.$i,
          'description' => 'lorem epson ted dasdf dsfasadsf',
          'sku' => 'sku'.$i,
          'price' => 1000,
          'special_price' => 800,
          'is_active' => 1,
          'quanlity' => 15,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        );

        DB::table('catalog_product_entity')->insert($product);
      }

      // Create Image
      DB::table('catalog_product_image')->delete();
      $path = '/catalog/img/product/';
      for($i =1;$i <=5 ;$i++){
        $new = $path.$i.'/img-bob.jpg';
        $img = array(
          'pro_id' => $i,
          'path' =>  $new,
          'position' => 0,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        DB::table('catalog_product_image')->insert($img);

      };

      DB::table('customer_entity')->delete();
      $user = array(
        'user_id' => 'Nosh' ,
        'first_name' => 'ABC' ,
        'last_name' => 'EFG' ,
        'address' => 'required',
        'sub_district' => 'required',
        'district' => 'required',
        'province' => 'required',
        'country' => 'required',
        'post_number' => '10234',
        'email' => 'test@email.com' ,
        'password' => bcrypt('123123'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

      );
      DB::table('customer_entity')->insert($user);

      DB::table('admin_entity')->delete();
      $admin = array(
        'user_id' => 'Nosh' ,
        'first_name' => 'firstname' ,
        'last_name' => 'lastname' ,
        'email' => 'test@email.com' ,
        'password' => bcrypt('123123'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      );
      DB::table('admin_entity')->insert($admin);

    }

}
