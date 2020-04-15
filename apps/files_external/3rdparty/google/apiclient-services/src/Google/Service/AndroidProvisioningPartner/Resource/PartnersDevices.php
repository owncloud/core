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

/**
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google_Service_AndroidProvisioningPartner(...);
 *   $devices = $androiddeviceprovisioningService->devices;
 *  </code>
 */
class Google_Service_AndroidProvisioningPartner_Resource_PartnersDevices extends Google_Service_Resource
{
  /**
   * Claims a device for a customer and adds it to zero-touch enrollment. If the
   * device is already claimed by another customer, the call returns an error.
   * (devices.claim)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param Google_Service_AndroidProvisioningPartner_ClaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_ClaimDeviceResponse
   */
  public function claim($partnerId, Google_Service_AndroidProvisioningPartner_ClaimDeviceRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('claim', array($params), "Google_Service_AndroidProvisioningPartner_ClaimDeviceResponse");
  }
  /**
   * Claims a batch of devices for a customer asynchronously. Adds the devices to
   * zero-touch enrollment. To learn more, read [Long‑running batch operations
   * ](/zero-touch/guides/how-it-works#operations). (devices.claimAsync)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param Google_Service_AndroidProvisioningPartner_ClaimDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Operation
   */
  public function claimAsync($partnerId, Google_Service_AndroidProvisioningPartner_ClaimDevicesRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('claimAsync', array($params), "Google_Service_AndroidProvisioningPartner_Operation");
  }
  /**
   * Finds devices by hardware identifiers, such as IMEI.
   * (devices.findByIdentifier)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierResponse
   */
  public function findByIdentifier($partnerId, Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('findByIdentifier', array($params), "Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierResponse");
  }
  /**
   * Finds devices claimed for customers. The results only contain devices
   * registered to the reseller that's identified by the `partnerId` argument. The
   * customer's devices purchased from other resellers don't appear in the
   * results. (devices.findByOwner)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerResponse
   */
  public function findByOwner($partnerId, Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('findByOwner', array($params), "Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerResponse");
  }
  /**
   * Gets a device. (devices.get)
   *
   * @param string $name Required. The device API resource name in the format
   * `partners/[PARTNER_ID]/devices/[DEVICE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidProvisioningPartner_Device");
  }
  /**
   * Updates reseller metadata associated with the device. (devices.metadata)
   *
   * @param string $metadataOwnerId Required. The owner of the newly set metadata.
   * Set this to the partner ID.
   * @param string $deviceId Required. The ID of the device.
   * @param Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_DeviceMetadata
   */
  public function metadata($metadataOwnerId, $deviceId, Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataRequest $postBody, $optParams = array())
  {
    $params = array('metadataOwnerId' => $metadataOwnerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('metadata', array($params), "Google_Service_AndroidProvisioningPartner_DeviceMetadata");
  }
  /**
   * Unclaims a device from a customer and removes it from zero-touch enrollment.
   * (devices.unclaim)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param Google_Service_AndroidProvisioningPartner_UnclaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty
   */
  public function unclaim($partnerId, Google_Service_AndroidProvisioningPartner_UnclaimDeviceRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unclaim', array($params), "Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty");
  }
  /**
   * Unclaims a batch of devices for a customer asynchronously. Removes the
   * devices from zero-touch enrollment. To learn more, read [Long‑running batch
   * operations](/zero-touch/guides/how-it-works#operations).
   * (devices.unclaimAsync)
   *
   * @param string $partnerId Required. The reseller partner ID.
   * @param Google_Service_AndroidProvisioningPartner_UnclaimDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Operation
   */
  public function unclaimAsync($partnerId, Google_Service_AndroidProvisioningPartner_UnclaimDevicesRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unclaimAsync', array($params), "Google_Service_AndroidProvisioningPartner_Operation");
  }
  /**
   * Updates the reseller metadata attached to a batch of devices. This method
   * updates devices asynchronously and returns an `Operation` that can be used to
   * track progress. Read [Long‑running batch operations](/zero-touch/guides/how-
   * it-works#operations). (devices.updateMetadataAsync)
   *
   * @param string $partnerId Required. The reseller partner ID.
   * @param Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataInBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Operation
   */
  public function updateMetadataAsync($partnerId, Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataInBatchRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateMetadataAsync', array($params), "Google_Service_AndroidProvisioningPartner_Operation");
  }
}
