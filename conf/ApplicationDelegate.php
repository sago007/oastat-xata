<?php
class conf_ApplicationDelegate {
    function getPermissions(&$record){
        return Dataface_PermissionsTool::READ_ONLY();
    }
    
    public function beforeHandleRequest(){
    Dataface_Application::getInstance()
        ->addHeadContent(
            sprintf('<link rel="stylesheet" type="text/css" href="%s"/>',
                htmlspecialchars(DATAFACE_SITE_URL.'/css/style.css')
            )
        );
    }

}
