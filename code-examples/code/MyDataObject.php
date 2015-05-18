<?php
class MyDataObject extends DataObject {
    private static $has_one = array (
        'MyOpacity' => 'Opacity'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        /*
        *   MAIN TAB
        */

        $tab = 'Root.Main';
        
        //provides listbox field menu for selecting a predefined Opacity
        $data = DataObject::get('Opacity');
        $field = new ListboxField('MyOpacityID', 'My Opacity');
        $field->setSource($data->map('ID', 'Name')->toArray());
        $field->setEmptyString('Select one');
        $fields->addFieldToTab($tab, $field);

        return $fields;
    }
}