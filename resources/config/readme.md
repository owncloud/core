# resources/config
Useful information about the files contained in this directory.

## mimetypealiases.dist.json
This file contains mimetype aliases in a json format. Any changes to this file might get overwritten by an ownCloud update.

To add custom mimetype aliases, create a `mimetypealiases.json` file in the `/config` directory.

Any changes to `mimetypealiases.json` require you to run `./occ maintenance:mimetype:update-js`.

## mimetypemapping.dist.json
Maps file extensions to mimetypes in alphabetical order. Any changes to this file might get overwritten by an ownCloud update.

The first index in the mapped array is the assumed to be correct mimetype. The second one is a secure alternative.

To add custom mimetype mapping, create a `mimetypemapping.json` file in the `/config` directory.