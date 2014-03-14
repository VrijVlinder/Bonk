<?php if(!defined('APPLICATION')) die();

$PluginInfo[ 'Bonk' ] = array(
   'Name' => 'Bonk',
   'Description' => "Adds a Custom 404 not found Error Page. Based on peregrine's ExtraPage.",
   'Version' => '1.3',
   'Author' => "VrijVlinder"
);

class BonkPlugin extends Gdn_Plugin {

    public function Base_Render_Before($Sender) {
        $Session = Gdn::Session();
       if ($Sender->Menu) {
           $Sender->Menu->AddLink(T('Bonk'), T('Bonk'), 'plugin/Bonk',array('Garden.Settings.manage'));
         }
    }

  
    public function PluginController_Bonk_Create($Sender) {
   
        $Session = Gdn::Session();

        if ($Sender->Menu)  {
            $Sender->ClearCssFiles();
            $Sender->AddCssFile('style.css');
             $Sender->RemoveCssFile('admin.css');
             $Sender->RemoveCssFile('customadmin.css');
            $Sender->AddCssFile('bonk.css', 'plugins/Bonk');
            $Sender->MasterView = 'default';

            $Sender->Render('Bonk', '', 'plugins/Bonk');
        }
    
   
    }

    public function Setup() {
        
    }

}

