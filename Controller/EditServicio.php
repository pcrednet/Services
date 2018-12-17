<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2017-2018 Carlos Garcia Gomez <carlos@facturascripts.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace FacturaScripts\Plugins\Services\Controller;

use FacturaScripts\Core\Lib\ExtendedController;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
/**
 * Controller to edit a single item from the Servicio model
 *
 * @author Luis Miguel Pérez Romero luismi@pcrednet.com>
 */
class EditServicio extends ExtendedController\SalesDocumentController
{
    /**
     * Returns basic page attributes
     *
     * @return array
     */
    public function getPageData()
    {
        $pagedata = parent::getPageData();
        $pagedata['title'] = 'service';
        $pagedata['menu'] = 'sales';
        $pagedata['icon'] = 'fas fa-wrench';
        $pagedata['showonmenu'] = false;

        return $pagedata;
    }

    /**
     * Return the document class name.
     *
     * @return string
     */
    protected function getModelClassName()
    {
        return 'Servicio';
    }
    
    /**
     * 
     */
    protected function createViews()
    {
       parent::createViews();
       $this->addEditView('EditServicioDatos', 'Servicio', 'service-data');
       
    }
    
    protected function loadData($viewName, $view)
{
    switch ($viewName) {
        case 'EditServicioDatos':
            $idservicio = $this->getViewModelValue('EditServicio', 'idservicio');
            $where = [new DataBaseWhere('idservicio', $idservicio)];
            $view->loadData('', $where);
            break;

        default:
            parent::loadData($viewName, $view);
            break;
    }
}

   }
