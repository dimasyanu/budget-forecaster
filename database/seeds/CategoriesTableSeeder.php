<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 20)->create()->each(function ($item) {
			$parent = Category::whereNull('parent_id')->get();
			$parent = collect([$parent->random(), null])->random();

			$item->parent_id = $parent !== null && $parent->id !== $item->id ? $parent->id : null;
			$item->type = $parent !== null ? $parent->type : collect(['income', 'expanse'])->random();
			$item->save();
        });
    }
}
