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

namespace Google\Service\AndroidProvisioningPartner\Resource;

use Google\Service\AndroidProvisioningPartner\AndroiddeviceprovisioningEmpty;
use Google\Service\AndroidProvisioningPartner\ClaimDeviceRequest;
use Google\Service\AndroidProvisioningPartner\ClaimDeviceResponse;
use Google\Service\AndroidProvisioningPartner\ClaimDevicesRequest;
use Google\Service\AndroidProvisioningPartner\Device;
use Google\Service\AndroidProvisioningPartner\DeviceMetadata;
use Google\Service\AndroidProvisioningPartner\FindDevicesByDeviceIdentifierRequest;
use Google\Service\AndroidProvisioningPartner\FindDevicesByDeviceIdentifierResponse;
use Google\Service\AndroidProvisioningPartner\FindDevicesByOwnerRequest;
use Google\Service\AndroidProvisioningPartner\FindDevicesByOwnerResponse;
use Google\Service\AndroidProvisioningPartner\Operation;
use Google\Service\AndroidProvisioningPartner\UnclaimDeviceRequest;
use Google\Service\AndroidProvisioningPartner\UnclaimDevicesRequest;
use Google\Service\AndroidProvisioningPartner\UpdateDeviceMetadataInBatchRequest;
use Google\Service\AndroidProvisioningPartner\UpdateDeviceMetadataRequest;

/**
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $devices = $androiddeviceprovisioningService->devices;
 *  </code>
 */
class PartnersDevices extends \Google\Service\Resource
{
  /**
   * Claims a device for a customer and adds it to zero-touch enrollment. If the
   * device is already claimed by another customer, the call returns an error.
   * (devices.claim)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param ClaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClaimDeviceResponse
   */
  public function claim($partnerId, ClaimDeviceRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('claim', [$params], ClaimDeviceResponse::class);
  }
  /**
   * Claims a batch of devices for a customer asynchronously. Adds the devices to
   * zero-touch enrollment. To learn more, read [Long‑running batch operations
   * ](/zero-touch/guides/how-it-works#operations). (devices.claimAsync)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param ClaimDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function claimAsync($partnerId, ClaimDevicesRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('claimAsync', [$params], Operation::class);
  }
  /**
   * Finds devices by hardware identifiers, such as IMEI.
   * (devices.findByIdentifier)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param FindDevicesByDeviceIdentifierRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FindDevicesByDeviceIdentifierResponse
   */
  public function findByIdentifier($partnerId, FindDevicesByDeviceIdentifierRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('findByIdentifier', [$params], FindDevicesByDeviceIdentifierResponse::class);
  }
  /**
   * Finds devices claimed for customers. The results only contain devices
   * registered to the reseller that's identified by the `partnerId` argument. The
   * customer's devices purchased from other resellers don't appear in the
   * results. (devices.findByOwner)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param FindDevicesByOwnerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FindDevicesByOwnerResponse
   */
  public function findByOwner($partnerId, FindDevicesByOwnerRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('findByOwner', [$params], FindDevicesByOwnerResponse::class);
  }
  /**
   * Gets a device. (devices.get)
   *
   * @param string $name Required. The device API resource name in the format
   * `partners/[PARTNER_ID]/devices/[DEVICE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Device
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Device::class);
  }
  /**
   * Updates reseller metadata associated with the device. (devices.metadata)
   *
   * @param string $metadataOwnerId Required. The owner of the newly set metadata.
   * Set this to the partner ID.
   * @param string $deviceId Required. The ID of the device.
   * @param UpdateDeviceMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DeviceMetadata
   */
  public function metadata($metadataOwnerId, $deviceId, UpdateDeviceMetadataRequest $postBody, $optParams = [])
  {
    $params = ['metadataOwnerId' => $metadataOwnerId, 'deviceId' => $deviceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('metadata', [$params], DeviceMetadata::class);
  }
  /**
   * Unclaims a device from a customer and removes it from zero-touch enrollment.
   * (devices.unclaim)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param UnclaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AndroiddeviceprovisioningEmpty
   */
  public function unclaim($partnerId, UnclaimDeviceRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unclaim', [$params], AndroiddeviceprovisioningEmpty::class);
  }
  /**
   * Unclaims a batch of devices for a customer asynchronously. Removes the
   * devices from zero-touch enrollment. To learn more, read [Long‑running batch
   * operations](/zero-touch/guides/how-it-works#operations).
   * (devices.unclaimAsync)
   *
   * @param string $partnerId Required. The reseller partner ID.
   * @param UnclaimDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function unclaimAsync($partnerId, UnclaimDevicesRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unclaimAsync', [$params], Operation::class);
  }
  /**
   * Updates the reseller metadata attached to a batch of devices. This method
   * updates devices asynchronously and returns an `Operation` that can be used to
   * track progress. Read [Long‑running batch operations](/zero-touch/guides/how-
   * it-works#operations). (devices.updateMetadataAsync)
   *
   * @param string $partnerId Required. The reseller partner ID.
   * @param UpdateDeviceMetadataInBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function updateMetadataAsync($partnerId, UpdateDeviceMetadataInBatchRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateMetadataAsync', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersDevices::class, 'Google_Service_AndroidProvisioningPartner_Resource_PartnersDevices');
