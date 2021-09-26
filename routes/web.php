<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\GroupeMatiereController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SequenceController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TrimestreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route("front.setting.index.session");
})->name("front");

Route::prefix("admin")->group(function () {

    Route::get('/', function () {
        return redirect()->route("front.page", ["slug" => "dashboard_view"]);
    })->name("front.index");

    Route::get('/{slug}', function (Request $request, string $slug) {

        if(view()->exists("inc.pages.".$slug)){
            return view("inc.pages.".$slug, compact("slug"));
        }

        return view("inc.pages.page", compact("slug"));
    })->name("front.page")->middleware(["auth", "hasSetting"]);

    //Année scolaire
    Route::get('/annee_scolaire_view/index', [AnneeScolaireController::class, "show"])->name("front.annee.index");
    Route::get('/annee_scolaire_wiew/delete/{id}', [AnneeScolaireController::class, "del"])->name("front.annee.delete");
    Route::get('/annee_scolaire_wiew/status/{id}/{etat}', [AnneeScolaireController::class, "status"])->name("front.annee.status");
    Route::post('/annee_scolaire_view/creat', [AnneeScolaireController::class, 'creat'])->name("front.annee.creat");
    Route::get('/annee_scolaire_wiew/edit/{id}', [AnneeScolaireController::class, "edit"])->name("front.annee.edit");
    Route::post('/annee_scolaire_wiew/update', [AnneeScolaireController::class, "update"])->name("front.annee.update");

    //Session
    Route::get('/session_view/index', [SessionController::class, "show"])->name("front.session.index");
    Route::get('/session_view/delete/{id}', [SessionController::class, "del"])->name("front.session.delete");
    Route::get('/session_view/status/{id}/{etat}', [SessionController::class, "status"])->name("front.session.status");
    Route::post('/session_view/creat', [SessionController::class, 'creat'])->name("front.session.creat");
    Route::get('/session_view/edit/{id}', [SessionController::class, "edit"])->name("front.session.edit");
    Route::post('/session_view/update', [SessionController::class, "update"])->name("front.session.update");

    //Trimestre
    Route::get('/trimestre_view/index', [TrimestreController::class, "show"])->name("front.trimestre.index");
    Route::get('/trimestre_view/delete/{id}', [TrimestreController::class, "del"])->name("front.trimestre.delete");
    Route::get('/trimestre_view/status/{id}/{etat}', [TrimestreController::class, "status"])->name("front.trimestre.status");
    Route::post('/trimestre_view/creat', [TrimestreController::class, 'creat'])->name("front.trimestre.creat");
    Route::get('/trimestre_view/edit/{id}', [TrimestreController::class, "edit"])->name("front.trimestre.edit");
    Route::post('/trimestre_view/update', [TrimestreController::class, "update"])->name("front.trimestre.update");

    //Sequence
    Route::get('/sequence_view/index', [SequenceController::class, "show"])->name("front.sequence.index");
    Route::get('/sequence_view/delete/{id}', [SequenceController::class, "del"])->name("front.sequence.delete");
    Route::get('/sequence_view/status/{id}/{etat}', [SequenceController::class, "status"])->name("front.sequence.status");
    Route::post('/sequence_view/creat', [SequenceController::class, 'creat'])->name("front.sequence.creat");
    Route::get('/sequence_view/edit/{id}', [SequenceController::class, "edit"])->name("front.sequence.edit");
    Route::post('/sequence_view/update', [SequenceController::class, "update"])->name("front.sequence.update");

    //Filière
    Route::get('/filiere_view/index', [FiliereController::class, "show"])->name("front.filiere.index");
    Route::get('/filiere_view/delete/{id}', [FiliereController::class, "del"])->name("front.filiere.delete");
    Route::get('/filiere_view/status/{id}/{etat}', [FiliereController::class, "status"])->name("front.filiere.status");
    Route::post('/filiere_view/creat', [FiliereController::class, 'creat'])->name("front.filiere.creat");
    Route::get('/filiere_view/edit/{id}', [FiliereController::class, "edit"])->name("front.filiere.edit");
    Route::post('/filiere_view/update', [FiliereController::class, "update"])->name("front.filiere.update");

    //Classe
    Route::get('/classe_view/index', [ClasseController::class, "show"])->name("front.classe.index");
    Route::get('/classe_view/delete/{id}', [ClasseController::class, "del"])->name("front.classe.delete");
    Route::get('/classe_view/status/{id}/{etat}', [ClasseController::class, "status"])->name("front.classe.status");
    Route::post('/classe_view/creat', [ClasseController::class, 'creat'])->name("front.classe.creat");
    Route::get('/classe_view/edit/{id}', [ClasseController::class, "edit"])->name("front.classe.edit");
    Route::post('/classe_view/update', [ClasseController::class, "update"])->name("front.classe.update");

    //Groupe Matière
    Route::get('/groupe_matiere_view/index', [GroupeMatiereController::class, "show"])->name("front.groupe_matiere.index");
    Route::get('/groupe_matiere_view/delete/{id}', [GroupeMatiereController::class, "del"])->name("front.groupe_matiere.delete");
    Route::get('/groupe_matiere_view/status/{id}/{etat}', [GroupeMatiereController::class, "status"])->name("front.groupe_matiere.status");
    Route::post('/groupe_matiere_view/creat', [GroupeMatiereController::class, 'creat'])->name("front.groupe_matiere.creat");
    Route::get('/groupe_matiere_view/edit/{id}', [GroupeMatiereController::class, "edit"])->name("front.groupe_matiere.edit");
    Route::post('/groupe_matiere_view/update', [GroupeMatiereController::class, "update"])->name("front.groupe_matiere.update");

    //Matière
    Route::get('/matiere_view/index', [MatiereController::class, "show"])->name("front.matiere.index");
    Route::get('/matiere_view/delete/{id}', [MatiereController::class, "del"])->name("front.matiere.delete");
    Route::get('/matiere_view/status/{id}/{etat}', [MatiereController::class, "status"])->name("front.matiere.status");
    Route::post('/matiere_view/creat', [MatiereController::class, 'creat'])->name("front.matiere.creat");
    Route::get('/matiere_view/edit/{id}', [MatiereController::class, "edit"])->name("front.matiere.edit");
    Route::post('/matiere_view/update', [MatiereController::class, "update"])->name("front.matiere.update");

    //Elèves
    Route::get('/eleves_view/index', [EleveController::class, "show"])->name("front.eleves.index");
    Route::get('/eleves_view/profil/{id}', [EleveController::class, "profil"])->name("front.eleve.profil");
    Route::get('/eleves_view/delete/{id}', [EleveController::class, "del"])->name("front.eleve.delete");
    Route::get('/eleves_view/status/{id}/{etat}', [EleveController::class, "status"])->name("front.eleve.status");
    Route::post('/eleves_view/creat', [EleveController::class, 'creat'])->name("front.eleve.creat");
    Route::get('/eleves_view/edit/{id}', [EleveController::class, "edit"])->name("front.eleve.edit");
    Route::post('/eleves_view/update', [EleveController::class, "update"])->name("front.eleve.update");
    Route::get('/eleves_view/paiement/{id}', [EleveController::class, "paiement"])->name("front.eleve.paiement");
    Route::post('/eleves_view/paiement/add', [EleveController::class, "paiementAdd"])->name("front.eleve.paiement.add");
    Route::get('/eleves_view/paiement/delete/{id}', [EleveController::class, "paiementDel"])->name("front.eleve.paiement.delete");

    //Enseignant
    Route::get('/enseignants_view/index', [EnseignantController::class, "show"])->name("front.enseignant.index");
    Route::get('/enseignants_view/profil/{id}', [EnseignantController::class, "profil"])->name("front.enseignant.profil");
    Route::get('/enseignants_view/delete/{id}', [EnseignantController::class, "del"])->name("front.enseignant.delete");
    Route::get('/enseignants_view/status/{id}/{etat}', [EnseignantController::class, "status"])->name("front.enseignant.status");
    Route::post('/enseignants_view/creat', [EnseignantController::class, 'creat'])->name("front.enseignant.creat");
    Route::get('/enseignants_view/edit/{id}', [EnseignantController::class, "edit"])->name("front.enseignant.edit");
    Route::post('/enseignants_view/update', [EnseignantController::class, "update"])->name("front.enseignant.update");

    //Cours
    Route::get('/cours_view/index', [CoursController::class, "show"])->name("front.cours.index");
    Route::get('/cours_view/delete/{id}', [CoursController::class, "del"])->name("front.cours.delete");
    Route::get('/cours_view/status/{id}/{etat}', [CoursController::class, "status"])->name("front.cours.status");
    Route::post('/cours_view/creat', [CoursController::class, 'creat'])->name("front.cours.creat");
    Route::get('/cours_view/edit/{id}', [CoursController::class, "edit"])->name("front.cours.edit");
    Route::post('/cours_view/update', [CoursController::class, "update"])->name("front.cours.update");

    //Notes
    Route::get('/note_view/index', [NoteController::class, "show"])->name("front.note.index");
    Route::post('/note_view/show/form', [NoteController::class, "show_form_add"])->name("front.note.show_form_add");
    Route::post('/note_view/show/cours', [NoteController::class, "show_select_cours"])->name("front.note.show_cours");
    Route::post('/note_view/creat', [NoteController::class, 'creat'])->name("front.note.creat");
    Route::post('/note_view/edit/', [NoteController::class, "show_form_add"])->name("front.note.edit");
    Route::post('/note_view/update', [NoteController::class, "update"])->name("front.note.update");

    //Bulletin
    Route::get('/bulletins_sequence_view/index', [BulletinController::class, "index_sequence"])->name("front.bulletin_sequence.index");
    Route::post('/bulletins_sequence_view/show/bulletin_sequence', [BulletinController::class, "show_sequence"])->name("front.bulletin_sequence.show");
    Route::get('/bulletins_trimestre_view/index', [BulletinController::class, "index_trimestre"])->name("front.bulletin_trimestre.index");
    Route::post('/bulletins_trimestre_view/show/bulletin_trimestre', [BulletinController::class, "show_trimestre"])->name("front.bulletin_trimestre.show");
});

Route::prefix("setting")->group(function (){

    Route::get("/", [SettingController::class, "show"])->name("front.setting.index.session")->middleware("auth");
    Route::get("/annee_current/{id}", [SettingController::class, "changeAnneeCurrent"])->name("front.setting.annee_current")->middleware("auth");
    Route::get("/session/{id}", [SettingController::class, "changeSession"])->name("front.setting.session")->middleware("auth");
    Route::post("/session", [SettingController::class, "defaultSession"])->name("front.setting.default_session")->middleware("auth");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
