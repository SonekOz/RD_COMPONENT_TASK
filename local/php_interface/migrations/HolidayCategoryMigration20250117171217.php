<?php

namespace Sprint\Migration;


class HolidayCategoryMigration20250117171217 extends Version
{
    protected $author = "osipovak";

    protected $description = "Migration for iblock Holiday Category";

    protected $moduleVersion = "4.16.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'holidays',
            'holidays'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
)        );
    }
}
