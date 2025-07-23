<?php

namespace Tassili\Free\Utils;
use Illuminate\Support\Str;

class CrudPart
{
   public $piece1;
   public $piece2;
   public $piece3 ;
   

public function getPiece1($a,$b,$c,$middleware) {


    $this->piece1 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Tassili\Free\Http\Controllers\TassiliCreate;
use Tassili\Free\Fields\TextInput;


class CreatorController extends TassiliCreate
{
    public   \$tassiliShowOther = true ;
    public   \$tassiliDataModelLabel = '$b' ;
    public   \$tassiliDataModelTitle = 'Create $b' ;
    public   \$tassiliDataRouteListe = '/admin/$c';
    public   \$tassiliModelClass = 'App\Models\\$a';
    public   \$tassiliModelClassName = '$a';
    public   \$tassiliDataUrlCreate = '/admin/$c/create' ;
    public   \$tassiliValidationUrl = '/admin/$c/create/validation' ;



    public function initField()
    {  
          \$this->form([
            TextInput::make('name')
        ]);
    }


    #[Post('admin/$c/create/validation',middleware : ['$middleware'])]
    public function create(Request \$request)
    {

       \$request->validate([
          'name' => ['required'],
        ]);
       
        \$this->tassiliRecord = new \$this->tassiliModelClass;
        \$this->createRecord(\$request);
        \$this->tassiliRecord->save() ; 
    }
    

    #[Get('admin/$c/create',middleware : ['$middleware'])]
    public function index(Request \$request)
    {
 
        return Inertia::render('TassiliPages/Admin/Crud/$a/Creator',
        [
          'user' => \Illuminate\Support\Facades\Auth::user(),
          'routes' =>  \Tassili\Free\Models\TassiliCrud::where('active',true)->get(),
          'tassiliSettings'  => \$this->tassiliSettings,
          'tassiliFields' => \$this->tassiliFields ,
          'tassiliUrlStorage' => config('tassili.storage_url') ,
        ]
    );
    }

}
    ";

    return $this->piece1;
   }



   public function getPiece2($a,$b,$c,$middleware) {
          $this->piece2 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Tassili\Free\Http\Controllers\TassiliUpdate;
use Tassili\Free\Fields\TextInput;


class UpdatorController extends TassiliUpdate
{
    
    public   \$tassiliDataModelLabel = '$b' ;
    public   \$tassiliDataModelTitle = 'Update $b' ;
    public   \$tassiliDataRouteListe = '/admin/$c';
    public   \$tassiliModelClass = 'App\Models\\$a';
    public   \$tassiliModelClassName = '$a';
    public   \$tassiliDataUrlCreate = '/admin/$c/create' ;
    public   \$tassiliValidationUrl = '/admin/$c/updator/validation' ;


    public function initField()
    {

        \$this->form([
            TextInput::make('name')
        ]);
  
    }


    #[Post('admin/$c/updator/validation',middleware : ['$middleware'])]
    public function create(Request \$request)
    {


      
        \$request->validate([
          'name' => [],
        ]);

         \$this->tassiliRecord = \$this->tassiliModelClass::find(\$request->id);
       
         
         if (\$this->tassiliRecord != null) {
             \$this->updateRecord(\$request);
            \$this->tassiliRecord->save() ; 
         }

    }


    #[Get('admin/$c/update/{id}',middleware : ['$middleware'])]
    public function index(Request \$request)
    {

        \$redirect = \$this->checkRecord(\$request);

         if (\$redirect) {
             return \$redirect; // Ensure redirection is returned
        }

         \$this->initFieldAgain(\$request) ;

        return Inertia::render('TassiliPages/Admin/Crud/$a/Updator',
        [
          'user' => \Illuminate\Support\Facades\Auth::user(),
          'routes' =>  \Tassili\Free\Models\TassiliCrud::where('active',true)->get(),
          'tassiliSettings'  => \$this->tassiliSettings,
          'tassiliFields' => \$this->tassiliFields ,
          'tassiliRecordInput' =>  \$this->tassiliRecordInput,
          'tassiliUrlStorage' => config('tassili.storage_url') ,
        ]
    );
    }
    
    
}

          ";

          return $this->piece2;
   }


   
   public function getPiece3($a,$b,$c,$middleware) {

      $this->piece3 = "<?php

namespace App\Http\Controllers\Tassili\Admin\Crud\\$a;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Tassili\Free\Http\Controllers\Listing;
use Tassili\Free\Fields\TextInput;
use Tassili\Free\Filters\FilterText;
use Tassili\Free\Actions\Action ;

class ListingController extends Listing
{
    
    public   \$tassiliDataModelLabel = '$b' ;
    public   \$tassiliDataModelTitle = 'Create $b' ;
    public   \$tassiliDataRouteListe = '/admin/$c';
    public   \$tassiliModelClass = 'App\Models\\$a';
    public   \$tassiliModelClassName = '$a';
    public   \$tassiliDataUrlCreate = '/admin/$c/create' ;
    public   \$tassiliDataUrlCheckRecord = '/admin/$c/checkRecord' ;
    public   \$urlDelete = '/admin/$c/delete';
    public   \$paginationPerPageList = [1,2,3,4] ;
    public   \$orderByFieldList = ['id'] ;
    public   \$orderDirectionList = ['asc','desc'] ;
    public   \$sessionFilter = ['search',/*'paginationPerPage','orderByField','orderDirection' */] ;

    public function customFilterList(Request \$request)
        {
           
           \$this->filterList([
                FilterText::make('name'),
                FilterText::make('ville'),
           ]
        );
            
        }

    public function initQuery(Request \$request) {
            if (\$request->filled('name')) {
            //    \$this->queryFilter = \$this->queryFilter->where('name',\$request->name);
            }
            }
  
    
    public function initAction(Request \$request)
        {
            \$this->ActionList([
               Action::make('action1')
                 ->params([
                    'label' => 'Ajouter',
                    'icon' => 'description',
                    'class' => 'text-white',
                    'url' => '/admin/$c/action1',
                    'confirmation' => 'voulez-vous Ajouter ces records',
                    'message' => 'records ajoutés'
                 ])
            ]);
        }

     #[Post('admin/$c/action1',middleware : ['$middleware'])]
    public function action1(Request \$request)
        {  

        \$this->tassiliModelClass::whereIn('id',\$request->actionIds )->update([
                'name' => 'Fiat',
            ]);

        }
    

    public function initCustom(Request \$request)
        {

            \$this->CustomActionForm([
               'url' => '/admin/$c/custom1',
               'icon' => 'edit',
               'text' => 'Qte',
               'class' => 'text-white',
               'confirm' => 'Are you sure you want delete?',
           ])->form([
               TextInput::make('name')
          ]);


        }

    

    #[Post('admin/$c/custom1',middleware : ['$middleware'])]
    public function custom1(Request \$request)
        {  


         if (\$request->tassiliWizardStep == 1) {
            \$request->validate(['name' => ['required']]);
        }

        if (\$request->tassiliWizardStep == 2) {
            \$request->validate(['city' => ['required']]);
        }

        \$this->tassiliRecord = \$this->tassiliModelClass::find(\$request->id);
       
         
         if (\$this->tassiliRecord != null) {
             \$this->updateRecord(\$request);
             \$this->tassiliRecord->save() ; 
         }

        } 
    
        
    
    #[Post('admin/$c/delete',middleware : ['$middleware'])]
    public function delete(Request \$request)
        {  
            \$this->tassiliModelClass::destroy(\$request->id);
        } 


    #[Get('admin/$c',middleware : ['$middleware'])]
    public function index(Request \$request)
    {

        \$this->allInit(\$request);
        
        return Inertia::render('TassiliPages/Admin/Crud/$a/Listing',
        [
          'items' => \$this->tables,
          'user' => \Illuminate\Support\Facades\Auth::user(),
          'routes' =>  \Tassili\Free\Models\TassiliCrud::where('active',true)->get(),
          'tassiliSettings'  => \$this->tassiliSettings,
          'allFilters' => \$this->allFilters,
          'customFilters' => \$this->customFilters,
          'sessionFilter' => \$this->sessionFilter,
          'groupActions' =>  \$this->groupActions ,
          'tassiliDataUrlCheckRecord' => \$this->tassiliDataUrlCheckRecord,
          'tassiliFormList' => \$this->tassiliFormList,
          'tassiliUrlStorage' => config('tassili.storage_url') ,
        ]
    );
    }


    
    
    
}
";

      return $this->piece3;
      }



      




}