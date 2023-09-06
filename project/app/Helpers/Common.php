<?php
if ( ! function_exists('test')) {
    function test() {
        return "This is test function";
    }
}
if ( ! function_exists('has_permission')) {
    function has_permission($sectionId, $permission) {
        $userPermissions = session('userPermissions');
        if(is_array($userPermissions) && isset($userPermissions[$sectionId])){
            if(in_array(''.$permission.'', $userPermissions[$sectionId])){
                return true;
            } return false;
        } return false;
    }
}

if ( ! function_exists('add_button')) {    
    function add_button($title, $sectionId, $tag_name, $route_path) {
        $btn = '';
        if(has_permission($sectionId, $tag_name))
        {
            $btn .= '<a href="'.route($route_path.'.create').'" class="btn btn-theme-green"><i class="fas fa-plus"></i> Add New '.$title.'</a>';
        }
        else
        {
            $btn .= '<a href="javascript:void(0);" class="btn btn-theme-green btn-disabled disabled" disabled><i class="fas fa-plus"></i> Add New '.$title.'</a>';
        }
        return $btn;
    }
}
if ( ! function_exists('global_button')) {    
    function global_button($title, $sectionId, $tag_name, $route_path) {
        $btn = '';
        if(has_permission($sectionId, $tag_name))
        {
            $btn .= '<a href="'.route($route_path).'" class="btn btn-theme-green">'.$title.'</a>';
        }
        else
        {
            $btn .= '<a href="javascript:void(0);" class="btn btn-theme-green btn-disabled disabled" disabled>'.$title.'</a>';
        }
        return $btn;
    }
}
if ( ! function_exists('dataTable_fetching_status')) {    
    function dataTable_fetching_status($id, $route_path, $statusId, $sectionId, $tag_name) {        
        $status = '<div id="status_container_'.$id.'">';
        if(has_permission($sectionId, $tag_name)) 
        {
            $status .= ($statusId == 1) ? '<button class="btn btn-success btn-sm change-status" data-id="'.$id.'" data-value = "1" data-route="'.route($route_path.'.status').'" style="cursor: pointer;">Active</button>' : '<button class="btn btn-danger btn-sm change-status" data-id="'.$id.'" data-value = "0" data-route="'.route($route_path.'.status').'" style="cursor: pointer;">In Active</button>';
        }
        else
        {
            $status .= ($statusId == 1) ? '<button class="btn btn-success btn-sm btn-disabled" disabled>Active</button>' : '<button class="btn btn-danger btn-sm btn-disabled" disabled>In Active</button>';
        }
        $status .= '<div id="status_section_'.$id.'" style="width: 100%; height: auto; float: left; display: none;">
        <span id="loader_'.$id.'" style="display: none"><i class="fa fa-spinner fa-spin" style="font-size:16px"></i><br></span>
        <span id="status_message_'.$id.'" style="display: none; color:#08c40c; font-size: 12px;">Status Update</span>
        </div></div>';
        return $status;
    }
}
if ( ! function_exists('dataTable_fetching_actions')) {    
    function dataTable_fetching_actions($id, $route_path, $sectionId, $tag_name_edit, $tag_name_delete) {        
        $btn = '';
        if(has_permission($sectionId, $tag_name_edit)) 
        {
            $btn .= '<a href="'.route($route_path.'.edit', $id).'"><span class="edit-icon"><i class="far fa-edit"></i></span></a>';
        }
        else
        {
            $btn .= '<a href="javascript:void(0);" disabled><span class="edit-icon-disabled"><i class="far fa-edit"></i></span></a>';
        }
        
        if(has_permission($sectionId, $tag_name_delete))
        {
            $btn .= '<button class="delete-record" style="border: none;" data-id="'.$id.'" data-route="'.route($route_path.'.delete').'"><span class="trash-icon"><i class="far fa-trash-alt"></i></button>';
        }
        else
        {
            $btn .= '<button style="border: none;" disabled><span class="trash-icon-disabled"><i class="far fa-trash-alt"></i></button>';
        }
        
        return $btn;
    }
}

if ( ! function_exists('change_space_to_hifan')) {
    function change_space_to_hifan($string) {
        $string = str_replace(' ', '-', $string);
        return strtolower($string);
    }
}


if ( ! function_exists('tag_actions'))
{
    function tag_actions($key) {
        $data = '<select name="tag_action" id="tag_action" class="form-control"><option value=""> Please select the Tag Action </option>';
        $data .= '<option value="index"';
        if($key == "index") $data .= 'selected';
        $data .= '>Index</option>';
        $data .= '<option value="add"';
        if($key == "add") $data .= 'selected';
        $data .= '>Add</option>';
        $data .= '<option value="edit"';
        if($key == "edit") $data .= 'selected';
        $data .= '>Edit</option>';
        $data .= '<option value="view"';
        if($key == "view") $data .= 'selected';
        $data .= '>View</option>';
        $data .= '<option value="delete"';
        if($key == "delete") $data .= 'selected';
        $data .= '>Delete</option>';
        $data .= '<option value="print"';
        if($key == "print") $data .= 'selected';
        $data .= '>Print</option>';
        $data .= '<option value="export"';
        if($key == "export") $data .= 'selected';
        $data .= '>Export</option></select>';
        return $data;
    }
}

if ( ! function_exists('user_permissions_assign_fetching_data')) {
    function user_permissions_assign_fetching_data($rolesid, $sectionId) {
        $result = App\Models\Role_permissions_assign::Where('section_id_fk', $sectionId)
                                            ->where('role_id_fk', $rolesid)
                                            ->first();       
        return ($result) ? $result->id : '';
    }
}

if ( ! function_exists('permissions_checkbox_list'))
{
    function permissions_checkbox_list($id, $roleid) {
        $result = App\Models\Role_permission::where('section_id_fk', $id)
                                            ->where('status', 1)
                                            ->orderby('id', 'ASC')
                                            ->get();
        $count = count($result);
        if($count > 0)
        {
            echo '<ul>';
            foreach($result as $prows)
            {
                if(!empty($roleid))
                {
                    $roleId = $roleid;
                    $sectionId = $id;
                    $permissionId = $prows->name;
                    $results = App\Models\Role_permissions_assign::Where('section_id_fk', $sectionId)
                                                                    ->where('role_id_fk', $roleId)
                                                                    ->first();
                    if(isset($results->permission_names))
                    {
                        $exp_permissions = explode(",", $results->permission_names);
                        if (in_array($permissionId, $exp_permissions))
                        {
                            $permission_Id = $permissionId;
                        }
                    }                    
                    echo '<li>';
                        echo '<input type="checkbox" class="indeterminate-checkbox" name="permissions[]" id="sections_assign-'.$sectionId.'-'.$prows->id.'" value="'.$id.'_'.$prows->name.'"';
                        if((isset($permission_Id)) && ($permission_Id == $prows->name))
                        {
                            echo 'checked';
                        }
                        echo ' > <label for="sections_assign-'.$sectionId.'-'.$prows->id.'">&nbsp;'.$prows->display_name.' </label>';
                    echo '</li>';
                    
                }
                else
                {
                    echo '<li><input type="checkbox" class="indeterminate-checkbox" name="permissions[]" id="sections_assign-'.$id.'-'.$prows->id.'" value="'.$id.'_'.$prows->name.'"><label for="sections_assign-'.$id.'-'.$prows->id.'">&nbsp;'.$prows->display_name.' </label></li>';
                }                
            }
            echo '</ul>';
        }
    }
}