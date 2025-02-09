<?php

namespace Apps\Fintech\Components\Dashboards\Install;

use System\Base\BasePackage;
use System\Base\Providers\ModulesServiceProvider\MenuInstaller;

class Install extends BasePackage
{
    protected $menuInstaller;

    public function init()
    {
        $this->menuInstaller = new MenuInstaller;

        return $this;
    }

    public function install()
    {
        $dashboards = $this->basepackages->dashboards->getDashboardsByAppType('fintech');

        if (count($dashboards) === 0) {
            $this->basepackages->dashboards->addDashboard(
                [
                    "name"      => "Fintech Default",
                    "app_type"  => "fintech",
                    "settings"  => [
                        "maxWidgetsPerDashboard"    => 10,
                        "id"                        => 2
                    ]
                ]
            );
        }

        $this->installMenu();

        return true;
    }

    protected function installMenu()
    {
        $this->menuInstaller->installMenu($this);

        return true;
    }

    public function uninstall()
    {
        return true;
    }
}