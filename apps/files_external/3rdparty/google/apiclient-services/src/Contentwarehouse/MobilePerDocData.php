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

class MobilePerDocData extends \Google\Model
{
  /**
   * @var int
   */
  public $flags;
  /**
   * @var string
   */
  public $mobileurl;
  /**
   * @var int
   */
  public $transcodedPageScore;

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
   * @param string
   */
  public function setMobileurl($mobileurl)
  {
    $this->mobileurl = $mobileurl;
  }
  /**
   * @return string
   */
  public function getMobileurl()
  {
    return $this->mobileurl;
  }
  /**
   * @param int
   */
  public function setTranscodedPageScore($transcodedPageScore)
  {
    $this->transcodedPageScore = $transcodedPageScore;
  }
  /**
   * @return int
   */
  public function getTranscodedPageScore()
  {
    return $this->transcodedPageScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MobilePerDocData::class, 'Google_Service_Contentwarehouse_MobilePerDocData');
