<?php 

namespace PFC\WebApp\Component\View;

class PjsView extends pfcView
{
    public function headers()
    {
        header('Content-type: text/javascript');
    }
    
    public function render()
    {
        return parent::render();
    }        
}
