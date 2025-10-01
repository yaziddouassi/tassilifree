<?php

namespace Tassili\Free\Utils;
use Illuminate\Support\Str;

class WizardPart
{
   public $piece1;
   public $piece2;
   public $piece3;
   public $piece4;

public function getPiece1($a,$b,$c) {


    $this->piece1 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Tassili\Free\Http\Controllers\WizardCreate;
use Tassili\Free\Fields\TextInput;
use App\Http\Controllers\Controller;


class CreatorController extends Controller
{
   
    private string  \$tassiliModelClass = 'App\Models\\$a';
    private WizardCreate \$tassili;

     public function __construct()
    {
        \$this->tassili = new WizardCreate([
            'tassiliShowOther' => true,
            'tassiliDataModelLabel' => '$b',
            'tassiliDataModelTitle' => 'Create $b',
            'tassiliDataRouteListe' => '/admin/$c',
            'tassiliDataUrlCreate' => '/admin/$c/create',
            'tassiliModelClass' => \$this->tassiliModelClass,
            'tassiliModelClassName' => '$a',
            'tassiliValidationUrl' => '/admin/$c/create/validation',
        ]);

        \$this->initField();
    }


     public function initField()
    {
        \$this->tassili->form([
            TextInput::make('name'),
            TextInput::make('city'),
        ])->wizard([
            'wizardCount' => 2,
            'wizardForm' => [1 => ['name'], 2 => ['city']],
            'wizardLabel' => [1 => 'first', 2 => 'second'],
            'wizardStop' => [],
        ]);
    }

    #[Post('admin/$c/create/validation', middleware: ['tassili.auth'])]
    public function create(Request \$request)
    {
        if (\$request->tassiliWizardStep == 1) {
            \$request->validate(['name' => ['required']]);
        }

        if (\$request->tassiliWizardStep == 2) {
            \$request->validate(['city' => ['required']]);
        }

        if (\$request->tassiliSaveActive === 'yes') {
            \$this->tassili->tassiliRecord = new \$this->tassiliModelClass;
            \$this->tassili->createRecord(\$request);
            \$this->tassili->tassiliRecord->save();
        }
    }

    #[Get('admin/$c/create', middleware: ['tassili.auth'])]
    public function index(Request \$request)
    {
        return Inertia::render('TassiliPages/Admin/Crud/$a/Creator', [
            'user' => Auth::user(),
            'routes' => \Tassili\Free\Models\TassiliCrud::where('active', true)->get(),
            'tassiliSettings' => \$this->tassili->tassiliSettings,
            'tassiliFields' => \$this->tassili->tassiliFields,
            'tassiliWizardInfo' => \$this->tassili->tassiliWizardInfo,
            'tassiliUrlStorage' => config('tassili.storage_url'),
        ]);
    }
    

   

}
    ";

    return $this->piece1;
   }



   public function getPiece2($a,$b,$c) {
          $this->piece2 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Tassili\Free\Http\Controllers\WizardUpdate;
use Tassili\Free\Fields\TextInput;
use App\Http\Controllers\Controller;

class UpdatorController extends Controller
{
    
    private string  \$tassiliModelClass = 'App\Models\\$a';
    private WizardUpdate \$tassili;

     public function __construct()
    {
        \$this->tassili = new WizardUpdate([
            'tassiliDataModelLabel' => '$b',
            'tassiliDataModelTitle' => 'Update $b',
            'tassiliDataRouteListe' => '/admin/$c',
            'tassiliDataUrlCreate' => '/admin/$c/create',
            'tassiliModelClass' => \$this->tassiliModelClass,
            'tassiliModelClassName' => '$a',
            'tassiliValidationUrl' => '/admin/$c/updator/validation',
        ]);

        \$this->initField();
    }

     
    public function initField()
    {
         \$this->tassili->form([
            TextInput::make('name'),
            TextInput::make('city'),
        ])->wizard([
            'wizardCount' => 2,
            'wizardForm' => [1 => ['name'], 2 => ['city']],
            'wizardLabel' => [1 => 'first', 2 => 'second'],
            'wizardStop'  => [],
        ]);
    }

    #[Post('admin/$c/updator/validation', middleware: ['tassili.auth'])]
    public function update(Request \$request)
    {
       if (\$request->tassiliWizardStep == 1) {
            \$request->validate(['name' => ['']]);
        }

        if (\$request->tassiliWizardStep == 2) {
            \$request->validate(['city' => ['required']]);
        }

        if (\$request->tassiliSaveActive == 'yes') {
            \$this->tassili->tassiliRecord = \$this->tassiliModelClass::find(\$request->id);

            if (\$this->tassili->tassiliRecord) {
                \$this->tassili->updateRecord(\$request);
                \$this->tassili->tassiliRecord->save();
            }
        }
    }

    #[Get('admin/$c/update/{id}', middleware: ['tassili.auth'])]
    public function index(Request \$request)
    {
        \$redirect = \$this->tassili->checkRecord(\$request);

        if (\$redirect) {
            return \$redirect;
        }

        \$this->tassili->initFieldAgain(\$request);

        return Inertia::render('TassiliPages/Admin/Crud/$a/Updator', [
            'user' => Auth::user(),
            'routes' => \Tassili\Free\Models\TassiliCrud::where('active', true)->get(),
            'tassiliSettings' => \$this->tassili->tassiliSettings,
            'tassiliFields' => \$this->tassili->tassiliFields,
            'tassiliRecordInput' => \$this->tassili->tassiliRecordInput,
            'tassiliWizardInfo' => \$this->tassili->tassiliWizardInfo,
            'tassiliUrlStorage' => config('tassili.storage_url'),
        ]);
    }

   
    
}

          ";

          return $this->piece2;
   }


   
   public function getPiece3($a,$b,$c) {

      $this->piece3 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Tassili\Free\Http\Controllers\ListingUtility;
use Tassili\Free\Fields\TextInput;
use Tassili\Free\Filters\FilterText;
use Tassili\Free\Actions\Action;

class ListingController extends Controller
{
    
    private string \$modelClass = 'App\Models\\$a';
    private ListingUtility \$utility;
    
    public function __construct(Request \$request)
    {
        // Initialisation de la classe utilitaire avec les paramètres
        \$this->utility = new ListingUtility([
            'tassiliDataModelLabel' => '$b',
            'tassiliDataModelTitle' => 'Create $b',
            'tassiliDataRouteListe' => '/admin/$c',
            'tassiliDataUrlCreate' => '/admin/$c/create',
            'tassiliModelClass' => \$this->modelClass,
            'tassiliModelClassName' => '$a',
            'paginationPerPageList' => [10, 20, 30, 40, 50],
            'orderByFieldList' => ['id'],
            'orderDirectionList' => ['asc', 'desc'],
            'urlDelete' => '/admin/$c/delete',
        ]);

        \$this->customFilterList();
        \$this->initAction();
        \$this->initCustom();
    }


     private function customFilterList(): void
    {
        \$this->utility->filterList([
            FilterText::make('name'),
            FilterText::make('ville'),
        ]);
    }


    private function initAction(): void
    {
        \$this->utility->ActionList([
            Action::make('action1')
                ->params([
                    'label' => 'Ajouter',
                    'icon' => 'description',
                    'class' => 'text-white',
                    'url' =>'/admin/$c/action1' ,
                    'confirmation' => 'Are you sure to change records',
                    'message' => 'Records changed'
                ])
        ]);
    }

     private function initCustom(): void
    {
         \$this->utility->CustomActionForm([
            'url' => '/admin/$c/custom1',
            'icon' => 'edit',
            'text' => 'Qte',
            'class' => 'text-white',
            'confirm' => 'Are you sure to change record?',
        ])->form([
            TextInput::make('name'),
            TextInput::make('city'),
        ])->wizard([
            'wizardCount' => 2,
            'wizardForm' => [1 => ['name'], 2 => ['city']],
            'wizardLabel' => [1 => 'first', 2 => 'second'],
            'wizardStop' => [],
        ]);

    }


     private function initQuery(\$query, Request \$request): void
    {
        if (\$request->filled('name')) {
           //  \$query->where('name', \$request->name);
        }
    }

      #[Post('admin/$c/action1', middleware: ['tassili.auth'])]
    public function action1(Request \$request)
    {
        \$this->modelClass::whereIn('id', \$request->actionIds)->update([
            'name' => 'Fiat',
        ]);
    }

     #[Post('admin/$c/custom1', middleware: ['tassili.auth'])]
    public function custom1(Request \$request)
    {
       if (\$request->tassiliWizardStep == 1) {
            \$request->validate(['name' => ['required']]);
        }

        if (\$request->tassiliWizardStep == 2) {
            \$request->validate(['city' => ['required']]);
        }

        if (\$request->tassiliSaveActive == 'yes') {
             \$this->utility->tassiliRecord = \$this->modelClass::find(\$request->id);

            if (\$this->utility->tassiliRecord !== null) {
                 \$this->utility->updateRecord(\$request);
                 \$this->utility->tassiliRecord->save();
               }
        }

    }

    
    #[Post('admin/$c/delete', middleware: ['tassili.auth'])]
    public function delete(Request \$request)
    {
        \$this->modelClass::destroy(\$request->id);
    }
        
     #[Get('admin/$c', middleware: ['tassili.auth'])]
    public function index(Request \$request)
    {
        \$this->utility->initializeQuery(
            \$this->modelClass,\$request,fn(\$query, \$req) => \$this->initQuery(\$query, \$req)
        );
        \$data = \$this->utility->getInertiaData();
        \$data['sessionFilter'] = [/*'search','orderByField','orderDirection','paginationPerPage'*/];

        return Inertia::render('TassiliPages/Admin/Crud/$a/Listing', \$data);
    }
   
  

    
    
    
}
";

      return $this->piece3;
      }



    public function getPiece4($a,$b,$c) {

         $this->piece4 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a\Customs;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;


class Custom1Controller extends Controller
{

      public function __construct()
    {
        config(['inertia.ssr.enabled' => false]); // SSR desactivated
    } 

 //  #[Get('admin/$c/page1',middleware : ['tassili.auth'])]
    public function index(Request \$request)
    {
 
        return Inertia::render('TassiliPages/Admin/Crud/$a/Customs/Custom1',
        [
          'user' => \Illuminate\Support\Facades\Auth::user(),
          'routes' =>  \Tassili\Free\Models\TassiliCrud::where('active',true)->get(),
          'tassiliUrlStorage' => config('tassili.storage_url') ,
        ]
    );
    }
}
         
         ";

    return $this->piece4;

    }




}