<?php
/**
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This Software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

function app_autoload($class)
{

    if(file_exists(LIB_DIR.'/classes/' . $class . '.class.php'))
    {
        include(LIB_DIR.'/classes/' . $class . '.class.php');
    }

    if ( file_exists(LIB_DIR.'/classes/dbos/' . $class . '.dbo.php') )
    {
        file_exists(LIB_DIR.'/classes/dbos/' . $class . '.dbo.php');
    }
}

spl_autoload_register('app_autoload');
