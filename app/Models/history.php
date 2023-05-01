<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class history extends Model
{
    use HasFactory;
    protected $table = "history";
    protected $fillable = ['judul', 'tipe', 'start', 'end', 'info1', 'info2', 'info3', 'isi'];
    
    protected $appends = ['new_start_date', 'new_end_date'];

    public function getNewStartDateAttribute(){
        return Carbon::parse($this->attributes['start'])->translatedFormat('d F Y');
    }
    public function getNewEndDateAttribute(){
        if($this->attributes['end']){
            return Carbon::parse($this->attributes['end'])->translatedFormat('d F Y');
        }else{
            return 'Present';
        }
        
    }

}
