<?xml version = "1.0" encoding = "utf-8"?>

<extension type = "module" version = "1.0.0" client = "site" method="upgrade">

   <name>Scientific-Publications</name>
   <author>Bob Sax</author>
   <version>1.0.0</version>
   <description>A simple scientific-publications list Module for Joomla.</description>
	
   <files>
      <filename>tmpl/default.php</filename>
      <filename>tmpl/index.html</filename>
      <filename>helper.php</filename>
      <filename>index.html</filename>
      <filename module = "mod_scipubs">mod_scipubs.php</filename>
      <filename>mod_scipubs.xml</filename>
   </files>
	
   <config>
     	<fieldset name="basic" >
         <fields name="params">
            <field name="jsons_folder" type="folderlist" default="" label="Select a folder for JSON files" directory="user_files/publications" filter="" exclude="" stripext="" />
         </fields>
      </fieldset>   
   </config>
   
</extension>
