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

class SmearedWebLandingPageEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $imagesearchDocid;
  /**
   * @var string
   */
  public $webDocid;

  /**
   * @param string
   */
  public function setImagesearchDocid($imagesearchDocid)
  {
    $this->imagesearchDocid = $imagesearchDocid;
  }
  /**
   * @return string
   */
  public function getImagesearchDocid()
  {
    return $this->imagesearchDocid;
  }
  /**
   * @param string
   */
  public function setWebDocid($webDocid)
  {
    $this->webDocid = $webDocid;
  }
  /**
   * @return string
   */
  public function getWebDocid()
  {
    return $this->webDocid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SmearedWebLandingPageEntry::class, 'Google_Service_Contentwarehouse_SmearedWebLandingPageEntry');
