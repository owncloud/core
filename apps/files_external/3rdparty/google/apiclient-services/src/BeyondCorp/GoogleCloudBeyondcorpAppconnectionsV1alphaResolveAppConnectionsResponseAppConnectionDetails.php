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

namespace Google\Service\BeyondCorp;

class GoogleCloudBeyondcorpAppconnectionsV1alphaResolveAppConnectionsResponseAppConnectionDetails extends \Google\Collection
{
  protected $collection_key = 'recentMigVms';
  protected $appConnectionType = GoogleCloudBeyondcorpAppconnectionsV1alphaAppConnection::class;
  protected $appConnectionDataType = '';
  /**
   * @var string[]
   */
  public $recentMigVms;

  /**
   * @param GoogleCloudBeyondcorpAppconnectionsV1alphaAppConnection
   */
  public function setAppConnection(GoogleCloudBeyondcorpAppconnectionsV1alphaAppConnection $appConnection)
  {
    $this->appConnection = $appConnection;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectionsV1alphaAppConnection
   */
  public function getAppConnection()
  {
    return $this->appConnection;
  }
  /**
   * @param string[]
   */
  public function setRecentMigVms($recentMigVms)
  {
    $this->recentMigVms = $recentMigVms;
  }
  /**
   * @return string[]
   */
  public function getRecentMigVms()
  {
    return $this->recentMigVms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBeyondcorpAppconnectionsV1alphaResolveAppConnectionsResponseAppConnectionDetails::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectionsV1alphaResolveAppConnectionsResponseAppConnectionDetails');
