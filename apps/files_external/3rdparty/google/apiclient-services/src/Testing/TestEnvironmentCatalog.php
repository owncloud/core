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

namespace Google\Service\Testing;

class TestEnvironmentCatalog extends \Google\Model
{
  protected $androidDeviceCatalogType = AndroidDeviceCatalog::class;
  protected $androidDeviceCatalogDataType = '';
  protected $deviceIpBlockCatalogType = DeviceIpBlockCatalog::class;
  protected $deviceIpBlockCatalogDataType = '';
  protected $iosDeviceCatalogType = IosDeviceCatalog::class;
  protected $iosDeviceCatalogDataType = '';
  protected $networkConfigurationCatalogType = NetworkConfigurationCatalog::class;
  protected $networkConfigurationCatalogDataType = '';
  protected $softwareCatalogType = ProvidedSoftwareCatalog::class;
  protected $softwareCatalogDataType = '';

  /**
   * @param AndroidDeviceCatalog
   */
  public function setAndroidDeviceCatalog(AndroidDeviceCatalog $androidDeviceCatalog)
  {
    $this->androidDeviceCatalog = $androidDeviceCatalog;
  }
  /**
   * @return AndroidDeviceCatalog
   */
  public function getAndroidDeviceCatalog()
  {
    return $this->androidDeviceCatalog;
  }
  /**
   * @param DeviceIpBlockCatalog
   */
  public function setDeviceIpBlockCatalog(DeviceIpBlockCatalog $deviceIpBlockCatalog)
  {
    $this->deviceIpBlockCatalog = $deviceIpBlockCatalog;
  }
  /**
   * @return DeviceIpBlockCatalog
   */
  public function getDeviceIpBlockCatalog()
  {
    return $this->deviceIpBlockCatalog;
  }
  /**
   * @param IosDeviceCatalog
   */
  public function setIosDeviceCatalog(IosDeviceCatalog $iosDeviceCatalog)
  {
    $this->iosDeviceCatalog = $iosDeviceCatalog;
  }
  /**
   * @return IosDeviceCatalog
   */
  public function getIosDeviceCatalog()
  {
    return $this->iosDeviceCatalog;
  }
  /**
   * @param NetworkConfigurationCatalog
   */
  public function setNetworkConfigurationCatalog(NetworkConfigurationCatalog $networkConfigurationCatalog)
  {
    $this->networkConfigurationCatalog = $networkConfigurationCatalog;
  }
  /**
   * @return NetworkConfigurationCatalog
   */
  public function getNetworkConfigurationCatalog()
  {
    return $this->networkConfigurationCatalog;
  }
  /**
   * @param ProvidedSoftwareCatalog
   */
  public function setSoftwareCatalog(ProvidedSoftwareCatalog $softwareCatalog)
  {
    $this->softwareCatalog = $softwareCatalog;
  }
  /**
   * @return ProvidedSoftwareCatalog
   */
  public function getSoftwareCatalog()
  {
    return $this->softwareCatalog;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestEnvironmentCatalog::class, 'Google_Service_Testing_TestEnvironmentCatalog');
