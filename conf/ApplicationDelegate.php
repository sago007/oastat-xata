<?php
class conf_ApplicationDelegate {
    function getPermissions(&$record){
        return Dataface_PermissionsTool::READ_ONLY();
    }
}
