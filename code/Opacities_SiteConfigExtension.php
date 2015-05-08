<?php
class Opacities_SiteConfigExtension extends DataExtension {
  /**
    FIELDS
  **/

  static $db = array (
  );

  public static $default_sort='';

  static $summary_fields = array (
  );

  /**
    CMS FIELDS
  **/

  public function updateCMSFields(FieldList $fields) {    
    /*
      APPEARANCE TAB
    */

    $tab = 'Root.Appearance.Opacities';
    
    $conf=GridFieldConfig_RelationEditor::create(10);
    $conf->removeComponentsByType('GridFieldPaginator');
    $conf->removeComponentsByType('GridFieldPageCount');
    $data = DataObject::get('Opacity');
    $field = new GridField('Opactiy', 'Opacities', $data, $conf);
    $fields->addFieldToTab($tab, $field);
  }
}