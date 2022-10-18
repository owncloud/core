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

class EmbedsDeepLinkData extends \Google\Collection
{
  protected $collection_key = 'client';
  /**
   * @var string
   */
  public $appId;
  protected $clientType = EmbedsPackagingServiceClient::class;
  protected $clientDataType = 'array';
  /**
   * @var string
   */
  public $deepLinkId;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param EmbedsPackagingServiceClient[]
   */
  public function setClient($client)
  {
    $this->client = $client;
  }
  /**
   * @return EmbedsPackagingServiceClient[]
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param string
   */
  public function setDeepLinkId($deepLinkId)
  {
    $this->deepLinkId = $deepLinkId;
  }
  /**
   * @return string
   */
  public function getDeepLinkId()
  {
    return $this->deepLinkId;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmbedsDeepLinkData::class, 'Google_Service_Contentwarehouse_EmbedsDeepLinkData');
