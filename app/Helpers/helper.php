<?php

use App\Models\Actualite;
use App\Models\Horaire;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

function get_day($date){
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    return strftime("%A", $date);
}

function get_weekly_horaire($id){
    return Horaire::join("seances", "horaires.id", "=", "seances.horaire_id")
                    ->join("cours", "seances.cours_id", "=", "cours.id")
                    ->join("enseignants", "cours.enseignant_id", "=", "enseignants.id")
                    ->join("users", "enseignants.user_id", "=", "users.id")
                    ->where('horaires.promotion_id', $id)
                    ->whereBetween('seances.heure_debut', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->get();
}

function get_option($option_key)
{
    if (\App\Models\Setting::where('option_key', $option_key)->count() > 0) {
        $option = \App\Models\Setting::where('option_key', $option_key)->first();
        return $option->option_value;
    } else {
        return '';
    }

}

function languages()
{
    return \App\Models\Language::where('status', 1)->get();
}

function get_lastest_news()
{
    return Actualite::orderBy("id", "desc")
    ->take(3)
    ->get();
}

