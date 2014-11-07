<?php

namespace Sabre\CalDAV;

/**
 * This interface represents a Calendar that is shared by a different user.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface ISharedCalendar extends ICalendar {

    /**
     * This method should return the url of the owners' copy of the shared
     * calendar.
     *
     * @return string
     */
    function getSharedUrl();

    /**
     * Returns the list of people whom this calendar is shared with.
     *
     * Every element in this array should have the following properties:
     *   * href - Often a mailto: address
     *   * commonName - Optional, for example a first + last name
     *   * status - See the Sabre\CalDAV\SharingPlugin::STATUS_ constants.
     *   * readOnly - boolean
     *   * summary - Optional, a description for the share
     *
     * @return array
     */
    function getShares();

}
