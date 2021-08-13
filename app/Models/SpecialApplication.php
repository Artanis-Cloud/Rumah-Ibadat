<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

use Illuminate\Notifications\Notifiable;



class SpecialApplication extends Model implements Auditable
{
    use HasFactory, Notifiable;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [

        'user_id',                  //user id

        'reference_number',
        'status',                   //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)
        'category',                 //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))

        'purpose',
        'supported_document_1',     //attachment
        'supported_document_2',     //attachment
        'requested_amount',         //money

        'not_approved_id',          //to identify user who give this status "Tidak Lullus"

        'exco_id',                  //flag_exco
        'exco_date_time',           //date-time

        'yb_id',                    //flag_yb
        'yb_date_time',             //date-time
    ];

    public function getPermohonanID()
    {
       

        if ($this->category == "TOKONG") {

            return sprintf('T%06d', $this->reference_number);
        } elseif ($this->category == "KUIL") {

            return sprintf('K%06d', $this->reference_number);
        } elseif ($this->category == "GURDWARA") {

            return sprintf('G%06d', $this->reference_number);
        } elseif ($this->category == "GEREJA") {

            return sprintf('C%06d', $this->reference_number);
        }
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
