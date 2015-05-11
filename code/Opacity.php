<?php
class Opacity extends DataObject {
  /**
    FIELDS
  **/

  private static $db = array (
    'Name' => 'Text',
    'Value' => 'Float'
  );

  private static $defaults = array (
    'Value' => 0
  );

  private static $default_sort='Value ASC';

  /**
    DEFAULT RECORDS
  **/

  private static $default_records = array (
    array (
      'Name' => 'Transparent',
      'Value' => 0
    ),
    array (
      'Name' => 'Near Transparent',
      'Value' => 0.25
    ),
    array (
      'Name' => 'Moderate Transparent',
      'Value' => 0.5
    ),
    array (
      'Name' => 'Near Opaque',
      'Value' => 0.75
    ),
    array (
      'Name' => 'Opaque',
      'Value' => 1
    ),
  );

  /**
    PERMISSIONS
  **/

  public function canEdit($member = NULL) {
    return true;
  }

  public function canDelete($member = NULL) {
    return true;
  }

  public function canCreate($member = NULL){
    return true;
  }

  public function canPublish($member = NULL){
    return true;
  }

  public function canView($member = NULL){
    return true;
  }

  private static $summary_fields = array (
    'Name' => 'Name',
    'Value' => 'Value',
    'CMSPreview' => 'Preview'
  );

  /**
    CMS FIELDS
  **/

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    
    /*
      MAIN TAB
    */

    $tab = 'Root.Main';

    $field = new TextField('Name');
    $fields->addFieldToTab($tab, $field);

    $field = new NumericField('Value');
    $fields->addFieldToTab($tab, $field);

    $html = ViewableData::renderWith('Opacities_CMS_Preview');
    $field = new LiteralField('Preview', $html);
    $fields->addFieldToTab($tab, $field);
    
    return $fields;
  }

  public function getCMSPreview() {
    $html = ViewableData::renderWith('Opacities_CMS_Preview');
    $obj = HTMLText::create();
    $obj->setValue($html);
    return $obj;
  }

  public function CSSClass($prefix=0) {
    $name = strtolower($this->ClassName);
    
    if ($prefix) {
      $name = $prefix . '-' . $name;
    }

    $id = $this->ID;
    $data = $name . '-' . $id;
    return $data;
  }
}