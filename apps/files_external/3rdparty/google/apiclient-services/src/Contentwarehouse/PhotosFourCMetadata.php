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

class PhotosFourCMetadata extends \Google\Collection
{
  protected $collection_key = 'creator';
  /**
   * @var string
   */
  public $caption;
  /**
   * @var string
   */
  public $copyright;
  /**
   * @var string[]
   */
  public $creator;
  /**
   * @var string
   */
  public $credit;

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
  public function setCopyright($copyright)
  {
    $this->copyright = $copyright;
  }
  /**
   * @return string
   */
  public function getCopyright()
  {
    return $this->copyright;
  }
  /**
   * @param string[]
   */
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return string[]
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setCredit($credit)
  {
    $this->credit = $credit;
  }
  /**
   * @return string
   */
  public function getCredit()
  {
    return $this->credit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosFourCMetadata::class, 'Google_Service_Contentwarehouse_PhotosFourCMetadata');
