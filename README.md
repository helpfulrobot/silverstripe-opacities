silverstripe-opacities
=======================================

Introduction
---------------------------------------
SilverStripe module which provide a `Opacity` DataObject and a `Settings->Appearance->Opacities` Menu for managing your website's Opacities.

Maintainer Contact
---------------------------------------
-   Stephen Corwin - <stephenjcorwin@gmail.com>
   
Requirements
---------------------------------------
-   SilverStripe 3.1
-   [stephenjcorwin/silverstripe-style-sheet](https://github.com/stephenjcorwin/silverstripe-style-sheet)

Features
---------------------------------------
-   Create and maintain sitewide Opacities
-   Generate and reference database driven CSS classes

Installation
---------------------------------------
Installation can be done either by composer or by manually downloading a release.

####Via Composer:
`composer require stephenjcorwin/silverstripe-opacities`

####Manually:
1.   Download the module from [the releases page](https://github.com/stephenjcorwin/silverstripe-opacities/releases)
2.   Extract the file
3.   Make sure the folder after being extracted is name 'silverstripe-opacities'
4.   Place this directory in your site's root directory

####Configuration:
-   After installation, make sure you rebuild your database through `dev/build`
-	You should see the a new Menu in the CMS for managing `Opacities` available through the `Settings->Appearance->Opacities` Menu

Uninstall
---------------------------------------
####Via Composer:
`composer remove stephenjcorwin/silverstripe-opacities`

####Manually:
1.   Remove the `silverstripe-opacities` directory in your site's root directory

####Configuration:
-   After uninstalling, make sure you rebuild your database through `dev/build`

Code Examples
---------------------------------------
####Defining a `has_one` relationship with `Opacity`:

####`mysite/code/MyDataObject.php`
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

####Using database generated classes for styling:

####`mysite/code/Page.php`
    <?php
    class Page extends SiteTree {
    	private static $has_one = array(
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

    class Page_Controller extends ContentController {
    	public function init() {
			parent::init();
		}
    }

####`themes/mytheme/templates/Page.ss`
    <!DOCTYPE html>
	<html>
		<body>
			<div
				class="
					<% if $MyOpacity %>$MyOpacity.CSSClass<% end_if %>
				"
			>
				Faded Text
			</div>
			$Layout
		</body>
	</html>