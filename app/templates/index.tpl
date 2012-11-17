{*
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
*}
 <!DOCTYPE html>
<html lang="{$smarty.session.userdata.language}">
<!--                                                                            -->
<!--   PPGP.de: Copyright 2012, Rainer Bendig. This Software is under the AGPL. -->
<!--   GNU AFFERO General Public License: http://www.gnu.org/licenses/agpl.txt  -->
<!--                                                                            -->
  <head>
    <meta charset="utf-8">
    <title>{$currentTitle}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{$config.baseurl}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$config.baseurl}/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="{$config.baseurl}/assets/css/ipsmith.css" rel="stylesheet">
    <script src="{$config.baseurl}/assets/js/jquery-1.8.2.min.js"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="{$config.baseurl}/assets/js/html5.js"></script>
    <![endif]-->
  </head>
<body>
  {include file="_navigation/topbar.tpl"}
    <div class="container">
          {include file="$currentModule/$currentPage.tpl"}
    </div><!--/.fluid-container-->
   {include file="_navigation/footer.tpl"}
    <script src="{$config.baseurl}/assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>