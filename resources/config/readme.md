# resources/config
Useful information about the files contained in this directory.

## mimetypealiases.dist.json
Contains mimetype aliases. Any changes to this file might get overwritten by an ownCloud update.

To add custom mimetype aliases, create a `mimetypealiases.json` file in the `/config` directory.

Any changes to `mimetypealiases.json` require you to run `./occ maintenance:mimetype:update-js`.

## mimetypemapping.dist.json
Maps file extensions to mimetypes in alphabetical order. Any changes to this file might get overwritten by an ownCloud update.

The first index in the mapped array is assumed to be the correct mimetype. The second one is a secure alternative.

To add a custom mimetype mapping, create a `mimetypemapping.json` file in the `/config` directory.