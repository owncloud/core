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

namespace Google\Service\RealTimeBidding;

class UrlDownloadSize extends \Google\Model
{
  /**
   * @var int
   */
  public $downloadSizeKb;
  /**
   * @var string
   */
  public $normalizedUrl;

  /**
   * @param int
   */
  public function setDownloadSizeKb($downloadSizeKb)
  {
    $this->downloadSizeKb = $downloadSizeKb;
  }
  /**
   * @return int
   */
  public function getDownloadSizeKb()
  {
    return $this->downloadSizeKb;
  }
  /**
   * @param string
   */
  public function setNormalizedUrl($normalizedUrl)
  {
    $this->normalizedUrl = $normalizedUrl;
  }
  /**
   * @return string
   */
  public function getNormalizedUrl()
  {
    return $this->normalizedUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlDownloadSize::class, 'Google_Service_RealTimeBidding_UrlDownloadSize');
