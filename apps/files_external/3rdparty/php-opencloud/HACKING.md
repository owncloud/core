Hacking php-opencloud
---------------------

Welcome! If you'd like to work on php-opencloud, we appreciate your
efforts. Here are a few general guidelines to follow.

1. Use the `working` branch for your pull requests. Except in the case of
   an emergency hotfix, we'll try to not use the master for anything except
   for stable code.
2. Try to relate your pull requests to an issue. Unless you're fixing a
   minor typographical error, create an issue (if one doesn't exist already)
   to describe your changes.
3. Please don't commit large amounts of code without including unit tests!
   Tests are under the `tests/` directory; if you need assistance, file an
   issue and someone will try to help you.
4. Don't forget the docs! The API reference material is generated from the
   docblocks in the code using [phpDocumentor](http://phpdoc.org). If you
   change a function signature, make sure you update the docs. There's also
   a `quickref.md` (quick reference) and `userguide/` (user guide) under the
   `docs/` directory.

If you submit code, please add your name and email address to the
CONTRIBUTORS file.

Note to self:

	git tag -s <tagname>
	git push origin <tagname>

(I always forget these commands)
