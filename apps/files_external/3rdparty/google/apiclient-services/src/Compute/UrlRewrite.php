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

namespace Google\Service\Compute;

class UrlRewrite extends \Google\Model
{
  /**
   * @var string
   */
  public $hostRewrite;
  /**
   * @var string
   */
  public $pathPrefixRewrite;

  /**
   * @param string
   */
  public function setHostRewrite($hostRewrite)
  {
    $this->hostRewrite = $hostRewrite;
  }
  /**
   * @return string
   */
  public function getHostRewrite()
  {
    return $this->hostRewrite;
  }
  /**
   * @param string
   */
  public function setPathPrefixRewrite($pathPrefixRewrite)
  {
    $this->pathPrefixRewrite = $pathPrefixRewrite;
  }
  /**
   * @return string
   */
  public function getPathPrefixRewrite()
  {
    return $this->pathPrefixRewrite;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlRewrite::class, 'Google_Service_Compute_UrlRewrite');
