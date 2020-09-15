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

class Google_Service_TrafficDirectorService_Address extends Google_Model
{
  protected $pipeType = 'Google_Service_TrafficDirectorService_Pipe';
  protected $pipeDataType = '';
  protected $socketAddressType = 'Google_Service_TrafficDirectorService_SocketAddress';
  protected $socketAddressDataType = '';

  /**
   * @param Google_Service_TrafficDirectorService_Pipe
   */
  public function setPipe(Google_Service_TrafficDirectorService_Pipe $pipe)
  {
    $this->pipe = $pipe;
  }
  /**
   * @return Google_Service_TrafficDirectorService_Pipe
   */
  public function getPipe()
  {
    return $this->pipe;
  }
  /**
   * @param Google_Service_TrafficDirectorService_SocketAddress
   */
  public function setSocketAddress(Google_Service_TrafficDirectorService_SocketAddress $socketAddress)
  {
    $this->socketAddress = $socketAddress;
  }
  /**
   * @return Google_Service_TrafficDirectorService_SocketAddress
   */
  public function getSocketAddress()
  {
    return $this->socketAddress;
  }
}
