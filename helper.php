<?php
   /**
      * Helper class for "SciPubs" module
      *
      * @package    Joomla.Archives
      * @subpackage Modules
      * @link https://scipubs.joomla.com (2019)
      * @license        GNU/GPL, see LICENSE.php
      * mod_publications is free software.
      * This version may have been modified pursuant to the GNU General Public License,
      * and as distributed it includes or is derivative of works
      * licensed under the GNU General Public License
      * or other free or open source software licenses.
   */
		
   class ModSciPubsHelper {
      /**
         * Retrieves the list of scientific-publications
         *
         * @param   array  $params An object containing the module parameters
         *
        * @access public
      */
		
      public static function getSciPubs($params) {
         return '<DIV ><P >List of Scientific Publications:</P></DIV>';
      }
      
      public static function returnParamIfSet($params=Array(),$value) {
          $rv = isset($params[$value]) ? $params[$value] : "";      
          return $rv;
      }//returnParamIfSet
      
      public static function returnNameAndValueIfSet($params=Array(),$value) {
          
          $rv = "";
          if( !isset($params[$value]) ) { return $rv; }
          
          $rv .= ",<br>";
          $rv .= $value ." = ". "\"" . $params[$value] . "\"";      
          return $rv;
      }//returnNameAndValueIfSet
         
         
         
      public static function getPublicationBibtex($params) {
          
          $rv  = "";
          //return $rv; 
          
          $rv .= "<DIV id='' class=' div_scientificpublications_outer1 ' style=' border:0px; margin:0px; padding:0px; width:100%; ' >";
          $rv .= "<DIV id='' class=' div_scientificpublications_outer2 ' style=' border:0px; margin:0px; padding:10px; ' >";
          
          $rv .= "@"           . ModSciPubsHelper::returnParamIfSet( $params, 'type'   ) . "{";
          $rv .= ""            . ModSciPubsHelper::returnParamIfSet( $params, 'id'     ) . ",<br>";
          $rv .= "title =  \"" . ModSciPubsHelper::returnParamIfSet( $params, 'title'  ) . "\",<br>";
          $rv .= "author = \"" . ModSciPubsHelper::returnParamIfSet( $params, 'author' ) . "\"";
          
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'publication' );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'booktitle'   );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'publisher'   );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'volume'      );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'pages'       );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'year'        );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'month'       );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'isbn'        );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'issn'        );
          $rv .= ModSciPubsHelper::returnNameAndValueIfSet( $params, 'doi'         );
          
          $rv .= "<br>}";
          $rv .= "</DIV>";
          $rv .= "<a href='/documents' >Back to previous page...</a><BR />\n";
          $rv .= "<br><br>";
          $rv .= "</DIV>";
                
          // Return value.
          return $rv;
          
          }//getPublicationBibtex  
          
          
    public static function getPublicationHeader($params) {      
           
        $rv  = "";  
        $rv .= $params['author'] . "<br>";
        $rv .= "<strong>" . $params['title']. "</strong><br>";
if( 1 ){
}        
        $rv .= ucfirst(strtolower($params['type']));
        if( isset($params['publication']) ) {
            $rv .= " in: <i>" . $params['publication'] . "</i>";
            if( isset($params[ 'volume' ]) ) { $rv .= ", vol. " .$params[ 'volume' ]; };
            if( isset($params[ 'number' ]) ) { $rv .= ", nr. "  .$params[ 'number' ]; };
            if( isset($params[ 'pages'  ]) ) { $rv .= ", pp. "  .$params[ 'pages'  ]; };
        }
        if( isset($params[ 'year'   ]) ) { $rv .= ", "      .$params[ 'year'   ]; };
        $rv .= "<br>";

        // ISBN or ISSN.
        if( isset($params['issn']) | isset($params['isbn']) ) {
            if( isset($params['isbn']) ) { $rv .= "ISBN:".$params['isbn']." "; }      
            if( isset($params['issn']) ) { $rv .= "ISSN:".$params['issn']." "; }      
            $rv .= "<br>";
        }          

        // PDF download icon file.    
        $rv .= "<a href='./user_files/publications/" .$params['pdf'] . "' target='_blank' rel='noopener noreferrer'>";
        $rv .= "<img src='images/icons/pdf.png' alt='pdf' />";
        $rv .= "</a>";
        
        $rv .= "&nbsp;";
        $rv .= "<a href='?download&file=" .$params['json']. "' XXXtarget='_blank' rel='noopener noreferrer'>";
        $rv .= "[export bib]";
        $rv .= "</a>";
                
        if( isset($params['url']) )
        {
        $rv .= "&nbsp;";
        $rv .= "<a href='" .$params['url']. "' target='_blank' rel='noopener noreferrer'>";
        $rv .= "[link...]";
        $rv .= "</a>";
        }

        if( isset($params['doi']) )
        {
        $rv .= "&nbsp;";
        $rv .= "<a href='https://www.doi.org/" .$params['doi']. "' target='_blank' rel='noopener noreferrer'>";
        $rv .= "[doi: " .$params['doi']. "...]";
        $rv .= "</a>";
        }
        
        // Return value.
        return $rv;
        
        }//getPublicationHeader  
          
   }//class
	
?>
