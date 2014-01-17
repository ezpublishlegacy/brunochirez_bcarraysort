Installing BC Array Sort
========================

Requirements:
-------------
- eZ Publish 4.x

Installing:
-----------
1. Extract the bcarraysort extension and place it in the extensions folder.

2. Enable the extension in eZ Publish. Do this by opening settings/override/site.ini.append.php ,
   and add in the `[ExtensionSettings]` block:

   ```ini
   ActiveExtensions[]=bcarraysort
   ```

3. Update the class autoloads by running the script:

   ```bash
   $ php bin/php/ezpgenerateautoloads.php
   ```
   
4. Clear template override cache with the command:

   ```bash
   $ php bin/php/ezcache.php --clear-all
   ```
