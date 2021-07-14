<?php

namespace Epigra\Capsule\Providers;

use Epigra\Core\Providers\BaseRouteServiceProvider;

class RouteServiceProvider extends BaseRouteServiceProvider
{
   public function boot()
   {
       $this->setModuleName('Capsule');
       parent::boot();
   }
}
