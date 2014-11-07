ZipStreamer Manual
==================

This is a short manual to using ZipStreamer in a php web application.

In short, it works as follows: a ZipStreamer object is initialized. 
Afterwards, (file) streams and directory names/paths can be added to the
ZipStreamer object, which will immediately be streamed to the client (web
browser). After adding all desired files/directories, the ZipStreamer object
is finalized and the zip file is then complete.

Example
-------
```php
require("src/ZipStreamer.php");

# initialize ZipStreamer object (ZipStreamer has it's own namespace)
$zip = new ZipStreamer\ZipStreamer();

# optionally send fitting headers - you can also send your own headers if 
# desired or omit them if you want to stream to other targets but a http
# client
#$zip->sendHeaders();

# get a stream to a file to be added to the zip file
$stream = fopen('inputfile.txt','r');

# add the file to the zip stream (output is sent immediately)
$zip->addFileFromStream($stream, 'test1.txt', 1);

# close the stream if you opened it yourself
fclose($stream);

# add an empty directory to the zip file (also sent immediately)
$zip->addEmptyDir("testdirectory", 1);

# finalize zip file. Nothing can be added any more. 
$zip->finalize();

```

Characteristics
---------------

* ZipStreamer causes no disk i/o (aside from the input streams, if they are
created from disk), has very low cpu usage and a low memory footprint, as
the streams are read in small chunks and immediately written to output
* ZipStreamer by default uses the Zip64 extension. Some (mostly older) zip 
tools can not handle that, therefore it can be disabled (see below)
* With the Zip64 extension, ZipStreamer can handle output zip files larger
than 2/4 GB on both 32bit and 64bit machines
* With the Zip64 extension, ZipStreamer can handle input streams larger then
2/4 GB on both 32bit and 64bit machines. On 32bit machines, that usually means
that the LFS has to be enabled (but if the stream source is not the
filesystem, that may not even be necessary)
* ZipStreamer will not compress the content, currently (PHP appears not to
have a stream deflate feature). That means that the output zip file will be of
the same size (plus a few bytes) as the input files. If you know of a way to
stream deflate in php, please contact us on github.

API Documentation
-----------------

This is the documentation of the public API of ZipStreamer.

###Namespace ZipSteamer
####Class Zipstreamer

#####Methods
```
__construct( $options)
```

Constructor. Initializes ZipStreamer object for immediate usage.

Valid options for ZipStreamer are:

* outstream: stream the zip file is output to (default: stdout)
* zip64:     boolean indicating use of Zip64 extension (default: True)

######Parameters
 * array *$options* Optional, ZipStreamer and zip file options as key/value pairs.

```
sendHeaders(string $archiveName, string $contentType)
```

Send appropriate http headers before streaming the zip file and disable output buffering.

This method, if used, has to be called before adding anything to the zip file.

######Parameters
* string *$archiveName* Filename of archive to be created (optional, default 'archive.zip')
* string *$contentType* Content mime type to be set (optional, default 'application/zip')

```
addFileFromStream(string $stream, string $filePath, int $timestamp, string $fileComment, bool $compress) : bool
```

Add a file to the archive at the specified location and file name.

######Parameters
* string *$stream* Stream to read data from
* string *$filePath* Filepath and name to be used in the archive.
* int    *$timestamp* (Optional) Timestamp for the added file, if omitted or set to 0, the current time will be used.
* string *$fileComment* (Optional) Comment to be added to the archive for this file. To use fileComment, timestamp must be given.
* bool   *$compress* (Optional) Compress file, if set to false the file will only be stored. Default FALSE.

######Returns
bool Success

```
addEmptyDir(string $directoryPath, int $timestamp, string $fileComment) : bool
```

Add an empty directory entry to the zip archive.

######Parameters
* string *$directoryPath* Directory Path and name to be added to the archive.
* int     $timestamp* (Optional) Timestamp for the added directory, if omitted or set to 0, the current time will be used.
* string  $fileComment* (Optional) Comment to be added to the archive for this directory. To use fileComment, timestamp must be given.

######Returns
bool Success

```
finalize() : bool
```

Close the archive.

A closed archive can no longer have new files added to it. After closing, the zip file is completely written to the output stream.

######Returns
bool Success

