silverstripe-opacities
=======================================

Description
---------------------------------------
SilverStripe module which provides an [Opacity] DataObject and a Settings->Appearance->Opacities menu for managing your website's Opacities.

Usage
---------------------------------------
```
<?php
class MyDataObject extends DataObject {
    static $has_one = array (
        'MyOpacity' => 'Opacity'
    );

	public function getCMSFields() {
	    $fields = parent::getCMSFields();

        /*
        *   MAIN TAB
        */

	    $tab = 'Root.Main';
        
        //provides dropdown menu for selecting a predefined opacities
	    $data = DataObject::get('Opacity');
	    $field = new ListboxField('MyOpacityID', 'My Opacity');
	    $field->setSource($data->map('ID', 'Name')->toArray());
	    $field->setEmptyString('Select one');
	    $fields->addFieldToTab($tab, $field);
        
        return $fields;
	}
}
```

Install
---------------------------------------
####Command Line:
```
composer require stephenjcorwin/silverstripe-opacities
```

####Address Bar:
```
localhost/dev/build
```

Uninstall
---------------------------------------
####Command Line:
```
composer remove stephenjcorwin/silverstripe-opacities
```

####Address Bar:
```
localhost/dev/build
```