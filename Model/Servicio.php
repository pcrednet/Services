<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2017-2018 Luis Miguel Pérez Romero <luismi@pcrednet.com>
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
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Plugins\Services\Model\LineaServicio;

/**
 * Services is the system used to bill a customer for services.
 *
 * @author Luis Miguel Pérez Romero         <luismi@pcrednet.com>
 */
class Servicio extends Base\SalesDocument
{

    use Base\ModelTrait;

    /**
     * Primary key. Integer.
     *
     * @var int
     */
    public $idservicio;

    /**
     * Returns the lines associated with the service.
     *
     * @return LineaServicio[]
     */
    public function getLines()
    {
        $lineaModel = new LineaServicio();
        $where = [new DataBaseWhere('idservicio', $this->idservicio)];
        $order = ['orden' => 'DESC', 'idlinea' => 'ASC'];

        return $lineaModel->all($where, $order, 0, 0);
    }

    /**
     * Returns a new line for the document.
     * 
     * @param array $data
     * 
     * @return LineaServicio
     */
    public function getNewLine(array $data = [])
    {
        $newLine = new LineaServicio($data);
        $newLine->idservicio = $this->idservicio;

        $status = $this->getStatus();
        $newLine->actualizastock = $status->actualizastock;

        return $newLine;
    }

   
    /**
     * Returns the name of the column that is the model's primary key.
     *
     * @return string
     */
    public static function primaryColumn()
    {
        return 'idservicio';
    }

    /**
     * Returns the name of the table that uses this model.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'servicioscli';
    }
}
