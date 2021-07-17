<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Page extends Model
{
    protected $table = "page";
    protected $fillable = [
        'id' , 'name', 'cleanurl', 'name_en', 'cleanurl_en', 'description', 'description_en', 'text', 'text_en',
        'Active', 'the_order', 'parent_id', 'src', 'src_1', 'src_2', 'src_3', 'place', 'type_page', 'ext_link',
        'm_slider', 'm_news', 'm_main', 'facebook', 'twitter', 'google', 'e_date', 'coord', 'tag',
        'keyword_website', 'top_parent','counter', 'username', 'law_type', 'year', 'number', 'publish_date',
        'room', 'base_number', 'file_type', 'violation_type', 'penalty', 'activity_of', 'reason_for', 'phone_1',
        'phone_2', 'fax_1', 'title_1', 'employees', 'end_date', 'last_update', 'position', 'training_course',
        'organiser', 'is_right', 'src_1_en', 'violation_type_en', 'penalty_en', 'activity_of_en', 'reason_for_en',
        'employees_en' 	
    ];
    protected $appends = ['photo', 'photo_2', 'photo_3', 'pdf', 'pdf_en' , 'pages'];


    public function getPhotoAttribute()
    {
        return 'http://www.scfms.sy/pages/photos/'.$this->src;
    }
    public function getPhoto2Attribute()
    {
        return 'http://www.scfms.sy/pages/photos/'.$this->src_2;
    }
    public function getPhoto3Attribute()
    {
        return 'http://www.scfms.sy/pages/photos/'.$this->src_3;
    }
    public function getPdfAttribute()
    {
        return 'http://www.scfms.sy/pages/photos/'.$this->src_1;
    }
    public function getPdfEnAttribute()
    {
        return 'http://www.scfms.sy/pages/photos/'.$this->src_1_en;
    }

    //////////////////////////////////////////////////////////////////////////////////
    public function parent ()
    {
        return $this->belongsTo(Page::class,'id','parent_id');
    }
    public function sub_pages()
    {
        return $this->hasMany(Page::class,'parent_id','id');
    }
    public function getPagesAttribute()
    {
        $pages = new Collection();
        foreach ($this->sub_pages as $page) {
            $pages->push($page);
            $pages = $pages->merge($page->getPagesAttribute());
        }
        return $pages;
    }

}
