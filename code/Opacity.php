<?php
class Opacity extends StyleObject {
  /**
   * FIELDS
   */

  private static $db = array (
    'Name' => 'Text',
    'Value' => 'Float'
  );

  private static $defaults = array (
    'Value' => 0
  );

  /**
   * DEFAULT RECORDS
   */

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
   * CONFIGURATION
   */

  private static $default_sort='Value ASC';

  private static $summary_fields = array (
    'Name' => 'Name',
    'Value' => 'Value',
    'CMSPreview' => 'Preview'
  );

  /**
   * CMS FIELDS
   */

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    
    /**
     * MAIN TAB
     */

    $tab = 'Root.Main';

    $field = new TextField('Name');
    $fields->addFieldToTab($tab, $field);

    $field = new NumericField('Value');
    $fields->addFieldToTab($tab, $field);

    $html = ViewableData::renderWith('Opacity_CMS_Preview');
    $field = new LiteralField('Preview', $html);
    $fields->addFieldToTab($tab, $field);
    
    return $fields;
  }

  public function getCMSPreview() {
    $html = ViewableData::renderWith('Opacity_CMS_Preview');
    $obj = HTMLText::create();
    $obj->setValue($html);
    return $obj;
  }
}