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

class Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchema extends Google_Collection
{
  protected $collection_key = 'notices';
  public $accessRestrictions;
  protected $additionalTargetKeyNamesType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1AdditionalTargetKeyName';
  protected $additionalTargetKeyNamesDataType = 'array';
  protected $definitionType = 'Google_Service_ChromePolicy_Proto2FileDescriptorProto';
  protected $definitionDataType = '';
  protected $fieldDescriptionsType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription';
  protected $fieldDescriptionsDataType = 'array';
  public $name;
  protected $noticesType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaNoticeDescription';
  protected $noticesDataType = 'array';
  public $policyDescription;
  public $schemaName;
  public $supportUri;

  public function setAccessRestrictions($accessRestrictions)
  {
    $this->accessRestrictions = $accessRestrictions;
  }
  public function getAccessRestrictions()
  {
    return $this->accessRestrictions;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1AdditionalTargetKeyName[]
   */
  public function setAdditionalTargetKeyNames($additionalTargetKeyNames)
  {
    $this->additionalTargetKeyNames = $additionalTargetKeyNames;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1AdditionalTargetKeyName[]
   */
  public function getAdditionalTargetKeyNames()
  {
    return $this->additionalTargetKeyNames;
  }
  /**
   * @param Google_Service_ChromePolicy_Proto2FileDescriptorProto
   */
  public function setDefinition(Google_Service_ChromePolicy_Proto2FileDescriptorProto $definition)
  {
    $this->definition = $definition;
  }
  /**
   * @return Google_Service_ChromePolicy_Proto2FileDescriptorProto
   */
  public function getDefinition()
  {
    return $this->definition;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function setFieldDescriptions($fieldDescriptions)
  {
    $this->fieldDescriptions = $fieldDescriptions;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function getFieldDescriptions()
  {
    return $this->fieldDescriptions;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaNoticeDescription[]
   */
  public function setNotices($notices)
  {
    $this->notices = $notices;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaNoticeDescription[]
   */
  public function getNotices()
  {
    return $this->notices;
  }
  public function setPolicyDescription($policyDescription)
  {
    $this->policyDescription = $policyDescription;
  }
  public function getPolicyDescription()
  {
    return $this->policyDescription;
  }
  public function setSchemaName($schemaName)
  {
    $this->schemaName = $schemaName;
  }
  public function getSchemaName()
  {
    return $this->schemaName;
  }
  public function setSupportUri($supportUri)
  {
    $this->supportUri = $supportUri;
  }
  public function getSupportUri()
  {
    return $this->supportUri;
  }
}
