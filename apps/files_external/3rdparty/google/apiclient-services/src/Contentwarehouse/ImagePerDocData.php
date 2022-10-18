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

class ImagePerDocData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "dEPRECATEDEntropyColor" => "DEPRECATEDEntropyColor",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDEntropyColor;
  /**
   * @var string
   */
  public $filename;
  /**
   * @var int
   */
  public $flags;
  /**
   * @var int
   */
  public $height;
  /**
   * @var int
   */
  public $width;

  /**
   * @param string
   */
  public function setDEPRECATEDEntropyColor($dEPRECATEDEntropyColor)
  {
    $this->dEPRECATEDEntropyColor = $dEPRECATEDEntropyColor;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDEntropyColor()
  {
    return $this->dEPRECATEDEntropyColor;
  }
  /**
   * @param string
   */
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  /**
   * @return string
   */
  public function getFilename()
  {
    return $this->filename;
  }
  /**
   * @param int
   */
  public function setFlags($flags)
  {
    $this->flags = $flags;
  }
  /**
   * @return int
   */
  public function getFlags()
  {
    return $this->flags;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImagePerDocData::class, 'Google_Service_Contentwarehouse_ImagePerDocData');
