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

namespace Google\Service\Fcmdata;

class GoogleFirebaseFcmDataV1beta1MessageOutcomePercents extends \Google\Model
{
  public $delivered;
  public $droppedAppForceStopped;
  public $droppedDeviceInactive;
  public $droppedTooManyPendingMessages;
  public $pending;

  public function setDelivered($delivered)
  {
    $this->delivered = $delivered;
  }
  public function getDelivered()
  {
    return $this->delivered;
  }
  public function setDroppedAppForceStopped($droppedAppForceStopped)
  {
    $this->droppedAppForceStopped = $droppedAppForceStopped;
  }
  public function getDroppedAppForceStopped()
  {
    return $this->droppedAppForceStopped;
  }
  public function setDroppedDeviceInactive($droppedDeviceInactive)
  {
    $this->droppedDeviceInactive = $droppedDeviceInactive;
  }
  public function getDroppedDeviceInactive()
  {
    return $this->droppedDeviceInactive;
  }
  public function setDroppedTooManyPendingMessages($droppedTooManyPendingMessages)
  {
    $this->droppedTooManyPendingMessages = $droppedTooManyPendingMessages;
  }
  public function getDroppedTooManyPendingMessages()
  {
    return $this->droppedTooManyPendingMessages;
  }
  public function setPending($pending)
  {
    $this->pending = $pending;
  }
  public function getPending()
  {
    return $this->pending;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseFcmDataV1beta1MessageOutcomePercents::class, 'Google_Service_Fcmdata_GoogleFirebaseFcmDataV1beta1MessageOutcomePercents');
