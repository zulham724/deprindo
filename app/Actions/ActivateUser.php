<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ActivateUser extends AbstractAction
{
    public function getTitle()
    {
        return $this->data->{'status'}!="1"?'Aktifkan':'Nonaktifkan';
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        if($this->data->{'status'}!="1"){
            return [
                'class' => 'btn btn-sm btn-success pull-right',
            ];
        }else{
            return [
                'class' => 'btn btn-sm btn-danger pull-right',
            ];
        }

    }

    public function getDefaultRoute()
    {
        $route = $this->data->{'status'}!="1"?'activate_user':'delete_user';
        return route($route, array("id"=>$this->data->{$this->data->getKeyName()}));
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'members';
    }
}
