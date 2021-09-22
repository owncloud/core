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

namespace Google\Service\ShoppingContent;

class LiaInventorySettings extends \Google\Model
{
  public $inventoryVerificationContactEmail;
  public $inventoryVerificationContactName;
  public $inventoryVerificationContactStatus;
  public $status;

  public function setInventoryVerificationContactEmail($inventoryVerificationContactEmail)
  {
    $this->inventoryVerificationContactEmail = $inventoryVerificationContactEmail;
  }
  public function getInventoryVerificationContactEmail()
  {
    return $this->inventoryVerificationContactEmail;
  }
  public function setInventoryVerificationContactName($inventoryVerificationContactName)
  {
    $this->inventoryVerificationContactName = $inventoryVerificationContactName;
  }
  public function getInventoryVerificationContactName()
  {
    return $this->inventoryVerificationContactName;
  }
  public function setInventoryVerificationContactStatus($inventoryVerificationContactStatus)
  {
    $this->inventoryVerificationContactStatus = $inventoryVerificationContactStatus;
  }
  public function getInventoryVerificationContactStatus()
  {
    return $this->inventoryVerificationContactStatus;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiaInventorySettings::class, 'Google_Service_ShoppingContent_LiaInventorySettings');
