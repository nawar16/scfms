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
    protected $appends = ['photo', 'photo_2', 'photo_3', 'pdf', 'pdf_en', 'pages'];


    public function getPhotoAttribute()
    {
        return $this->src != "" &&  !is_null($this->src) 
        ? 'http://www.scfms.sy/pages/photos/'.$this->src : null;
    }
    public function getPhoto2Attribute()
    {
        return $this->src_2 != "" &&  !is_null($this->src_2)
        ? 'http://www.scfms.sy/pages/photos/'.$this->src_2 : null;
    }
    public function getPhoto3Attribute()
    {
        return  $this->src_3 != "" &&  !is_null($this->src_3)
        ? 'http://www.scfms.sy/pages/photos/'.$this->src_3 : null;
    }
    public function getPdfAttribute()
    {
        return  $this->src_1 != "" &&  !is_null($this->src_1)
        ? 'http://www.scfms.sy/pages/photos/'.$this->src_1 : null;
    }
    public function getPdfEnAttribute()
    {
        return  $this->src_1_en != "" &&  !is_null($this->src_1_en)
        ? 'http://www.scfms.sy/pages/photos/'.$this->src_1_en : null;
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
        return $this->sub_pages()->paginate(1);
    }
    ////////////////--- INFINITY DEPTH ---////////////////
    /*public function getPagesAttribute()
    {
        $pages = new Collection();
        foreach ($this->pages_paginated as $page) {
            $pages->push($page);
            $pages = $pages->merge($page->getPagesAttribute());
        }
        return $pages;
    }*/


}
