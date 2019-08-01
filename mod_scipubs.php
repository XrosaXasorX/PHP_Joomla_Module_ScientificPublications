<?php
   /**
      * Main source for "SciPubs" module
      *
      * @package    Joomla.Archives
      * @subpackage Modules
      * @link https://scipubs.joomla.com (2019)
      * @license        GNU/GPL, see LICENSE.php
      * mod_scipubs is free software.
      * This version may have been modified pursuant to the GNU General Public License,
      * and as distributed it includes or is derivative of works
      * licensed under the GNU General Public License
      * or other free or open source software licenses.
   */

   // No direct access
   defined('_JEXEC') or die;

   // Include the syndicate functions only once
   require_once dirname(__FILE__) . '/helper.php';

   $publications = modSciPubsHelper::getScientificPublications($params);
   require JModuleHelper::getLayoutPath('mod_scientificpublications');
   
   //echo $publications;
   
?>
