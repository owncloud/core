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

class Google_Service_ShoppingContent_ProductStatusDestinationStatus extends Google_Collection
{
  protected $collection_key = 'pendingCountries';
  public $approvedCountries;
  public $destination;
  public $disapprovedCountries;
  public $pendingCountries;
  public $status;

  public function setApprovedCountries($approvedCountries)
  {
    $this->approvedCountries = $approvedCountries;
  }
  public function getApprovedCountries()
  {
    return $this->approvedCountries;
  }
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  public function setDisapprovedCountries($disapprovedCountries)
  {
    $this->disapprovedCountries = $disapprovedCountries;
  }
  public function getDisapprovedCountries()
  {
    return $this->disapprovedCountries;
  }
  public function setPendingCountries($pendingCountries)
  {
    $this->pendingCountries = $pendingCountries;
  }
  public function getPendingCountries()
  {
    return $this->pendingCountries;
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
