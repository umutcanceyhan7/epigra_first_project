<?php

namespace Epigra\SpaceX\Providers;

use Epigra\Core\Providers\BaseRouteServiceProvider;

class RouteServiceProvider extends BaseRouteServiceProvider
{
   public function boot()
   {
       $this->setModuleName('SpaceX');
       parent::boot();
   }
}
