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

class ContentAttributions extends \Google\Collection
{
  protected $collection_key = 'onlineOutgoing';
  protected $freshdocsOutgoingType = ContentAttributionsOutgoingAttribution::class;
  protected $freshdocsOutgoingDataType = 'array';
  protected $offlineOutgoingType = ContentAttributionsOutgoingAttribution::class;
  protected $offlineOutgoingDataType = 'array';
  protected $onlineOutgoingType = ContentAttributionsOutgoingAttribution::class;
  protected $onlineOutgoingDataType = 'array';

  /**
   * @param ContentAttributionsOutgoingAttribution[]
   */
  public function setFreshdocsOutgoing($freshdocsOutgoing)
  {
    $this->freshdocsOutgoing = $freshdocsOutgoing;
  }
  /**
   * @return ContentAttributionsOutgoingAttribution[]
   */
  public function getFreshdocsOutgoing()
  {
    return $this->freshdocsOutgoing;
  }
  /**
   * @param ContentAttributionsOutgoingAttribution[]
   */
  public function setOfflineOutgoing($offlineOutgoing)
  {
    $this->offlineOutgoing = $offlineOutgoing;
  }
  /**
   * @return ContentAttributionsOutgoingAttribution[]
   */
  public function getOfflineOutgoing()
  {
    return $this->offlineOutgoing;
  }
  /**
   * @param ContentAttributionsOutgoingAttribution[]
   */
  public function setOnlineOutgoing($onlineOutgoing)
  {
    $this->onlineOutgoing = $onlineOutgoing;
  }
  /**
   * @return ContentAttributionsOutgoingAttribution[]
   */
  public function getOnlineOutgoing()
  {
    return $this->onlineOutgoing;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentAttributions::class, 'Google_Service_Contentwarehouse_ContentAttributions');
