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

namespace Google\Service\Acceleratedmobilepageurl;

class AmpUrl extends \Google\Model
{
  /**
   * @var string
   */
  public $ampUrl;
  /**
   * @var string
   */
  public $cdnAmpUrl;
  /**
   * @var string
   */
  public $originalUrl;

  /**
   * @param string
   */
  public function setAmpUrl($ampUrl)
  {
    $this->ampUrl = $ampUrl;
  }
  /**
   * @return string
   */
  public function getAmpUrl()
  {
    return $this->ampUrl;
  }
  /**
   * @param string
   */
  public function setCdnAmpUrl($cdnAmpUrl)
  {
    $this->cdnAmpUrl = $cdnAmpUrl;
  }
  /**
   * @return string
   */
  public function getCdnAmpUrl()
  {
    return $this->cdnAmpUrl;
  }
  /**
   * @param string
   */
  public function setOriginalUrl($originalUrl)
  {
    $this->originalUrl = $originalUrl;
  }
  /**
   * @return string
   */
  public function getOriginalUrl()
  {
    return $this->originalUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AmpUrl::class, 'Google_Service_Acceleratedmobilepageurl_AmpUrl');
