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

class Google_Service_Compute_PacketMirroringsScopedList extends Google_Collection
{
  protected $collection_key = 'packetMirrorings';
  protected $packetMirroringsType = 'Google_Service_Compute_PacketMirroring';
  protected $packetMirroringsDataType = 'array';
  protected $warningType = 'Google_Service_Compute_PacketMirroringsScopedListWarning';
  protected $warningDataType = '';

  /**
   * @param Google_Service_Compute_PacketMirroring[]
   */
  public function setPacketMirrorings($packetMirrorings)
  {
    $this->packetMirrorings = $packetMirrorings;
  }
  /**
   * @return Google_Service_Compute_PacketMirroring[]
   */
  public function getPacketMirrorings()
  {
    return $this->packetMirrorings;
  }
  /**
   * @param Google_Service_Compute_PacketMirroringsScopedListWarning
   */
  public function setWarning(Google_Service_Compute_PacketMirroringsScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_Compute_PacketMirroringsScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
