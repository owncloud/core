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

namespace Google\Service\Storage;

class BucketWebsite extends \Google\Model
{
  /**
   * @var string
   */
  public $mainPageSuffix;
  /**
   * @var string
   */
  public $notFoundPage;

  /**
   * @param string
   */
  public function setMainPageSuffix($mainPageSuffix)
  {
    $this->mainPageSuffix = $mainPageSuffix;
  }
  /**
   * @return string
   */
  public function getMainPageSuffix()
  {
    return $this->mainPageSuffix;
  }
  /**
   * @param string
   */
  public function setNotFoundPage($notFoundPage)
  {
    $this->notFoundPage = $notFoundPage;
  }
  /**
   * @return string
   */
  public function getNotFoundPage()
  {
    return $this->notFoundPage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketWebsite::class, 'Google_Service_Storage_BucketWebsite');
