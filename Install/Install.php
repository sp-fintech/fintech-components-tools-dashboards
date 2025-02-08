<?php

namespace Apps\Fintech\Components\Dashboards\Install;

use System\Base\BasePackage;

class Install extends BasePackage
{
    public function install()
    {
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

        return true;
    }

    public function uninstall()
    {
        return true;
    }
}