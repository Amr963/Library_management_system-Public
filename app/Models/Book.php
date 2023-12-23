<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books'; // اسم الجدول في قاعدة البيانات
    protected $fillable = ['name', 'publishing_house', 'release_date'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }




    //لتخلص من هشغلة
    // edit the class AppServiceProvider
    //حط فيه
    // Model::unguard();

    // protected $fillable = ['name', 'publishing_house', 'release_date']; // input name





    // public static $rules = [
    //     'title' => 'required|string|max:255',
    //     'author' => 'required|string|max:255',
    //     'publication_date' => 'required|date',
    // ];

    // public static function validationRules($id = null)
    // {
    //     $rules = self::$rules;

    //     if ($id) {
    //         // إذا كنت تقوم بتحرير سجل موجود، يجب استبعاد السجل الحالي من قواعد الفريدة
    //         $rules['title'] = ['required', 'string', 'max:255', Rule::unique('books')->ignore($id)];
    //     } else {
    //         // إذا كنت تقوم بإنشاء سجل جديد، يمكنك التحقق من عدم تكرار العنوان
    //         $rules['title'] = ['required', 'string', 'max:255', Rule::unique('books')];
    //     }
    //     return $rules;
    // }



}
