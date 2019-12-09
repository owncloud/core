# Changelog

We are using [calens](https://github.com/restic/calens) to properly generate a
changelog before we are tagging a new release. 

## Create Changelog items
Create a file according to the [template](TEMPLATE) for each 
changelog in the [unreleased](./unreleased) folder. The following change types are possible: `Bugfix, Change, Enhancement, Security`.

## Generate the Changelog 
- copy the files from the [unreleased](./unreleased) folder into a folder matching the
schema `10.0.0_2019-09-01` to tag and 
- execute `docker run -ti --rm -v $(pwd):$(pwd) -w $(pwd) toolhippie/calens:latest` 
in the root folder of the project.