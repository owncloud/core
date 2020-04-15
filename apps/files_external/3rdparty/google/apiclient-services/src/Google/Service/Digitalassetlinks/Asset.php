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

class Google_Service_Digitalassetlinks_Asset extends Google_Model
{
  protected $androidAppType = 'Google_Service_Digitalassetlinks_AndroidAppAsset';
  protected $androidAppDataType = '';
  protected $webType = 'Google_Service_Digitalassetlinks_WebAsset';
  protected $webDataType = '';

  /**
   * @param Google_Service_Digitalassetlinks_AndroidAppAsset
   */
  public function setAndroidApp(Google_Service_Digitalassetlinks_AndroidAppAsset $androidApp)
  {
    $this->androidApp = $androidApp;
  }
  /**
   * @return Google_Service_Digitalassetlinks_AndroidAppAsset
   */
  public function getAndroidApp()
  {
    return $this->androidApp;
  }
  /**
   * @param Google_Service_Digitalassetlinks_WebAsset
   */
  public function setWeb(Google_Service_Digitalassetlinks_WebAsset $web)
  {
    $this->web = $web;
  }
  /**
   * @return Google_Service_Digitalassetlinks_WebAsset
   */
  public function getWeb()
  {
    return $this->web;
  }
}
