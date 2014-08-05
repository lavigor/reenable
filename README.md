Reenable extensions
===================

This extension allows you to quickly reenable other extensions to save time for extension developers.

## Requirements
* phpBB 3.1.0-dev or higher
* PHP 5.3.3 or higher

## Installation
You can install this extension on the latest copy of the develop branch ([phpBB 3.1-dev](https://github.com/phpbb/phpbb3)) by doing the following:

1. Download the [latest ZIP-archive of `master` branch of this repository](https://github.com/lavigor/reenable/archive/master.zip).
2. Check out the existing of the folder `/ext/lavigor/reenable/` in the root of your board folder. Create folders if necessary.
3. Copy the contents of the downloaded `reenable-master` folder to `/ext/lavigor/reenable/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Reenable extensions`.
5. Click `Enable`.

Note: This extension is compatible only with the development version of phpBB. Currently it is not supported on live boards.

## Usage
Now you can quickly update all of your extensions (including this one).

1. Update the files of your extension.
2. Navigate in the ACP to `Customise -> Extension Management -> Reenable extensions` and click `Reenable`.

> WARNING: Be sure that you use this function only for developing purposes. Users of the live board can receive errors if they occasionnaly use the extension during the reenabling process.
> However they may run into errors even during the disabling process.

## Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Reenable extensions` and click `Disable`.

To permanently uninstall, click `Delete Data` and then you can safely delete the `/ext/lavigor/reenable/` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2014 Igor Lavrov