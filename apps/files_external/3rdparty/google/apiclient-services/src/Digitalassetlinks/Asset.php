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

namespace Google\Service\Digitalassetlinks;

class Asset extends \Google\Model
{
  protected $androidAppType = AndroidAppAsset::class;
  protected $androidAppDataType = '';
  protected $webType = WebAsset::class;
  protected $webDataType = '';

  /**
   * @param AndroidAppAsset
   */
  public function setAndroidApp(AndroidAppAsset $androidApp)
  {
    $this->androidApp = $androidApp;
  }
  /**
   * @return AndroidAppAsset
   */
  public function getAndroidApp()
  {
    return $this->androidApp;
  }
  /**
   * @param WebAsset
   */
  public function setWeb(WebAsset $web)
  {
    $this->web = $web;
  }
  /**
   * @return WebAsset
   */
  public function getWeb()
  {
    return $this->web;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Asset::class, 'Google_Service_Digitalassetlinks_Asset');
