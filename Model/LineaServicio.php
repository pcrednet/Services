<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2013-2018 Carlos Garcia Gomez <carlos@facturascripts.com>
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
namespace FacturaScripts\Plugins\Services\Model;

use FacturaScripts\Core\Model\Base;

/**
 * Line of a customer's service.
 *
 * @author Carlos García Gómez <carlos@facturascripts.com>
 */
class LineaServicio extends Base\SalesDocumentLine
{

    use Base\ModelTrait;

    /**
     * Delivery note ID of this line.
     *
     * @var int
     */
    public $idservicio;

    /**
     * 
     * @return string
     */
    public function documentColumn()
    {
        return 'idservicio';
    }

    /**
     * This function is called when creating the model table. Returns the SQL
     * that will be executed after the creation of the table. Useful to insert values
     * default.
     *
     * @return string
     */
    public function install()
    {
        /// needed dependency
        new Servicio();

        return parent::install();
    }

    /**
     * Returns the name of the table that uses this model.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'lineasservicioscli';
    }

    /**
     * 
     * @param string $type
     * @param string $list
     *
     * @return string
     */
    public function url(string $type = 'auto', string $list = 'List')
    {
        if (null !== $this->idservicio) {
            return 'EditServicio?code=' . $this->idservicio;
        }

        return parent::url($type, $list);
    }
}
