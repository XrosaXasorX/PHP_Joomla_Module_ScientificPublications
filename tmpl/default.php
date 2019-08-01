<?php
   /**
      * @package Joomla.Site
      * @subpackage mod_scipubs
      * @copyright Copyright (C) 2019 XrosaXasorX.
      * @license GNU General Public License version 2 or later; see LICENSE.txt
   */
defined('_JEXEC') or die;
?>

<div class="" id='div_scipubs_outer0' >

<?php
$pubs_dir   = './user_files/publications/';
if( 1 )
$pubs_files = scandir( $pubs_dir, SCANDIR_SORT_DESCENDING );
else
$pubs_files = scandir( $pubs_dir, SCANDIR_SORT_ASCENDING );

if( 1 ){}else 
{
echo "<DIV style=' background-color:white; color:white; ' >";
print_r($pubs_files);
echo "</DIV>";
}

$pub_file = isset($_GET['file']) ? $_GET['file'] : "";
if( in_array($pub_file,$pubs_files) ) {
    $file_json = file_get_contents($pubs_dir.$pub_file);
    $file_array = json_decode($file_json, true);
    $file_array['json'] = $pub_file;
    $publication = modSciPubsHelper::getPublicationHeader($file_array);
    echo $publication;
    $publication = modSciPubsHelper::getPublicationBibtex($file_array);
    echo $publication;
    echo "<br><br><hr>";
    }
else {
    echo "<ul >";
    foreach( $pubs_files as $kkk => $pub_file ) {    
        if( substr($pub_file,-5, 5) == ".json" )
            {
            $file_json = file_get_contents($pubs_dir.$pub_file);
            $file_array = json_decode($file_json, true);
            $file_array['json'] = $pub_file;
            echo "<li>";
            $publication = modSciPubsHelper::getPublicationHeader($file_array);
            echo $publication;
            echo "<br><br>";
            echo "</li>";
            }//if_json
    }//foreach
    echo "</ul>";
}//else

?>

</div>

<br><br>
<hr>
