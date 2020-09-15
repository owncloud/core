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

class Google_Service_Dfareporting_MediaRequestInfo extends Google_Model
{
  public $currentBytes;
  public $customData;
  public $diffObjectVersion;
  public $notificationType;
  public $requestId;
  public $totalBytes;
  public $totalBytesIsEstimated;

  public function setCurrentBytes($currentBytes)
  {
    $this->currentBytes = $currentBytes;
  }
  public function getCurrentBytes()
  {
    return $this->currentBytes;
  }
  public function setCustomData($customData)
  {
    $this->customData = $customData;
  }
  public function getCustomData()
  {
    return $this->customData;
  }
  public function setDiffObjectVersion($diffObjectVersion)
  {
    $this->diffObjectVersion = $diffObjectVersion;
  }
  public function getDiffObjectVersion()
  {
    return $this->diffObjectVersion;
  }
  public function setNotificationType($notificationType)
  {
    $this->notificationType = $notificationType;
  }
  public function getNotificationType()
  {
    return $this->notificationType;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
  public function setTotalBytes($totalBytes)
  {
    $this->totalBytes = $totalBytes;
  }
  public function getTotalBytes()
  {
    return $this->totalBytes;
  }
  public function setTotalBytesIsEstimated($totalBytesIsEstimated)
  {
    $this->totalBytesIsEstimated = $totalBytesIsEstimated;
  }
  public function getTotalBytesIsEstimated()
  {
    return $this->totalBytesIsEstimated;
  }
}
