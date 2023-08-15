composer create-project --prefer-dist laravel/laravel demo
cd demo

php artisan make:model Picture -m

--------------------------------------------------------------------
public function up()
{
    Schema::create('pictures', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('path');
        $table->timestamps();
    });
}
--------------------------------------------------------------------

php artisan make:controller CropImageController
php artisan migrate


View Create File (crop-image-upload.blade.php)


php artisan serve
http://127.0.0.1:8000/crop-image-upload

