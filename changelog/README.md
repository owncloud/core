# Changelog

We are using [calens](https://github.com/restic/calens) to properly generate a
changelog before we are tagging a new release. 

## Create Changelog items
Create a file according to the [template](TEMPLATE) for each 
changelog in the [unreleased](./unreleased) folder. The following change types are possible: `Bugfix, Change, Enhancement, Security`.

## Automated Changelog build and commit
- After each merge to master, the CHANGELOG.md file is automatically updated and the new version will be committed to master while skipping CI.

## Create a new Release
- copy the files from the [unreleased](./unreleased) folder into a folder matching the
schema `10.0.0_2019-09-01`

## Test the Changelog generator manually
- execute `docker run --rm -v $(pwd):$(pwd) -w $(pwd) toolhippie/calens:latest` 
in the root folder of the project.
