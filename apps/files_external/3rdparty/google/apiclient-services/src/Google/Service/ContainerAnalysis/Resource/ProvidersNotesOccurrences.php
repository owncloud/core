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
 * The "occurrences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containeranalysisService = new Google_Service_ContainerAnalysis(...);
 *   $occurrences = $containeranalysisService->occurrences;
 *  </code>
 */
class Google_Service_ContainerAnalysis_Resource_ProvidersNotesOccurrences extends Google_Service_Resource
{
  /**
   * Lists `Occurrences` referencing the specified `Note`. Use this method to get
   * all occurrences referencing your `Note` across all your customer projects.
   * (occurrences.listProvidersNotesOccurrences)
   *
   * @param string $name The name field will contain the note name for example:
   * "provider/{provider_id}/notes/{note_id}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @opt_param int pageSize Number of notes to return in the list.
   * @opt_param string filter The filter expression.
   * @return Google_Service_ContainerAnalysis_ListNoteOccurrencesResponse
   */
  public function listProvidersNotesOccurrences($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ContainerAnalysis_ListNoteOccurrencesResponse");
  }
}
