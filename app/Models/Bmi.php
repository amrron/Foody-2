<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bmi extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getNilaiAttribute() {
        return round($this->berat_badan / pow($this->tinggi_badan / 100, 2), 2);
    }

    public function getKategoriAttribute(){
        $bmi = $this->nilai;

        if($bmi < 18.5){
            return [
                'status' => "Berat badan kurang",
                'color' => '#BCD9FF',
                'strongColor' => '#1270EE'
            ];
        }
        elseif($bmi >= 18.5 &&  $bmi <= 24.9){
            return [
                'status' => "Berat badan normal",
                'color' => '#CCFFB4',
                'strongColor' => '#33A14D'
            ];
        }
        elseif($bmi >= 25 &&  $bmi <= 29.9){
            return [
                'status' => "Kelebihan berat badan",
                'color' => '#FFE0BD',
                'strongColor' => '#FA8804'
            ];
        }
        elseif($bmi >= 30 &&  $bmi <= 34.9){
            return [
                'status' => "Obesitas tingkat I",
                'color' => '#F9D8D8',
                'strongColor' => '#CD224C'
            ];
        }
        elseif($bmi >= 35 &&  $bmi <= 39.9){
            return [
                'status' => "Obesitas tingkat II",
                'color' => '#F9D8D8',
                'strongColor' => '#CD224C'
            ];
        }
        else {
            return [
                'status' => "Obesitas tingkat III",
                'color' => '#F9D8D8',
                'strongColor' => '#CD224C'
            ];
        }
    }

    public function getTanggalWaktuAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y/m/d');
    }

    public function getWaktuAttribute(){
        return Carbon::parse($this->created_at)->format('Y/m/d');
    }

    public function getHariAttribute() {
        return Carbon::parse($this->created_at)->locale('id')->dayName;
    }
}
