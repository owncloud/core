<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class PhotosImageMetadata extends \Google\Collection
{
  protected $collection_key = 'type';
  protected $internal_gapi_mappings = [
        "dEPRECATEDBlendingtype" => "DEPRECATEDBlendingtype",
        "dEPRECATEDGpstimestamp" => "DEPRECATEDGpstimestamp",
        "dEPRECATEDIscolor" => "DEPRECATEDIscolor",
        "dEPRECATEDLargestvalidinteriorrectheight" => "DEPRECATEDLargestvalidinteriorrectheight",
        "dEPRECATEDLargestvalidinteriorrectleft" => "DEPRECATEDLargestvalidinteriorrectleft",
        "dEPRECATEDLargestvalidinteriorrecttop" => "DEPRECATEDLargestvalidinteriorrecttop",
        "dEPRECATEDLargestvalidinteriorrectwidth" => "DEPRECATEDLargestvalidinteriorrectwidth",
        "dEPRECATEDProcess" => "DEPRECATEDProcess",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDBlendingtype;
  /**
   * @var float
   */
  public $dEPRECATEDGpstimestamp;
  /**
   * @var int
   */
  public $dEPRECATEDIscolor;
  /**
   * @var int
   */
  public $dEPRECATEDLargestvalidinteriorrectheight;
  /**
   * @var int
   */
  public $dEPRECATEDLargestvalidinteriorrectleft;
  /**
   * @var int
   */
  public $dEPRECATEDLargestvalidinteriorrecttop;
  /**
   * @var int
   */
  public $dEPRECATEDLargestvalidinteriorrectwidth;
  /**
   * @var int
   */
  public $dEPRECATEDProcess;
  /**
   * @var string
   */
  public $actionadvised;
  /**
   * @var string
   */
  public $addlmodelinfo;
  /**
   * @var string[]
   */
  public $advisory;
  public $altitude;
  protected $animationMetadataType = PhotosAnimationMetadata::class;
  protected $animationMetadataDataType = '';
  /**
   * @var float
   */
  public $aperturefnumber;
  /**
   * @var float
   */
  public $aperturevalue;
  /**
   * @var string[]
   */
  public $artworkorobject;
  /**
   * @var string
   */
  public $audioduration;
  /**
   * @var string
   */
  public $audiooutcue;
  /**
   * @var string
   */
  public $audiosamplingrate;
  /**
   * @var string
   */
  public $audiosamplingresolution;
  /**
   * @var string
   */
  public $audiotype;
  /**
   * @var string
   */
  public $author;
  /**
   * @var string
   */
  public $authorposition;
  /**
   * @var bool
   */
  public $autoenhance;
  /**
   * @var string
   */
  public $baseurl;
  /**
   * @var int
   */
  public $bitDepth;
  /**
   * @var int
   */
  public $bitspersample;
  /**
   * @var float
   */
  public $brightnessvalue;
  /**
   * @var string
   */
  public $burstuuid;
  /**
   * @var string
   */
  public $cameraid;
  /**
   * @var string
   */
  public $cameramake;
  /**
   * @var string
   */
  public $cameramodel;
  /**
   * @var string
   */
  public $caption;
  /**
   * @var string
   */
  public $captionwriter;
  /**
   * @var string
   */
  public $capturesoftware;
  /**
   * @var string
   */
  public $category;
  /**
   * @var float
   */
  public $ccdwidth;
  /**
   * @var int
   */
  public $celllength;
  /**
   * @var int
   */
  public $cellwidth;
  /**
   * @var string
   */
  public $certificate;
  /**
   * @var string
   */
  public $chromasubsampling;
  /**
   * @var string
   */
  public $ciadrcity;
  /**
   * @var string
   */
  public $ciadrctry;
  /**
   * @var string[]
   */
  public $ciadrextadr;
  /**
   * @var string
   */
  public $ciadrpcode;
  /**
   * @var string
   */
  public $ciadrregion;
  /**
   * @var string
   */
  public $ciemailwork;
  /**
   * @var string
   */
  public $citelwork;
  /**
   * @var string
   */
  public $city;
  /**
   * @var string
   */
  public $ciurlwork;
  /**
   * @var int
   */
  public $colormap;
  /**
   * @var bool
   */
  public $colorprofile;
  /**
   * @var int
   */
  public $colorspace;
  /**
   * @var float
   */
  public $compressedbitsperpixel;
  /**
   * @var int
   */
  public $compressionlevel;
  /**
   * @var string
   */
  public $contact;
  /**
   * @var string[]
   */
  public $contentlocationcode;
  /**
   * @var string[]
   */
  public $contentlocationname;
  /**
   * @var int
   */
  public $contrast;
  /**
   * @var string[]
   */
  public $contributor;
  /**
   * @var string
   */
  public $copyrightnotice;
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $countrycode;
  /**
   * @var string
   */
  public $coverage;
  /**
   * @var string
   */
  public $createdate;
  /**
   * @var string
   */
  public $credits;
  /**
   * @var int
   */
  public $croppedareaimageheightpixels;
  /**
   * @var int
   */
  public $croppedareaimagewidthpixels;
  /**
   * @var int
   */
  public $croppedarealeftpixels;
  /**
   * @var int
   */
  public $croppedareatoppixels;
  /**
   * @var int
   */
  public $customrendered;
  /**
   * @var string[]
   */
  public $cvterm;
  /**
   * @var string
   */
  public $date;
  /**
   * @var string
   */
  public $datecreated;
  /**
   * @var string
   */
  public $datesent;
  /**
   * @var string
   */
  public $datetime;
  /**
   * @var string
   */
  public $datetimedigitized;
  /**
   * @var int[]
   */
  public $daylightsavings;
  /**
   * @var string[]
   */
  public $destination;
  public $destinationLatitude;
  public $destinationLongitude;
  /**
   * @var string
   */
  public $digimageguid;
  /**
   * @var string
   */
  public $digitalsourcefiletype;
  /**
   * @var string
   */
  public $digitalsourcetype;
  /**
   * @var float
   */
  public $digitalzoomratio;
  /**
   * @var float
   */
  public $distance;
  protected $dynamicDepthMetadataType = PhotosDynamicDepthMetadata::class;
  protected $dynamicDepthMetadataDataType = '';
  /**
   * @var string
   */
  public $editorialupdate;
  /**
   * @var string
   */
  public $editstatus;
  /**
   * @var string
   */
  public $envelopenumber;
  /**
   * @var string
   */
  public $envelopepriority;
  /**
   * @var string
   */
  public $event;
  protected $exif4cType = PhotosFourCMetadata::class;
  protected $exif4cDataType = '';
  /**
   * @var string
   */
  public $exifTime;
  /**
   * @var string
   */
  public $exifTimeUtc;
  /**
   * @var string
   */
  public $exifTimeUtcSource;
  /**
   * @var string
   */
  public $expirationdate;
  /**
   * @var string
   */
  public $expirationtime;
  /**
   * @var float
   */
  public $exposurebias;
  /**
   * @var float
   */
  public $exposureindex;
  /**
   * @var bool
   */
  public $exposurelockused;
  /**
   * @var int
   */
  public $exposuremode;
  /**
   * @var int
   */
  public $exposureprogram;
  /**
   * @var float
   */
  public $exposuretime;
  /**
   * @var int
   */
  public $extrasamples;
  /**
   * @var int
   */
  public $fillorder;
  /**
   * @var string
   */
  public $firmware;
  /**
   * @var string
   */
  public $firstphotodate;
  /**
   * @var string
   */
  public $fixtureidentifier;
  /**
   * @var float
   */
  public $flashcompensation;
  /**
   * @var float
   */
  public $flashenergy;
  /**
   * @var int
   */
  public $flashreturn;
  /**
   * @var int
   */
  public $flashused;
  /**
   * @var float
   */
  public $focallength;
  /**
   * @var int
   */
  public $focallengthin35mmfilm;
  /**
   * @var float
   */
  public $focalplaneunits;
  /**
   * @var float
   */
  public $focalplanexres;
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $freebytecounts;
  /**
   * @var int
   */
  public $freeoffsets;
  /**
   * @var int
   */
  public $fullpanoheightpixels;
  /**
   * @var int
   */
  public $fullpanowidthpixels;
  /**
   * @var bool
   */
  public $function;
  /**
   * @var int
   */
  public $gaincontrol;
  /**
   * @var string
   */
  public $gaudiomime;
  /**
   * @var string
   */
  public $gcameraburstid;
  /**
   * @var int
   */
  public $gcameraburstprimary;
  /**
   * @var string[]
   */
  public $gcameradisableautocreation;
  /**
   * @var int
   */
  public $gcameramicrovideo;
  /**
   * @var int
   */
  public $gcameramicrovideooffset;
  /**
   * @var int
   */
  public $gcameramicrovideopresentationtimestampus;
  /**
   * @var int
   */
  public $gcameramicrovideoversion;
  /**
   * @var int
   */
  public $gcameramotionphoto;
  /**
   * @var int
   */
  public $gcameramotionphotopresentationtimestampus;
  /**
   * @var int
   */
  public $gcameramotionphotoversion;
  /**
   * @var string
   */
  public $gcameraspecialtypeid;
  /**
   * @var string
   */
  public $gcreationscameraburstid;
  /**
   * @var string
   */
  public $gcreationstype;
  protected $gdepthMetadataType = PhotosGDepthMetadata::class;
  protected $gdepthMetadataDataType = '';
  /**
   * @var string
   */
  public $gimagemime;
  /**
   * @var string
   */
  public $gpsdatestamp;
  /**
   * @var float
   */
  public $gpsdestbearing;
  /**
   * @var string
   */
  public $gpsdestbearingref;
  /**
   * @var float
   */
  public $gpsdestdistance;
  /**
   * @var string
   */
  public $gpsdestdistanceref;
  /**
   * @var float
   */
  public $gpsdestlatitude;
  /**
   * @var string
   */
  public $gpsdestlatituderef;
  /**
   * @var float
   */
  public $gpsdestlongitude;
  /**
   * @var string
   */
  public $gpsdestlongituderef;
  /**
   * @var int
   */
  public $gpsdifferential;
  /**
   * @var float
   */
  public $gpsdop;
  /**
   * @var float
   */
  public $gpsimgdirection;
  /**
   * @var string
   */
  public $gpsimgdirectionref;
  /**
   * @var string
   */
  public $gpsmapdatum;
  /**
   * @var string
   */
  public $gpsmeasuremode;
  /**
   * @var string
   */
  public $gpssatellites;
  /**
   * @var float
   */
  public $gpsspeed;
  /**
   * @var string
   */
  public $gpsspeedref;
  /**
   * @var string
   */
  public $gpsstatus;
  /**
   * @var float[]
   */
  public $gpstime;
  /**
   * @var float
   */
  public $gpstrack;
  /**
   * @var string
   */
  public $gpstrackref;
  /**
   * @var int
   */
  public $grayresponsecurve;
  /**
   * @var int
   */
  public $grayresponseunit;
  /**
   * @var bool
   */
  public $hasAlpha;
  /**
   * @var string
   */
  public $headline;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $hostcomputer;
  /**
   * @var string[]
   */
  public $identifier;
  /**
   * @var string
   */
  public $imagenumber;
  /**
   * @var string
   */
  public $imageorientation;
  /**
   * @var string
   */
  public $imagetype;
  /**
   * @var float
   */
  public $initialhorizontalfovdegrees;
  /**
   * @var float
   */
  public $initialverticalfovdegrees;
  /**
   * @var int
   */
  public $initialviewheadingdegrees;
  /**
   * @var int
   */
  public $initialviewpitchdegrees;
  /**
   * @var int
   */
  public $initialviewrolldegrees;
  /**
   * @var string
   */
  public $instructions;
  /**
   * @var string
   */
  public $intellectualgenre;
  /**
   * @var string
   */
  public $interoperabilityindex;
  protected $iptc4cType = PhotosFourCMetadata::class;
  protected $iptc4cDataType = '';
  /**
   * @var string
   */
  public $iptclastedited;
  /**
   * @var bool
   */
  public $ismpformat;
  /**
   * @var int
   */
  public $isoequivalent;
  /**
   * @var string[]
   */
  public $keyword;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string[]
   */
  public $language;
  /**
   * @var string
   */
  public $languageidentifier;
  /**
   * @var string
   */
  public $lastphotodate;
  public $latitude;
  /**
   * @var string
   */
  public $lens;
  /**
   * @var string
   */
  public $lensid;
  /**
   * @var string
   */
  public $lensinfo;
  /**
   * @var int
   */
  public $lightsource;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string[]
   */
  public $locationshown;
  public $longitude;
  /**
   * @var bool
   */
  public $marked;
  /**
   * @var float
   */
  public $maxaperturevalue;
  /**
   * @var int
   */
  public $maxavailheight;
  /**
   * @var int
   */
  public $maxavailwidth;
  /**
   * @var int
   */
  public $maxsamplevalue;
  /**
   * @var string
   */
  public $metadatadate;
  /**
   * @var int
   */
  public $meteringmode;
  /**
   * @var int
   */
  public $microvideooriginaloffset;
  /**
   * @var int
   */
  public $mimeType;
  /**
   * @var string
   */
  public $minormodelagedisclosure;
  /**
   * @var int
   */
  public $minsamplevalue;
  /**
   * @var int
   */
  public $mode;
  /**
   * @var int[]
   */
  public $modelage;
  /**
   * @var string[]
   */
  public $modelreleaseid;
  /**
   * @var string
   */
  public $modelreleasestatus;
  /**
   * @var string
   */
  public $modifydate;
  /**
   * @var string
   */
  public $motionphotovideodataboxheader;
  /**
   * @var string
   */
  public $nickname;
  /**
   * @var string[]
   */
  public $objectattributereference;
  /**
   * @var string
   */
  public $objectcycle;
  /**
   * @var string
   */
  public $objecttypereference;
  /**
   * @var string
   */
  public $offsettime;
  /**
   * @var string
   */
  public $offsettimedigitized;
  /**
   * @var string
   */
  public $offsettimeoriginal;
  /**
   * @var string[]
   */
  public $organisationinimagecode;
  /**
   * @var string[]
   */
  public $organisationinimagename;
  /**
   * @var int
   */
  public $orientation;
  /**
   * @var string
   */
  public $originatingprogram;
  /**
   * @var string[]
   */
  public $owner;
  /**
   * @var string
   */
  public $ownername;
  protected $panoramaMetadataType = PhotosPanoramaMetadata::class;
  protected $panoramaMetadataDataType = '';
  /**
   * @var string[]
   */
  public $personinimage;
  /**
   * @var int
   */
  public $photometricinterpretation;
  /**
   * @var int
   */
  public $planarconfiguration;
  /**
   * @var float
   */
  public $poseheadingdegrees;
  /**
   * @var float
   */
  public $posepitchdegrees;
  /**
   * @var float
   */
  public $poserolldegrees;
  /**
   * @var float
   */
  public $primarychromaticities;
  /**
   * @var string[]
   */
  public $productid;
  /**
   * @var string
   */
  public $programversion;
  /**
   * @var string
   */
  public $projectiontype;
  /**
   * @var string[]
   */
  public $propertyreleaseid;
  /**
   * @var string
   */
  public $propertyreleasestatus;
  /**
   * @var string[]
   */
  public $publisher;
  /**
   * @var float
   */
  public $rating;
  /**
   * @var bool
   */
  public $redeyemode;
  /**
   * @var float
   */
  public $referenceblackwhite;
  /**
   * @var string[]
   */
  public $referencedate;
  /**
   * @var string[]
   */
  public $referencenumber;
  /**
   * @var string[]
   */
  public $referenceservice;
  /**
   * @var string
   */
  public $relatedimagefileformat;
  /**
   * @var string
   */
  public $relatedimageheight;
  /**
   * @var string
   */
  public $relatedimagewidth;
  /**
   * @var string
   */
  public $relatedsoundfile;
  /**
   * @var string[]
   */
  public $relation;
  /**
   * @var string
   */
  public $releasedate;
  /**
   * @var string
   */
  public $releasetime;
  /**
   * @var int
   */
  public $resolutionunit;
  /**
   * @var int
   */
  public $rotate;
  /**
   * @var string
   */
  public $rowsperstrip;
  /**
   * @var int
   */
  public $samplesperpixel;
  /**
   * @var int
   */
  public $saturation;
  /**
   * @var string[]
   */
  public $scene;
  /**
   * @var int
   */
  public $scenecapturetype;
  /**
   * @var int
   */
  public $sensingmethod;
  /**
   * @var float
   */
  public $sensorheight;
  /**
   * @var float
   */
  public $sensorwidth;
  /**
   * @var string
   */
  public $serialnumber;
  /**
   * @var string
   */
  public $serviceidentifier;
  /**
   * @var int
   */
  public $sharpness;
  /**
   * @var float
   */
  public $shutterspeedvalue;
  /**
   * @var string
   */
  public $software;
  /**
   * @var string
   */
  public $source;
  /**
   * @var int
   */
  public $sourcephotoscount;
  /**
   * @var string
   */
  public $spectralsensitivity;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stitchingsoftware;
  /**
   * @var string
   */
  public $stripbytecounts;
  /**
   * @var string
   */
  public $stripoffsets;
  /**
   * @var int
   */
  public $subjectarea;
  /**
   * @var string[]
   */
  public $subjectcode;
  /**
   * @var int
   */
  public $subjectdistancerange;
  /**
   * @var int
   */
  public $subjectlocation;
  /**
   * @var string[]
   */
  public $subjectreference;
  /**
   * @var string
   */
  public $sublocation;
  /**
   * @var string
   */
  public $subsectime;
  /**
   * @var string
   */
  public $subsectimedigitized;
  /**
   * @var string
   */
  public $subsectimeoriginal;
  /**
   * @var string[]
   */
  public $supplementalcategory;
  /**
   * @var int
   */
  public $thresholding;
  /**
   * @var int
   */
  public $thumbnailerBuildCl;
  /**
   * @var string
   */
  public $timesent;
  /**
   * @var int[]
   */
  public $timezoneminutes;
  /**
   * @var int[]
   */
  public $timezoneoffset;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $transmissionreference;
  /**
   * @var string[]
   */
  public $type;
  /**
   * @var string
   */
  public $uniqueid;
  /**
   * @var string
   */
  public $uno;
  /**
   * @var string
   */
  public $urgency;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $usageterms;
  /**
   * @var bool
   */
  public $usepanoramaviewer;
  /**
   * @var string
   */
  public $version;
  /**
   * @var string
   */
  public $webstatement;
  /**
   * @var int
   */
  public $whitebalance;
  /**
   * @var float
   */
  public $whitepoint;
  /**
   * @var int
   */
  public $width;
  protected $xmp4cType = PhotosFourCMetadata::class;
  protected $xmp4cDataType = '';
  /**
   * @var float
   */
  public $xresolution;
  /**
   * @var float
   */
  public $ycbcrcoefficients;
  /**
   * @var int
   */
  public $ycbcrpositioning;
  /**
   * @var int
   */
  public $ycbcrsubsampling;
  /**
   * @var float
   */
  public $yresolution;

  /**
   * @param string
   */
  public function setDEPRECATEDBlendingtype($dEPRECATEDBlendingtype)
  {
    $this->dEPRECATEDBlendingtype = $dEPRECATEDBlendingtype;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDBlendingtype()
  {
    return $this->dEPRECATEDBlendingtype;
  }
  /**
   * @param float
   */
  public function setDEPRECATEDGpstimestamp($dEPRECATEDGpstimestamp)
  {
    $this->dEPRECATEDGpstimestamp = $dEPRECATEDGpstimestamp;
  }
  /**
   * @return float
   */
  public function getDEPRECATEDGpstimestamp()
  {
    return $this->dEPRECATEDGpstimestamp;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDIscolor($dEPRECATEDIscolor)
  {
    $this->dEPRECATEDIscolor = $dEPRECATEDIscolor;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDIscolor()
  {
    return $this->dEPRECATEDIscolor;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDLargestvalidinteriorrectheight($dEPRECATEDLargestvalidinteriorrectheight)
  {
    $this->dEPRECATEDLargestvalidinteriorrectheight = $dEPRECATEDLargestvalidinteriorrectheight;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDLargestvalidinteriorrectheight()
  {
    return $this->dEPRECATEDLargestvalidinteriorrectheight;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDLargestvalidinteriorrectleft($dEPRECATEDLargestvalidinteriorrectleft)
  {
    $this->dEPRECATEDLargestvalidinteriorrectleft = $dEPRECATEDLargestvalidinteriorrectleft;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDLargestvalidinteriorrectleft()
  {
    return $this->dEPRECATEDLargestvalidinteriorrectleft;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDLargestvalidinteriorrecttop($dEPRECATEDLargestvalidinteriorrecttop)
  {
    $this->dEPRECATEDLargestvalidinteriorrecttop = $dEPRECATEDLargestvalidinteriorrecttop;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDLargestvalidinteriorrecttop()
  {
    return $this->dEPRECATEDLargestvalidinteriorrecttop;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDLargestvalidinteriorrectwidth($dEPRECATEDLargestvalidinteriorrectwidth)
  {
    $this->dEPRECATEDLargestvalidinteriorrectwidth = $dEPRECATEDLargestvalidinteriorrectwidth;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDLargestvalidinteriorrectwidth()
  {
    return $this->dEPRECATEDLargestvalidinteriorrectwidth;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDProcess($dEPRECATEDProcess)
  {
    $this->dEPRECATEDProcess = $dEPRECATEDProcess;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDProcess()
  {
    return $this->dEPRECATEDProcess;
  }
  /**
   * @param string
   */
  public function setActionadvised($actionadvised)
  {
    $this->actionadvised = $actionadvised;
  }
  /**
   * @return string
   */
  public function getActionadvised()
  {
    return $this->actionadvised;
  }
  /**
   * @param string
   */
  public function setAddlmodelinfo($addlmodelinfo)
  {
    $this->addlmodelinfo = $addlmodelinfo;
  }
  /**
   * @return string
   */
  public function getAddlmodelinfo()
  {
    return $this->addlmodelinfo;
  }
  /**
   * @param string[]
   */
  public function setAdvisory($advisory)
  {
    $this->advisory = $advisory;
  }
  /**
   * @return string[]
   */
  public function getAdvisory()
  {
    return $this->advisory;
  }
  public function setAltitude($altitude)
  {
    $this->altitude = $altitude;
  }
  public function getAltitude()
  {
    return $this->altitude;
  }
  /**
   * @param PhotosAnimationMetadata
   */
  public function setAnimationMetadata(PhotosAnimationMetadata $animationMetadata)
  {
    $this->animationMetadata = $animationMetadata;
  }
  /**
   * @return PhotosAnimationMetadata
   */
  public function getAnimationMetadata()
  {
    return $this->animationMetadata;
  }
  /**
   * @param float
   */
  public function setAperturefnumber($aperturefnumber)
  {
    $this->aperturefnumber = $aperturefnumber;
  }
  /**
   * @return float
   */
  public function getAperturefnumber()
  {
    return $this->aperturefnumber;
  }
  /**
   * @param float
   */
  public function setAperturevalue($aperturevalue)
  {
    $this->aperturevalue = $aperturevalue;
  }
  /**
   * @return float
   */
  public function getAperturevalue()
  {
    return $this->aperturevalue;
  }
  /**
   * @param string[]
   */
  public function setArtworkorobject($artworkorobject)
  {
    $this->artworkorobject = $artworkorobject;
  }
  /**
   * @return string[]
   */
  public function getArtworkorobject()
  {
    return $this->artworkorobject;
  }
  /**
   * @param string
   */
  public function setAudioduration($audioduration)
  {
    $this->audioduration = $audioduration;
  }
  /**
   * @return string
   */
  public function getAudioduration()
  {
    return $this->audioduration;
  }
  /**
   * @param string
   */
  public function setAudiooutcue($audiooutcue)
  {
    $this->audiooutcue = $audiooutcue;
  }
  /**
   * @return string
   */
  public function getAudiooutcue()
  {
    return $this->audiooutcue;
  }
  /**
   * @param string
   */
  public function setAudiosamplingrate($audiosamplingrate)
  {
    $this->audiosamplingrate = $audiosamplingrate;
  }
  /**
   * @return string
   */
  public function getAudiosamplingrate()
  {
    return $this->audiosamplingrate;
  }
  /**
   * @param string
   */
  public function setAudiosamplingresolution($audiosamplingresolution)
  {
    $this->audiosamplingresolution = $audiosamplingresolution;
  }
  /**
   * @return string
   */
  public function getAudiosamplingresolution()
  {
    return $this->audiosamplingresolution;
  }
  /**
   * @param string
   */
  public function setAudiotype($audiotype)
  {
    $this->audiotype = $audiotype;
  }
  /**
   * @return string
   */
  public function getAudiotype()
  {
    return $this->audiotype;
  }
  /**
   * @param string
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return string
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param string
   */
  public function setAuthorposition($authorposition)
  {
    $this->authorposition = $authorposition;
  }
  /**
   * @return string
   */
  public function getAuthorposition()
  {
    return $this->authorposition;
  }
  /**
   * @param bool
   */
  public function setAutoenhance($autoenhance)
  {
    $this->autoenhance = $autoenhance;
  }
  /**
   * @return bool
   */
  public function getAutoenhance()
  {
    return $this->autoenhance;
  }
  /**
   * @param string
   */
  public function setBaseurl($baseurl)
  {
    $this->baseurl = $baseurl;
  }
  /**
   * @return string
   */
  public function getBaseurl()
  {
    return $this->baseurl;
  }
  /**
   * @param int
   */
  public function setBitDepth($bitDepth)
  {
    $this->bitDepth = $bitDepth;
  }
  /**
   * @return int
   */
  public function getBitDepth()
  {
    return $this->bitDepth;
  }
  /**
   * @param int
   */
  public function setBitspersample($bitspersample)
  {
    $this->bitspersample = $bitspersample;
  }
  /**
   * @return int
   */
  public function getBitspersample()
  {
    return $this->bitspersample;
  }
  /**
   * @param float
   */
  public function setBrightnessvalue($brightnessvalue)
  {
    $this->brightnessvalue = $brightnessvalue;
  }
  /**
   * @return float
   */
  public function getBrightnessvalue()
  {
    return $this->brightnessvalue;
  }
  /**
   * @param string
   */
  public function setBurstuuid($burstuuid)
  {
    $this->burstuuid = $burstuuid;
  }
  /**
   * @return string
   */
  public function getBurstuuid()
  {
    return $this->burstuuid;
  }
  /**
   * @param string
   */
  public function setCameraid($cameraid)
  {
    $this->cameraid = $cameraid;
  }
  /**
   * @return string
   */
  public function getCameraid()
  {
    return $this->cameraid;
  }
  /**
   * @param string
   */
  public function setCameramake($cameramake)
  {
    $this->cameramake = $cameramake;
  }
  /**
   * @return string
   */
  public function getCameramake()
  {
    return $this->cameramake;
  }
  /**
   * @param string
   */
  public function setCameramodel($cameramodel)
  {
    $this->cameramodel = $cameramodel;
  }
  /**
   * @return string
   */
  public function getCameramodel()
  {
    return $this->cameramodel;
  }
  /**
   * @param string
   */
  public function setCaption($caption)
  {
    $this->caption = $caption;
  }
  /**
   * @return string
   */
  public function getCaption()
  {
    return $this->caption;
  }
  /**
   * @param string
   */
  public function setCaptionwriter($captionwriter)
  {
    $this->captionwriter = $captionwriter;
  }
  /**
   * @return string
   */
  public function getCaptionwriter()
  {
    return $this->captionwriter;
  }
  /**
   * @param string
   */
  public function setCapturesoftware($capturesoftware)
  {
    $this->capturesoftware = $capturesoftware;
  }
  /**
   * @return string
   */
  public function getCapturesoftware()
  {
    return $this->capturesoftware;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param float
   */
  public function setCcdwidth($ccdwidth)
  {
    $this->ccdwidth = $ccdwidth;
  }
  /**
   * @return float
   */
  public function getCcdwidth()
  {
    return $this->ccdwidth;
  }
  /**
   * @param int
   */
  public function setCelllength($celllength)
  {
    $this->celllength = $celllength;
  }
  /**
   * @return int
   */
  public function getCelllength()
  {
    return $this->celllength;
  }
  /**
   * @param int
   */
  public function setCellwidth($cellwidth)
  {
    $this->cellwidth = $cellwidth;
  }
  /**
   * @return int
   */
  public function getCellwidth()
  {
    return $this->cellwidth;
  }
  /**
   * @param string
   */
  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return string
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  /**
   * @param string
   */
  public function setChromasubsampling($chromasubsampling)
  {
    $this->chromasubsampling = $chromasubsampling;
  }
  /**
   * @return string
   */
  public function getChromasubsampling()
  {
    return $this->chromasubsampling;
  }
  /**
   * @param string
   */
  public function setCiadrcity($ciadrcity)
  {
    $this->ciadrcity = $ciadrcity;
  }
  /**
   * @return string
   */
  public function getCiadrcity()
  {
    return $this->ciadrcity;
  }
  /**
   * @param string
   */
  public function setCiadrctry($ciadrctry)
  {
    $this->ciadrctry = $ciadrctry;
  }
  /**
   * @return string
   */
  public function getCiadrctry()
  {
    return $this->ciadrctry;
  }
  /**
   * @param string[]
   */
  public function setCiadrextadr($ciadrextadr)
  {
    $this->ciadrextadr = $ciadrextadr;
  }
  /**
   * @return string[]
   */
  public function getCiadrextadr()
  {
    return $this->ciadrextadr;
  }
  /**
   * @param string
   */
  public function setCiadrpcode($ciadrpcode)
  {
    $this->ciadrpcode = $ciadrpcode;
  }
  /**
   * @return string
   */
  public function getCiadrpcode()
  {
    return $this->ciadrpcode;
  }
  /**
   * @param string
   */
  public function setCiadrregion($ciadrregion)
  {
    $this->ciadrregion = $ciadrregion;
  }
  /**
   * @return string
   */
  public function getCiadrregion()
  {
    return $this->ciadrregion;
  }
  /**
   * @param string
   */
  public function setCiemailwork($ciemailwork)
  {
    $this->ciemailwork = $ciemailwork;
  }
  /**
   * @return string
   */
  public function getCiemailwork()
  {
    return $this->ciemailwork;
  }
  /**
   * @param string
   */
  public function setCitelwork($citelwork)
  {
    $this->citelwork = $citelwork;
  }
  /**
   * @return string
   */
  public function getCitelwork()
  {
    return $this->citelwork;
  }
  /**
   * @param string
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }
  /**
   * @param string
   */
  public function setCiurlwork($ciurlwork)
  {
    $this->ciurlwork = $ciurlwork;
  }
  /**
   * @return string
   */
  public function getCiurlwork()
  {
    return $this->ciurlwork;
  }
  /**
   * @param int
   */
  public function setColormap($colormap)
  {
    $this->colormap = $colormap;
  }
  /**
   * @return int
   */
  public function getColormap()
  {
    return $this->colormap;
  }
  /**
   * @param bool
   */
  public function setColorprofile($colorprofile)
  {
    $this->colorprofile = $colorprofile;
  }
  /**
   * @return bool
   */
  public function getColorprofile()
  {
    return $this->colorprofile;
  }
  /**
   * @param int
   */
  public function setColorspace($colorspace)
  {
    $this->colorspace = $colorspace;
  }
  /**
   * @return int
   */
  public function getColorspace()
  {
    return $this->colorspace;
  }
  /**
   * @param float
   */
  public function setCompressedbitsperpixel($compressedbitsperpixel)
  {
    $this->compressedbitsperpixel = $compressedbitsperpixel;
  }
  /**
   * @return float
   */
  public function getCompressedbitsperpixel()
  {
    return $this->compressedbitsperpixel;
  }
  /**
   * @param int
   */
  public function setCompressionlevel($compressionlevel)
  {
    $this->compressionlevel = $compressionlevel;
  }
  /**
   * @return int
   */
  public function getCompressionlevel()
  {
    return $this->compressionlevel;
  }
  /**
   * @param string
   */
  public function setContact($contact)
  {
    $this->contact = $contact;
  }
  /**
   * @return string
   */
  public function getContact()
  {
    return $this->contact;
  }
  /**
   * @param string[]
   */
  public function setContentlocationcode($contentlocationcode)
  {
    $this->contentlocationcode = $contentlocationcode;
  }
  /**
   * @return string[]
   */
  public function getContentlocationcode()
  {
    return $this->contentlocationcode;
  }
  /**
   * @param string[]
   */
  public function setContentlocationname($contentlocationname)
  {
    $this->contentlocationname = $contentlocationname;
  }
  /**
   * @return string[]
   */
  public function getContentlocationname()
  {
    return $this->contentlocationname;
  }
  /**
   * @param int
   */
  public function setContrast($contrast)
  {
    $this->contrast = $contrast;
  }
  /**
   * @return int
   */
  public function getContrast()
  {
    return $this->contrast;
  }
  /**
   * @param string[]
   */
  public function setContributor($contributor)
  {
    $this->contributor = $contributor;
  }
  /**
   * @return string[]
   */
  public function getContributor()
  {
    return $this->contributor;
  }
  /**
   * @param string
   */
  public function setCopyrightnotice($copyrightnotice)
  {
    $this->copyrightnotice = $copyrightnotice;
  }
  /**
   * @return string
   */
  public function getCopyrightnotice()
  {
    return $this->copyrightnotice;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setCountrycode($countrycode)
  {
    $this->countrycode = $countrycode;
  }
  /**
   * @return string
   */
  public function getCountrycode()
  {
    return $this->countrycode;
  }
  /**
   * @param string
   */
  public function setCoverage($coverage)
  {
    $this->coverage = $coverage;
  }
  /**
   * @return string
   */
  public function getCoverage()
  {
    return $this->coverage;
  }
  /**
   * @param string
   */
  public function setCreatedate($createdate)
  {
    $this->createdate = $createdate;
  }
  /**
   * @return string
   */
  public function getCreatedate()
  {
    return $this->createdate;
  }
  /**
   * @param string
   */
  public function setCredits($credits)
  {
    $this->credits = $credits;
  }
  /**
   * @return string
   */
  public function getCredits()
  {
    return $this->credits;
  }
  /**
   * @param int
   */
  public function setCroppedareaimageheightpixels($croppedareaimageheightpixels)
  {
    $this->croppedareaimageheightpixels = $croppedareaimageheightpixels;
  }
  /**
   * @return int
   */
  public function getCroppedareaimageheightpixels()
  {
    return $this->croppedareaimageheightpixels;
  }
  /**
   * @param int
   */
  public function setCroppedareaimagewidthpixels($croppedareaimagewidthpixels)
  {
    $this->croppedareaimagewidthpixels = $croppedareaimagewidthpixels;
  }
  /**
   * @return int
   */
  public function getCroppedareaimagewidthpixels()
  {
    return $this->croppedareaimagewidthpixels;
  }
  /**
   * @param int
   */
  public function setCroppedarealeftpixels($croppedarealeftpixels)
  {
    $this->croppedarealeftpixels = $croppedarealeftpixels;
  }
  /**
   * @return int
   */
  public function getCroppedarealeftpixels()
  {
    return $this->croppedarealeftpixels;
  }
  /**
   * @param int
   */
  public function setCroppedareatoppixels($croppedareatoppixels)
  {
    $this->croppedareatoppixels = $croppedareatoppixels;
  }
  /**
   * @return int
   */
  public function getCroppedareatoppixels()
  {
    return $this->croppedareatoppixels;
  }
  /**
   * @param int
   */
  public function setCustomrendered($customrendered)
  {
    $this->customrendered = $customrendered;
  }
  /**
   * @return int
   */
  public function getCustomrendered()
  {
    return $this->customrendered;
  }
  /**
   * @param string[]
   */
  public function setCvterm($cvterm)
  {
    $this->cvterm = $cvterm;
  }
  /**
   * @return string[]
   */
  public function getCvterm()
  {
    return $this->cvterm;
  }
  /**
   * @param string
   */
  public function setDate($date)
  {
    $this->date = $date;
  }
  /**
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param string
   */
  public function setDatecreated($datecreated)
  {
    $this->datecreated = $datecreated;
  }
  /**
   * @return string
   */
  public function getDatecreated()
  {
    return $this->datecreated;
  }
  /**
   * @param string
   */
  public function setDatesent($datesent)
  {
    $this->datesent = $datesent;
  }
  /**
   * @return string
   */
  public function getDatesent()
  {
    return $this->datesent;
  }
  /**
   * @param string
   */
  public function setDatetime($datetime)
  {
    $this->datetime = $datetime;
  }
  /**
   * @return string
   */
  public function getDatetime()
  {
    return $this->datetime;
  }
  /**
   * @param string
   */
  public function setDatetimedigitized($datetimedigitized)
  {
    $this->datetimedigitized = $datetimedigitized;
  }
  /**
   * @return string
   */
  public function getDatetimedigitized()
  {
    return $this->datetimedigitized;
  }
  /**
   * @param int[]
   */
  public function setDaylightsavings($daylightsavings)
  {
    $this->daylightsavings = $daylightsavings;
  }
  /**
   * @return int[]
   */
  public function getDaylightsavings()
  {
    return $this->daylightsavings;
  }
  /**
   * @param string[]
   */
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return string[]
   */
  public function getDestination()
  {
    return $this->destination;
  }
  public function setDestinationLatitude($destinationLatitude)
  {
    $this->destinationLatitude = $destinationLatitude;
  }
  public function getDestinationLatitude()
  {
    return $this->destinationLatitude;
  }
  public function setDestinationLongitude($destinationLongitude)
  {
    $this->destinationLongitude = $destinationLongitude;
  }
  public function getDestinationLongitude()
  {
    return $this->destinationLongitude;
  }
  /**
   * @param string
   */
  public function setDigimageguid($digimageguid)
  {
    $this->digimageguid = $digimageguid;
  }
  /**
   * @return string
   */
  public function getDigimageguid()
  {
    return $this->digimageguid;
  }
  /**
   * @param string
   */
  public function setDigitalsourcefiletype($digitalsourcefiletype)
  {
    $this->digitalsourcefiletype = $digitalsourcefiletype;
  }
  /**
   * @return string
   */
  public function getDigitalsourcefiletype()
  {
    return $this->digitalsourcefiletype;
  }
  /**
   * @param string
   */
  public function setDigitalsourcetype($digitalsourcetype)
  {
    $this->digitalsourcetype = $digitalsourcetype;
  }
  /**
   * @return string
   */
  public function getDigitalsourcetype()
  {
    return $this->digitalsourcetype;
  }
  /**
   * @param float
   */
  public function setDigitalzoomratio($digitalzoomratio)
  {
    $this->digitalzoomratio = $digitalzoomratio;
  }
  /**
   * @return float
   */
  public function getDigitalzoomratio()
  {
    return $this->digitalzoomratio;
  }
  /**
   * @param float
   */
  public function setDistance($distance)
  {
    $this->distance = $distance;
  }
  /**
   * @return float
   */
  public function getDistance()
  {
    return $this->distance;
  }
  /**
   * @param PhotosDynamicDepthMetadata
   */
  public function setDynamicDepthMetadata(PhotosDynamicDepthMetadata $dynamicDepthMetadata)
  {
    $this->dynamicDepthMetadata = $dynamicDepthMetadata;
  }
  /**
   * @return PhotosDynamicDepthMetadata
   */
  public function getDynamicDepthMetadata()
  {
    return $this->dynamicDepthMetadata;
  }
  /**
   * @param string
   */
  public function setEditorialupdate($editorialupdate)
  {
    $this->editorialupdate = $editorialupdate;
  }
  /**
   * @return string
   */
  public function getEditorialupdate()
  {
    return $this->editorialupdate;
  }
  /**
   * @param string
   */
  public function setEditstatus($editstatus)
  {
    $this->editstatus = $editstatus;
  }
  /**
   * @return string
   */
  public function getEditstatus()
  {
    return $this->editstatus;
  }
  /**
   * @param string
   */
  public function setEnvelopenumber($envelopenumber)
  {
    $this->envelopenumber = $envelopenumber;
  }
  /**
   * @return string
   */
  public function getEnvelopenumber()
  {
    return $this->envelopenumber;
  }
  /**
   * @param string
   */
  public function setEnvelopepriority($envelopepriority)
  {
    $this->envelopepriority = $envelopepriority;
  }
  /**
   * @return string
   */
  public function getEnvelopepriority()
  {
    return $this->envelopepriority;
  }
  /**
   * @param string
   */
  public function setEvent($event)
  {
    $this->event = $event;
  }
  /**
   * @return string
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param PhotosFourCMetadata
   */
  public function setExif4c(PhotosFourCMetadata $exif4c)
  {
    $this->exif4c = $exif4c;
  }
  /**
   * @return PhotosFourCMetadata
   */
  public function getExif4c()
  {
    return $this->exif4c;
  }
  /**
   * @param string
   */
  public function setExifTime($exifTime)
  {
    $this->exifTime = $exifTime;
  }
  /**
   * @return string
   */
  public function getExifTime()
  {
    return $this->exifTime;
  }
  /**
   * @param string
   */
  public function setExifTimeUtc($exifTimeUtc)
  {
    $this->exifTimeUtc = $exifTimeUtc;
  }
  /**
   * @return string
   */
  public function getExifTimeUtc()
  {
    return $this->exifTimeUtc;
  }
  /**
   * @param string
   */
  public function setExifTimeUtcSource($exifTimeUtcSource)
  {
    $this->exifTimeUtcSource = $exifTimeUtcSource;
  }
  /**
   * @return string
   */
  public function getExifTimeUtcSource()
  {
    return $this->exifTimeUtcSource;
  }
  /**
   * @param string
   */
  public function setExpirationdate($expirationdate)
  {
    $this->expirationdate = $expirationdate;
  }
  /**
   * @return string
   */
  public function getExpirationdate()
  {
    return $this->expirationdate;
  }
  /**
   * @param string
   */
  public function setExpirationtime($expirationtime)
  {
    $this->expirationtime = $expirationtime;
  }
  /**
   * @return string
   */
  public function getExpirationtime()
  {
    return $this->expirationtime;
  }
  /**
   * @param float
   */
  public function setExposurebias($exposurebias)
  {
    $this->exposurebias = $exposurebias;
  }
  /**
   * @return float
   */
  public function getExposurebias()
  {
    return $this->exposurebias;
  }
  /**
   * @param float
   */
  public function setExposureindex($exposureindex)
  {
    $this->exposureindex = $exposureindex;
  }
  /**
   * @return float
   */
  public function getExposureindex()
  {
    return $this->exposureindex;
  }
  /**
   * @param bool
   */
  public function setExposurelockused($exposurelockused)
  {
    $this->exposurelockused = $exposurelockused;
  }
  /**
   * @return bool
   */
  public function getExposurelockused()
  {
    return $this->exposurelockused;
  }
  /**
   * @param int
   */
  public function setExposuremode($exposuremode)
  {
    $this->exposuremode = $exposuremode;
  }
  /**
   * @return int
   */
  public function getExposuremode()
  {
    return $this->exposuremode;
  }
  /**
   * @param int
   */
  public function setExposureprogram($exposureprogram)
  {
    $this->exposureprogram = $exposureprogram;
  }
  /**
   * @return int
   */
  public function getExposureprogram()
  {
    return $this->exposureprogram;
  }
  /**
   * @param float
   */
  public function setExposuretime($exposuretime)
  {
    $this->exposuretime = $exposuretime;
  }
  /**
   * @return float
   */
  public function getExposuretime()
  {
    return $this->exposuretime;
  }
  /**
   * @param int
   */
  public function setExtrasamples($extrasamples)
  {
    $this->extrasamples = $extrasamples;
  }
  /**
   * @return int
   */
  public function getExtrasamples()
  {
    return $this->extrasamples;
  }
  /**
   * @param int
   */
  public function setFillorder($fillorder)
  {
    $this->fillorder = $fillorder;
  }
  /**
   * @return int
   */
  public function getFillorder()
  {
    return $this->fillorder;
  }
  /**
   * @param string
   */
  public function setFirmware($firmware)
  {
    $this->firmware = $firmware;
  }
  /**
   * @return string
   */
  public function getFirmware()
  {
    return $this->firmware;
  }
  /**
   * @param string
   */
  public function setFirstphotodate($firstphotodate)
  {
    $this->firstphotodate = $firstphotodate;
  }
  /**
   * @return string
   */
  public function getFirstphotodate()
  {
    return $this->firstphotodate;
  }
  /**
   * @param string
   */
  public function setFixtureidentifier($fixtureidentifier)
  {
    $this->fixtureidentifier = $fixtureidentifier;
  }
  /**
   * @return string
   */
  public function getFixtureidentifier()
  {
    return $this->fixtureidentifier;
  }
  /**
   * @param float
   */
  public function setFlashcompensation($flashcompensation)
  {
    $this->flashcompensation = $flashcompensation;
  }
  /**
   * @return float
   */
  public function getFlashcompensation()
  {
    return $this->flashcompensation;
  }
  /**
   * @param float
   */
  public function setFlashenergy($flashenergy)
  {
    $this->flashenergy = $flashenergy;
  }
  /**
   * @return float
   */
  public function getFlashenergy()
  {
    return $this->flashenergy;
  }
  /**
   * @param int
   */
  public function setFlashreturn($flashreturn)
  {
    $this->flashreturn = $flashreturn;
  }
  /**
   * @return int
   */
  public function getFlashreturn()
  {
    return $this->flashreturn;
  }
  /**
   * @param int
   */
  public function setFlashused($flashused)
  {
    $this->flashused = $flashused;
  }
  /**
   * @return int
   */
  public function getFlashused()
  {
    return $this->flashused;
  }
  /**
   * @param float
   */
  public function setFocallength($focallength)
  {
    $this->focallength = $focallength;
  }
  /**
   * @return float
   */
  public function getFocallength()
  {
    return $this->focallength;
  }
  /**
   * @param int
   */
  public function setFocallengthin35mmfilm($focallengthin35mmfilm)
  {
    $this->focallengthin35mmfilm = $focallengthin35mmfilm;
  }
  /**
   * @return int
   */
  public function getFocallengthin35mmfilm()
  {
    return $this->focallengthin35mmfilm;
  }
  /**
   * @param float
   */
  public function setFocalplaneunits($focalplaneunits)
  {
    $this->focalplaneunits = $focalplaneunits;
  }
  /**
   * @return float
   */
  public function getFocalplaneunits()
  {
    return $this->focalplaneunits;
  }
  /**
   * @param float
   */
  public function setFocalplanexres($focalplanexres)
  {
    $this->focalplanexres = $focalplanexres;
  }
  /**
   * @return float
   */
  public function getFocalplanexres()
  {
    return $this->focalplanexres;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setFreebytecounts($freebytecounts)
  {
    $this->freebytecounts = $freebytecounts;
  }
  /**
   * @return string
   */
  public function getFreebytecounts()
  {
    return $this->freebytecounts;
  }
  /**
   * @param int
   */
  public function setFreeoffsets($freeoffsets)
  {
    $this->freeoffsets = $freeoffsets;
  }
  /**
   * @return int
   */
  public function getFreeoffsets()
  {
    return $this->freeoffsets;
  }
  /**
   * @param int
   */
  public function setFullpanoheightpixels($fullpanoheightpixels)
  {
    $this->fullpanoheightpixels = $fullpanoheightpixels;
  }
  /**
   * @return int
   */
  public function getFullpanoheightpixels()
  {
    return $this->fullpanoheightpixels;
  }
  /**
   * @param int
   */
  public function setFullpanowidthpixels($fullpanowidthpixels)
  {
    $this->fullpanowidthpixels = $fullpanowidthpixels;
  }
  /**
   * @return int
   */
  public function getFullpanowidthpixels()
  {
    return $this->fullpanowidthpixels;
  }
  /**
   * @param bool
   */
  public function setFunction($function)
  {
    $this->function = $function;
  }
  /**
   * @return bool
   */
  public function getFunction()
  {
    return $this->function;
  }
  /**
   * @param int
   */
  public function setGaincontrol($gaincontrol)
  {
    $this->gaincontrol = $gaincontrol;
  }
  /**
   * @return int
   */
  public function getGaincontrol()
  {
    return $this->gaincontrol;
  }
  /**
   * @param string
   */
  public function setGaudiomime($gaudiomime)
  {
    $this->gaudiomime = $gaudiomime;
  }
  /**
   * @return string
   */
  public function getGaudiomime()
  {
    return $this->gaudiomime;
  }
  /**
   * @param string
   */
  public function setGcameraburstid($gcameraburstid)
  {
    $this->gcameraburstid = $gcameraburstid;
  }
  /**
   * @return string
   */
  public function getGcameraburstid()
  {
    return $this->gcameraburstid;
  }
  /**
   * @param int
   */
  public function setGcameraburstprimary($gcameraburstprimary)
  {
    $this->gcameraburstprimary = $gcameraburstprimary;
  }
  /**
   * @return int
   */
  public function getGcameraburstprimary()
  {
    return $this->gcameraburstprimary;
  }
  /**
   * @param string[]
   */
  public function setGcameradisableautocreation($gcameradisableautocreation)
  {
    $this->gcameradisableautocreation = $gcameradisableautocreation;
  }
  /**
   * @return string[]
   */
  public function getGcameradisableautocreation()
  {
    return $this->gcameradisableautocreation;
  }
  /**
   * @param int
   */
  public function setGcameramicrovideo($gcameramicrovideo)
  {
    $this->gcameramicrovideo = $gcameramicrovideo;
  }
  /**
   * @return int
   */
  public function getGcameramicrovideo()
  {
    return $this->gcameramicrovideo;
  }
  /**
   * @param int
   */
  public function setGcameramicrovideooffset($gcameramicrovideooffset)
  {
    $this->gcameramicrovideooffset = $gcameramicrovideooffset;
  }
  /**
   * @return int
   */
  public function getGcameramicrovideooffset()
  {
    return $this->gcameramicrovideooffset;
  }
  /**
   * @param int
   */
  public function setGcameramicrovideopresentationtimestampus($gcameramicrovideopresentationtimestampus)
  {
    $this->gcameramicrovideopresentationtimestampus = $gcameramicrovideopresentationtimestampus;
  }
  /**
   * @return int
   */
  public function getGcameramicrovideopresentationtimestampus()
  {
    return $this->gcameramicrovideopresentationtimestampus;
  }
  /**
   * @param int
   */
  public function setGcameramicrovideoversion($gcameramicrovideoversion)
  {
    $this->gcameramicrovideoversion = $gcameramicrovideoversion;
  }
  /**
   * @return int
   */
  public function getGcameramicrovideoversion()
  {
    return $this->gcameramicrovideoversion;
  }
  /**
   * @param int
   */
  public function setGcameramotionphoto($gcameramotionphoto)
  {
    $this->gcameramotionphoto = $gcameramotionphoto;
  }
  /**
   * @return int
   */
  public function getGcameramotionphoto()
  {
    return $this->gcameramotionphoto;
  }
  /**
   * @param int
   */
  public function setGcameramotionphotopresentationtimestampus($gcameramotionphotopresentationtimestampus)
  {
    $this->gcameramotionphotopresentationtimestampus = $gcameramotionphotopresentationtimestampus;
  }
  /**
   * @return int
   */
  public function getGcameramotionphotopresentationtimestampus()
  {
    return $this->gcameramotionphotopresentationtimestampus;
  }
  /**
   * @param int
   */
  public function setGcameramotionphotoversion($gcameramotionphotoversion)
  {
    $this->gcameramotionphotoversion = $gcameramotionphotoversion;
  }
  /**
   * @return int
   */
  public function getGcameramotionphotoversion()
  {
    return $this->gcameramotionphotoversion;
  }
  /**
   * @param string
   */
  public function setGcameraspecialtypeid($gcameraspecialtypeid)
  {
    $this->gcameraspecialtypeid = $gcameraspecialtypeid;
  }
  /**
   * @return string
   */
  public function getGcameraspecialtypeid()
  {
    return $this->gcameraspecialtypeid;
  }
  /**
   * @param string
   */
  public function setGcreationscameraburstid($gcreationscameraburstid)
  {
    $this->gcreationscameraburstid = $gcreationscameraburstid;
  }
  /**
   * @return string
   */
  public function getGcreationscameraburstid()
  {
    return $this->gcreationscameraburstid;
  }
  /**
   * @param string
   */
  public function setGcreationstype($gcreationstype)
  {
    $this->gcreationstype = $gcreationstype;
  }
  /**
   * @return string
   */
  public function getGcreationstype()
  {
    return $this->gcreationstype;
  }
  /**
   * @param PhotosGDepthMetadata
   */
  public function setGdepthMetadata(PhotosGDepthMetadata $gdepthMetadata)
  {
    $this->gdepthMetadata = $gdepthMetadata;
  }
  /**
   * @return PhotosGDepthMetadata
   */
  public function getGdepthMetadata()
  {
    return $this->gdepthMetadata;
  }
  /**
   * @param string
   */
  public function setGimagemime($gimagemime)
  {
    $this->gimagemime = $gimagemime;
  }
  /**
   * @return string
   */
  public function getGimagemime()
  {
    return $this->gimagemime;
  }
  /**
   * @param string
   */
  public function setGpsdatestamp($gpsdatestamp)
  {
    $this->gpsdatestamp = $gpsdatestamp;
  }
  /**
   * @return string
   */
  public function getGpsdatestamp()
  {
    return $this->gpsdatestamp;
  }
  /**
   * @param float
   */
  public function setGpsdestbearing($gpsdestbearing)
  {
    $this->gpsdestbearing = $gpsdestbearing;
  }
  /**
   * @return float
   */
  public function getGpsdestbearing()
  {
    return $this->gpsdestbearing;
  }
  /**
   * @param string
   */
  public function setGpsdestbearingref($gpsdestbearingref)
  {
    $this->gpsdestbearingref = $gpsdestbearingref;
  }
  /**
   * @return string
   */
  public function getGpsdestbearingref()
  {
    return $this->gpsdestbearingref;
  }
  /**
   * @param float
   */
  public function setGpsdestdistance($gpsdestdistance)
  {
    $this->gpsdestdistance = $gpsdestdistance;
  }
  /**
   * @return float
   */
  public function getGpsdestdistance()
  {
    return $this->gpsdestdistance;
  }
  /**
   * @param string
   */
  public function setGpsdestdistanceref($gpsdestdistanceref)
  {
    $this->gpsdestdistanceref = $gpsdestdistanceref;
  }
  /**
   * @return string
   */
  public function getGpsdestdistanceref()
  {
    return $this->gpsdestdistanceref;
  }
  /**
   * @param float
   */
  public function setGpsdestlatitude($gpsdestlatitude)
  {
    $this->gpsdestlatitude = $gpsdestlatitude;
  }
  /**
   * @return float
   */
  public function getGpsdestlatitude()
  {
    return $this->gpsdestlatitude;
  }
  /**
   * @param string
   */
  public function setGpsdestlatituderef($gpsdestlatituderef)
  {
    $this->gpsdestlatituderef = $gpsdestlatituderef;
  }
  /**
   * @return string
   */
  public function getGpsdestlatituderef()
  {
    return $this->gpsdestlatituderef;
  }
  /**
   * @param float
   */
  public function setGpsdestlongitude($gpsdestlongitude)
  {
    $this->gpsdestlongitude = $gpsdestlongitude;
  }
  /**
   * @return float
   */
  public function getGpsdestlongitude()
  {
    return $this->gpsdestlongitude;
  }
  /**
   * @param string
   */
  public function setGpsdestlongituderef($gpsdestlongituderef)
  {
    $this->gpsdestlongituderef = $gpsdestlongituderef;
  }
  /**
   * @return string
   */
  public function getGpsdestlongituderef()
  {
    return $this->gpsdestlongituderef;
  }
  /**
   * @param int
   */
  public function setGpsdifferential($gpsdifferential)
  {
    $this->gpsdifferential = $gpsdifferential;
  }
  /**
   * @return int
   */
  public function getGpsdifferential()
  {
    return $this->gpsdifferential;
  }
  /**
   * @param float
   */
  public function setGpsdop($gpsdop)
  {
    $this->gpsdop = $gpsdop;
  }
  /**
   * @return float
   */
  public function getGpsdop()
  {
    return $this->gpsdop;
  }
  /**
   * @param float
   */
  public function setGpsimgdirection($gpsimgdirection)
  {
    $this->gpsimgdirection = $gpsimgdirection;
  }
  /**
   * @return float
   */
  public function getGpsimgdirection()
  {
    return $this->gpsimgdirection;
  }
  /**
   * @param string
   */
  public function setGpsimgdirectionref($gpsimgdirectionref)
  {
    $this->gpsimgdirectionref = $gpsimgdirectionref;
  }
  /**
   * @return string
   */
  public function getGpsimgdirectionref()
  {
    return $this->gpsimgdirectionref;
  }
  /**
   * @param string
   */
  public function setGpsmapdatum($gpsmapdatum)
  {
    $this->gpsmapdatum = $gpsmapdatum;
  }
  /**
   * @return string
   */
  public function getGpsmapdatum()
  {
    return $this->gpsmapdatum;
  }
  /**
   * @param string
   */
  public function setGpsmeasuremode($gpsmeasuremode)
  {
    $this->gpsmeasuremode = $gpsmeasuremode;
  }
  /**
   * @return string
   */
  public function getGpsmeasuremode()
  {
    return $this->gpsmeasuremode;
  }
  /**
   * @param string
   */
  public function setGpssatellites($gpssatellites)
  {
    $this->gpssatellites = $gpssatellites;
  }
  /**
   * @return string
   */
  public function getGpssatellites()
  {
    return $this->gpssatellites;
  }
  /**
   * @param float
   */
  public function setGpsspeed($gpsspeed)
  {
    $this->gpsspeed = $gpsspeed;
  }
  /**
   * @return float
   */
  public function getGpsspeed()
  {
    return $this->gpsspeed;
  }
  /**
   * @param string
   */
  public function setGpsspeedref($gpsspeedref)
  {
    $this->gpsspeedref = $gpsspeedref;
  }
  /**
   * @return string
   */
  public function getGpsspeedref()
  {
    return $this->gpsspeedref;
  }
  /**
   * @param string
   */
  public function setGpsstatus($gpsstatus)
  {
    $this->gpsstatus = $gpsstatus;
  }
  /**
   * @return string
   */
  public function getGpsstatus()
  {
    return $this->gpsstatus;
  }
  /**
   * @param float[]
   */
  public function setGpstime($gpstime)
  {
    $this->gpstime = $gpstime;
  }
  /**
   * @return float[]
   */
  public function getGpstime()
  {
    return $this->gpstime;
  }
  /**
   * @param float
   */
  public function setGpstrack($gpstrack)
  {
    $this->gpstrack = $gpstrack;
  }
  /**
   * @return float
   */
  public function getGpstrack()
  {
    return $this->gpstrack;
  }
  /**
   * @param string
   */
  public function setGpstrackref($gpstrackref)
  {
    $this->gpstrackref = $gpstrackref;
  }
  /**
   * @return string
   */
  public function getGpstrackref()
  {
    return $this->gpstrackref;
  }
  /**
   * @param int
   */
  public function setGrayresponsecurve($grayresponsecurve)
  {
    $this->grayresponsecurve = $grayresponsecurve;
  }
  /**
   * @return int
   */
  public function getGrayresponsecurve()
  {
    return $this->grayresponsecurve;
  }
  /**
   * @param int
   */
  public function setGrayresponseunit($grayresponseunit)
  {
    $this->grayresponseunit = $grayresponseunit;
  }
  /**
   * @return int
   */
  public function getGrayresponseunit()
  {
    return $this->grayresponseunit;
  }
  /**
   * @param bool
   */
  public function setHasAlpha($hasAlpha)
  {
    $this->hasAlpha = $hasAlpha;
  }
  /**
   * @return bool
   */
  public function getHasAlpha()
  {
    return $this->hasAlpha;
  }
  /**
   * @param string
   */
  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  /**
   * @return string
   */
  public function getHeadline()
  {
    return $this->headline;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setHostcomputer($hostcomputer)
  {
    $this->hostcomputer = $hostcomputer;
  }
  /**
   * @return string
   */
  public function getHostcomputer()
  {
    return $this->hostcomputer;
  }
  /**
   * @param string[]
   */
  public function setIdentifier($identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return string[]
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param string
   */
  public function setImagenumber($imagenumber)
  {
    $this->imagenumber = $imagenumber;
  }
  /**
   * @return string
   */
  public function getImagenumber()
  {
    return $this->imagenumber;
  }
  /**
   * @param string
   */
  public function setImageorientation($imageorientation)
  {
    $this->imageorientation = $imageorientation;
  }
  /**
   * @return string
   */
  public function getImageorientation()
  {
    return $this->imageorientation;
  }
  /**
   * @param string
   */
  public function setImagetype($imagetype)
  {
    $this->imagetype = $imagetype;
  }
  /**
   * @return string
   */
  public function getImagetype()
  {
    return $this->imagetype;
  }
  /**
   * @param float
   */
  public function setInitialhorizontalfovdegrees($initialhorizontalfovdegrees)
  {
    $this->initialhorizontalfovdegrees = $initialhorizontalfovdegrees;
  }
  /**
   * @return float
   */
  public function getInitialhorizontalfovdegrees()
  {
    return $this->initialhorizontalfovdegrees;
  }
  /**
   * @param float
   */
  public function setInitialverticalfovdegrees($initialverticalfovdegrees)
  {
    $this->initialverticalfovdegrees = $initialverticalfovdegrees;
  }
  /**
   * @return float
   */
  public function getInitialverticalfovdegrees()
  {
    return $this->initialverticalfovdegrees;
  }
  /**
   * @param int
   */
  public function setInitialviewheadingdegrees($initialviewheadingdegrees)
  {
    $this->initialviewheadingdegrees = $initialviewheadingdegrees;
  }
  /**
   * @return int
   */
  public function getInitialviewheadingdegrees()
  {
    return $this->initialviewheadingdegrees;
  }
  /**
   * @param int
   */
  public function setInitialviewpitchdegrees($initialviewpitchdegrees)
  {
    $this->initialviewpitchdegrees = $initialviewpitchdegrees;
  }
  /**
   * @return int
   */
  public function getInitialviewpitchdegrees()
  {
    return $this->initialviewpitchdegrees;
  }
  /**
   * @param int
   */
  public function setInitialviewrolldegrees($initialviewrolldegrees)
  {
    $this->initialviewrolldegrees = $initialviewrolldegrees;
  }
  /**
   * @return int
   */
  public function getInitialviewrolldegrees()
  {
    return $this->initialviewrolldegrees;
  }
  /**
   * @param string
   */
  public function setInstructions($instructions)
  {
    $this->instructions = $instructions;
  }
  /**
   * @return string
   */
  public function getInstructions()
  {
    return $this->instructions;
  }
  /**
   * @param string
   */
  public function setIntellectualgenre($intellectualgenre)
  {
    $this->intellectualgenre = $intellectualgenre;
  }
  /**
   * @return string
   */
  public function getIntellectualgenre()
  {
    return $this->intellectualgenre;
  }
  /**
   * @param string
   */
  public function setInteroperabilityindex($interoperabilityindex)
  {
    $this->interoperabilityindex = $interoperabilityindex;
  }
  /**
   * @return string
   */
  public function getInteroperabilityindex()
  {
    return $this->interoperabilityindex;
  }
  /**
   * @param PhotosFourCMetadata
   */
  public function setIptc4c(PhotosFourCMetadata $iptc4c)
  {
    $this->iptc4c = $iptc4c;
  }
  /**
   * @return PhotosFourCMetadata
   */
  public function getIptc4c()
  {
    return $this->iptc4c;
  }
  /**
   * @param string
   */
  public function setIptclastedited($iptclastedited)
  {
    $this->iptclastedited = $iptclastedited;
  }
  /**
   * @return string
   */
  public function getIptclastedited()
  {
    return $this->iptclastedited;
  }
  /**
   * @param bool
   */
  public function setIsmpformat($ismpformat)
  {
    $this->ismpformat = $ismpformat;
  }
  /**
   * @return bool
   */
  public function getIsmpformat()
  {
    return $this->ismpformat;
  }
  /**
   * @param int
   */
  public function setIsoequivalent($isoequivalent)
  {
    $this->isoequivalent = $isoequivalent;
  }
  /**
   * @return int
   */
  public function getIsoequivalent()
  {
    return $this->isoequivalent;
  }
  /**
   * @param string[]
   */
  public function setKeyword($keyword)
  {
    $this->keyword = $keyword;
  }
  /**
   * @return string[]
   */
  public function getKeyword()
  {
    return $this->keyword;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string[]
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string[]
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLanguageidentifier($languageidentifier)
  {
    $this->languageidentifier = $languageidentifier;
  }
  /**
   * @return string
   */
  public function getLanguageidentifier()
  {
    return $this->languageidentifier;
  }
  /**
   * @param string
   */
  public function setLastphotodate($lastphotodate)
  {
    $this->lastphotodate = $lastphotodate;
  }
  /**
   * @return string
   */
  public function getLastphotodate()
  {
    return $this->lastphotodate;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  /**
   * @param string
   */
  public function setLens($lens)
  {
    $this->lens = $lens;
  }
  /**
   * @return string
   */
  public function getLens()
  {
    return $this->lens;
  }
  /**
   * @param string
   */
  public function setLensid($lensid)
  {
    $this->lensid = $lensid;
  }
  /**
   * @return string
   */
  public function getLensid()
  {
    return $this->lensid;
  }
  /**
   * @param string
   */
  public function setLensinfo($lensinfo)
  {
    $this->lensinfo = $lensinfo;
  }
  /**
   * @return string
   */
  public function getLensinfo()
  {
    return $this->lensinfo;
  }
  /**
   * @param int
   */
  public function setLightsource($lightsource)
  {
    $this->lightsource = $lightsource;
  }
  /**
   * @return int
   */
  public function getLightsource()
  {
    return $this->lightsource;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string[]
   */
  public function setLocationshown($locationshown)
  {
    $this->locationshown = $locationshown;
  }
  /**
   * @return string[]
   */
  public function getLocationshown()
  {
    return $this->locationshown;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  /**
   * @param bool
   */
  public function setMarked($marked)
  {
    $this->marked = $marked;
  }
  /**
   * @return bool
   */
  public function getMarked()
  {
    return $this->marked;
  }
  /**
   * @param float
   */
  public function setMaxaperturevalue($maxaperturevalue)
  {
    $this->maxaperturevalue = $maxaperturevalue;
  }
  /**
   * @return float
   */
  public function getMaxaperturevalue()
  {
    return $this->maxaperturevalue;
  }
  /**
   * @param int
   */
  public function setMaxavailheight($maxavailheight)
  {
    $this->maxavailheight = $maxavailheight;
  }
  /**
   * @return int
   */
  public function getMaxavailheight()
  {
    return $this->maxavailheight;
  }
  /**
   * @param int
   */
  public function setMaxavailwidth($maxavailwidth)
  {
    $this->maxavailwidth = $maxavailwidth;
  }
  /**
   * @return int
   */
  public function getMaxavailwidth()
  {
    return $this->maxavailwidth;
  }
  /**
   * @param int
   */
  public function setMaxsamplevalue($maxsamplevalue)
  {
    $this->maxsamplevalue = $maxsamplevalue;
  }
  /**
   * @return int
   */
  public function getMaxsamplevalue()
  {
    return $this->maxsamplevalue;
  }
  /**
   * @param string
   */
  public function setMetadatadate($metadatadate)
  {
    $this->metadatadate = $metadatadate;
  }
  /**
   * @return string
   */
  public function getMetadatadate()
  {
    return $this->metadatadate;
  }
  /**
   * @param int
   */
  public function setMeteringmode($meteringmode)
  {
    $this->meteringmode = $meteringmode;
  }
  /**
   * @return int
   */
  public function getMeteringmode()
  {
    return $this->meteringmode;
  }
  /**
   * @param int
   */
  public function setMicrovideooriginaloffset($microvideooriginaloffset)
  {
    $this->microvideooriginaloffset = $microvideooriginaloffset;
  }
  /**
   * @return int
   */
  public function getMicrovideooriginaloffset()
  {
    return $this->microvideooriginaloffset;
  }
  /**
   * @param int
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return int
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setMinormodelagedisclosure($minormodelagedisclosure)
  {
    $this->minormodelagedisclosure = $minormodelagedisclosure;
  }
  /**
   * @return string
   */
  public function getMinormodelagedisclosure()
  {
    return $this->minormodelagedisclosure;
  }
  /**
   * @param int
   */
  public function setMinsamplevalue($minsamplevalue)
  {
    $this->minsamplevalue = $minsamplevalue;
  }
  /**
   * @return int
   */
  public function getMinsamplevalue()
  {
    return $this->minsamplevalue;
  }
  /**
   * @param int
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return int
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param int[]
   */
  public function setModelage($modelage)
  {
    $this->modelage = $modelage;
  }
  /**
   * @return int[]
   */
  public function getModelage()
  {
    return $this->modelage;
  }
  /**
   * @param string[]
   */
  public function setModelreleaseid($modelreleaseid)
  {
    $this->modelreleaseid = $modelreleaseid;
  }
  /**
   * @return string[]
   */
  public function getModelreleaseid()
  {
    return $this->modelreleaseid;
  }
  /**
   * @param string
   */
  public function setModelreleasestatus($modelreleasestatus)
  {
    $this->modelreleasestatus = $modelreleasestatus;
  }
  /**
   * @return string
   */
  public function getModelreleasestatus()
  {
    return $this->modelreleasestatus;
  }
  /**
   * @param string
   */
  public function setModifydate($modifydate)
  {
    $this->modifydate = $modifydate;
  }
  /**
   * @return string
   */
  public function getModifydate()
  {
    return $this->modifydate;
  }
  /**
   * @param string
   */
  public function setMotionphotovideodataboxheader($motionphotovideodataboxheader)
  {
    $this->motionphotovideodataboxheader = $motionphotovideodataboxheader;
  }
  /**
   * @return string
   */
  public function getMotionphotovideodataboxheader()
  {
    return $this->motionphotovideodataboxheader;
  }
  /**
   * @param string
   */
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  /**
   * @return string
   */
  public function getNickname()
  {
    return $this->nickname;
  }
  /**
   * @param string[]
   */
  public function setObjectattributereference($objectattributereference)
  {
    $this->objectattributereference = $objectattributereference;
  }
  /**
   * @return string[]
   */
  public function getObjectattributereference()
  {
    return $this->objectattributereference;
  }
  /**
   * @param string
   */
  public function setObjectcycle($objectcycle)
  {
    $this->objectcycle = $objectcycle;
  }
  /**
   * @return string
   */
  public function getObjectcycle()
  {
    return $this->objectcycle;
  }
  /**
   * @param string
   */
  public function setObjecttypereference($objecttypereference)
  {
    $this->objecttypereference = $objecttypereference;
  }
  /**
   * @return string
   */
  public function getObjecttypereference()
  {
    return $this->objecttypereference;
  }
  /**
   * @param string
   */
  public function setOffsettime($offsettime)
  {
    $this->offsettime = $offsettime;
  }
  /**
   * @return string
   */
  public function getOffsettime()
  {
    return $this->offsettime;
  }
  /**
   * @param string
   */
  public function setOffsettimedigitized($offsettimedigitized)
  {
    $this->offsettimedigitized = $offsettimedigitized;
  }
  /**
   * @return string
   */
  public function getOffsettimedigitized()
  {
    return $this->offsettimedigitized;
  }
  /**
   * @param string
   */
  public function setOffsettimeoriginal($offsettimeoriginal)
  {
    $this->offsettimeoriginal = $offsettimeoriginal;
  }
  /**
   * @return string
   */
  public function getOffsettimeoriginal()
  {
    return $this->offsettimeoriginal;
  }
  /**
   * @param string[]
   */
  public function setOrganisationinimagecode($organisationinimagecode)
  {
    $this->organisationinimagecode = $organisationinimagecode;
  }
  /**
   * @return string[]
   */
  public function getOrganisationinimagecode()
  {
    return $this->organisationinimagecode;
  }
  /**
   * @param string[]
   */
  public function setOrganisationinimagename($organisationinimagename)
  {
    $this->organisationinimagename = $organisationinimagename;
  }
  /**
   * @return string[]
   */
  public function getOrganisationinimagename()
  {
    return $this->organisationinimagename;
  }
  /**
   * @param int
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return int
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param string
   */
  public function setOriginatingprogram($originatingprogram)
  {
    $this->originatingprogram = $originatingprogram;
  }
  /**
   * @return string
   */
  public function getOriginatingprogram()
  {
    return $this->originatingprogram;
  }
  /**
   * @param string[]
   */
  public function setOwner($owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return string[]
   */
  public function getOwner()
  {
    return $this->owner;
  }
  /**
   * @param string
   */
  public function setOwnername($ownername)
  {
    $this->ownername = $ownername;
  }
  /**
   * @return string
   */
  public function getOwnername()
  {
    return $this->ownername;
  }
  /**
   * @param PhotosPanoramaMetadata
   */
  public function setPanoramaMetadata(PhotosPanoramaMetadata $panoramaMetadata)
  {
    $this->panoramaMetadata = $panoramaMetadata;
  }
  /**
   * @return PhotosPanoramaMetadata
   */
  public function getPanoramaMetadata()
  {
    return $this->panoramaMetadata;
  }
  /**
   * @param string[]
   */
  public function setPersoninimage($personinimage)
  {
    $this->personinimage = $personinimage;
  }
  /**
   * @return string[]
   */
  public function getPersoninimage()
  {
    return $this->personinimage;
  }
  /**
   * @param int
   */
  public function setPhotometricinterpretation($photometricinterpretation)
  {
    $this->photometricinterpretation = $photometricinterpretation;
  }
  /**
   * @return int
   */
  public function getPhotometricinterpretation()
  {
    return $this->photometricinterpretation;
  }
  /**
   * @param int
   */
  public function setPlanarconfiguration($planarconfiguration)
  {
    $this->planarconfiguration = $planarconfiguration;
  }
  /**
   * @return int
   */
  public function getPlanarconfiguration()
  {
    return $this->planarconfiguration;
  }
  /**
   * @param float
   */
  public function setPoseheadingdegrees($poseheadingdegrees)
  {
    $this->poseheadingdegrees = $poseheadingdegrees;
  }
  /**
   * @return float
   */
  public function getPoseheadingdegrees()
  {
    return $this->poseheadingdegrees;
  }
  /**
   * @param float
   */
  public function setPosepitchdegrees($posepitchdegrees)
  {
    $this->posepitchdegrees = $posepitchdegrees;
  }
  /**
   * @return float
   */
  public function getPosepitchdegrees()
  {
    return $this->posepitchdegrees;
  }
  /**
   * @param float
   */
  public function setPoserolldegrees($poserolldegrees)
  {
    $this->poserolldegrees = $poserolldegrees;
  }
  /**
   * @return float
   */
  public function getPoserolldegrees()
  {
    return $this->poserolldegrees;
  }
  /**
   * @param float
   */
  public function setPrimarychromaticities($primarychromaticities)
  {
    $this->primarychromaticities = $primarychromaticities;
  }
  /**
   * @return float
   */
  public function getPrimarychromaticities()
  {
    return $this->primarychromaticities;
  }
  /**
   * @param string[]
   */
  public function setProductid($productid)
  {
    $this->productid = $productid;
  }
  /**
   * @return string[]
   */
  public function getProductid()
  {
    return $this->productid;
  }
  /**
   * @param string
   */
  public function setProgramversion($programversion)
  {
    $this->programversion = $programversion;
  }
  /**
   * @return string
   */
  public function getProgramversion()
  {
    return $this->programversion;
  }
  /**
   * @param string
   */
  public function setProjectiontype($projectiontype)
  {
    $this->projectiontype = $projectiontype;
  }
  /**
   * @return string
   */
  public function getProjectiontype()
  {
    return $this->projectiontype;
  }
  /**
   * @param string[]
   */
  public function setPropertyreleaseid($propertyreleaseid)
  {
    $this->propertyreleaseid = $propertyreleaseid;
  }
  /**
   * @return string[]
   */
  public function getPropertyreleaseid()
  {
    return $this->propertyreleaseid;
  }
  /**
   * @param string
   */
  public function setPropertyreleasestatus($propertyreleasestatus)
  {
    $this->propertyreleasestatus = $propertyreleasestatus;
  }
  /**
   * @return string
   */
  public function getPropertyreleasestatus()
  {
    return $this->propertyreleasestatus;
  }
  /**
   * @param string[]
   */
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return string[]
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
  /**
   * @param float
   */
  public function setRating($rating)
  {
    $this->rating = $rating;
  }
  /**
   * @return float
   */
  public function getRating()
  {
    return $this->rating;
  }
  /**
   * @param bool
   */
  public function setRedeyemode($redeyemode)
  {
    $this->redeyemode = $redeyemode;
  }
  /**
   * @return bool
   */
  public function getRedeyemode()
  {
    return $this->redeyemode;
  }
  /**
   * @param float
   */
  public function setReferenceblackwhite($referenceblackwhite)
  {
    $this->referenceblackwhite = $referenceblackwhite;
  }
  /**
   * @return float
   */
  public function getReferenceblackwhite()
  {
    return $this->referenceblackwhite;
  }
  /**
   * @param string[]
   */
  public function setReferencedate($referencedate)
  {
    $this->referencedate = $referencedate;
  }
  /**
   * @return string[]
   */
  public function getReferencedate()
  {
    return $this->referencedate;
  }
  /**
   * @param string[]
   */
  public function setReferencenumber($referencenumber)
  {
    $this->referencenumber = $referencenumber;
  }
  /**
   * @return string[]
   */
  public function getReferencenumber()
  {
    return $this->referencenumber;
  }
  /**
   * @param string[]
   */
  public function setReferenceservice($referenceservice)
  {
    $this->referenceservice = $referenceservice;
  }
  /**
   * @return string[]
   */
  public function getReferenceservice()
  {
    return $this->referenceservice;
  }
  /**
   * @param string
   */
  public function setRelatedimagefileformat($relatedimagefileformat)
  {
    $this->relatedimagefileformat = $relatedimagefileformat;
  }
  /**
   * @return string
   */
  public function getRelatedimagefileformat()
  {
    return $this->relatedimagefileformat;
  }
  /**
   * @param string
   */
  public function setRelatedimageheight($relatedimageheight)
  {
    $this->relatedimageheight = $relatedimageheight;
  }
  /**
   * @return string
   */
  public function getRelatedimageheight()
  {
    return $this->relatedimageheight;
  }
  /**
   * @param string
   */
  public function setRelatedimagewidth($relatedimagewidth)
  {
    $this->relatedimagewidth = $relatedimagewidth;
  }
  /**
   * @return string
   */
  public function getRelatedimagewidth()
  {
    return $this->relatedimagewidth;
  }
  /**
   * @param string
   */
  public function setRelatedsoundfile($relatedsoundfile)
  {
    $this->relatedsoundfile = $relatedsoundfile;
  }
  /**
   * @return string
   */
  public function getRelatedsoundfile()
  {
    return $this->relatedsoundfile;
  }
  /**
   * @param string[]
   */
  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  /**
   * @return string[]
   */
  public function getRelation()
  {
    return $this->relation;
  }
  /**
   * @param string
   */
  public function setReleasedate($releasedate)
  {
    $this->releasedate = $releasedate;
  }
  /**
   * @return string
   */
  public function getReleasedate()
  {
    return $this->releasedate;
  }
  /**
   * @param string
   */
  public function setReleasetime($releasetime)
  {
    $this->releasetime = $releasetime;
  }
  /**
   * @return string
   */
  public function getReleasetime()
  {
    return $this->releasetime;
  }
  /**
   * @param int
   */
  public function setResolutionunit($resolutionunit)
  {
    $this->resolutionunit = $resolutionunit;
  }
  /**
   * @return int
   */
  public function getResolutionunit()
  {
    return $this->resolutionunit;
  }
  /**
   * @param int
   */
  public function setRotate($rotate)
  {
    $this->rotate = $rotate;
  }
  /**
   * @return int
   */
  public function getRotate()
  {
    return $this->rotate;
  }
  /**
   * @param string
   */
  public function setRowsperstrip($rowsperstrip)
  {
    $this->rowsperstrip = $rowsperstrip;
  }
  /**
   * @return string
   */
  public function getRowsperstrip()
  {
    return $this->rowsperstrip;
  }
  /**
   * @param int
   */
  public function setSamplesperpixel($samplesperpixel)
  {
    $this->samplesperpixel = $samplesperpixel;
  }
  /**
   * @return int
   */
  public function getSamplesperpixel()
  {
    return $this->samplesperpixel;
  }
  /**
   * @param int
   */
  public function setSaturation($saturation)
  {
    $this->saturation = $saturation;
  }
  /**
   * @return int
   */
  public function getSaturation()
  {
    return $this->saturation;
  }
  /**
   * @param string[]
   */
  public function setScene($scene)
  {
    $this->scene = $scene;
  }
  /**
   * @return string[]
   */
  public function getScene()
  {
    return $this->scene;
  }
  /**
   * @param int
   */
  public function setScenecapturetype($scenecapturetype)
  {
    $this->scenecapturetype = $scenecapturetype;
  }
  /**
   * @return int
   */
  public function getScenecapturetype()
  {
    return $this->scenecapturetype;
  }
  /**
   * @param int
   */
  public function setSensingmethod($sensingmethod)
  {
    $this->sensingmethod = $sensingmethod;
  }
  /**
   * @return int
   */
  public function getSensingmethod()
  {
    return $this->sensingmethod;
  }
  /**
   * @param float
   */
  public function setSensorheight($sensorheight)
  {
    $this->sensorheight = $sensorheight;
  }
  /**
   * @return float
   */
  public function getSensorheight()
  {
    return $this->sensorheight;
  }
  /**
   * @param float
   */
  public function setSensorwidth($sensorwidth)
  {
    $this->sensorwidth = $sensorwidth;
  }
  /**
   * @return float
   */
  public function getSensorwidth()
  {
    return $this->sensorwidth;
  }
  /**
   * @param string
   */
  public function setSerialnumber($serialnumber)
  {
    $this->serialnumber = $serialnumber;
  }
  /**
   * @return string
   */
  public function getSerialnumber()
  {
    return $this->serialnumber;
  }
  /**
   * @param string
   */
  public function setServiceidentifier($serviceidentifier)
  {
    $this->serviceidentifier = $serviceidentifier;
  }
  /**
   * @return string
   */
  public function getServiceidentifier()
  {
    return $this->serviceidentifier;
  }
  /**
   * @param int
   */
  public function setSharpness($sharpness)
  {
    $this->sharpness = $sharpness;
  }
  /**
   * @return int
   */
  public function getSharpness()
  {
    return $this->sharpness;
  }
  /**
   * @param float
   */
  public function setShutterspeedvalue($shutterspeedvalue)
  {
    $this->shutterspeedvalue = $shutterspeedvalue;
  }
  /**
   * @return float
   */
  public function getShutterspeedvalue()
  {
    return $this->shutterspeedvalue;
  }
  /**
   * @param string
   */
  public function setSoftware($software)
  {
    $this->software = $software;
  }
  /**
   * @return string
   */
  public function getSoftware()
  {
    return $this->software;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param int
   */
  public function setSourcephotoscount($sourcephotoscount)
  {
    $this->sourcephotoscount = $sourcephotoscount;
  }
  /**
   * @return int
   */
  public function getSourcephotoscount()
  {
    return $this->sourcephotoscount;
  }
  /**
   * @param string
   */
  public function setSpectralsensitivity($spectralsensitivity)
  {
    $this->spectralsensitivity = $spectralsensitivity;
  }
  /**
   * @return string
   */
  public function getSpectralsensitivity()
  {
    return $this->spectralsensitivity;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStitchingsoftware($stitchingsoftware)
  {
    $this->stitchingsoftware = $stitchingsoftware;
  }
  /**
   * @return string
   */
  public function getStitchingsoftware()
  {
    return $this->stitchingsoftware;
  }
  /**
   * @param string
   */
  public function setStripbytecounts($stripbytecounts)
  {
    $this->stripbytecounts = $stripbytecounts;
  }
  /**
   * @return string
   */
  public function getStripbytecounts()
  {
    return $this->stripbytecounts;
  }
  /**
   * @param string
   */
  public function setStripoffsets($stripoffsets)
  {
    $this->stripoffsets = $stripoffsets;
  }
  /**
   * @return string
   */
  public function getStripoffsets()
  {
    return $this->stripoffsets;
  }
  /**
   * @param int
   */
  public function setSubjectarea($subjectarea)
  {
    $this->subjectarea = $subjectarea;
  }
  /**
   * @return int
   */
  public function getSubjectarea()
  {
    return $this->subjectarea;
  }
  /**
   * @param string[]
   */
  public function setSubjectcode($subjectcode)
  {
    $this->subjectcode = $subjectcode;
  }
  /**
   * @return string[]
   */
  public function getSubjectcode()
  {
    return $this->subjectcode;
  }
  /**
   * @param int
   */
  public function setSubjectdistancerange($subjectdistancerange)
  {
    $this->subjectdistancerange = $subjectdistancerange;
  }
  /**
   * @return int
   */
  public function getSubjectdistancerange()
  {
    return $this->subjectdistancerange;
  }
  /**
   * @param int
   */
  public function setSubjectlocation($subjectlocation)
  {
    $this->subjectlocation = $subjectlocation;
  }
  /**
   * @return int
   */
  public function getSubjectlocation()
  {
    return $this->subjectlocation;
  }
  /**
   * @param string[]
   */
  public function setSubjectreference($subjectreference)
  {
    $this->subjectreference = $subjectreference;
  }
  /**
   * @return string[]
   */
  public function getSubjectreference()
  {
    return $this->subjectreference;
  }
  /**
   * @param string
   */
  public function setSublocation($sublocation)
  {
    $this->sublocation = $sublocation;
  }
  /**
   * @return string
   */
  public function getSublocation()
  {
    return $this->sublocation;
  }
  /**
   * @param string
   */
  public function setSubsectime($subsectime)
  {
    $this->subsectime = $subsectime;
  }
  /**
   * @return string
   */
  public function getSubsectime()
  {
    return $this->subsectime;
  }
  /**
   * @param string
   */
  public function setSubsectimedigitized($subsectimedigitized)
  {
    $this->subsectimedigitized = $subsectimedigitized;
  }
  /**
   * @return string
   */
  public function getSubsectimedigitized()
  {
    return $this->subsectimedigitized;
  }
  /**
   * @param string
   */
  public function setSubsectimeoriginal($subsectimeoriginal)
  {
    $this->subsectimeoriginal = $subsectimeoriginal;
  }
  /**
   * @return string
   */
  public function getSubsectimeoriginal()
  {
    return $this->subsectimeoriginal;
  }
  /**
   * @param string[]
   */
  public function setSupplementalcategory($supplementalcategory)
  {
    $this->supplementalcategory = $supplementalcategory;
  }
  /**
   * @return string[]
   */
  public function getSupplementalcategory()
  {
    return $this->supplementalcategory;
  }
  /**
   * @param int
   */
  public function setThresholding($thresholding)
  {
    $this->thresholding = $thresholding;
  }
  /**
   * @return int
   */
  public function getThresholding()
  {
    return $this->thresholding;
  }
  /**
   * @param int
   */
  public function setThumbnailerBuildCl($thumbnailerBuildCl)
  {
    $this->thumbnailerBuildCl = $thumbnailerBuildCl;
  }
  /**
   * @return int
   */
  public function getThumbnailerBuildCl()
  {
    return $this->thumbnailerBuildCl;
  }
  /**
   * @param string
   */
  public function setTimesent($timesent)
  {
    $this->timesent = $timesent;
  }
  /**
   * @return string
   */
  public function getTimesent()
  {
    return $this->timesent;
  }
  /**
   * @param int[]
   */
  public function setTimezoneminutes($timezoneminutes)
  {
    $this->timezoneminutes = $timezoneminutes;
  }
  /**
   * @return int[]
   */
  public function getTimezoneminutes()
  {
    return $this->timezoneminutes;
  }
  /**
   * @param int[]
   */
  public function setTimezoneoffset($timezoneoffset)
  {
    $this->timezoneoffset = $timezoneoffset;
  }
  /**
   * @return int[]
   */
  public function getTimezoneoffset()
  {
    return $this->timezoneoffset;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setTransmissionreference($transmissionreference)
  {
    $this->transmissionreference = $transmissionreference;
  }
  /**
   * @return string
   */
  public function getTransmissionreference()
  {
    return $this->transmissionreference;
  }
  /**
   * @param string[]
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string[]
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUniqueid($uniqueid)
  {
    $this->uniqueid = $uniqueid;
  }
  /**
   * @return string
   */
  public function getUniqueid()
  {
    return $this->uniqueid;
  }
  /**
   * @param string
   */
  public function setUno($uno)
  {
    $this->uno = $uno;
  }
  /**
   * @return string
   */
  public function getUno()
  {
    return $this->uno;
  }
  /**
   * @param string
   */
  public function setUrgency($urgency)
  {
    $this->urgency = $urgency;
  }
  /**
   * @return string
   */
  public function getUrgency()
  {
    return $this->urgency;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setUsageterms($usageterms)
  {
    $this->usageterms = $usageterms;
  }
  /**
   * @return string
   */
  public function getUsageterms()
  {
    return $this->usageterms;
  }
  /**
   * @param bool
   */
  public function setUsepanoramaviewer($usepanoramaviewer)
  {
    $this->usepanoramaviewer = $usepanoramaviewer;
  }
  /**
   * @return bool
   */
  public function getUsepanoramaviewer()
  {
    return $this->usepanoramaviewer;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param string
   */
  public function setWebstatement($webstatement)
  {
    $this->webstatement = $webstatement;
  }
  /**
   * @return string
   */
  public function getWebstatement()
  {
    return $this->webstatement;
  }
  /**
   * @param int
   */
  public function setWhitebalance($whitebalance)
  {
    $this->whitebalance = $whitebalance;
  }
  /**
   * @return int
   */
  public function getWhitebalance()
  {
    return $this->whitebalance;
  }
  /**
   * @param float
   */
  public function setWhitepoint($whitepoint)
  {
    $this->whitepoint = $whitepoint;
  }
  /**
   * @return float
   */
  public function getWhitepoint()
  {
    return $this->whitepoint;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
  /**
   * @param PhotosFourCMetadata
   */
  public function setXmp4c(PhotosFourCMetadata $xmp4c)
  {
    $this->xmp4c = $xmp4c;
  }
  /**
   * @return PhotosFourCMetadata
   */
  public function getXmp4c()
  {
    return $this->xmp4c;
  }
  /**
   * @param float
   */
  public function setXresolution($xresolution)
  {
    $this->xresolution = $xresolution;
  }
  /**
   * @return float
   */
  public function getXresolution()
  {
    return $this->xresolution;
  }
  /**
   * @param float
   */
  public function setYcbcrcoefficients($ycbcrcoefficients)
  {
    $this->ycbcrcoefficients = $ycbcrcoefficients;
  }
  /**
   * @return float
   */
  public function getYcbcrcoefficients()
  {
    return $this->ycbcrcoefficients;
  }
  /**
   * @param int
   */
  public function setYcbcrpositioning($ycbcrpositioning)
  {
    $this->ycbcrpositioning = $ycbcrpositioning;
  }
  /**
   * @return int
   */
  public function getYcbcrpositioning()
  {
    return $this->ycbcrpositioning;
  }
  /**
   * @param int
   */
  public function setYcbcrsubsampling($ycbcrsubsampling)
  {
    $this->ycbcrsubsampling = $ycbcrsubsampling;
  }
  /**
   * @return int
   */
  public function getYcbcrsubsampling()
  {
    return $this->ycbcrsubsampling;
  }
  /**
   * @param float
   */
  public function setYresolution($yresolution)
  {
    $this->yresolution = $yresolution;
  }
  /**
   * @return float
   */
  public function getYresolution()
  {
    return $this->yresolution;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosImageMetadata::class, 'Google_Service_Contentwarehouse_PhotosImageMetadata');
