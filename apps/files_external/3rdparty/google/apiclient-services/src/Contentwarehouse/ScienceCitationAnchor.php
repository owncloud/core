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

class ScienceCitationAnchor extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "dEPRECATEDSrcFP" => "DEPRECATEDSrcFP",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDSrcFP;
  /**
   * @var int
   */
  public $count;
  /**
   * @var int
   */
  public $face;
  /**
   * @var int
   */
  public $size;
  /**
   * @var string
   */
  public $text;
  /**
   * @var int
   */
  public $type;
  /**
   * @var int
   */
  public $weight;

  /**
   * @param string
   */
  public function setDEPRECATEDSrcFP($dEPRECATEDSrcFP)
  {
    $this->dEPRECATEDSrcFP = $dEPRECATEDSrcFP;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDSrcFP()
  {
    return $this->dEPRECATEDSrcFP;
  }
  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param int
   */
  public function setFace($face)
  {
    $this->face = $face;
  }
  /**
   * @return int
   */
  public function getFace()
  {
    return $this->face;
  }
  /**
   * @param int
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return int
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param int
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return int
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceCitationAnchor::class, 'Google_Service_Contentwarehouse_ScienceCitationAnchor');
