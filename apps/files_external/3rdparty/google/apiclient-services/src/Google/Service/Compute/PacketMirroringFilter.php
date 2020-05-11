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

class Google_Service_Compute_PacketMirroringFilter extends Google_Collection
{
  protected $collection_key = 'cidrRanges';
  protected $internal_gapi_mappings = array(
        "iPProtocols" => "IPProtocols",
  );
  public $iPProtocols;
  public $cidrRanges;

  public function setIPProtocols($iPProtocols)
  {
    $this->iPProtocols = $iPProtocols;
  }
  public function getIPProtocols()
  {
    return $this->iPProtocols;
  }
  public function setCidrRanges($cidrRanges)
  {
    $this->cidrRanges = $cidrRanges;
  }
  public function getCidrRanges()
  {
    return $this->cidrRanges;
  }
}
