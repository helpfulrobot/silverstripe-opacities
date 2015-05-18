<?php
class Opacity_SiteConfigExtension extends DataExtension {
  /**
   *  CMS FIELDS
   */

  public function updateCMSFields(FieldList $fields) {    
    /**
     *  APPEARANCE TAB
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