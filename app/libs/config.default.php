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

$defaultconfig = array();

$defaultconfig["appidentifier"] = "ppgp";

$defaultconfig["baseurl"] = "http://localhost/~rbendig/ppgp";
$defaultconfig["baselanguage"] = 'en';

$defaultconfig["db"] = array();
$defaultconfig["db"]["host"] = "127.0.0.1";
$defaultconfig["db"]["user"] = "root";
$defaultconfig["db"]["pass"] = "";
$defaultconfig["db"]["name"] = "piraten_links";
$defaultconfig["db"]["driver"] = "pdo_mysql";

$defaultconfig["template"]["debugging"] = false;
$defaultconfig["template"]["caching"] = false;
$defaultconfig["template"]["cache_lifetime"] = 1;
$defaultconfig["template"]["force_compile"] = true;
$defaultconfig["template"]["use_sub_dirs"] = true;

$defaultconfig["defaultsettings"] = array();
$defaultconfig["defaultsettings"]["usehumanname"] = 0;
$defaultconfig["defaultsettings"]["displayids"] = 0;
