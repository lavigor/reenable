Reenable extensions
===================
This extension allows you to quickly reenable other extensions to save time for extension developers.

[![Build Status](https://travis-ci.org/lavigor/reenable.svg?branch=master)](https://travis-ci.org/lavigor/reenable)

## Requirements
* phpBB 3.1.0 or higher
* PHP 5.3.3 or higher

## Quick Installation
You can quickly install this extension on the latest version of [phpBB 3.1](https://www.phpbb.com/downloads/) or on the latest development version of [phpBB 3.1-dev](https://github.com/phpbb/phpbb3) by doing the following:

1. Upload the extension with "[Upload Extensions](https://github.com/BoardTools/upload)".
2. Check that you have uploaded the correct files.
3. Click `Enable`.

## Standard Installation
You can install this extension on the latest version of [phpBB 3.1](https://www.phpbb.com/downloads/) or on the latest development version of [phpBB 3.1-dev](https://github.com/phpbb/phpbb3) by doing the following:

1. Download the extension. You can do it [directly from phpbb.com](https://www.phpbb.com/customise/db/extension/reenable/) or by downloading the [latest ZIP-archive of `master` branch of its GitHub repository](https://github.com/lavigor/reenable/archive/master.zip).
2. Check out the existence of the folder `/ext/lavigor/reenable/` in the root of your board folder. Create folders if necessary.
3. Copy the contents of the downloaded `reenable-master` folder to `/ext/lavigor/reenable/`.
4. Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Reenable extensions`.
5. Click `Enable`.

## Usage
Now you can quickly update all of your extensions (including this one).

- Update the files of your extension.
- To reenable the extension: Navigate in the ACP to `Customise -> Extension Management -> Reenable extensions` and click `Reenable`.
- To reinstall the extension: Navigate in the ACP to `Customise -> Extension Management -> Reenable extensions` and click `Reinstall`.

> WARNING: Be sure that you use this function only for developing purposes. Users of the live board can receive errors if they occasionnaly use the extension during the reenabling process.
> However, they may run into errors even during the disabling process.

> ATTENTION! Reinstalling process deletes all saved data of your extension!

## Uninstallation
Navigate in the ACP to `Customise -> Extension Management -> Manage extensions -> Reenable extensions` and click `Disable`.

To permanently uninstall, click `Delete Data` and then you can safely delete the `/ext/lavigor/reenable/` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2014 Igor Lavrov